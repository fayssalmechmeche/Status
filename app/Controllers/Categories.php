<?php

namespace App\Controllers;

use App\Models\CategorieModel;

class Categories extends BaseController
{
    public function index()
    {
        return view('categories');
    }
    public function categorie()
    {
        helper(['form']);
        $rules = [
            'title'          => 'required'

        ];

        if ($this->validate($rules)) {
            $categorieModel = new CategorieModel();

            $data = [
                'title'     => $this->request->getVar('title'),
            ];

            $categorieModel->save($data);

            return redirect()->to('/categories');
        } else {
            $data['validation'] = $this->validator;
            return view('categories', $data);
        }
    }
}
