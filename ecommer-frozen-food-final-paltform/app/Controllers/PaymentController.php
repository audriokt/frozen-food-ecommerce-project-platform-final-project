<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\CartModel;
use App\Models\ProductModel;
use App\Models\OrderDetailModel;

class PaymentController extends BaseController
{
    protected $orderModel;
    protected $cartModel;
    protected $productModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->cartModel = new CartModel();
        $this->productModel = new ProductModel();
        $this->orderDetailModel = new OrderDetailModel();
    }

    public function bayar()
    {
        $userId = session()->get('User_ID');
        $method = $this->request->getPost('metode_pembayaran');

        $cartItems = $this->getCartItems($userId);
        $orderId = $this->generateOrderId();
        $grandTotal = $this->calculateGrandTotal($cartItems);


        $this->saveOrder($orderId, $userId, $grandTotal, $method);

        $orderedItems = $this->processCartItems($cartItems, $orderId);

        session()->set('Total_Item_Cart', 0);

        return redirect()->to('/Order');
    }

    private function getCartItems($userId)
    {
        return $this->cartModel
            ->select('cart.*, product.p_id, product.name as product_name, product.price as price, product.path')
            ->join('product', 'product.p_id = cart.p_id')
            ->where('cart.User_ID', $userId)
            ->findAll();
    }

    private function generateOrderId()
    {
        $countOrder = $this->orderModel->countAll();
        return "ord-" . ($countOrder + 1);
    }

    private function generateDetailOrderId()
    {
        $countOrder = $this->orderDetailModel->countAll();
        return "detOrd-" . ($countOrder + 1);
    }

    private function calculateGrandTotal($cartItems)
    {
        $total = array_sum(array_column($cartItems, 'subtotal'));
        return $total + 500;
    }

    private function saveOrder($orderId, $userId, $grandTotal, $method)
    {
        $orderData = [
            'order_id'        => $orderId,
            'User_ID'         => $userId,
            'order_date'      => date('Y-m-d H:i:s'),
            'total_price'     => $grandTotal,
            'payment_method'  => $method,
            'shipping_address' => 'Jalan Paingan XI No. 9, RT.8/RW.7, Maguwoharjo, Depok (Kost putri), Depok, Kab. Sleman, DI Yogyakarta, 545637',
        ];
        $this->orderModel->insert($orderData);
    }

    private function processCartItems($cartItems, $orderId)
    {
        $orderedItems = [];

        foreach ($cartItems as $item) {
            $orderedItems[] = [
                'product_id'    => $item['p_id'],
                'product_name'  => $item['product_name'],
                'path'          => $item['path'],
                'quantity'      => $item['quantity'],
                'price'         => $item['price'],
                'subtotal'      => $item['subtotal']
            ];

            $this->saveOrderDetail($item, $orderId);
            $this->updateStock($item);
            $this->removeFromCart($item);
        }

        return $orderedItems;
    }

    private function saveOrderDetail($item, $orderId)
    {
        $detailOrderData = [
            'id'          => $this->generateDetailOrderId(),
            'p_id'        => $item['p_id'],
            'order_id'    => $orderId,
            'price'       => $item['price'],
            'quantity'    => $item['quantity']
        ];
        $this->orderDetailModel->insert($detailOrderData);
    }

    private function updateStock($item)
    {
        $product = $this->productModel->where('p_id', $item['p_id'])->first();
        $this->productModel->update($item['p_id'], [
            'stock' => $product['stock'] - $item['quantity']
        ]);
    }

    private function removeFromCart($item)
    {
        $this->cartModel->delete($item['cart_id']);
    }
}
