<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;
use App\Models\ServiceModel;
use App\Models\CategoryModel;
use App\Models\MessageModel;

class Index extends BaseController
{
    public $modalService;
    public $modalCategory;
    public $modalMeta;
    public $modalMessage;


    public function __construct()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);

        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        $this->modalService = new ServiceModel();
        $this->modalCategory = new CategoryModel();
        $this->modalMessage = new MessageModel();

        $data['categorys'] = $this->modalCategory->orderBy('id', 'desc')->paginate();

        $data['services'] = $this->modalService->orderBy('id', 'desc')->paginate();

        $data['messages'] = $this->modalMessage->orderBy('id', 'DESC')->paginate(5);

        $this->modalService = new ServiceModel();



        return view('index', $data);
    }
    public function index()
    {
        return view('index');
    }
}
