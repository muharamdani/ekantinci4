<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UsersModel extends Model{
    protected $table = 'users';
    protected $allowedFields = ['username','password','role','balance','timestamp'];
    public function findalluser(){
        $data = $this->findAll();
        $data = ['data'=>$data];
        return $data;
    }
    public function finduserid($id){
        $data = $this->find($id);
        // $data = ['data'=>$data];
        return $data;
    }
}