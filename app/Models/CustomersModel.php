<?php namespace App\Models;

use Codeigniter\Model;

class CustomersModel extends Model{
    protected $table = 'customers';
    public function findalluser(){
        $data = $this->findAll();
        $data = ['data'=>$data];
        return $data;
    }
    public function finduserid($id){
        $data = $this->find($id);
        $data = ['data'=>$data];
        return $data;
    }
}