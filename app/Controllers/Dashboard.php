<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\CategoryModel;

class Dashboard extends BaseController
{
    public $modalService;
    public $modalCategory;
    public function __construct()
    {
        $this->modalService = new ServiceModel();
        $this->modalCategory = new CategoryModel();
        $data['services'] = $this->modalService->orderBy('id', 'DESC')->paginate(10);
        $data['categorys'] = $this->modalCategory->orderBy('id', 'DESC')->paginate(10);
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
                'ip'    => $this->request->getVar('ip'),
                'state'    => $this->request->getVar('state'),

            ];

            $this->modalService->save($data);

            return redirect()->to(route_to('dashboard'));
        } else {

            $data['validation'] = $this->validator;
            return view('dashboard', $data);
        }
    }
    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'title'          => 'required'
        ];



        $id = $this->request->getVar('id');

        if ($this->validate($rules)) {

            $data = [
                'title'     => $this->request->getVar('title'),
                'link'    => $this->request->getVar('link'),
                'category'    => $this->request->getVar('category'),
                'monitoring'    => $this->request->getVar('monitoring'),
                'ip'    => $this->request->getVar('ip'),
                'state'    => $this->request->getVar('state'),


            ];

            $this->modalService->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Service mis à jour');

            return redirect()->to(route_to('dashboard'));
        } else {
            $data['validationModal'] = $this->validator;
            return view('dashboard', $data);
        }
    }
    function delete()
    {

        $id = $this->request->getVar('id');
        $this->modalService->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Service supprimé');

        return redirect()->to(route_to('dashboard'));
    }
    function checkServ($host, $port = 80, $timeout = 10)
    {
        //$fp = fSockOpen($host, $port, $errno, $errstr, $timeout);
        //return $fp!=false;

        error_reporting(E_ALL ^ E_WARNING);  // ligne qui enleve les messages d'erreur car il affiche un Warning (moche) si le serveur est down

        if (fSockOpen($host, $port, $errno, $errstr, $timeout)) //on check si le serv est up ou pas
        {
            $session = \Config\Services::session();
            return $session->setFlashdata('serverup', 'Serveur UP');
        }
        $session = \Config\Services::session();
        return $session->setFlashdata('serverdown', 'Serveur Down');
    }
}
