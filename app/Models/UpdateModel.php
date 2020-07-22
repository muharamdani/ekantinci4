<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class UpdateModel extends Model{
    protected $table = 'log_update_users';
    protected $allowedFields = ['customers_id','sellers_id','timestamp'];
}