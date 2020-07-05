<?php namespace App\Controllers;

class AuthController extends BaseController{
    public function index(){
        return view("login/index");
    }
    public function logout(){
        return "Has been logut";
    }
    public function register(){
        return view("register/index");
    }
}