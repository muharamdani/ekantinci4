<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\UsersModel;

class AdminController extends BaseController{
    public function __construct(){
        $this->user = new UsersModel();
        $this->customer = new CustomersModel();
        $this->listcustomer = $this->customer->findalluser();
        $this->listseller = $this->user->findalluser();
        $this->validation = \Config\Services::validation();
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
        return view('admin/create/create_user');
    }
    public function create_user_customer(){
        $validation = ['validation'=>$this->validation];
        return view('admin/create/create_user_customer', $validation);
    }
    public function create_customer_process(){
        if(!$this->validate([
            'nis' => [
                'rules' => 'required|min_length[5]|is_unique[customers.nis]',
                'errors' => [
                    'is_unique' => 'Nis must be unique'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_dash|min_length[4]|is_unique[customers.username]',
                'errors' => [
                    'is_unique' => 'username must be unique'
                ]
            ],
            'name' => 'required|min_length[5]',
            'password' => 'required|alpha_dash|min_length[5]',
            'class' => 'required',
            'balance' => 'required',
        ])){
            return redirect()->to('/admin/create_user/customer')->withInput()->with('validation',$this->validation);
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
        $validation = ['validation'=>$this->validation];
        return view('admin/create/create_user_seller', $validation);
    }
    public function create_seller_process(){
        if(!$this->validate([
            'username' => [
                'rules'  => 'required|alpha_dash|min_length[4]|is_unique[users.username]',
                'errors' => [
                    'is_unique' => 'Username has been taken, choose another one'
                ]
            ],
            'password' => 'required|alpha_dash|min_length[5]',
            'password_confirm'=>'required|alpha_dash|matches[password]'
        ])){
            return redirect()->to('/admin/create_user/seller')->withInput()->with('validation',$this->validation);
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
        return view('admin/list/list_user');
    }
    public function list_user_customer(){
        return view('admin/list/list_user_customer', $this->listcustomer);
    }
    public function list_user_seller(){
        return view('admin/list/list_user_seller', $this->listseller);
    }
    // List User End

    // Update User Start
    public function update_seller($id){
        $data = $this->user->finduserid($id);
        $data = ['data'=>$data,'validation'=>$this->validation];
        return view('admin/update/update_seller', $data);
    }
    public function update_seller_process(){
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
            return redirect()->to("/admin/update/seller/$id")->withInput()->with('validation',$this->validation);
        }
        $data = [
            'username' => $result['username'],
            'password' => $result['password'],
        ];
        $this->user->update($id, $data);
        session()->setFlashdata('success_create','Data berhasil dirubah');
        return redirect()->to('/admin/list_user/seller');
    }
    public function update_customer($id){
        $data = $this->customer->finduserid($id);
        $data = ['data'=>$data, 'validation'=>$this->validation];
        return view('admin/update/update_customer', $data);
    }
    public function update_customer_process(){
        $result = $this->request->getVar();
        $id = $result['id'];
        if(!$this->validate([
            'nis' => [
                'rules' => 'required|min_length[5]|is_unique[customers.nis,id,{id}]',
                'errors' => [
                    'is_unique' => 'Nis must be unique'
                ]
            ],
            'username' => [
                'rules' => 'required|alpha_dash|min_length[4]|is_unique[customers.username,id,{id}]',
                'errors' => [
                    'is_unique' => 'username must be unique'
                ]
            ],
            'name' => 'required|min_length[5]',
            'password' => 'required|alpha_dash|min_length[5]',
            'class' => 'required',
        ])){
            return redirect()->to("/admin/update/customer/$id")->withInput()->with('validation',$this->validation);
        }
        $data = [
            'nis' => $result['nis'],
            'full_name' => $result['name'],
            'username' => $result['username'],
            'password' => $result['password'],
            'class' => $result['class'],
        ];
        $this->customer->update($id, $data);
        session()->setFlashdata('success_create','Data berhasil dirubah');
        return redirect()->to('/admin/list_user/customer');
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
        return view('admin/balance/withdraw');
    }
    public function withdraw_customer(){
        return view('admin/balance/withdraw_customer', $this->listcustomer);
    }
    public function withdraw_customer_id($id){
        $data = ['id'=>$id];
        return view('admin/balance/withdraw_customer_id', $data);
    }
    public function withdraw_customer_process(){
        $data = $this->request->getVar();
        $id = $data['id'];
        $balance_customer = $this->customer->where('id',$id)->select('balance')->first();
        $balance = $data['balance'];
        if($balance < 5000){
            session()->setFlashdata('invalid_balance','Invalid balance!');
            return redirect()->to("/admin/withdraw/customer/$id");
        }
        elseif($balance_customer['balance'] - $balance < 0){
            session()->setFlashdata('invalid_balance','Saldo tidak cukup!');
            return redirect()->to("/admin/withdraw/customer/$id");
        }
        $this->customer->set("balance","balance-$balance", FALSE)->where('id',$id)->update();
        return redirect()->to("/admin/withdraw/customer");
    }
    public function withdraw_seller(){
        return view('admin/balance/withdraw_seller', $this->listseller);
    }
    public function withdraw_seller_id($id){
        $data = ['id'=>$id];
        if($data['id'] == 1){
            session()->setFlashdata('admin_error','Error! admin user!');
            return redirect()->to("/admin/withdraw/seller");
        }
        return view('admin/balance/withdraw_seller_id', $data);
    }
    public function withdraw_seller_process(){
        $data = $this->request->getVar();
        $balance = $data['balance'];
        $id = $data['id'];
        $balance_seller = $this->user->where('id',$id)->select('balance')->first();
        if($balance < 5000){
            session()->setFlashdata('invalid_balance','Invalid balance!');
            return redirect()->to("/admin/withdraw/seller/$id");
        }
        elseif($balance_seller['balance'] - $balance < 0){
            session()->setFlashdata('invalid_balance','Saldo tidak cukup!');
            return redirect()->to("/admin/withdraw/seller/$id");
        }
        $this->user->set("balance","balance-$balance", FALSE)->where('id',$id)->update();
        return redirect()->to("/admin/withdraw/seller");
    }
    // Withdraw end
    
    // Other
    public function transaction(){
        return view('admin/others/transaction');
    }
    public function print_card(){
        return view('admin/others/print_card', $this->listcustomer);
    }
    public function add_balance(){
        return view('admin/balance/add_balance', $this->listcustomer);
    }
    public function add_balance_id($id){
        $data = ['id'=>$id];
        return view('admin/balance/add_balance_id', $data);
    }
    public function add_balance_process(){
        $data = $this->request->getVar();
        $id = $data['id'];
        $balance = $data['balance'];
        if($balance < 5000){
            session()->setFlashdata('invalid_balance','Invalid balance!');
            return redirect()->to("/admin/add_balance/$id");
        }
        $this->customer->set("balance","balance+$balance", FALSE)->where('id',$id)->update();
        return redirect()->to("/admin/add_balance");
    }
}