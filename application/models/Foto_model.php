<?php

class Foto_model extends CI_Model
{
	private $table = 'foto';
	public $data;

	public function __construct()
	{
		parent::__construct();
	}

	public function where($k, $v)
	{
		$this->db->where($k, $v);
		return $this;
	}
}