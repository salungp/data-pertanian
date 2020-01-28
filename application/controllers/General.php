<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General extends CI_Controller
{
	public function maps_api_setting()
	{
		$maps_api = $this->GeneralModel->api_key();

		$this->load->view('templates/header');
		$this->load->view('general/maps_api_setting', ['data' => $maps_api]);
		$this->load->view('templates/footer');
	}

	public function maps_api_store($slug)
	{
		$user = $this->user->loggedIn();
		$api_key = htmlspecialchars($this->input->post('api_key'));

		$this->db->where('slug', $slug);
		$this->db->update('general', [
			'title' => 'API key',
			'slug'  => 'api-key',
			'description' => 'Ini adalah api key untuk mendapatkan api google maps',
			'value' => $api_key,
			'author' => $user['id']
		]);
		$this->Messages->alert('success', 'Data berhasil diubah!');
		redirect($this->agent->referrer());
	}

	public function logo_setting()
	{
		$logo = $this->GeneralModel->logo();

		$this->load->view('templates/header');
		$this->load->view('general/logo_setting', ['data' => $logo]);
		$this->load->view('templates/footer');
	}

	public function logo_store()
	{
		$old = $this->GeneralModel->logo();
		$config['upload_path']          = './assets/sites/logo/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|pneg';
    $config['max_size']             = 1024;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('logo'))
    {
    	$logo = $this->GeneralModel->logo();

			$this->load->view('templates/header');
			$this->load->view('general/logo_setting', ['data' => $logo, 'error' => $this->upload->display_errors()]);
			$this->load->view('templates/footer');
    } else {
    	$file = $this->upload->data('file_name');
    	unlink('./assets/sites/logo/'.$old['value']);
    	$user = $this->User->loggedIn();
    	$this->db->where('slug', 'logo');
    	$this->db->update('general', [
    		'title' => 'logo',
    		'slug' => 'logo',
    		'description' => 'Logo website',
    		'value' => $file,
    		'author' => $user['id']
    	]);
    	$this->Messages->alert('success', 'Data berhasil diubah!');
			redirect('general/logo_setting');
    }
	}
}
