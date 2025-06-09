<?php

namespace CodeIgniter\Models;

class ProductModel extends \CodeIgniter\Model
{
    protected $table = 'product';
    protected $primaryKey = 'p_id';
    protected $allowedFields = ['p_id', 'name', 'description', 'price', 'path', 'stock'];

    public function getProducts()
    {
        return $this->findAll();
    }

    public function getProductById($id)
    {
        return $this->find($id);
    }
}
