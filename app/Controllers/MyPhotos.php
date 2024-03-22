<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\PhotosModel;
use CodeIgniter\HTTP\ResponseInterface;

class MyPhotos extends BaseController
{
    public function index()
    {
        $data = [
            'user' => '<span class="far fa-sign-in"></span>Login',
            'category' => (new CategoryModel())->findAll(),
            'photos' => (new PhotosModel())->findAll()
        ];
        return view('myphotos', $data);
    }

}
