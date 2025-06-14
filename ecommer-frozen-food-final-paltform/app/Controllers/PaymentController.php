<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\ProductModel;

class PaymentController extends BaseController
{
    public function bayar()
    {
        $userId = session()->get('User_ID');
        $method = $this->request->getPost('metode_pembayaran');

        $orderModel = new OrderModel();
        $cartModel = new CartModel();
        $productModel = new ProductModel();

        $cartItems = $cartModel
            ->select('cart.*, product.p_id, product.name as product_name, product.price as price, product.path')
            ->join('product', 'product.p_id = cart.p_id')
            ->where('cart.User_ID', $userId)
            ->findAll();

        $count = $orderModel->countAll();
        $orderId = "ord-" . ($count + 1);
        $orderedItems = [];
        $grandTotal = 0;

        foreach ($cartItems as $item) {
            $orderedItems[] = [
                'product_id'    => $item['p_id'],
                'product_name'  => $item['product_name'],
                'path'          => $item['path'],
                'quantity'      => $item['quantity'],
                'price'         => $item['price'],
                'subtotal'      => $item['subtotal']
            ];
            $grandTotal += $item['subtotal'];

            // Hapus item dari keranjang setelah diproses
            $cartModel->delete($item['cart_id']);

            $product = $productModel->where('p_id', $item['p_id'])->first();
            $productModel->update($item['p_id'], [
                'stock' => $product['stock'] - $item['quantity']
            ]);
        }

        session()->set('Total_Item_Cart', 0); // Reset jumlah item di keranjang
        // Tambahkan biaya proteksi kerusakan
        $totalWithProtection = $grandTotal + 500;

        // Simpan ke database
        $orderData = [
            'order_id'        => $orderId,
            'User_ID'         => $userId,
            'order_date'      => date('Y-m-d H:i:s'),
            'total_price'     => $totalWithProtection,
            'payment_method'  => $method,
            'shipping_address' => 'Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo,
             Depok (Kost putri) Depok, Kab. Sleman, DI Yogyakarta, 545637',
        ];

        $orderModel->insert($orderData);
        return view('Customer/Orders_Page', [
            'orderData' => $orderData,
            'orderedItems' => $orderedItems
        ]);
    }
}


