<?php

namespace App\Models;
use CodeIgniter\Model;

class CartModel extends Model {
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['cart_id','User_ID','subtotal', 'quantity','p_id'];
}