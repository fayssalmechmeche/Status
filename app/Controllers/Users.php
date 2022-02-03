<?php

namespace App\Controllers;

use App\Models\LoginModel;


class Users extends BaseController
{

    public $modal;
    public function __construct()
    {
        helper(['form']);
        $this->modal = new LoginModel();



        $data['logins'] = $this->modal->orderBy('id', 'DESC')->paginate(10);
        return view('users', $data);
    }

    public function index()
    {
        return view('users');
    }
    public function addUser()

    {

        helper(['form', 'url']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[login.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'cpassword'  => 'required|matches[password]'
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
            return view('users', $data);
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
        return view('users/edit', $data);
    }
    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[login.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'cpassword'  => 'required|matches[password]'
        ];



        $id = $this->request->getVar('id');

        if (!$rules) {
            $data['logins'] = $this->modal->where('id', $id)->first();
            $data['error'] = $this->validator;
            return view('users', $data);
        } else {
            $data = [
                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'password'  => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $this->modal->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Donnée du compte mis à jour');

            return redirect()->to(route_to('users'));
        }
    }
}
