<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/RestController.php';
require APPPATH.'libraries/Format.php';
use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customers');
	}

	public function customers_get()
	{
		header('Access-Control-Allow-Origin: http://localhost:3000');
		$this->response($this->Customers->All(), 200);
	}
}
