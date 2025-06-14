<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\Category;

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
            'products' => $this->productModel->paginate(12, 'product'),
            'pager' => $this->productModel->pager,
        ];
        return view('Customer/Landing_Page_Cus', $data);
    }

    public function show($id)
    {
        // Logic to retrieve a single product by ID
        $product = $this->productModel->find($id);
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Product with ID $id not found");
        }
        return view('Customer/Product_Detail', ['id' => $id]);
    }

    public function showCategory($category)
    {
        $data = [
            'products' => $this->productModel->where('c_id', $category)->findAll(),
            'category' => $this->categoryModel->where('c_id', $category)->first()['name'] ?? 'Kategori tidak ada'
        ];
        return view('Customer/Category_Base', $data);
    }

    public function search()
    {
        $keyword = $this->request->getVar('keyword');
        if (!$keyword) {
            return redirect()->to('/LandingPage');
        }
        $products = $this->productModel->like('name', $keyword)->orLike('description', $keyword)->findAll();
        return view('Customer/Search_Result', ['data' => $products]);
    }
}
