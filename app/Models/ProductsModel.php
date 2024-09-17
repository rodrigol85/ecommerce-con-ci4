<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'description', 'quantity', 'price', 'category_id'];

    protected bool $allowEmptyInserts = false;



    public function categoryProduct()
    {
        return $this->select('products.*, category.name AS category')
            ->join('category', 'products.category_id= category.id')
            ->findAll();
    }

    public function categoryProductById($id){
        return $this->select('products.*, category.name AS category')
                        ->join('category', 'products.category_id = category.id')
                        ->where('products.id', $id)
                        ->first();
    }
    public function findProductsByChartId($id){
        return $this->select('products.*')
               ->from('chart_items') 
               ->where('chart_items.chart_id', $id)
               ->findAll();
    }

    public function totalProducts(){
        return $this->db->table('products')->countAllResults();
    }
    public function getProducts($page, $perPage)
{
    return $this->select('products.*, category.name AS category')
               ->join('category', 'products.category_id= category.id')
               ->orderBy('products.id', 'DESC') 
               ->limit($perPage, $perPage * ($page - 1))
               ->findAll();
}
   


}