<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Model
{
	private $table = 'pengguna';
	public $query;

	public function get()
	{
		$query = $this->db->get($this->table);
		$this->query = $query;
		return $this;
	}

	public function daerah($req)
	{
		$curl = curl_init();

		curl_setopt_array($curl, [
			CURLOPT_URL => 'http://dev.farizdotid.com/api/daerahindonesia/'.$req,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET'
		]);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err)
		{
			return json_encode(['error' => $err]);
		} else {
			$array_response = json_decode($response, true);
			$list_kota = $array_response;
			return $list_kota;
		}
	}

	public function where($key, $value)
	{
		$this->db->where($key, $value);
		return $this;
	}

	public function limit($val)
	{
		$this->db->limit($val);
		return $this;
	}

	public function order_by($key, $value)
	{
		$this->db->order_by($key, $value);
		return $this;
	}

	public function like($key, $value)
	{
		$this->db->like($key, $value);
	}

	public function All()
	{
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function result()
	{
		return $this->query->result_array();
	}

	public function row()
	{
		return $this->query->row_array();
	}

	public function detail($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	public function delete($id)
	{
		$this->db->delete($this->table, ['id' => $id]);
	}

	public function find($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row_array();
	}

	public function store($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function update($data)
	{
		$this->db->update($this->table, $data);
	}
}
