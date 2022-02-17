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

        $this->modalLogo = new LogoModel();

        $this->modal = new LoginModel();


        $this->modalCategory = new CategoryModel();
        $data['category'] = $this->modalCategory->countsCategory();
        $this->modalService = new ServiceModel();


        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'categorys' =>  $this->modal->orderBy('id', 'DESC')->paginate(20),
            'category' => $this->modalCategory->countsCategory(),
            'service' => $this->modalService->countsService(),
            'user' => $this->modal->countsUser(),
            'pager' =>  $this->modal->pager
        ];

        return view('dash', $data);
    }
    public function index()
    {
        return view('dash');
    }
}
