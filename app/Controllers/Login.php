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
            'role' => $findUser->role,
            'isLogin' => true, 
            'id' => $findUser->id
        ]);
        /// isLogin berfungsi untuk di LoginFilter supaya deteksi apakah dia sudah login atau belum & nilainya boolean
        
        // lalu bakal ngecek perannya
        if($findUser->role == 0) {
            $data = [
                'message' => 'success',
                'role' => 'user'
            ];
        } else {
            $data = [
                'message' => 'success',
                'role' => 'admin'
            ];
        }

        echo json_encode($data);
    }

    public function set_google_session(){
        session_start();

        // Menerima data dari JavaScript
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Mengatur session user
        $_SESSION['user'] = array(
            'displayName' => $data['displayName'],
            'email' => $data['email'],
            'photoUrl' => $data['photoUrl']
        );
        
        // Mengirim status 200 (OK) ke JavaScript
        http_response_code(200);
    }

    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}