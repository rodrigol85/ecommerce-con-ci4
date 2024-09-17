<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'surname', 'email', 'password', 'status',  'telefono', 'confirm_code', 'reset_token_expires_at', 'address_id'];

    protected bool $allowEmptyInserts = false;

    
    public function validateUser($email, $password){
        $user = $this->where(['email' => $email])->first();
        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return null;
    }

    public function userAddress()
    {
        return $this->select('users.*, addresses.street AS street, addresses.city, addresses.cap')
            ->join('addresses', 'users.address_id= addresses.address_id')
            ->findAll();
    }

    public function userAddressById($id)
    {
        return $this->select('users.*, addresses.street AS street, addresses.city, addresses.cap')
            ->join('addresses', 'users.address_id= addresses.address_id')
            ->where('users.id', $id)
            ->first();
    }


}

?>