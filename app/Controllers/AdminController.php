<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\UsersModel;

class AdminController extends BaseController{
    public function __construct(){
        $this->user = new UsersModel();
        $this->customer = new CustomersModel();
        $this->listcustomer = $this->customer->findalluser();
        $this->listseller = $this->user->findalluser();
    }
    public function index(){
        // users
        $countseller = $this->user->selectCount('id')->first();
        $countseller = $countseller['id'] - 1;
        $sellerbalance = $this->user->selectSum('balance')->first();
        $sellerbalance = $sellerbalance['balance'];
        // customers
        $countcustomer = $this->customer->selectCount('id')->first();
        $countcustomer = $countcustomer['id'];
        $customerbalance = $this->customer->selectSum('balance')->first();
        $customerbalance = $customerbalance['balance'];
        $data = ['countseller' => $countseller,
                'sellerbalance'=>$sellerbalance,
                'countcustomer' => $countcustomer,
                'customerbalance'=>$customerbalance,];
        echo view('admin/index', $data);
    }
    // Create user start
    public function create_user(){
        echo view('admin/create_user');
    }
    public function create_user_customer(){
        echo view('admin/create_user_customer');
    }
    public function create_user_seller(){
        session();
        $validation = \Config\Services::validation();
        $data = ['validation'=>$validation];
        return view('admin/create_user_seller', $data);
        // dd($validation);
    }
    public function create_seller_process(){
        if(!$this->validate([
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[5]',
            'password_confirm'=>'required|matches[password]'
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/create_user/seller')->withInput()->with('validation',$validation);
        }
        $result = $this->request->getVar();
        $data = [
            'username' => $result['username'],
            'password' => $result['password'],
            'role' => "seller",
            'balance' => 0,
        ];
        $this->user->save($data);
        return redirect()->to('/admin/list_user/seller');
    }
    // Create User End

    // List user start
    public function list_user(){
        echo view('admin/list_user');
    }
    public function list_user_customer(){
        $data = $this->listcustomer;
        echo view('admin/list_user_customer', $data);
    }
    public function list_user_seller(){
        $data = $this->listseller;
        echo view('admin/list_user_seller', $data);
    }
    // List User End

    // Update User Start
    public function update_seller($id){
        $data = $this->user->finduserid($id);
        echo view('admin/update_seller', $data);
    }
    public function update_customer($id){
        $data = $this->customer->finduserid($id);
        echo view('admin/update_customer', $data);
    }
    // Update User End

    // Withdraw start
    public function withdraw(){
        echo view('admin/withdraw');
    }
    public function withdraw_customer(){
        $data = $this->listcustomer;
        echo view('admin/withdraw_customer', $data);
    }
    public function withdraw_seller(){
        $data = $this->listseller;
        echo view('admin/withdraw_seller', $data);
    }
    // Withdraw end
    
    // Other
    public function transaction(){
        echo view('admin/transaction');
    }
    public function print_card(){
        $data = $this->listcustomer;
        echo view('admin/print_card', $data);
    }
    public function add_balance(){
        $data = $this->listcustomer;
        echo view('admin/add_balance', $data);
    }
}