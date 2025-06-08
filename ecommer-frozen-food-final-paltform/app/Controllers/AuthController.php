<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class AuthController extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = model('CustomerModel');
    }

    public function login()
    {
        if ($this->request->getPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $customer = $this->customerModel->where('Email', $email)->first();

            if ($customer && password_verify($password, $customer['Password'])) {
                // Set session data
                session()->set('customer_id', $customer['id']);
                session()->set('logged_in', true);

                return redirect()->to('/customer/dashboard');
            } else {
                session()->setFlashdata('error', 'Invalid email or password.');
            }
        }

        return view('Customer/Login_Page');
    }

    public function register()
    {
        if ($this->request->getPost()) {
            $id = $this->customerModel->from('customer')->countAllResults();
            if ($id > 0) {
                $id = "cust-" . ($id + 1); // Increment ID for new customer
            } else {
                $id = "cust-1"; // Start from 1 if no records exist
            }

            $data = [
                'id' => $id,
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            if ($this->customerModel->insert($data)) {
                session()->setFlashdata('success', 'Registration successful. You can now log in.');
                return redirect()->to('/auth/login');
            } else {
                session()->setFlashdata('error', 'Registration failed. Please try again.');
            }
        }

        return view('Customer/Register_Page');
    }

    public function logout()
    {
        session()->remove(['customer_id', 'logged_in']);
        session()->setFlashdata('success', 'You have been logged out successfully.');
        return redirect()->to('/Customer/Login_Page');
    }
}
