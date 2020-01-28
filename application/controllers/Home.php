<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('home/index');
		$this->load->view('templates/footer');
	}
}
