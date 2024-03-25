<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsersModel;
use App\Models\PksModel;

class Login extends BaseController
{
    protected $users;
    protected $pksModel;

    public function __construct()
    {
        $this->users = new UsersModel();
    }

    public function index()
    {
        if (session()->get('isLogin') == true && session()->get('role') == 'admin') {
            return redirect('dashboard');
        } else if (session()->get('isLogin') == true && session()->get('role') == 'user') {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Login'
        ];

        return view('login', $data);
    }

    public function ceklogin()
    {
        $login = $this->request->getPost('login');
        $password = $this->request->getPost('password');
        $findUser = $this->users->where('email', $login)->orWhere('username', $login)->first();
        if(!$findUser) {
            return $this->response->setJSON(array('message' => 'failLogin')); 
        }
        if (!password_verify((string)$password, $findUser->password)) {
            return $this->response->setJSON(array('message' => 'failPassword'));
        }

        // set session ketika berhasil
        session()->set([
            'fullname' => $findUser->fullname, 
            'username' => $findUser->username,
            'email' => $findUser->email,
            'address' => $findUser->address,
            'role' => $findUser->role == 0 ? 'user' : 'admin',
            'isLogin' => true, 
            'id' => $findUser->id
        ]);

        echo json_encode(['message' =>'success']);
    }

    public function lupapassword() {
        $data = [
            'title' => 'Lupa Password'
        ];

        return view('lupapassword', $data);
    }

    public function sendEmailLupaPassword()
	{
		$email = $this->request->getPost('email');

		$userModel = new UsersModel();
		$user = $userModel->where('email', $email)->first();

		$level = $user->role;

		if ($user) {
			// generate token
			$token = base64_encode(random_bytes(32));

			// update token 
			$userModel->where('email', $email)
				->set(['reset_token' => $token, 'reset_at' => date('Y-m-d H:i:s')])
				->update();


			// send email
			$this->_sendEmail($token, $email, $level);

			session()->setFlashdata('success', 'Silahkan cek email untuk reset password');

			return redirect()->to('lupapassword');
		} else {
			session()->setFlashdata('danger', 'Email tidak terdaftar');

			return redirect()->to('lupapassword');
		}
	}

	private function _sendEmail($token, $email, $level)
	{
		$mail = \Config\Services::email();

		$mail->setFrom('HMPS Teknik Komputer', 'Evoting App CE');
		helper('aeshash');
		$mail->setSubject('Reset Password');
		$mail->setMessage('Klik link ini untuk reset password anda : <a href="' . base_url() . '/resetpassword?rzsecurity=' . aeshash('enc', $email, config('Encryption')->key) . '&rzprotocol='. aeshash('enc', $token, config('Encryption')->key) .'">Reset Password</a>');


		$mail->setTo($email);


		if ($mail->send()) {
			return true;
		} else {
			echo $mail->printDebugger();
			die;
		}

		return false;
	}

	public function resetPassword()
	{
		helper('aeshash');
		$email = aeshash('dec', $this->request->getGet('rzsecurity'), config('Encryption')->key);
		$token = aeshash('dec', $this->request->getGet('rzprotocol'), config('Encryption')->key);

		$userModel = new UsersModel();
		$user = $userModel->where('email', $email)->first();


		if ($user) {
			$user_token = $userModel->where('reset_token', $token)->first();

			if ($user_token) {
				$data = [
					'title' => 'Reset Password',
					'email' => $email,
					'token' => $token
				];

				return view('resetpassword', $data);
			} else {
				session()->setFlashdata('danger', 'Reset password gagal! Token salah');

				return redirect()->to('lupapassword');
			}
		} else {
			session()->setFlashdata('danger', 'Reset password gagal! Email salah');

			return redirect()->to('lupapassword');
		}
	}

	public function doresetPassword() {
		$email = $this->request->getPost('email');
		$token = $this->request->getPost('token');
		$password = $this->request->getPost('password');

		$userModel = new UsersModel();
		$user = $userModel->where('email', $email)->first();

		if ($user) {
			$user_token = $userModel->where('reset_token', $token)->first();

			if ($user_token) {
				// update password
				$userModel->where('email', $email)
					->set(['password' => password_hash((string)$password, PASSWORD_DEFAULT), 'reset_token' => null, 'reset_at' => null])
					->update();

				session()->setFlashdata('success', 'Password berhasil diubah');

				return redirect()->to('login');
			} else {
				session()->setFlashdata('danger', 'Reset password gagal! Token salah');

				return redirect()->to('resetpassword');
			}
		} else {
			session()->setFlashdata('danger', 'Reset password gagal! Email salah');

			return redirect()->to('resetpassword');
		}
	}


    public function logout()
    {
        session()->destroy();
        return redirect('login');
    }
}
