<?php

namespace App\Controllers;

class PaymentController extends BaseController
{
 public function bayar()
 {
    return view('Customer/Payment_Page');
 }
}