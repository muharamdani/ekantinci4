<?php namespace App\Controllers;

class CustomerController extends BaseController{
    public function index(){
        echo view('customer/index');
    }
    public function transaction_history(){
        echo view('customer/transaction_history');
    }
    public function balance_history(){
        echo view('customer/balance_history');
    }
    public function change_profile(){
        echo view('customer/change_profile');
    }
    public function print_card(){
        return "print";
    }
}