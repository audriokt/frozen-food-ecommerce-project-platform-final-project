<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\CategoryModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $productModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->cartModel = new \App\Models\CartModel();
        $this->productModel = new \App\Models\ProductModel();
        $this->categoryModel = new \App\Models\Category();
        helper(['form', 'url', 'session']);
    }

    public function index()
    {
        // Cek session login
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');

        // Ambil data cart dengan join ke tabel produk
        $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price as price, product.path as path, product.c_id as category, category.name as category_name')
            ->join('product', 'product.p_id = cart.p_id')
            ->join('category', 'category.c_id = product.c_id')
            ->where('cart.User_ID', $userId)
            ->findAll();

        $data = [
            'title' => 'Keranjang Belanja',
            'cartItems' => $cartItems,
            'totalItems' => count($cartItems),
            'subtotal' => array_sum(array_column($cartItems, 'subtotal'))
        ];

        return view('Customer/Cart_Page', $data);
    }

    public function add($productId)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');
        $product = $this->productModel->find($productId);

        if (!$product) {
            session()->setFlashdata('error', 'Produk tidak ditemukan');
            return redirect()->back();
        }

        // Cek apakah produk sudah ada di cart
        $existingCart = $this->cartModel->where([
            'User_ID' => $userId,
            'p_id' => $productId
        ])->first();

        $count = $this->cartModel->countAllResults(false);
        $id = "cust-" . ($count + 1);
        if ($existingCart) {
            // Update quantity jika sudah ada
            $newQty = $existingCart['quantity'] + 1;
            $this->cartModel->update($existingCart['cart_id'], [
                'quantity' => $newQty,
                'subtotal' => $newQty * $product['price']
            ]);
        } else {
            // Tambahkan baru jika belum ada
            $this->cartModel->insert([
                'cart_id' => $id,
                'User_ID' => $userId,
                'p_id' => $productId,
                'quantity' => 1,
                'subtotal' => $product['price']
            ]);
        }
        $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price, product.path')
            ->join('product', 'product.p_id = cart.p_id')
            ->where('cart.User_ID', $userId)
            ->findAll();
        session()->set([
            'Total_Item_Cart' => count($cartItems),
        ]);
        session()->setFlashdata('success', 'Produk berhasil ditambahkan ke keranjang');
        return redirect()->to('/cart');
    }

    public function update()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');
        $quantities = $this->request->getPost('quantity');

        foreach ($quantities as $cartId => $qty) {
            $cartItem = $this->cartModel->where([
                'cart_id' => $cartId,
                'User_ID' => $userId
            ])->first();

            if ($cartItem) {
                $product = $this->productModel->find($cartItem['p_id']);
                $this->cartModel->update($cartId, [
                    'quantity' => $qty,
                    'subtotal' => $qty * $product['price']
                ]);
            }
        }

        session()->setFlashdata('success', 'Keranjang berhasil diperbarui');
        return redirect()->to('/cart');
    }

    public function delete($cartId)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');

        // Pastikan cart item milik user yang login
        $cartItem = $this->cartModel->where([
            'cart_id' => $cartId,
            'User_ID' => $userId
        ])->first();

        if ($cartItem) {
            $this->cartModel->delete($cartId);
            session()->setFlashdata('success', 'Item berhasil dihapus dari keranjang');
        } else {
            session()->setFlashdata('error', 'Item tidak ditemukan');
        }
        $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price, product.path')
                ->join('product', 'product.p_id = cart.p_id')
                ->where('cart.User_ID', $userId)
                ->findAll();
            session()->set([
                'Total_Item_Cart' => count($cartItems),
        ]);
        session()->setFlashdata('success', 'Product terhapus');
        return redirect()->to('/cart');
    }

    public function checkout()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');
        $selectedItems = $this->request->getPost('selected');

        if (empty($selectedItems)) {
            session()->setFlashdata('error', 'Pilih minimal 1 item untuk checkout');
            return redirect()->to('/cart');
        }

        $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price as price, product.path as path')
            ->join('product', 'product.p_id = cart.p_id')
            ->where('User_ID', $userId)
            ->whereIn('cart_id', $selectedItems)
            ->findAll();

        $userName = session()->get('User_Name'); // pastikan ada di session

        return view('Customer/Checkout_Page', [
            'quantity' => null,
            'product_name' => null,
            'userName' => $userName,
            'cartItems' => $cartItems
        ]);
    }

    public function directCheckout($item)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $userId = session()->get('User_ID');
        $selectedItems = $this->request->getPost('selected');

        $product = $this->productModel
        ->where('p_id', $item)
        ->first();

        $userName = session()->get('User_Name'); // pastikan ada di session

        return view('Customer/Checkout_Page', [
            'quantity' => 1,
            'product_name' => $product['name'], 
            'userName' => $userName,
            'cartItems' => [$product]
        ]);
    }

}
