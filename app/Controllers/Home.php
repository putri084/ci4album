<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\AlbumModel;
use App\Models\PhotosModel;
use App\Models\CommentphotosModel;
use App\Models\LikephotosModel;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'user' => '<span class="far fa-sign-in"></span>Login',
            'category' => (new CategoryModel())->findAll(),
            'photos' => (new PhotosModel())->findAll()
        ];
        return view('home', $data);
    }

    public function create_album()
    {
        $data = [
            'category' => (new CategoryModel())->findAll()
        ];

        // dd($data);
        return view('create_album', $data);
    }

    public function add_album()
    {
        $albumData = [
            'user_id'   => request()->getPost('user_id'),
            'album_name' => request()->getPost('album_name'),
            'description' => request()->getPost('description'),
            'category_id' => request()->getPost('category_id')
        ];
        (new AlbumModel())->insert($albumData);
        return redirect()->to('/');
    }

    public function create_photo()
    {
        $data = [
            'album' => (new AlbumModel())->findAll()
        ];

        // dd($data);
        return view('create_photo', $data);
    }

    public function add_photo()
    {
        $photoModel = new PhotosModel();
        $rules = [
            'user_id' => 'required',
            'album_id' => 'required',
            'photo_name' => 'required',
            'description' => 'required',
            'photo' => [
                'rules' => 'uploaded[photo]|max_size[photo,1024]|mime_in[photo,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please choose a photo to upload.',
                    'max_size' => 'The photo size is too large. Maximum size allowed is 1GB.',
                    'mime_in' => 'The photo must be a valid image file (JPEG, PNG).'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke halaman form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Proses upload foto
        $photo = $this->request->getFile('photo');
        $newName = $photo->getRandomName();
        $photo->move('uploads', $newName);

        // Simpan data ke database
        $data = [
            'album_id' => $this->request->getVar('album_id'),
            'user_id'   => $this->request->getVar('user_id'),
            'photo_name' => $this->request->getVar('photo_name'),
            'description' => $this->request->getVar('description'),
            'location' => $newName
        ];

        $photoModel->save($data);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->to('/');
    }

    public function getAllAlbum()
    {
        $db = db_connect();
        $res1 = $db->table('album')->select('album.id as id,album.album_name, users.username, users.avatar, users.fullname, users.id as user_id')
            ->join('users', 'users.id = album.user_id')
            ->get()
            ->getResultArray();
        $res2 = $db->table('photos')->get()->getResultArray();
        $res3 = $db->table('like_photos')->get()->getResultArray();
        echo json_encode(
            [
                'album' => $res1,
                'photos' => $res2,
                'like' => $res3
            ]
        );
    }

    function sendComment()
    {

        $comment = new CommentphotosModel();
        $comment->insert([
            'photo_id'  => request()->getPost('photo_id'),
            'user_id'   => session()->get('id'),
            'comment'   => request()->getPost('comment')
        ]);

        echo json_encode(['message' => 'success']);
    }

    function sendLike($pId)
    {
        $photo = new LikephotosModel();
        if (count($photo->where('photo_id', $pId)->where('user_id', session()->get('id'))->get()->getResultArray()) > 0) {
            $photo->where('photo_id', $pId)->where('user_id', session()->get('id'))->delete();
        } else {
            $photo->insert([
                'photo_id'  => $pId,
                'user_id'   => session()->get('id')
            ]);
        }

        echo json_encode(['message' => 'success']);
    }


    function getComment($pId)
    {
        $db = db_connect();

        $res = $db->table('comment_photos')
            ->select('comment_photos.*, users.username')
            ->join('users', 'users.id = comment_photos.user_id')
            ->where('photo_id', $pId)
            ->orderBy('comment_photos.created_at', 'DESC') // Mengurutkan berdasarkan created_at dari yang terbaru
            ->get()
            ->getResultArray();


        echo json_encode(['comment' => $res]);
    }

    function getCountLike($pId)
    {
        $db = db_connect();

        $res = $db->table('like_photos')
            ->select('count(*) as count')
            ->where('photo_id', $pId)
            ->get()
            ->getRow();

        echo json_encode($res);
    }



    public function getAlbumByCategory($cat_id)
    {
        $db = db_connect();

        $res = $db->table('photos')->select('album.album_name, users.username, photo_name, photos.description, location, photos.created_at')
            ->join('album', 'album.id = photos.album_id')
            ->join('users', 'users.id = album.user_id')
            ->where('album.category_id', $cat_id)
            ->get()
            ->getResultObject();

        echo json_encode($res);
    }
}
