<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DetailFoto extends BaseController
{
    public function index($url)
    {
        $db = \Config\Database::connect();
        $query = $db->table('photos')   
            ->select('photos.id, photos.photo_name, photos.album_id, photos.description, photos.location, photos.url_title, users.username, photos.created_at')
            ->join('album', 'album.id = photos.album_id')
            ->join('users', 'users.id = album.user_id')    
            ->where('url_title', $url)
            ->get()
            ->getRowArray();

        $data = [
            'id' => $query['id'],
            'photo_name' => $query['photo_name'],
            'username' => $query['username'],
            'album_id' => $query['album_id'],
            'description' => $query['description'],
            'location' => $query['location'],
            'url_title' => $query['url_title'],
            'created_at' => $query['created_at']
        ];
        return view('detail_photos', $data);
    }
}
