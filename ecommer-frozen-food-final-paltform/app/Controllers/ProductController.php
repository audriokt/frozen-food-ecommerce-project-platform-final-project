<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Models\Category;

class ProductController extends BaseController
{
    protected $categoryModel;
    protected $productModel;
    public function __construct()
    {
        $this->productModel = model(ProductModel::class);
        $this->categoryModel = model(Category::class);
    }

    public function showAll()
    {
        $data = [
            'products' => $this->productModel->findAll()
        ];
        return view('Customer/Landing_Page_Cus', $data);
    }

    public function show($id)
    {
        // Logic to retrieve a single product by ID
        return view('products/show', ['id' => $id]);
    }

    public function showCard()
    {
        return view('layouts/product_card');
    }

    public function showCategory($category)
    {
        $data = [
            'products' => $this->productModel->where('c_id', $category)->findAll(),
            'category' => $this->categoryModel->where('c_id', $category)->first()['name'] ?? 'Kategori Tidak Ditemukan'
        ];
        return view('Customer/Category_Base', $data);
    }
}
