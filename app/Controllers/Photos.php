<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PhotosModel;

class Photos extends BaseController
{

	protected $photosModel;
	protected $validation;

	public function __construct()
	{
		$this->photosModel = new PhotosModel();
		$this->validation =  \Config\Services::validation();
	}

	public function index()
	{

		$data = [
			'controller'    	=> ucwords('photos'),
			'title'     		=> ucwords('photos')
		];

		return view('photos', $data);
	}

	public function getAll()
	{
		$response = $data['data'] = array();

		$result = $this->photosModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->album_id,
				$value->user_id,
				$value->description,
				$value->location,

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

			$data = $this->photosModel->where('id', $id)->first();

			return $this->response->setJSON($data);
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}
	}

	public function add()
	{
		$response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['album_id'] = $this->request->getPost('album_id');
		$fields['user_id'] = $this->request->getPost('user_id');
		$fields['description'] = $this->request->getPost('description');
		$fields['location'] = $this->request->getPost('location');


		$this->validation->setRules([
			'album_id' => ['label' => 'Album id', 'rules' => 'required|numeric|min_length[0]'],
			'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
			'description' => ['label' => 'Description', 'rules' => 'permit_empty|min_length[0]'],
			'location' => ['label' => 'Location', 'rules' => 'required|min_length[0]|max_length[100]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->photosModel->insert($fields)) {

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
		$fields['album_id'] = $this->request->getPost('album_id');
		$fields['user_id'] = $this->request->getPost('user_id');
		$fields['description'] = $this->request->getPost('description');
		$fields['location'] = $this->request->getPost('location');


		$this->validation->setRules([
			'album_id' => ['label' => 'Album id', 'rules' => 'required|numeric|min_length[0]'],
			'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
			'description' => ['label' => 'Description', 'rules' => 'permit_empty|min_length[0]'],
			'location' => ['label' => 'Location', 'rules' => 'required|min_length[0]|max_length[100]'],

		]);

		if ($this->validation->run($fields) == FALSE) {

			$response['success'] = false;
			$response['messages'] = $this->validation->getErrors(); //Show Error in Input Form

		} else {

			if ($this->photosModel->update($fields['id'], $fields)) {

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

			if ($this->photosModel->where('id', $id)->delete()) {

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
