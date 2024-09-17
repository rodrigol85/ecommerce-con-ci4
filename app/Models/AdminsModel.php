<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminsModel extends Model
{
    protected $table            = 'admins';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'surname', 'email', 'password', 'status',  'telefono', 'confirm_code', 'reset_token_expires_at'];

    protected bool $allowEmptyInserts = false;


    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    public function validateUser($email, $password){
        $user = $this->where(['email' => $email])->first();
        if($user && password_verify($password, $user['password'])){
            return $user;
        }
        return null;
    }


}

?>