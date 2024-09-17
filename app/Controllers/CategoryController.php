<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

        return view('be/categories/categories_list', $data);
    }

    public function create()
    {
        $rules = [
            'name'            => 'required|is_unique[category.name]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $post = $this->request->getPost(['name']);

        $categoryModel = new CategoryModel();
        $categoryModel->insert([
            'name'            => trim($post['name']),
        
        ]);

        session()->setFlashdata('success', 'Category created successfully!');
        return redirect()->to('be/categories/categories_list');
    }

    
    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('be/products/products_list');
        }

        $categoryModel = new CategoryModel();
        $data['category'] = $categoryModel->find($id);

        return view('be/categories/edit_category', $data);
    }

    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('empleados');
        }
        $rules = [
            'name'            => 'required|is_unique[category.name]',
          
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $post = $this->request->getPost(['name']);

        $categoryModel = new CategoryModel();
        $categoryModel->update($id,[
            'name'            => trim($post['name']),
          
        ]);

        session()->setFlashdata('success', 'Category updated successfully!');
        return redirect()->to('be/categories/categories_list');
    }


}