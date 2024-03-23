<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{
    public function index()
    {
        if(session()->get('isLogin') == false) {
            return redirect()->to('/login');
        }

        if(session()->get('role') == 'user') {
            return redirect()->to('/');
        }
        $data = [
            'title'             => 'Dashboard'
        ];
        return view('dashboard', $data);
    }
}
