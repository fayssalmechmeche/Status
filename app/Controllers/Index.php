<?php

namespace App\Controllers;

use App\Models\MetaModel;

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
    }
    public function index()
    {
        return view('index');
    }
}
