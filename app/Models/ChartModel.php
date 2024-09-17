<?php

namespace App\Models;

use CodeIgniter\Model;

class ChartModel extends Model
{
    
    protected $table            = 'charts';
    protected $primaryKey       = 'id_chart';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'state',];

    protected bool $allowEmptyInserts = false;
    
    //protected $useTimestamps = true;
    //protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';



    public function getLastInsertId()
    {
        return $this->db->insertID();
    }
    
  
    





}
    ?>