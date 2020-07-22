<?php namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class TransactionModel extends Model{
    protected $table = 'transactions';
    protected $allowedFields = ['customers_id','sellers_id','balance','timestamp'];
}