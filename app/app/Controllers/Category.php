<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\MetaModel;
use App\Models\LogoModel;

class Category extends BaseController
{
    public $modal;
    public $modalMeta;
    public $modalLogo;
    public function __construct()
    {
        $this->modal = new CategoryModel();



        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'categorys' =>  $this->modal->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modal->pager,
        ];



        return view('category', $data);
    }
    public function index()
    {
        $this->modal = new CategoryModel();



        $this->modalMeta = new MetaModel();

        $this->modalLogo = new LogoModel();

        $data = [
            'meta' =>  $this->modalMeta->find(1),
            'logo' =>  $this->modalLogo->find(1),
            'categorys' =>  $this->modal->orderBy('id', 'DESC')->paginate(20),
            'pager' =>  $this->modal->pager,
        ];
        return view('category', $data);
    }
    public function addCategory()
    {
        helper(['form', 'url']);


        $rules = [
            'title'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Veuillez entrer un intitulé valide.',
                ]
            ],
        ];


        if ($this->validate($rules)) {


            $data = [
                'title'     => $this->request->getVar('title'),
            ];

            $this->modal->save($data);

            return redirect()->to('/category');
        } else {
            $data['validation'] = $this->validator;
            $data['pager'] = $this->modal->pager;
            return view('category', $data);
        }
    }
    public function edit($id = null)
    {
        $data['categorys'] = $this->modal->find($id);
        return view('category/edit', $data);
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
                'title' => $this->request->getVar('title')

            ];

            $this->modal->update($id, $data);

            $session = \Config\Services::session();

            $session->setFlashdata('success', 'Catégorie mis à jour');

            return redirect()->to('category');
        } else {
            $data['validationModal'] = $this->validator;
            $data['pager'] = $this->modal->pager;
            return view('category', $data);
        }
    }
    function delete()
    {

        $id = $this->request->getVar('id');
        $this->modal->where('id', $id)->delete($id);

        $session = \Config\Services::session();

        $session->setFlashdata('success', 'Catégorie supprimé');

        return redirect()->to(route_to('category'));
    }
}
