<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartItems extends Model
{
    protected $table            = 'chart_items';
    protected $primaryKey       = 'id_chart_item';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['chart_id', 'product_id', 'quantity', 'unit_price'];


}

?>