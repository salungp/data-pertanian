<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('cookie');
	}

	public function index()
	{
		if ($this->session->has_userdata('login_token'))
		{
			redirect('home');
			die;
		}
		$this->load->view('auth/login');
	}

	public function logout()
	{
		if ($this->session->has_userdata('login_token'))
		{
			$this->session->unset_userdata('login_token');
			redirect();
		} else {
			show_404();
		}
	}

	public function authenticate()
	{
		$user = $this->User->where('username', $this->input->post('username'))->get()->row();

		if (@$_COOKIE['login_failed'] >= 5) {
			$this->Messages->alert('danger', 'Maaf anda telah gagal login selama 5 kali. Mohon tunggu lagi hingga <span class="timer">10.00</span>');
			redirect('login');
			die;
		}
		if ($user)
		{
			if (password_verify($this->input->post('password'), $user['password']))
			{
				setcookie('login_failed', '', time() - 3600);
				$this->session->set_userdata([
					'login_token' => $user['login_token']
				]);
				redirect('home');
			} else {
				$this->login_failed();
				$this->Messages->alert('danger', 'Maaf password salah!');
				redirect('login');
			}
		} else {
			$this->login_failed();
			$this->Messages->alert('danger', 'Maaf email tidak terdaftar!');
			redirect('login');
		}
	}

	public function login_failed()
	{
		$old = @$_COOKIE['login_failed'];
		if (@$_COOKIE['login_failed'] <= 5)
		{
			if (@$_COOKIE['login_failed'])
			{
				setcookie('login_failed',$old+1,time()+(60 * 10),'/');
			} else {
				setcookie('login_failed',1,time()+(60 * 10),'/');
			}
		} else if (@$_COOKIE['login_failed'] >= 5) {
			setcookie('login_failed',1,time()+(60 * 10),'/');
			$this->Messages->alert('danger', 'Maaf anda telah gagal login selama 5 kali. Mohon tunggu lagi hingga <span class="timer">10.00</span> menit');
			redirect('login');
			die;
		}
	}
}
