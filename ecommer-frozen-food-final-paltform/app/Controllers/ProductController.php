<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;
    public function __construct()
    {
        $this->productModel = model(ProductModel::class);
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
}
