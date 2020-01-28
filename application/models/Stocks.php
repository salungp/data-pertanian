<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Stocks extends CI_Model
{
  private $table = 'stocks';
  public $query;

  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $query = $this->db->get($this->table);
    $this->query = $query;
    return $this;
  }

  public function where($key, $value)
  {
    $this->db->where($key, $value);
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
