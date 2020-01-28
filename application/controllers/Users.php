<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('User');
	}

	public function index()
	{
		$data = $this->User->order_by('id', 'desc')->all();
		$this->load->view('templates/header');
		$this->load->view('users/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('users/create');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		// Insert data user to database

		$username = htmlspecialchars($this->input->post('username'));
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$access = $this->input->post('role_id');

		if ($password !== $password_confirm)
		{
			// Password is not equal

			$this->Messages->alert('danger', 'Konfirmasi password gagal!');
			redirect($this->agent->referrer());
			die;
		} else {
			$this->User->store([
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT),
				'login_token' => password_hash($username, PASSWORD_DEFAULT),
				'role_id' => $access
			]);

			// Send success messages
			$this->Messages->alert('success', 'User berhasil ditambahkan!');
			redirect($this->agent->referrer());
		}
	}

	public function edit($id)
	{
		$data = $this->User->where('id', $id)->get()->row();
		
		// Check if user is available
		if ($data)
		{
			$this->load->view('templates/header');
			$this->load->view('users/edit', ['data' => $data]);
			$this->load->view('templates/footer');
		} else {
			// if user not available show 404 page
			show_404();
		}
	}

	public function update($id)
	{
		$old = $this->User->where('id', $id)->get()->row();

		$username = htmlspecialchars($this->input->post('username'));
		$password = $this->input->post('password');
		$password_confirm = $this->input->post('password_confirm');
		$access = $this->input->post('role_id');

		if ($password != $password_confirm)
		{
			$this->Messages->alert('danger', 'Konfirmasi password gagal!');
			redirect($this->agent->referrer());
			die;
		} else {
			$this->User->where('id', $id)->update([
				'username' => $username,
				'password' => $password != '' ? password_hash($password, PASSWORD_DEFAULT) : $old['password'],
				'login_token' => password_hash($username, PASSWORD_DEFAULT),
				'role_id' => $access
			]);

			$this->Messages->alert('success', 'User berhasil diedit!');
			redirect($this->agent->referrer());
		}
	}

	public function destroy($id)
	{
		$data = $this->User->where('id', $id)->get()->row();

		if ($data)
		{
			$this->User->delete($id);
			$this->Messages->alert('success', 'User berhasil dihapus!');
			redirect('users');
		} else {
			show_404();
		}
	}
}