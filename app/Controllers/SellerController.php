<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\TransactionModel;
use App\Models\UpdateModel;
use App\Models\UsersModel;

class SellerController extends BaseController{
    public function __construct(){
        $this->usermodel = new UsersModel();
        $this->customermodel = new CustomersModel();
        $this->transactionmodel = new TransactionModel();
        $this->updatemodel = new UpdateModel();
        date_default_timezone_set('Asia/Jakarta');
        $this->now = date('Y-m-d H:i:s');
    }
    public function index(){
        $userbalance = $this->usermodel->select('id,balance')->where('username',session()->get('username'))->first();
        $usertransaction = $this->transactionmodel->selectCount('id')->where('sellers_id',$userbalance['id'])->first();
        $data = [
            'userbalance'=>$userbalance['balance'],
            'usertransaction'=>$usertransaction['id'],
        ];
        return view('seller/index',$data);
    }
    public function transaction(){
        return view('seller/transaction');
    }
    public function transaction_process(){
        $balance = $this->request->getVar()['balance'];
        if($balance < 500){
            session()->setFlashdata('invalidbalance','Jumlah Uang Tidak Valid!');
            return redirect()->to('/seller/transaction')->withInput();
        }
        session()->set('balance',$balance);
        return redirect()->to('/seller/transaction/payment');
    }
    public function payment(){
        if(!session()->has('balance')){
            return redirect()->to('/seller/transaction');
        }
        return view('seller/payment');
    }
    public function payment_process(){
        $nis = $this->request->getVar()['nis'];
        $balance = session()->get('balance');
        if($this->customermodel->where('nis',$nis)->first()){
            $customer = $this->customermodel->select('id,full_name,balance')->where('nis',$nis)->first();
            $seller = $this->usermodel->select('id')->where('username',session()->get('username'))->first();
            $customerbalance = $customer['balance'];
            if($customerbalance-$balance < 0){
                session()->setFlashdata('minusbalance','Saldo Anda Tidak Cukup!');
                return redirect()->to('/seller/transaction/payment')->withInput();
            }
            $this->customermodel->set("balance","balance-$balance", FALSE)->where('nis',$nis)->update();
            $this->usermodel->set("balance","balance+$balance",FALSE)->where('username',session()->get('username'))->update();
            $datatransaction = [
                'customers_id' => $customer['id'],
                'sellers_id' => $seller['id'],
                'balance' => $balance,
                'timestamp' => $this->now,
            ];
            $this->transactionmodel->insert($datatransaction);
            session()->setFlashdata([
                'customerbalance'=>$customerbalance,
                'afterbalance'=>$customerbalance-$balance,
                'customername'=>$customer['full_name'],
                ]);
            return redirect()->to('/seller/transaction/done');
        }
        else{
            session()->setFlashdata('nisnotfound','Nis Tidak Terdaftar!');
            return redirect()->to('/seller/transaction/payment')->withInput();
        }
    }
    public function payment_done(){
        if(!session()->getFlashdata('customerbalance') && !session()->getFlashdata('afterbalance')){
            return redirect()->to('/seller/transaction/payment');
        }
        echo view('seller/transaction_done');
        session()->remove('balance');
    }

    public function transaction_history(){
        $transaction = $this->transactionmodel
                        ->select('transactions.id,customers.id,customers.nis,customers.full_name,users.username,transactions.balance,transactions.timestamp')
                        ->join('customers','transactions.customers_id = customers.id')
                        ->join('users','transactions.sellers_id = users.id')
                        ->where('users.username',session()
                        ->get('username'))
                        ->findAll();
        $data = ['data'=>$transaction];
        return view('seller/transaction_history',$data);
    }
    public function balance_history(){
        return "edit";
    }
    public function change_profile(){
        $data = $this->usermodel->select('id,username')->where('username',session()->get('username'))->first();
        $data = ['data'=>$data,'validation'=>\Config\Services::validation()];
        return view('seller/change_profile',$data);
    }
    public function change_profile_process(){
        $result = $this->request->getVar();
        $id = $result['id'];
        if(!$this->validate([
            'username' => [
                'rules'  => 'required|alpha_dash|min_length[4]|is_unique[users.username,id,{id}]',
                'errors' => [
                    'is_unique' => 'Username has been taken, choose another one'
                ]
            ],
            'password' => 'required|alpha_dash|min_length[5]',
            'password_confirm'=>'required|alpha_dash|matches[password]'
        ])){
            return redirect()->to("/seller/change_profile")->withInput()->with('validation',\Config\Services::validation());
        }
        $data = [
            'username' => htmlspecialchars($result['username']),
            'password' => password_hash($result['password'], PASSWORD_DEFAULT),
        ];
        $dataupdate = [
            'sellers_id'=>$id,
            'timestamp'=>$this->now,
        ];
        session()->set('username',$data['username']);
        $this->usermodel->update($id, $data);
        $this->updatemodel->save($dataupdate);
        session()->setFlashdata('success_create','Data berhasil dirubah');
        return redirect()->to('/seller');
    }
    public function print_card(){
        return "edit";
    }
}