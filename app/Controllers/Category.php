<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CategoryModel;

class Category extends BaseController
{
	
    protected $categoryModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->categoryModel = new CategoryModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> ucwords('category'),
                'title'     		=> ucwords('category')				
			];
		
		return view('category', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->categoryModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {	
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->name,

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
			
			$data = $this->categoryModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['name'] = $this->request->getPost('name');


        $this->validation->setRules([
			            'name' => ['label' => 'Name', 'rules' => 'required|min_length[0]|max_length[200]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->categoryModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
$fields['name'] = $this->request->getPost('name');


        $this->validation->setRules([
			            'name' => ['label' => 'Name', 'rules' => 'required|min_length[0]|max_length[200]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->categoryModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->categoryModel->where('id', $id)->delete()) {
								
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
