<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class Register extends BaseController
{
    protected $usersModel;
    protected $validation;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->validation =  \Config\Services::validation();
    }
    public function index()
    {
        $data = [
			'controller'    	=> ucwords('register'),
			'title'     		=> ucwords('register')
		];
        return view('register', $data);
    }

    public function add()
    {
        $fields['fullname'] = $this->request->getPost('fullname');
        $fields['username'] = $this->request->getPost('username');
        $fields['password'] = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);
        $fields['email'] = $this->request->getPost('email');
        $fields['role'] = 0;
        $fields['address'] = $this->request->getPost('address');

        $this->validation->setRules([
            'fullname' => ['label' => 'Fullname', 'rules' => 'required|min_length[0]|max_length[100]'],
            'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[100]'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[100]'],
            'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[100]'],
            'address' => ['label' => 'Address', 'rules' => 'permit_empty|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {
            $response['success'] = false;
            $response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

        } else {

            if ($this->usersModel->insert($fields)) {

                $response['success'] = true;
                $response['messages'] = lang("App.insert-success");
            } else {

                $response['success'] = false;
                $response['messages'] = lang("App.insert-error");
            }
        }

        return $this->response->setJSON($response);
    }
}
