<?php

namespace App\Models;

use CodeIgniter\Model;

class OrdersModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['chart_id', 'user_id', 'quantity', 'order_state', 'total'];

    protected bool $allowEmptyInserts = false;
    
    //protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'order_at';

    public function userEmailOrder()
    {
        return $this->select('orders.*, users.email')
        ->join('users', 'orders.user_id = users.id')
        ->findAll();
    }
    public function pendingOrder()
    {
        return $this->select('orders.*, users.email')
        ->join('users', 'orders.user_id = users.id')
        ->where('order_state', 'pending')
        ->findAll();
    }

    public function userOrders($id){
        return $this->select('orders.*')
        ->where('user_id', $id)
        ->findAll();
    }

    public function getOrders($page, $perPage)
    {
        return $this->select('orders.*, users.email')
                    ->join('users', 'orders.user_id = users.id')
                   ->orderBy('orders.id_order', 'DESC') 
                   ->limit($perPage, $perPage * ($page - 1))
                   ->findAll();
    }
    public function totalOrders(){
        return $this->db->table('orders')->countAllResults();
    }

}