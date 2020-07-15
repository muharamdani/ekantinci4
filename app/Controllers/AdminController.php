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
        return view('admin/index', $data);
    }
    // Create user start
    public function create_user(){
        return view('admin/create_user');
    }
    public function create_user_customer(){
        $validation = \Config\Services::validation();
        $data = ['validation'=>$validation];
        return view('admin/create_user_customer', $data);
    }
    public function create_customer_process(){
        if(!$this->validate([
            'nis' => [
                'rules' => 'required|min_length[5]|is_unique[customers.nis]',
                'errors' => [
                    'is_unique' => 'Nis must be unique'
                ]
            ],
            'name' => 'required|min_length[5]',
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[5]',
            'class' => 'required',
            'balance' => 'required',
        ])){
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/create_user/customer')->withInput()->with('validation',$validation);
        }
        $result = $this->request->getVar();
        $data = [
            'nis' => $result['nis'],
            'full_name' => $result['name'],
            'username' => $result['username'],
            'password' => $result['password'],
            'class' => $result['class'],
            'balance' => $result['balance'],
        ];
        $this->customer->save($data);
        session()->setFlashdata('success_create','Data berhasil ditambahkan');
        return redirect()->to('/admin/list_user/customer');
    }
    public function create_user_seller(){
        $validation = \Config\Services::validation();
        $data = ['validation'=>$validation];
        return view('admin/create_user_seller', $data);
    }
    public function create_seller_process(){
        if(!$this->validate([
            'username' => 'required|min_length[3]',
            'username' => [
                'rules'  => 'is_unique[users.username]',
                'errors' => [
                    'is_unique' => 'Username has been taken, choose another one'
                ]
            ],
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
        session()->setFlashdata('success_create','Data berhasil ditambahkan');
        return redirect()->to('/admin/list_user/seller');
    }
    // Create User End

    // List user start
    public function list_user(){
        return view('admin/list_user');
    }
    public function list_user_customer(){
        $data = $this->listcustomer;
        return view('admin/list_user_customer', $data);
    }
    public function list_user_seller(){
        $data = $this->listseller;
        return view('admin/list_user_seller', $data);
    }
    // List User End

    // Update User Start
    public function update_seller($id){
        $data = $this->user->finduserid($id);
        return view('admin/update_seller', $data);
    }
    public function update_seller_process(){
        $result = $this->request->getVar();
        $data = [
            'username' =>$result['username'],
            'password' =>$result['password']
        ];
        
    }
    public function update_customer($id){
        $data = $this->customer->finduserid($id);
        return view('admin/update_customer', $data);
    }
    // Update User End
    // Delete User
    public function delete_seller($id){
        if($id == 1){
            session()->setFlashdata('error_admin','Cannot delete user admin!');
            return redirect()->to('/admin/list_user/seller');
        }
        $this->user->delete($id);
        session()->setFlashdata('delete_success','Delete user success!');
        return redirect()->to('/admin/list_user/seller');
    }
    public function delete_customer($id){
        $this->customer->delete($id);
        session()->setFlashdata('delete_success','Delete user success!');
        return redirect()->to('/admin/list_user/customer');
    }
    // Delete User End

    // Withdraw start
    public function withdraw(){
        return view('admin/withdraw');
    }
    public function withdraw_customer(){
        $data = $this->listcustomer;
        return view('admin/withdraw_customer', $data);
    }
    public function withdraw_seller(){
        $data = $this->listseller;
        return view('admin/withdraw_seller', $data);
    }
    // Withdraw end
    
    // Other
    public function transaction(){
        return view('admin/transaction');
    }
    public function print_card(){
        $data = $this->listcustomer;
        return view('admin/print_card', $data);
    }
    public function add_balance(){
        $data = $this->listcustomer;
        return view('admin/add_balance', $data);
    }
}