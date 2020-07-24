<?php namespace App\Controllers;

use App\Models\BalanceModel;
use App\Models\CustomersModel;
use App\Models\TransactionModel;
use App\Models\UpdateModel;
use App\Models\UsersModel;

class CustomerController extends BaseController{
    public function __construct(){
        $this->usermodel = new UsersModel();
        $this->customermodel = new CustomersModel();
        $this->transactionmodel = new TransactionModel();
        $this->updatemodel = new UpdateModel();
        $this->balancemodel = new BalanceModel();
        date_default_timezone_set('Asia/Jakarta');
        $this->now = date('Y-m-d H:i:s');
    }
    public function index(){
        $userbalance = $this->customermodel->select('id,balance')->where('username',session()->get('username'))->first();
        $usertransaction = $this->transactionmodel->selectCount('id')->where('customers_id',$userbalance['id'])->first();
        $data = [
            'userbalance'=>$userbalance['balance'],
            'usertransaction'=>$usertransaction['id'],
        ];
        return view('customer/index',$data);
    }
    public function transaction_history(){
        $transaction = $this->transactionmodel
                        ->select('transactions.id,customers.id,customers.nis,customers.full_name,users.username,transactions.balance,transactions.timestamp')
                        ->join('customers','transactions.customers_id = customers.id')
                        ->join('users','transactions.sellers_id = users.id')
                        ->where('customers.username',session()->get('username'))
                        ->findAll();
        $data = ['data'=>$transaction];
        return view('customer/transaction_history',$data);
    }
    public function balance_history(){
        $logbalance = $this->balancemodel
                        ->select('log_balance.id,log_balance.add_balance,log_balance.withdraw_balance,customers.nis,customers.full_name,log_balance.timestamp')
                        ->join('customers','log_balance.customers_id = customers.id')
                        ->where('customers.username',session()->get('username'))
                        ->findAll();
        $data = ['data'=>$logbalance];
        return view('customer/balance_history',$data);
    }
    public function change_profile(){
        $data = $this->customermodel->select('id,full_name,username')->where('username',session()->get('username'))->first();
        $data = ['data'=>$data,'validation'=>\Config\Services::validation()];
        return view('customer/change_profile',$data);
    }
    public function change_profile_process(){
        $result = $this->request->getVar();
        $id = $result['id'];
        if(!$this->validate([
            'username' => [
                'rules' => 'required|alpha_dash|min_length[4]|is_unique[customers.username,id,{id}]',
                'errors' => [
                    'is_unique' => 'username must be unique'
                ]
            ],
            'name' => 'required|min_length[5]',
            'password' => 'required|alpha_dash|min_length[5]',
        ])){
            return redirect()->to("/customer/change_profile")->withInput()->with('validation',\Config\Services::validation());
        }
        $data = [
            'full_name' => htmlspecialchars($result['name']),
            'username' => htmlspecialchars($result['username']),
            'password' => password_hash($result['password'], PASSWORD_DEFAULT),
            'timestamp'=>$this->now
        ];
        $dataupdate = [
            'customers_id'=>$id,
            'timestamp'=>$this->now,
        ];
        session()->set('username',$data['username']);
        $this->customermodel->update($id, $data);
        $this->updatemodel->save($dataupdate);
        session()->setFlashdata('success_create','Data berhasil dirubah');
        return redirect()->to('/customer');
    }
    public function print_card(){
        return "print";
    }
}