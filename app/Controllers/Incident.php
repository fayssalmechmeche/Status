<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;
use App\Models\MessageModel;
use App\Models\ServiceModel;

class Incident extends BaseController
{
    public $modalMeta;
    public $modalLogo;
    public $modalService;
    public $modalMessage;

    public function __construct()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        $this->modalMessage = new MessageModel();
        $data['messages'] = $this->modalMessage->orderBy('id', 'DESC')->paginate(50);
        $this->modalService = new ServiceModel();
        $data['services'] = $this->modalService->orderBy('id', 'DESC')->paginate();

        return view('incident', $data);
    }
    public function index()
    {

        return view('incident');
    }


    public function addIncident()
    {
        helper(['form', 'url']);
        $rules = [
            'title'          => 'required',
            'message'          => 'required'

        ];

        if ($this->validate($rules)) {


            $data = [
                'title'     => $this->request->getVar('title'),
                'message'    => $this->request->getVar('message'),
                'service'    => $this->request->getVar('service'),
                'state'    => $this->request->getVar('state')




            ];

            $this->modalMessage->save($data);

            return redirect()->to(route_to('incident'));
        } else {

            $data['validation'] = $this->validator;
            return view('incident', $data);
        }
    }


    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'title'          => 'required',
            'message'          => 'required'
        ];



        $id = $this->request->getVar('id');

        if ($this->validate($rules)) {

            $data = [
                'title'     => $this->request->getVar('title'),
                'message'    => $this->request->getVar('message'),
                'service'    => $this->request->getVar('service'),
                'state'    => $this->request->getVar('state')

            ];

            $this->modalMessage->update($id, $data);





            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Service mis à jour');

            return redirect()->to(route_to('incident'));
        } else {
            $data['validationModal'] = $this->validator;
            return view('incident', $data);
        }
    }

    public function indexPublic()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        $this->modalMessage = new MessageModel();
        $data['messages'] = $this->modalMessage->orderBy('id', 'DESC')->paginate();
        return view('incidentPublic', $data);
    }
}
