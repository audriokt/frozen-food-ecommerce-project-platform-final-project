<?php

namespace App\Controllers;

class Pages extends BaseController
{
   public function index()
    {
    return view('Customer/Landing_Page_Cus');
    }

    public function index2()
    {
        return view('Customer/Orders_Page');
    }
}
