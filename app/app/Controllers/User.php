<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\MetaModel;
use App\Models\LogoModel;

class User extends BaseController
{
    public $modal;
    public $modalMeta;

    public function __construct()
    {
        helper(['form']);
        $this->modal = new LoginModel();
        $this->modalMeta = new MetaModel();

        $session = \Config\Services::session();
        $id = $session->get('id');


        $data['logins'] = $this->modal->find($id);
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);



        return view('user', $data);
    }
    public function index()
    {
        return view('user');
    }
    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'name'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un nom valide.',
                ]
            ],
            'email'          => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Veuillez entrer un e-mail valide.',
                    'valid_email' => 'Veuillez entrer un e-mail valide.',
                ]
            ],
            'password'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un mot de passe valide.',
                ]
            ],
            'cpassword'          => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches[password]' => 'La confirmation de mot de passe est incorrect',
                ]
            ],


        ];



        $id = $this->request->getVar('id');

        if ($this->validate($rules)) {

            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $this->modal->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Donnée du compte mis à jour');

            return redirect()->to('user');
        } else {
            $data['validation'] = $this->validator;

            return view('user', $data);
        }
    }
}
