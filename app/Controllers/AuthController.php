<?php namespace App\Controllers;

class AuthController extends BaseController{
    public function index(){
        return view("login/index");
    }
    public function register(){
        return view("register/index");
    }
}