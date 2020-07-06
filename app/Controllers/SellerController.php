<?php namespace App\Controllers;

class SellerController extends BaseController{
    public function index(){
        $data['username'] = "Babeh";
        echo view('seller/index', $data);
    }
    public function transaction(){
        echo view('seller/transaction');
    }
    public function transaction_history(){
        echo view('seller/transaction_history');
    }
    public function balance_history(){
        return "edit";
    }
    public function change_profile(){
        echo view('seller/change_profile');
    }
    public function print_card(){
        return "edit";
    }
}