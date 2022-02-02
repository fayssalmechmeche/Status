<?php

namespace App\Controllers;

use App\Models\ServiceModel;

class Dashboard extends BaseController
{
    public $modal;
    public function __construct()
    {
        $this->modal = new ServiceModel();
        $data['services'] = $this->modal->orderBy('id', 'DESC')->paginate(10);
        return view('dashboard', $data);
    }
    public function index()
    {

        return view('dashboard');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
    public function addService()
    {
        helper(['form']);
        $rules = [
            'title'          => 'required',
            'link'          => 'required',
            'category'         => 'required',
            'monitoring'      => 'required'
        ];

        if ($this->validate($rules)) {


            $data = [
                'title'     => $this->request->getVar('title'),
                'link'    => $this->request->getVar('link'),
                'category'    => $this->request->getVar('category'),
                'monitoring'    => $this->request->getVar('monitoring'),

            ];

            $this->modal->save($data);

            return redirect()->to(route_to('dashboard'));
        } else {

            $data['validation'] = $this->validator;
            return view('dashboard', $data);
        }
    }
}
