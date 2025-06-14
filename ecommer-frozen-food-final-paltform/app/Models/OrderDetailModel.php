<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailModel extends Model
{
    protected $table = 'orderdetail';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'order_id',
        'p_id',
        'quantity',
        'price',
    ];
}
