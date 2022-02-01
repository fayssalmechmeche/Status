<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $modal = new ServiceModel();
        $data['services'] = $modal->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard', $data);
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
            'link'          => 'required',
            'category'         => 'required',
            'monitoring'      => 'required'
        ];

        if ($this->validate($rules)) {
            $serviceModel = new ServiceModel();

            $data = [
                'title'     => $this->request->getVar('title'),
                'link'    => $this->request->getVar('link'),
                'category'    => $this->request->getVar('category'),
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
