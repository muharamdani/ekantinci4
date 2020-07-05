<?php namespace App\Controllers;

class AdminController extends BaseController{
    public function index(){
        $data['username'] = "Admin";
        echo view('admin/index', $data);
    }
    // Create user start
    // GET METHOD
    public function create_user(){
        echo view('admin/create_user');
    }
    public function create_user_customer(){
        echo view('admin/create_user_customer');
    }
    public function create_user_seller(){
        echo view('admin/create_user_seller');
    }
    // POST METHOD
    // Create User end

    // List user start
    // Get Method
    public function list_user(){
        echo view('admin/list_user');
    }
    public function list_user_customer(){
        echo view('admin/list_user_customer');
    }
    public function list_user_seller(){
        echo view('admin/list_user_seller');
    }
    // Post Method
    // List User end

    // Withdraw start
    // Get Method
    public function withdraw(){
        echo view('admin/withdraw');
    }
    public function withdraw_customer(){
        echo view('admin/withdraw_customer');
    }
    public function withdraw_seller(){
        echo view('admin/withdraw_seller');
    }
    // Post Method
    // Withdraw end
    public function transaction(){
        echo view('admin/transaction');
    }
    public function print_card(){
        echo view('admin/print_card');
    }
    public function add_balance(){
        echo view('admin/add_balance');
    }
}