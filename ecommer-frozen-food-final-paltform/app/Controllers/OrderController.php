<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\ProductModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $productModel;
    protected $orderDetailModel;

    public function __construct()
    {
        $this->orderModel = model(OrderModel::class);
        $this->productModel = model(ProductModel::class);
        $this->orderDetailModel = model('OrderDetailModel');
    }

    public function index()
    {

        $orders = $this->orderDetailModel->select('order.*, product.*, orderdetail.*')
            ->join('product', 'orderdetail.p_id = product.p_id')
            ->join('order', 'orderdetail.order_id = order.order_id')
            ->where('order.User_ID', session()->get('User_ID'))
            ->orderBy('order.order_date', 'DESC')
            ->get()
            ->getResultArray();

        return view('Customer/Orders_Page', ['orders' => $orders]);
    }
}
