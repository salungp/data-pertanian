<?php defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->has_userdata('login_token'))
		{
			redirect('login');
		}
		$this->load->model('Customers', 'customers');
	}

	public function excel()
	{
		$spreadsheet = new Spreadsheet();
		$spreadsheet->setActiveSheetIndex(0)
								->setCellValue('A1', 'No')
								->setCellValue('B1', 'Nama')
								->setCellValue('C1', 'RT/RW')
								->setCellValue('D1', 'Desa')
								->setCellValue('E1', 'Kecamatan')
								->setCellValue('F1', 'Kabupaten')
								->setCellValue('G1', 'NIK')
								->setCellValue('H1', 'No KK')
								->setCellValue('I1', 'Luas(m2)')
								->setCellValue('J1', 'Panen(Kg)')
								->setCellValue('K1', 'Biaya tanam(Rp)')
								->setCellValue('L1', 'No anggota');

		$column = 2;
		$number = 1;

		foreach($this->customers->get()->result() as $key) {
			$spreadsheet->setActiveSheetIndex(0)
									->setCellValue('A'.$column, $number)
									->setCellValue('B'.$column, $key['name'])
									->setCellValue('C'.$column, $key['rt/rw'])
									->setCellValue('D'.$column, $key['desa'])
									->setCellValue('E'.$column, $key['kecamatan'])
									->setCellValue('F'.$column, $key['kabupaten'])
									->setCellValue('G'.$column, $key['nik'])
									->setCellValue('H'.$column, $key['nomor_kk'])
									->setCellValue('I'.$column, number_format($key['luas'], 0, ',', '.'))
									->setCellValue('J'.$column, number_format($key['panen'], 0, ',', '.'))
									->setCellValue('K'.$column, 'Rp. '.number_format($key['biaya_tanam'], 2, ',', '.'))
									->setCellValue('L'.$column, $key['nomor_anggota']);

			$column++;
			$number++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename=laporan'.date('-d-m-Y').'.xlsx');
	  header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function index()
	{
		// set permission if reloaded
		exec ("find ./assets/img/ -type d -exec chmod -R 0777 {} +");

		$data = $this->customers->order_by('id', 'desc')->All();
		$this->load->view('templates/header');
		$this->load->view('pengguna/index', ['data' => $data]);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('pengguna/create');
		$this->load->view('templates/footer');
	}

	public function store()
	{
		$vilage = htmlspecialchars(
			strtoupper(
				$this->input->post('vilage')
			)
		);

		$district = htmlspecialchars(
			strtoupper(
				$this->input->post('kec')
			)
		);

		$city = htmlspecialchars(
			strtoupper(
				explode(' ', $this->input->post('city'))[1]
			)
		);

		$coordinate_point = htmlspecialchars(
			$this->input->post('LS') . '/' . $this->input->post('BT')
		);

		$this->customers->store([
			'name'         => htmlspecialchars($this->input->post('name')),
			'rt/rw'      => $this->input->post('rt').'/'.$this->input->post('rw'),
			'desa' => $vilage,
			'kecamatan'    => $district,
			'kabupaten'   => $city,
			'nik'   => htmlspecialchars($this->input->post('nik')),
			'nomor_kk'   => htmlspecialchars($this->input->post('no_kk')),
			'nomor_anggota'   => htmlspecialchars($this->input->post('no_anggota')),
			'titik_koordinat'   => $coordinate_point,
			'luas' => $this->input->post('luas'),
			'panen' => $this->input->post('panen'),
			'biaya_tanam' => $this->input->post('biaya_tanam')
		]);

		$this->Messages->alert('success', 'Data diri sudah terisi, keterangan lanjut!');
		redirect('pengguna/create_2');
	}

	public function last()
	{
		return $this->customers->order_by('id', 'desc')->limit(1)->get()->row();
	}

	public function create_2()
	{
		$this->load->view('templates/header');
		$this->load->view('pengguna/create_2', ['id' => $this->last()['id']]);
		$this->load->view('templates/footer');
	}

	public function store_2($id)
	{
		$path = './assets/img/pengguna/'.($this->last()['id']+1).'/';

		mkdir($path);
		chmod($path, 0777);

		$people_path = $this->generateUpload('foto_orang', 'people');
		$kk_path = $this->generateUpload('foto_kk', 'kk');
		$lahan_path = $this->generateUpload('foto_lahan', 'lahan');

		chmod($people_path, 0755);
		chmod($kk_path, 0755);
		chmod($lahan_path, 0755);

		$this->db->insert('foto', [
    	'foto_orang' => $people_path,
    	'foto_kk' => $kk_path,
    	'foto_lahan' => $lahan_path,
    	'pengguna_id' => $id
    ]);

    $this->Messages->alert('success', 'Foto berhasil ditambahkan!');
    redirect('pengguna');
	}

	public function generateUpload($file, $type)
	{
		$path = './assets/img/pengguna/'.($this->last()['id']+1).'/';

		if (isset($_FILES[$file]))
		{
			$image_name = $_FILES[$file]['name'];
			$image_size = $_FILES[$file]['size'];
			$image_tmp = $_FILES[$file]['tmp_name'];
			$resultPath = $path.$type.'_photo.'.explode('.', $image_name)[1];
			$move_third = move_uploaded_file($image_tmp, $resultPath);
		}

		return $resultPath;
	}

	public function destroy($id)
	{
		$pengguna = $this->customers->find($id);
		$photo = $this->db->get_where('foto', ['id' => $pengguna['id']])->row_array();

		if (unlink($photo['foto_orang']) &&
				unlink($photo['foto_kk']) &&
				unlink($photo['foto_lahan']))
		{
			if ($pengguna)
			{
				$this->customers->delete($id);
				$this->db->delete('foto', ['id' => $pengguna['id']]);
				$this->Messages->alert('success', 'Data berhasil dihapus!');
				redirect($this->agent->referrer());
			} else {
				show_404();
			}
		} else {
			$this->Messages->alert('danger', 'Maaf file gagal dihapus!');
			redirect($this->agent->referrer());
		}
	}

	public function edit($id)
	{
		$data = $this->customers->find($id);
		if ($data)
		{
			$this->load->view('templates/header');
			$this->load->view('pengguna/edit', ['data' => $data]);
			$this->load->view('templates/footer');
		} else {
			show_404();
		}
	}

	public function update($id)
	{
		$vilage = htmlspecialchars(
			strtoupper(
				$this->input->post('vilage')
			)
		);

		$district = htmlspecialchars(
			strtoupper(
				$this->input->post('kec')
			)
		);

		$city = htmlspecialchars(
			strtoupper(
				explode(' ', $this->input->post('city'))[1]
			)
		);

		$coordinate_point = htmlspecialchars(
			$this->input->post('LS') . '/' . $this->input->post('BT')
		);
		
		$this->customers->where('id', $id)->update([
			'name'         => htmlspecialchars($this->input->post('name')),
			'rt/rw'      => $this->input->post('rt').'/'.$this->input->post('rw'),
			'desa' => $vilage,
			'kecamatan'    => $district,
			'kabupaten'   => $city,
			'nik'   => htmlspecialchars($this->input->post('nik')),
			'nomor_kk'   => htmlspecialchars($this->input->post('no_kk')),
			'nomor_anggota'   => htmlspecialchars($this->input->post('no_anggota')),
			'titik_koordinat'   => $coordinate_point,
			'luas' => $this->input->post('luas'),
			'panen' => $this->input->post('panen'),
			'biaya_tanam' => $this->input->post('biaya_tanam')
		]);
		$this->Messages->alert('success', 'Data berhasil diupdate!');
		redirect('pengguna');
	}

	// Detail data
	public function detail($id)
	{
		$data = $this->db->get_where('foto', ['pengguna_id' => $id])->row_array();
		$pengguna = $this->customers->find($id);
		$this->load->view('templates/header');
		$this->load->view('pengguna/detail', ['data' => $data, 'pengguna' => $pengguna]);
		$this->load->view('templates/footer');
	}
}
