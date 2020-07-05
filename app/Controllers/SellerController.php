<?php namespace App\Controllers;

class SellerController extends BaseController{
    public function index(){
        $data['username'] = "Babeh";
        echo view('seller/index', $data);
    }
    public function transaction_history(){
        return "edit";
    }
    public function balance_history(){
        return "edit";
    }
    public function change_profile(){
        return "edit";
    }
    public function print_card(){
        return "edit";
    }
}