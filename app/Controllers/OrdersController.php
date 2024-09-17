<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\OrdersModel;
use App\Models\CategoryModel;
use App\Models\ProductsModel;
use App\Models\UsersModel;

class OrdersController extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $ordersModel = new OrdersModel();
        $pager = service('pager');

        $page    = (int) ($this->request->getGet('page') ?? 1);
        $perPage = 12;
        $total   = $ordersModel->totalOrders();

        $pager_links = $pager->makeLinks($page, $perPage, $total);
        $orders = $ordersModel->getOrders($page, $perPage);

        $data = [
            'orders' => $orders,
            'pager_links' => $pager_links,
        ]; 
        return view('be/orders/all_orders', $data);
    }
    public function pendingOrders()
    {
        $ordersModel = new OrdersModel();
        $data['orders'] = $ordersModel->pendingOrder();

        return view('be/orders/pending_orders', $data);
    }

    public function edit($id = null)
    {
        if ($id == null) {
            return redirect()->route('be/orders/orders_list');
        }

        $ordersModel = new OrdersModel();
        $data['order'] = $ordersModel->find($id);
        


        return view('be/orders/edit_order', $data);
    }

    public function update($id = null)
    {
        if (!$this->request->is('put') || $id == null) {
            return redirect()->route('be/orders/all_orders');
        }
        $rules = [
            'order_state'            => 'required',
           
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', $this->validator->listErrors());
        }
        $post = $this->request->getPost(['order_state']);

        $ordersModel = new OrdersModel();
        $ordersModel->update($id,[
            'order_state' => $post['order_state'],
            
        ]);
        session()->setFlashdata('success', 'Order Status updated successfully!');
        return redirect()->to('be/orders/all_orders');
    }

    public function detail($user_id)
    {
        $userModel = new UsersModel();
        $ordersModel = new OrdersModel();
        $data['user'] = $userModel->userAddressById($user_id);

        $producModel = new ProductsModel();
        

        return view('be/orders/order_detail', $data);
    }
}