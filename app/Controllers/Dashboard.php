<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('dashboard');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
    public function service()
    {
        helper(['form']);
        $rules = [
            'title'          => 'required',
            'lien'          => 'required',
            'categorie'         => 'required',
            'monitoring'      => 'required'
        ];

        if ($this->validate($rules)) {
            $serviceModel = new ServiceModel();

            $data = [
                'title'     => $this->request->getVar('title'),
                'lien'    => $this->request->getVar('lien'),
                'categorie'    => $this->request->getVar('categorie'),
                'monitoring'    => $this->request->getVar('monitoring'),

            ];

            $serviceModel->save($data);

            return redirect()->to('/dashboard');
        } else {
            $data['validation'] = $this->validator;
            return view('dashboard', $data);
        }
    }
}
