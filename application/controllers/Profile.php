<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('profile/index');
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$old = $this->User->loggedIn();
		$password = $this->input->post('password') != null
								? password_hash($this->input->post('password'), PASSWORD_DEFAULT)
								: $old['password'];

		$this->User->where('id', $old['id'])->update('users', [
			'username' => htmlspecialchars($this->input->post('username')),
			'password' => $password
		]);
		$this->Messages->alert('success', 'Data berhasil diedit!');
		redirect($this->agent->referrer());
	}
}
