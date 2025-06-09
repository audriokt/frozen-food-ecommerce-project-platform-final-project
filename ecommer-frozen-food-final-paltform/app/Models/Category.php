<?php

namespace CodeIgniter\Models;

class Category extends \CodeIgniter\Model
{
    protected $table = 'category';
    protected $primaryKey = 'c_id';
    protected $allowedFields = ['c_id', 'name'];
}
