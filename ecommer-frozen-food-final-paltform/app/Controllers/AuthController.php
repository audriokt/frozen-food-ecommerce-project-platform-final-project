<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\CartModel;

class AuthController extends BaseController
{
    protected $customerModel;
    protected $cartModel;

    public function __construct()
    {
        $this->customerModel = model(CustomerModel::class);
        $this->cartModel = model(CartModel::class);
        helper(['form', 'url', 'session']);
    }

    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/LandingPage');
        }

        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $customer = $this->customerModel->where('Email', $email)->first();
            $cartItems = $this->cartModel->select('cart.*, product.name as product_name, product.price, product.path')
                ->join('product', 'product.p_id = cart.p_id')
                ->where('cart.User_ID', $customer['User_ID'])
                ->findAll();

            if ($customer && password_verify($password, $customer['Password'])) {
                // Set session data
                session()->set([
                    'User_ID' => $customer['User_ID'],
                    'logged_in' => true,
                    'Name' => $customer['Name'],
                    'Total_Item_Cart' => count($cartItems),
                ]);
                session()->setFlashdata('success', 'Login berhasil! Selamat datang, ' . $customer['Name'] . '.');
                return redirect()->to('/LandingPage');
            } else {
                session()->setFlashdata('error', 'Email atau password salah.');
                return redirect()->to('/login')->withInput();
            }
        }

        return view('Customer/Login_Page');
    }

    public function register()
    {
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[customer.Email]',
                'password' => 'required|min_length[6]',
            ];

            $validationMessages = [
                'name' => [
                    'required' => 'Nama harus diisi.',
                    'min_length' => 'Nama minimal 3 karakter.',
                    'max_length' => 'Nama maksimal 50 karakter.'
                ],
                'email' => [
                    'required' => 'Email harus diisi.',
                    'valid_email' => 'Format email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.'
                ],
                'password' => [
                    'required' => 'Kata sandi harus diisi.',
                    'min_length' => 'Kata sandi minimal 6 karakter.'
                ]
            ];

            if (!$this->validate($validationRules, $validationMessages)) {
                return view('Customer/Register_Page', [
                    'validation' => $this->validator,
                    'old' => $this->request->getPost()
                ]);
            }

            $count = $this->customerModel->countAllResults(false);
            $id = "cust-" . ($count + 1);

            $data = [
                'User_ID' => $id,
                'Name' => $this->request->getPost('name'),
                'Email' => $this->request->getPost('email'),
                'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];

            try {
                $this->customerModel->insert($data);
                session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
                return view('Customer/Login_Page');
            } catch (\Exception $e) {
                session()->setFlashdata('error', 'Registrasi gagal: ' . $e->getMessage());
                return redirect()->to('/register')->withInput();
            }
        }

        return view('Customer/Register_Page');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Anda berhasil logout.');
        return redirect()->to('/login');
    }

    public function profile()
    {
        if (!session()->has('User_ID')) {
            return redirect()->to('/login');
        }

        $customerModel = new CustomerModel();
        $userId = session()->get('User_ID');
        $data['user'] = $customerModel->find($userId);

        return view('Customer/Profile_Page', $data);
    }

    public function updateProfile()
    {
        if (!session()->has('User_ID')) {
            return redirect()->to('/login');
        }

        $customerModel = new CustomerModel();
        $userId = session()->get('User_ID');

        $data = [
            'Name'  => $this->request->getPost('Name'),
            'Email' => $this->request->getPost('Email'),
        ];

        $customerModel->update($userId, $data);

        return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
