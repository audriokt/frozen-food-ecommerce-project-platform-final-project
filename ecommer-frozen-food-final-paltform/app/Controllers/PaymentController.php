<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\CartModel;

class PaymentController extends BaseController
{
    public function bayar()
    {
        $userId = session()->get('User_ID');
        $method = $this->request->getPost('metode_pembayaran');

        $orderModel = new OrderModel();
        $cartModel = new CartModel();

        $cartItems = $cartModel
            ->select('cart.*, product.p_id, product.name as product_name, product.price, product.path')
            ->join('product', 'product.p_id = cart.p_id')
            ->where('cart.User_ID', $userId)
            ->findAll();
        
        $count = $orderModel->countAll();
        $orderId = "ord-" . ($count + 1);
        $orderedItems = [];
        $grandTotal = 0;

        foreach ($cartItems as $item) {
            $subtotal = $item['quantity'] * $item['price'];
            $orderedItems[] = [
                'product_id'    => $item['p_id'],
                'product_name'  => $item['product_name'],
                'path'          => $item['path'],
                'quantity'      => $item['quantity'],
                'price'         => $item['price'],
                'subtotal'      => $subtotal
            ];
        }

        // Tambahkan biaya proteksi kerusakan
        $totalWithProtection = $grandTotal + 500;

        // Simpan ke database
        $orderData = [
            'order_id'        => $orderId,
            'User_ID'         => $userId,
            'order_date'      => date('Y-m-d H:i:s'),
            'total_price'     => $totalWithProtection,
            'payment_method'  => $this->request->getPost('metode_pembayaran'),
            'shipping_address'=> 'Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri) Depok, Kab. Sleman, DI Yogyakarta, 545637',
        ];

            $orderModel->insert($orderData);

        return view('Customer/Orders_Page', [
            'orderData' => $orderData,
            'orderedItems' => $orderedItems
        ]);
    }
}
