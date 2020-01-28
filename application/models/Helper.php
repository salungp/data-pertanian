<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Model
{
	private $table   = 'pengguna';

	public function __construct()
	{
		parent::__construct();
	}

	public function table($table)
	{
		$this->table = $table;
		return $this;
	}

	public function find()
	{
		$data = $this->db->get($this->table)->result_array();
		$day_now   = date('d');
		$month_now = date('m');
		$year_now  = date('Y');

		foreach ($data as $key) {
			$day   = date('d', strtotime($key['tgl_pasang']));
			$month = date('m', strtotime($key['tgl_pasang']));
			$year  = date('Y', strtotime($key['tgl_pasang']));

			if ($day_now >= ($day - 3) && $month_now >= $month && $year_now >= $year)
			{
				if (!$telat_bayar = $this->db->get_where('telat_bayar', ['user' => $key['id']])->row_array())
				{
					$this->db->insert('telat_bayar', [
						'user'   => $key['id'],
						'status' => 1
					]);

					$this->db->insert('notifications', [
						'title'       => 'Tanggal '.date('d M Y').' '.$key['name'].' Sudah saatnya membayar',
						'description' => $key['name'].' Sudah saatnya membayar biaya pemasangan'
					]);
				}
			}
		}
	}
}