<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class AuthController extends BaseController
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function login()
    {
        if ($this->request->getServer() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $customer = $this->customerModel->where('email', $email)->first();

            if ($customer && password_verify($password, $customer['password'])) {
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
        if ($this->request->getServer() === 'post') {
            $data = [
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
        return redirect()->to('/auth/login');
    }
}
