<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Users extends BaseController
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
		if(session()->get('role') == 'user') {
            return redirect()->to('/');
        }

		$data = [
			'controller'    	=> ucwords('users'),
			'title'     		=> ucwords('users')
		];

		return view('users', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->usersModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->fullname,
				$value->username,
				$value->email,
				$value->address,
				$value->role == 1 ? 'Admin' : 'User',
				$ops
			);
			$no++;
		}

		return $this->response->setJSON($data);
	}

	public function getOne()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if ($this->validation->check($id, 'required|numeric')) {

			$data = $this->usersModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['fullname'] = $this->request->getPost('fullname');
		$fields['username'] = $this->request->getPost('username');
		$fields['password'] = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);
		$fields['avatar'] = $this->request->getPost('avatar');
		$fields['email'] = $this->request->getPost('email');
		$fields['address'] = $this->request->getPost('address');
		$fields['role'] = $this->request->getPost('role');


		$this->validation->setRules([
			'fullname' => ['label' => 'Fullname', 'rules' => 'required|min_length[0]|max_length[100]'],
			'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[100]'],
			'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[100]'],
			'avatar' => ['label' => 'Avatar', 'rules' => 'required|min_length[0]|max_length[200]'],
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[100]'],
			'address' => ['label' => 'Address', 'rules' => 'permit_empty|min_length[0]'],
			'role' => ['label' => 'Role', 'rules' => 'required|numeric|min_length[0]'],

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

	public function edit()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['fullname'] = $this->request->getPost('fullname');
		$fields['username'] = $this->request->getPost('username');
		$fields['password'] = password_hash((string)$this->request->getPost('password'), PASSWORD_DEFAULT);

		$fields['avatar'] = $this->request->getPost('avatar');
		$fields['email'] = $this->request->getPost('email');
		$fields['address'] = $this->request->getPost('address');
		$fields['role'] = $this->request->getPost('role');


		$this->validation->setRules([
			'fullname' => ['label' => 'Fullname', 'rules' => 'required|min_length[0]|max_length[100]'],
			'username' => ['label' => 'Username', 'rules' => 'required|min_length[0]|max_length[100]'],
			'password' => ['label' => 'Password', 'rules' => 'required|min_length[0]|max_length[100]'],
			'avatar' => ['label' => 'Avatar', 'rules' => 'required|min_length[0]|max_length[200]'],
			'email' => ['label' => 'Email', 'rules' => 'required|valid_email|min_length[0]|max_length[100]'],
			'address' => ['label' => 'Address', 'rules' => 'permit_empty|min_length[0]'],
			'role' => ['label' => 'Role', 'rules' => 'required|numeric|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->usersModel->update($fields['id'], $fields)) {

				$response['success'] = true;
				$response['messages'] = lang("App.update-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.update-error");
			}
		}

		return $this->response->setJSON($response);
	}

	public function remove()
	{
		$response = array();

		$id = $this->request->getPost('id');

		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		} else {

			if ($this->usersModel->where('id', $id)->delete()) {

				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");
			} else {

				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
			}
		}

		return $this->response->setJSON($response);
	}
}
