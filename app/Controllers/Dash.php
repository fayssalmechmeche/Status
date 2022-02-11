<?php

namespace App\Controllers;

use App\Models\MetaModel;
use App\Models\LogoModel;
use App\Models\LoginModel;
use App\Models\CategoryModel;
use App\Models\ServiceModel;

class Dash extends BaseController
{
    public $modalMeta;
    public $modalLogo;
    public $modalCategory;
    public $modalService;
    public $modal;
    public function __construct()
    {
        $this->modalMeta = new MetaModel();
        $data['meta'] = $this->modalMeta->find(1);
        $this->modalLogo = new LogoModel();
        $data['logo'] = $this->modalLogo->find(1);
        $this->modal = new LoginModel();
        $data['user'] = $this->modal->countsUser();

        $this->modalCategory = new CategoryModel();
        $data['category'] = $this->modalCategory->countsCategory();
        $this->modalService = new ServiceModel();
        $data['service'] = $this->modalService->countsService();


        return view('dash', $data);
    }
    public function index()
    {
        return view('dash');
    }
}
