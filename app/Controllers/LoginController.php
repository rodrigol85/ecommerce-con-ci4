<?php

namespace App\Controllers;

use App\Models\AdminsModel;
use App\Models\UsersModel;

class LoginController extends BaseController
{
    protected $helpers = ['form'];
    public function login()
    {
        return view('be/registro/login');
    }
    public function loginUser()
    {
        return view('users/register/login');
    }


    public function auth() 
    {
        $rules = [
            'email' =>'required',
            'password' => 'required'
            
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $adminModel = new AdminsModel();
        $post = $this->request->getPost(['email', 'password']);

        $user = $adminModel->validateUser($post['email'], $post['password']);

        if($user !== null){
            if($user['status'] == 1){

                $this->setSession($user);
                return redirect()->to(base_url('be/home'));
            }else{
                return redirect()->back()->with('errors', 'Your account is not activated, please check your email for activate.');
            }
        }

        return redirect()->back()->with('errors', 'Email or password is not valid');

    }

    private function setSession($userData){
        $data = [
            'logged_in' => true,
            'userid' => $userData['id'],
            'email' => $userData['email'],
        ];

        $this->session->set($data);
    }


    //USER METHODS


    public function authUser() 
    {
        $rules = [
            'email' =>'required',
            'password' => 'required'
            
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new UsersModel();
        $post = $this->request->getPost(['email', 'password']);

        $user = $userModel->validateUser($post['email'], $post['password']);

        if($user !== null){
            if($user['status'] == 1){

                $this->setSession($user);
                return redirect()->to(base_url('userLogged/products'));
            }else{
                return redirect()->back()->with('errors', 'Your account is not activated, please check your email for activate.');
            }
        }

        return redirect()->back()->with('errors', 'Email or password is not valid');

    }

   



}

?>