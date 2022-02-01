<?php

namespace App\Controllers;

use App\Models\LoginModel;


class Users extends BaseController
{




    public function index()
    {
        helper(['form']);
        $modal = new LoginModel();
        /*
        $query = $db->query("select * from login");

        foreach ($query->getResult() as $row) {
            echo $row->email;
            echo $row->name;
        }
        */

        $data['logins'] = $modal->orderBy('id', 'DESC')->paginate(10);


        return view('users', $data);
    }
    public function save()

    {

        helper(['form']);
        $rules = [
            'name'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[login.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'cpassword'  => 'required|matches[password]'
        ];

        if ($this->validate($rules)) {
            $userModel = new LoginModel();


            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $userModel->save($data);
            return redirect()->to('/Login');
        } else {
            $data['validation'] = $this->validator;
            return view('users', $data);
        }
    }
}
