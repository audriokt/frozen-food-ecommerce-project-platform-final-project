<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class User extends BaseController
{
    public function register()
{
    helper('form');  
    return view('customer/register_page');
}


    public function saveRegister()
    {
        helper('form');
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_lengkap' => 'required',
            'email'        => 'required|valid_email|is_unique[customer.Email]',
            'password'     => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'Name'     => $this->request->getPost('nama_lengkap'),
            'Email'    => $this->request->getPost('email'),
            'Password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        $model = model(CustomerModel::class);
        $model->save($data);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    public function login()
    {
        return view('customer/login_page');
    }

    public function processLogin()
    {
        helper('form');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = model(CustomerModel::class);
        $user = $model->where('Email', $email)->first();

        $session = session();

        if ($user && password_verify($password, $user['Password'])) {
            $session->set([
                'user_id'   => $user['User_id'],
                'user_name' => $user['Name'],
                'logged_in' => true,
            ]);
            return redirect()->to('/dashboard');
        } else {
            $session->setFlashdata('error', 'Email atau password salah.');
            return redirect()->back();
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}