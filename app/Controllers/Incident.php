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

    public function index()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        $this->modalMessage = new MessageModel();
        $data['messages'] = $this->modalMessage->orderBy('id', 'DESC')->paginate();
        $this->modalService = new ServiceModel();
        $data['services'] = $this->modalService->orderBy('id', 'DESC')->paginate();

        return view('incident', $data);
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
