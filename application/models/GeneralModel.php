<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model
{
	private $table = 'general';

	public function api_key()
	{
		$query = $this->db->get_where($this->table, ['slug' => 'api-key']);
		return $query->row_array();
	}

	public function logo()
	{
		$query = $this->db->get_where($this->table, ['slug' => 'logo']);
		return $query->row_array();
	}
}