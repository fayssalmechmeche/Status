<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public $modal;
    public function __construct()
    {
        $this->modal = new CategoryModel();


        $data['categorys'] = $this->modal->orderBy('id', 'DESC')->paginate(10);
        return view('category', $data);
    }
    public function index()
    {


        return view('category');
    }
    public function addCategory()
    {
        helper(['form']);
        $rules = [
            'title'          => 'required'
        ];

        if ($this->validate($rules)) {


            $data = [
                'title'     => $this->request->getVar('title'),
            ];

            $this->modal->save($data);

            return redirect()->to('/category');
        } else {
            $data['validation'] = $this->validator;
            return view('category', $data);
        }
    }
}
