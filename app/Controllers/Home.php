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
            'album' => (new AlbumModel())->where('user_id', session()->get('id'))->findAll()
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
            'location' => $newName,
            'url_title' => url_title(strtolower($this->request->getVar('photo_name')))
        ];

        $photoModel->save($data);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->to('/');
    }


    public function remove_album($album_id)
    {
        $albumModel = new AlbumModel();
        $photoModel = new PhotosModel();

        // Dapatkan semua foto yang terkait dengan album ini
        $photos = $photoModel->where('album_id', $album_id)->findAll();

        // Hapus setiap foto dari penyimpanan fisik dan database
        foreach ($photos as $photo) {
            $this->remove_photo($photo['id']);
        }

        // Hapus album dari database
        $albumModel->delete($album_id);

        echo json_encode(['message' => 'success']);
    }

    public function remove_photo($photo_id)
    {
        $photoModel = new PhotosModel();
        $photo = $photoModel->find($photo_id);

        if (!$photo) {
            echo json_encode(['message' => 'Photo not found']);
            return;
        }

        // Hapus foto dari penyimpanan fisik
        $path = 'uploads/' . $photo->location;
        if (file_exists($path)) {
            unlink($path);
        }

        // Hapus foto dari database
        $photoModel->delete($photo_id);

        echo json_encode(['message' => 'success']);
    }




    public function getAllAlbum()
    {
        $db = db_connect();
        $res1 = $db->table('vw_album')->get()->getResultArray();
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


    public function getAllAlbumMe()
    {
        $db = db_connect();
        $res1 = $db->query('CALL getMyAlbumDetails(' . session()->get('id') . ')')->getResultArray();
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
        $res = $db->query('CALL getAlbumByCategory(' . $cat_id . ')')->getResultArray();

        echo json_encode($res);
    }
}
