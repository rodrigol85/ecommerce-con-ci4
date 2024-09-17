<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ProductsModel;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {

       
        $productModel = new ProductsModel();
        $pager = service('pager');

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 12;
        $total   = $productModel->totalProducts();

        
        $pager_links = $pager->makeLinks($page, $perPage, $total);
        $products = $productModel->getProducts($page, $perPage);

        $data = [
            'products' => $products,
            'pager_links' => $pager_links,
        ];
    

        return view('be/products/products_list', $data);
    }


     
    public function insert()
    {

        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('be/products/create_product', $data);
    }

    public function create()
    {
        $rules = [
            'name'            => 'required',
            'price'           => 'required|decimal',
            'quantity'         => 'required|is_natural_no_zero',
            'category_id'         => 'required',
            'description'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $post = $this->request->getPost(['name', 'price', 'quantity', 'category_id', 'description']);

        $productModel = new ProductsModel();
        $productModel->insert([
            'name'            => trim($post['name']),
            'price'           => trim($post['price']),
            'quantity' => $post['quantity'],
            'category_id'         => $post['category_id'],
            'description'  => $post['description'],
        ]);

        session()->setFlashdata('success', 'Product created successfully!');
        return redirect()->to('be/products/products_list');
    }


    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('be/products/products_list');
        }

        $productModel = new ProductsModel();
        $data['product'] = $productModel->categoryProductById($id);

        $categoryModel = new CategoryModel();

        $data['categories'] = $categoryModel->findAll();

        return view('be/products/edit_product', $data);
    }

    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('empleados');
        }
        $rules = [
            'name'            => 'required',
            'price'           => 'required|decimal',
            'quantity'         => 'required|is_natural_no_zero',
            'category_id'         => 'required',
            'description'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $post = $this->request->getPost(['name', 'price', 'quantity', 'category_id', 'description']);

        $productModel = new ProductsModel();
        $productModel->update($id,[
            'name'            => trim($post['name']),
            'price'           => trim($post['price']),
            'quantity' => $post['quantity'],
            'category_id'         => $post['category_id'],
            'description'  => $post['description'],
        ]);

        session()->setFlashdata('success', 'Product updated successfully!');
        return redirect()->to('be/products/products_list');
    }

    public function delete($id = null)
    {
        if (!$this->request->is('delete') || $id == null) {
            return redirect()->route('be/products/products_list');
        }

        $productModel = new ProductsModel();
        $productModel->delete($id);

        // Check if any rows were affected
        if ($productModel->affectedRows() > 0) {
            session()->setFlashdata('success', 'Product deleted successfully!');
        } else {
            session()->setFlashdata('error', 'Error deleting product.');
        }
    
        return redirect()->to('be/products/products_list');
    }


    public function products()
    {

        $productModel = new ProductsModel();
        $pager = service('pager');

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 12;
        $total   = $productModel->totalProducts();

        
        $pager_links = $pager->makeLinks($page, $perPage, $total);
        $products = $productModel->getProducts($page, $perPage);

        $data = [
            'products' => $products,
            'pager_links' => $pager_links,
        ];

        return view('users/products_list', $data);
      
    }
    public function productDetail($id)
    {
        $productModel = new ProductsModel();
        $data['product'] = $productModel->find($id);
        return view('users/product_detail', $data);
    }
    public function productDetailNoLogged($id)
    {
        $productModel = new ProductsModel();
        $data['product'] = $productModel->find($id);
        return view('users/product_detail_no_logged', $data);
    }

    public function askForLogIn(){
        $title = 'You must logIn';
        $message = 'Enter your credentials to be allowed to buy our products, thank you.';

        return $this->showMessage($title, $message);

    }

    private function showMessage($title, $message){
        $data = [
            'title' => $title,
            'message' => $message,
    
        ];
        return view('messageUser', $data);
    
        }

}
