<?php

namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model {
    protected $table = 'order';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['order_id','User_ID','order_date', 'total_price','payment_method','shipping_address', 'status', 'dOrder_id'];
}