<?php

namespace App\Controllers;

class Pages extends BaseController
{
   public function index()
    {
    return view('Customer/Landing_Page_Cus');
    }
}