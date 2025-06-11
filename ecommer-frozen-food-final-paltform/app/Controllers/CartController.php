<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $productModel;

    public function __construct()
    {
        $this->cartModel = new \App\Models\CartModel();
        $this->productModel = new \App\Models\ProductModel();
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
        $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price, product.path')
            ->join('product', 'product.p_id = cart.p_id')
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
                'User_ID' => $userId,
                'p_id' => $productId,
                'quantity' => 1,
                'subtotal' => $product['price']
            ]);
        }

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

        $this->cartModel->where('User_ID', $userId)
            ->whereIn('cart_id', $selectedItems)
            ->delete();

        session()->setFlashdata('success', 'Checkout berhasil! Pesanan sedang diproses');
        return redirect()->to('/orders');
    }
}
