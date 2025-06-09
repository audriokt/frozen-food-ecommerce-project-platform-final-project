<?php

namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model {
    protected $table = 'customer';
    protected $primaryKey = 'User_ID';
    protected $allowedFields = ['User_ID','Name', 'Email','Password'];
}