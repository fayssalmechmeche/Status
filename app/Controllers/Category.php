<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        $modal = new CategoryModel();


        $data['categorys'] = $modal->orderBy('id', 'DESC')->paginate(10);
        return view('category', $data);
    }
    public function category()
    {
        helper(['form']);
        $rules = [
            'title'          => 'required'
        ];

        if ($this->validate($rules)) {
            $categoryModel = new CategoryModel();

            $data = [
                'title'     => $this->request->getVar('title'),
            ];

            $categoryModel->save($data);

            return redirect()->to('/category');
        } else {
            $data['validation'] = $this->validator;
            return view('category', $data);
        }
    }
}
