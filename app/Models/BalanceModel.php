<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class BalanceModel extends Model{
    protected $table = 'log_balance';
    protected $allowedFields = ['customers_id','sellers_id','add_balance','withdraw_balance','timestamp'];
}