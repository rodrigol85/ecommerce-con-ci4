<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use App\Models\ChartModel;
use App\Models\CategoryModel;
use App\Models\ChartItems;
use App\Models\OrdersModel;
use App\Models\ProductsModel;

class ChartController extends BaseController
{

    public function index()
    {
        $cart = session('cart');

        if (empty($cart)) {
            $data['items'] = [];
            $data['total'] = 0;
        } else {
            $data['items'] = array_values($cart);
            $data['total'] = $this->total();
        }

        return view('users/chart', $data);
    }


    public function buy($id)
    {
        $product = new ProductsModel();
        $productWithCategory = $product->categoryProductById($id);
        $item = array(
            'id' => $productWithCategory['id'],
            'name' => $productWithCategory['name'],
            'price' => $productWithCategory['price'],
            'category' => $productWithCategory['category'],
            'quantity' => 1,
        );
        $session = session();
        if ($session->has('cart')) {
            $index = $this->exists($id);
            $cart = array_values(session('cart'));
            if ($index == null) {
                array_push($cart, $item);
            } else {
                $cart[$index]['quantity']++;
            }
            $session->set('cart', $cart);
        } else {
            $cart = array($item);
            $session->set('cart', $cart);
        }
        session()->setFlashdata('success', 'Product added to cart successfully.');
        return $this->response->redirect(base_url('userLogged/products'));
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session->set('cart', $cart);
        session()->setFlashdata('success', 'Product removed from cart successfully.');
        return $this->response->redirect(base_url('userLogged/chart'));
    }
    public function removeChart()
    {
        $session = session();
        $session->set('cart', []);
        session()->setFlashdata('success', 'Cart emptied successfully.');
        return $this->response->redirect(base_url('userLogged/chart'));
    }

    public function payment()
    {
        $items = array_values(session('cart'));

        $chartModel = new ChartModel();
        $chartModel->insert([
            'user_id' => session('userid'),
            'state' => 'payed',

        ]);

        $chartId = $chartModel->getLastInsertId();

        $cart = array_values(session('cart'));
        $chartItemsModel = new ChartItems;

        foreach ($cart as $item) {
            if (empty($item['id']) || empty($item['price']) || empty($item['quantity'])) {
                continue;
            }

            $chartItemsModel->insert([
                'chart_id' => $chartId,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'unit_price' => $item['price'],

            ]);
        }

        $orderModel = new OrdersModel();
        $orderModel->insert([
            'chart_id' => $chartId,
            'user_id' => session('userid'),
            'order_state' => 'pending',
            'total' => $this->total(),

        ]);

        $items = array_values($cart);

        $email = \Config\Services::email();

        $email->setTo(session('email'));
        $email->setSubject('Your order detail');



        $body = '<h4>Dear customer </h4>';
        $body .= "<p>These are the detail of your order </p>";
        $body .= '<table class="table table-striped table-bordered">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity;</th>
                        <th scope="col">Total</th>
                        <th scope="col">Immagine</th>
                    </tr>
                </thead>
                <tbody> <br>';
        foreach ($items as $item) {





            $body .= '<tr>
                                        <th>' . $item['name'] . '</th>
                                      
                                        <th>' . $item['price'] . ' &euro;</th>
                                        <th>' . $item['quantity'] . '</th>
                                        <th>' . ($item['price'] * $item['quantity']) . ' &euro;</th>
                                        <th><img src="https://newlupetto.com/5462-amazon/sciarpa-stadium-giallo-rosso.jpg" style="width: 100px;" class="rounded float-end" alt=""></th>
                                    </tr>';
        }

        $body .= '<tr>
                    <th colspan="4" class="table-info">Total</th>
                    <th class="table-primary"> ' . $this->total()   . '</th>
                    <th class="table-info"></th>
                    <th class="table-info"></th>
                    </tr>

                    </tbody>
                    </table>';



        $email->setMessage($body);
        $email->send();
        $session = session();
        $session->set('cart', []);


        $title = 'Succesfully pay';
        $message = 'Check your email to see the details.';

        return $this->showMessage($title, $message);
    }

    private function exists($id)
    {
        $items = array_values(session('cart'));
        for ($i = 0; $i < count($items); $i++) {
            if ($items[$i]['id'] == $id) {
                return $i;
            }
        }
    }

    private function total()
    {
        $total = 0;
        $items = array_values(session('cart'));
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    private function showMessage($title, $message)
    {
        $data = [
            'title' => $title,
            'message' => $message,

        ];
        return view('message', $data);
    }
}
