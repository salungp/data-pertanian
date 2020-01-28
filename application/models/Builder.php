<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Builder extends CI_Model
{
	private $table;

	public function __construct()
	{
		parent::__construct();
	}

	public function get($feature = null)
	{	
		if (!is_null($feature))
		{
			foreach ($feature as $key => $value) {
				switch ($key) {
					case 'order_by':
						$this->db->order_by($value[0], $value[1]);
						break;
					case 'select':
						$this->db->select($value);
						break;
					case 'limit':
						$this->db->limit($value);
						break;
					case 'like':
						$this->db->like($value);
						break;
					case 'where':
						$this->db->where($value[0], $value[1]);
						break;
				}
			}
		}
		$query = $this->db->get($this->table);
		return $query;
	}

	public function store($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function delete($where)
	{
		$this->db->delete($this->table, $where);
	}

	public function update($where, $data)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->update($this->table, $data);
	}

	public function setTable($table)
	{
		$this->table = $table;
		return $this;
	}
}