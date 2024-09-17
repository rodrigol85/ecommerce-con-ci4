<?php

namespace App\Controllers;

use App\Models\AdminsModel;

class Admins extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        return view('be/registro/register');
    }
    
    


    public function create()
    {
        $rules = [
            'name' =>'required|max_length[30]',
            'surname' =>'required|max_length[30]',
            'password' => 'required|max_length[50]|min_length[5]',
            'repassword' => 'matches[password]',
            'phone' => 'required|max_length[10]',
            'email' => 'required|max_length[100]|valid_email|is_unique[admins.email]'
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
       
        $userModel = new AdminsModel();
        $post = $this->request->getPost(['name', 'surname', 'password', 'phone', 'email']);

        $token = bin2hex(random_bytes(20));

        $userModel->insert([
            'name' => $post['name'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
            'surname' => $post['surname'],
            'email' => $post['email'],
            'status' => 0,
            'confirm_code' => $token
        ]);

        $email = \Config\Services::email();

        $email->setTo($post['email']);
        $email->setSubject('Active your account');

        $url = base_url('activate-user/' . $token);

        $body= '<p>Hello ' . $post['name'] . '</p>';
        $body .= "<p>Click in the following link to activate your account <a href='$url'>Activate Account</a> </p>";
        $body .= 'Thank you <br>';
        $body .= 'Eccomerce team';

        $email->setMessage($body);
        $email->send();

        $title = 'Succesfully request';
        $message = 'Check your email to activate your account.';

        return $this->showMessage($title, $message);

    }

    public function activateUser($token){
        $userModel = new AdminsModel();
        $user = $userModel->where(['confirm_code' => $token, 'status' => 0])->first();
    
        if($user){
            $userModel->update(
                $user['id'],
                [
                    'status' => 1,
                    'confirm_code' => ''
                ]
                );
    
                return $this->showMessage('Activated account', 'Your account was successfully activated');
        }
    
        return $this->showMessage('Error.', 'Please, try again');
    }

    private function showMessage($title, $message){
        $data = [
            'title' => $title,
            'message' => $message,
    
        ];
        return view('message', $data);
    
        }


   
    public function sendResetLinkEmail(){
        $rules = [
            'email' => 'required|max_length[100]|valid_email',
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());

        }

        $userModel = new AdminsModel();
        $post = $this->request->getPost(['email']);
        $user = $userModel->where(['email' => $post['email'], 'status' => 1])->first();

        if($user){
            $token = bin2hex(random_bytes(20));

            $expiresAt = new \DateTime();

            $expiresAt->modify('+1 hour');

            $userModel->update($user['id'], [
                'confirm_code' => $token,
                'reset_token_expires_at' => $expiresAt->format('Y-m-d H:i:s'),
            ]);

            $email = \Config\Services::email();

        $email->setTo($post['email']);
        $email->setSubject('Reset your password');

        $url = base_url('password-reset-admin/' . $token);

        $body= '<p>Dear user </p>';
        $body .= "<p>If you want to reset your password, click in the following link <a href='$url'>$url</a> </p>";
        $body .= "<p>You'll have one hour to change your password, until the link expires. </p>";
        
        

        $email->setMessage($body);
        $email->send();

        $title = 'Email to reset password';
        $message = 'Check your email to reset your password, you will have one hour to finish the process.';

        return $this->showMessage($title, $message);
        }
    }

    public function linkRequestForm(){
        return view('be/registro/reset_password');


    }


    
    public function resetForm($token){

        $userModel = new AdminsModel();
        $user = $userModel->where(['confirm_code' => $token])->first();


        if($user){
            $currentDateTime = new \DateTime();
            $currentDateTimeStr = $currentDateTime->format('Y-m-d H:i:s');

            if($currentDateTimeStr <= $user['reset_token_expires_at']){
                return view('be/registro/reset_password_form', ['token' => $token]);
            }else{
                return $this->showMessage('The link has expired', 'Please, ask for a new link to change your password');
            }
        }
        return $this->showMessage('There was a problem', 'Please, try again');
    }

    public function resetPassword(){
        $rules = [
            'password' => 'required|max_length[50]|min_length[5]',
            'repassword' => 'matches[password]',
        ];
        if(!$this->validate($rules)){
            return redirect()->back()->withInput()->with('errors', $this->validator->listErrors());
        }

        $userModel = new AdminsModel();
        $post = $this->request->getPost(['token', 'password']);

        $user = $userModel->where(['confirm_code' => $post['token'], 'status' => 1])->first();

        if($user){
            $userModel->update($user['id'], [
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'confirm_code' => '',
                'reset_token_expires_at' => '',
            ]);

            return $this->showMessage('Success', 'You changed your password successfully');
        }
        return $this->showMessage('Error', 'There was some error, please try again');

    }
  
}
