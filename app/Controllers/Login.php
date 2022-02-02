<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController

{
    public $modal;
    public function __construct()
    {
        $this->modal = new LoginModel();
    }
    public function index()
    {
        helper(['form']);
        return view('login');
    }
    public function auth()
    {
        $session = session();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $this->modal->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'       => $data['name'],
                    'email'    => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Combinaison Mail ou Mot de passe incorrect');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'Combinaison Mail ou Mot de passe incorrect');
            return redirect()->to('login');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
