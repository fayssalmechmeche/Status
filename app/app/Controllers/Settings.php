<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;

class Settings extends BaseController
{
    public $modal;
    public $modalMeta;
    public function __construct()
    {
        helper(['form']);
        $this->modal = new MetaModel();
        $session = \Config\Services::session();


        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        return view('settings', $data);
    }
    public function index()
    {
        return view('settings');
    }
    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'meta_title'          => 'max_length[50]',
            'meta_description'         => 'max_length[100]'

        ];



        $id = $this->request->getVar('id');

        if ($this->validate($rules)) {

            $data = [
                'meta_title' => $this->request->getVar('meta_title'),
                'meta_description'  => $this->request->getVar('meta_description'),

            ];

            if ($data['meta'] = $this->modalMeta->getData() == 0) {

                $this->modalMeta->save($data);
            } else {
                $this->modalMeta->update($id, $data);
            } //



            $imageFile = $this->request->getFile('logo');
            if ($imageFile->isValid()) {

                if (file_exists('./assets/images/logo.png')) {
                    unlink('./assets/images/logo.png');
                }

                $imageFile = $this->request->getFile('logo');

                $imageFile->move('./assets/images/');
                $name = $imageFile->getName();
                rename("./assets/images/$name", "./assets/images/logo.png");
            }




            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Donnée du compte mis à jour');

            return redirect()->to(route_to('settings'));
        } else {
            $data['validation'] = $this->validator;
            return view('settings', $data);
        }
    }
}
