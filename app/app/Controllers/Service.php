<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\CategoryModel;
use App\Models\MetaModel;
use App\Models\LogoModel;
use App\Models\MessageModel;

class Service extends BaseController
{
    public $modalService;
    public $modalCategory;
    public $modalMeta;
    public $modalLogo;
    public $modalMessage;
    public function __construct()
    {
        $this->modalService = new ServiceModel();
        $this->modalCategory = new CategoryModel();


        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $this->modalMessage = new MessageModel();
        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'categorys' =>  $this->modalCategory->orderBy('id', 'DESC')->paginate(20),
            'services' =>  $this->modalService->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modalService->pager,

        ];
        return view('service', $data);
    }
    public function index()
    {
        $this->modalService = new ServiceModel();
        $this->modalCategory = new CategoryModel();


        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $this->modalMessage = new MessageModel();
        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'categorys' =>  $this->modalCategory->orderBy('id', 'DESC')->paginate(20),
            'services' =>  $this->modalService->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modalService->pager,
        ];

        return view('service', $data);
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
                'description'    => $this->request->getVar('description')


            ];
            if ($data['monitoring'] == 1) {
                $data['state'] = null;
                $this->modalService->save($data);
            }
            if ($data['monitoring'] == 0) {
                $data['ip'] = null;
                $this->modalService->save($data);
            }


            return redirect()->to(route_to('service'));
        } else {

            $data['validation'] = $this->validator;
            return view('service', $data);
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
                'updated'    => $this->request->getVar('updated'),
                'description'    => $this->request->getVar('description'),




            ];

            if ($data['monitoring'] == 1) {
                $data['state'] = null;
                $this->modalService->update($id, $data);
            }
            if ($data['monitoring'] == 0) {
                $data['ip'] = null;
                $this->modalService->update($id, $data);
            }

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Service mis à jour');

            return redirect()->to(route_to('service'));
        } else {
            $data['validationModal'] = $this->validator;
            return view('service', $data);
        }
    }
    function delete()
    {

        $id = $this->request->getVar('id');
        $this->modalService->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Service supprimé');

        return redirect()->to(route_to('service'));
    }
}