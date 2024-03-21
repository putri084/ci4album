<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PksModel;

class Login extends BaseController
{
    protected $users;
    protected $pksModel;

    public function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        if (session()->get('isLogin') == true && session()->get('role') == 'admin') {
            return redirect('dashboard');
        } else if (session()->get('isLogin') == true && session()->get('role') == 'user') {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function ceklogin()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $findUser = $this->users->where('email', $login)->orWhere('username', $login)->first();
        if(!$findUser) {
            return $this->response->setJSON(array('message' => 'failLogin')); 
        }
        if (!password_verify((string)$password, $findUser->password)) {
            return $this->response->setJSON(array('message' => 'failPassword'));
        }

        // set session ketika berhasil
        session()->set([
            'fullname' => $findUser->fullname, 
            'username' => $findUser->username,
            'email' => $findUser->email,
            'address' => $findUser->address,
            'role' => $findUser->role == 0 ? 'user' : 'admin',
            'isLogin' => true, 
            'id' => $findUser->id
        ]);

        echo json_encode(['message' =>'success']);
    }


    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
