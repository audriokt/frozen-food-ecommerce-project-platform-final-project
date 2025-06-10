<?php

namespace App\Models;

class ProductModel extends \CodeIgniter\Model
{
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    protected $allowedFields = ['p_id', 'name', 'description', 'price', 'path', 'stock'];
}
