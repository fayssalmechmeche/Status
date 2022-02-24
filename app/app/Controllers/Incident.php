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

        $this->modalLogo = new LogoModel();

        $this->modalMessage = new MessageModel();

        $this->modalService = new ServiceModel();
        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'messages' =>  $this->modalMessage->orderBy('id', 'DESC')->paginate(5),
            'services' =>  $this->modalService->orderBy('id', 'DESC')->paginate(),
            'pager' =>  $this->modalMessage->pager,
        ];

        return view('incident', $data);
    }
    public function index()
    {
        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $this->modalMessage = new MessageModel();

        $this->modalService = new ServiceModel();
        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'messages' =>  $this->modalMessage->orderBy('id', 'DESC')->paginate(5),
            'services' =>  $this->modalService->orderBy('id', 'DESC')->paginate(),
            'pager' =>  $this->modalMessage->pager,
        ];

        return view('incident', $data);
    }


    public function addIncident()
    {
        helper(['form', 'url']);
        $rules = [
            'title'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un intitulé valide.',
                ]
            ],
            'message'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un message valide.',
                ]
            ],
        ];

        if ($this->validate($rules)) {


            $data = [
                'title'     => $this->request->getVar('title'),
                'message'    => $this->request->getVar('message'),
                'service'    => $this->request->getVar('service'),
                'state'    => $this->request->getVar('state')




            ];

            $this->modalMessage->save($data);

            return redirect()->to('incident');
        } else {

            $data['validation'] = $this->validator;
            $data['pager'] = $this->modalMessage->pager;
            return view('incident', $data);
        }
    }


    function update()
    {
        helper(['form', 'url']);

        $rules = [
            'title'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un intitulé valide.',
                ]
            ],
            'message'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un message valide.',
                ]
            ],
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

            return redirect()->to('incident');
        } else {
            $data['validationModal'] = $this->validator;
            $data['pager'] = $this->modalMessage->pager;
            return view('incident', $data);
        }
    }

    public function indexPublic()
    {
        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $this->modalMessage = new MessageModel();

        $this->modalService = new ServiceModel();


        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'messages' =>  $this->modalMessage->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modalMessage->pager,
        ];

        return view('incidentPublic', $data);
    }
}
