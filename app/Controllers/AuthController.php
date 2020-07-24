<?php namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\UsersModel;

class AuthController extends BaseController{
    public function index(){
        if(session()->get('role')=='admin'){
            return redirect()->to('/admin');
        }
        elseif(session()->get('role')=='seller'){
            return redirect()->to('/seller');
        }
        elseif(session()->get('role')=='customer'){
            return redirect()->to('/customer');
        }
        return view("login/index");
    }
    public function login_process(){
        $usermodel = new UsersModel();
        $customermodel = new CustomersModel();
        $username = $this->request->getVar()['username'];
        $password = $this->request->getVar()['password'];
        $user = $usermodel->where('username',$username)->first();
        $user2 = $customermodel->where('username',$username)->first();
        if($user){
            if(password_verify($password,$user['password'])){
                if($user['role']=='admin'){
                    session()->set(['username'=>$user['username'],'role'=>'admin']);
                    return redirect()->to('/admin');
                }
                elseif($user['role']=='seller'){
                    session()->set(['username'=>$user['username'],'role'=>'seller']);
                    return redirect()->to('/seller');
                }
            }
            else{
                session()->setFlashdata('errorpassword','Wrong Password');
                return redirect()->to('/')->withInput();
            }
        }
        elseif($user2){
            if(password_verify($password,$user2['password'])){
                session()->set(['username'=>$user2['username'],'role'=>'customer']);
                return redirect()->to('/customer');
            }
            else{
                session()->setFlashdata('errorpassword','Wrong Password');
                return redirect()->to('/')->withInput();
            }
        }
        else{
            session()->setFlashdata('errorboth','Wrong Username/Password');
            return redirect()->to('/')->withInput();
        }
    }
    public function logout(){
        session()->remove(['role','username']);
        // session()->destroy();
        session()->setFlashdata('logoutsuccess','You have been logged out :)');
        return redirect()->to('/')->withInput();
    }
    public function cek(){
        dd(session()->get());
    }
    public function register(){
        return view("register/index");
    }
}