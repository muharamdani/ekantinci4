<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\UsersModel;

class AdminController extends BaseController{
    public function __construct(){
        $this->user = new UsersModel();
        $this->customer = new CustomersModel();
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
        $userlist = $this->customer->findAll();
        $data = ['userlist'=>$userlist];
        echo view('admin/list_user_customer', $data);
    }
    public function list_user_seller(){
        $userlist = $this->user->findAll();
        $data = ['userlist'=>$userlist];
        echo view('admin/list_user_seller', $data);
    }
    // Post Method
    // List User end

    // Update User Start
    // Get Method
    public function update_seller(){
        echo view('admin/update_seller');
    }
    public function update_customer(){
        echo view('admin/update_customer');
    }
    // Post Method
    // Update User End
    

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