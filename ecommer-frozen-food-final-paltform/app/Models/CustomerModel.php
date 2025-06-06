<?php

namespace App\Models;
use CodeIgniter\Model;

class PenggunaModel extends Model {
    protected $table = 'customer';
    protected $primaryKey = 'User_id';
    protected $allowedFields = ['User_id','Name', 'Email','Password'];
}