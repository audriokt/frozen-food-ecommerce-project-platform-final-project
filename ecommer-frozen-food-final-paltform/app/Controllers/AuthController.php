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

            $customer = $this->customerModel->where('email', $email)->first();

            if ($customer && password_verify($password, $customer['Password'])) {
                // Set session data
                session()->set('User_id', $customer['User_ID']);
                session()->set('logged_in', true);

                return redirect()->to('/LandingPage`');
            } else {
                session()->setFlashdata('error', 'Invalid email or password.');
            }
        }

        return view('Customer/Login_Page');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
 
            $id = $this->customerModel->countAllResults();
            if ($id > 0) {
                $id = "cust-" . ($id + 1); // Increment ID for new customer
            } else {
                $id = "cust-1"; // Start from 1 if no records exist
            }

            $data = [
                'User_ID' => $id,
                'Name' => $this->request->getPost('name'),
                'Email' => $this->request->getPost('email'),
                'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            $this->customerModel->insert($data);

            if ($this->customerModel->insert($data)) {
                session()->setFlashdata('success', 'Registration successful. You can now log in.');
                return redirect()->to('Customer/Login_Page');
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
