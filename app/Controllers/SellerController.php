<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\TransactionModel;
use App\Models\UsersModel;

class SellerController extends BaseController{
    public function __construct(){
        $this->usermodel = new UsersModel();
        $this->customermodel = new CustomersModel();
        $this->transactionmodel = new TransactionModel();
        date_default_timezone_set('Asia/Jakarta');
        $this->now = date('Y-m-d H:i:s');
    }
    public function index(){
        return view('seller/index');
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
        return view('seller/transaction_history');
    }
    public function balance_history(){
        return "edit";
    }
    public function change_profile(){
        return view('seller/change_profile');
    }
    public function print_card(){
        return "edit";
    }
}