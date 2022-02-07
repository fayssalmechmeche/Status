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
                'title' => $this->request->getVar('title')

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
}
