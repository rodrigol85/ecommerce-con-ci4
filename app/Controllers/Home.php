<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('be/home');
    }

    public function logout(){
        if($this->session->get('logged_in')){
            $this->session->destroy();
        }

        return redirect()->to(base_url('be'));
    }
    public function products()
{
    $pager = service('pager');
    $productModel = new ProductsModel();
    
    $page    = (int) ($this->request->getGet('page') ?? 1);
    $perPage = 12;
    $total   = $productModel->totalProducts();
    $products = $productModel->getProducts($page, $perPage);

   
    $pager_links = $pager->makeLinks($page, $perPage, $total);

    $data = [
        'data' => $products,
        'pager_links' => $pager_links,
        'page' => $page,
    ];

    

    return view('users/home_guest', $data);
}

public function about()
{
    return view('users/about');
}

    

}
