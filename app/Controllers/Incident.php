<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;

class Incident extends BaseController
{
    public $modalMeta;
    public $modalLogo;
    public function __construct()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        return view('dash', $data);
    }
    public function index()
    {
        return view('incident');
    }
    public function indexPublic()
    {
        return view('incidentPublic');
    }
}
