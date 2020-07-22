<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class DeleteModel extends Model{
    protected $table = 'log_delete_users';
    protected $allowedFields = ['customers_id','sellers_id','timestamp'];
}