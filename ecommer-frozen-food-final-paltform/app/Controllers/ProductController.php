<?php

namespace App\Controllers;

class ProductController extends BaseController
{
    public function index()
    {
        // Logic to retrieve and display products
        return view('products/index');
    }

    public function show($id)
    {
        // Logic to retrieve a single product by ID
        return view('products/show', ['id' => $id]);
    }
}
