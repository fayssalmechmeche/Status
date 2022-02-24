<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\MetaModel;
use App\Models\LogoModel;


class Users extends BaseController
{

    public $modal;
    public $modalMeta;
    public $modalLogo;
    public function __construct()
    {
        helper(['form']);
        $this->modal = new LoginModel();
        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();


        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'logins' =>  $this->modal->orderBy('id', 'DESC')->paginate(5),
            'pager' =>  $this->modal->pager,
        ];
        return view('users', $data);
    }

    public function index()
    {
        helper(['form']);
        $this->modal = new LoginModel();
        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();


        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'logins' =>  $this->modal->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modal->pager,
        ];
        return view('users', $data);
    }
    public function addUser()

    {

        helper(['form', 'url']);
        $validation =  \Config\Services::validation();


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


        if ($this->validate($rules)) {
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $this->modal->save($data);
            return redirect()->to(route_to('users'));
        } else {
            $data['validation'] = $this->validator;
            $data['pager'] = $this->modal->pager;
            return view(route_to('users'), $data);
        }
    }

    function dataUser($id = null)
    {


        $data['login'] = $this->modal->where('id', $id)->first();

        return view('users', $data);
    }
    public function edit($id = null)
    {
        $data['login'] = $this->modal->find($id);
        return view(route_to('users'), $data);
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

            return redirect()->to(route_to('users'));
        } else {
            $data['validationModal'] = $this->validator;
            $data['pager'] = $this->modal->pager;
            return view(route_to('users'), $data);
        }
    }
    function delete()
    {
        $session = \Config\Services::session();
        $session->get('id');


        $id = $this->request->getVar('id');

        if ($session->get('id') == $id) {

            $session = \Config\Services::session();

            $session->setFlashdata('warning', ' Vous ne pouvez pas supprimer votre propre compte.');
            return redirect()->to(route_to('users'));
        } else {

            $this->modal->where('id', $id)->delete($id);
            return redirect()->to(route_to('users'));
        }
    }
}
