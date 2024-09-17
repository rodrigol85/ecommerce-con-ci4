<?php

namespace App\Models;

use CodeIgniter\Model;

class AddressesModel extends Model
{
    protected $table            = 'addresses';
    protected $primaryKey       = 'address_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['street', 'city', 'cap'];


    public function getLastInsertId()
{
    return $this->db->insertID();
}


}