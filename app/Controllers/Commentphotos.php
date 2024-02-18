<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CommentphotosModel;

class Commentphotos extends BaseController
{

	protected $commentphotosModel;
	protected $validation;

	public function __construct()
	{
		$this->commentphotosModel = new CommentphotosModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('commentphotos'),
			'title'     		=> ucwords('comment_photos')
		];

		return view('commentphotos', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->commentphotosModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->photo_id,
				$value->user_id,
				$value->comment,

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

			$data = $this->commentphotosModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['photo_id'] = $this->request->getPost('photo_id');
		$fields['user_id'] = $this->request->getPost('user_id');
		$fields['comment'] = $this->request->getPost('comment');


		$this->validation->setRules([
			'photo_id' => ['label' => 'Photo id', 'rules' => 'required|numeric|min_length[0]'],
			'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
			'comment' => ['label' => 'Comment', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->commentphotosModel->insert($fields)) {

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
		$fields['photo_id'] = $this->request->getPost('photo_id');
		$fields['user_id'] = $this->request->getPost('user_id');
		$fields['comment'] = $this->request->getPost('comment');


		$this->validation->setRules([
			'photo_id' => ['label' => 'Photo id', 'rules' => 'required|numeric|min_length[0]'],
			'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
			'comment' => ['label' => 'Comment', 'rules' => 'permit_empty|min_length[0]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->commentphotosModel->update($fields['id'], $fields)) {

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

			if ($this->commentphotosModel->where('id', $id)->delete()) {

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
