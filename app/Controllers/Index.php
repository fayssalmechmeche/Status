<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;

class Index extends BaseController
{
    public $modalService;
    public $modalCategory;
    public $modalMeta;


    public function __construct()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        return view('index', $data);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
    }
    public function index()
    {
        return view('index');
    }
}
