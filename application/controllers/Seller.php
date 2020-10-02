<?php

class Seller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');
	}

	public function index()
	{
		$data['judul'] = 'EVORIA - Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/halaman_bisnis');
		$this->load->view('templates/seller_footer');
	}
	public function profile()
	{
		$data['judul'] = 'EVORIA - Profil Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/profile');
		$this->load->view('templates/seller_footer');
	}
	public function edit_profile()
	{
		$data['judul'] = 'EVORIA - Profil Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/edit_profile');
		$this->load->view('templates/seller_footer');
	}

	public function halaman_bisnis()
	{
		$data['judul'] = 'EVORIA - Halaman Bisnis';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('templates/carousel_home', $data);
		$this->load->view('seller/halaman_bisnis');
		$this->load->view('templates/seller_footer');
	}

	public function tambah_jasa()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
		// $this->form_validation->set_rules('gambar', 'Gambar', [
		// 	'rules' => 'uploaded[gambar]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
		// 	'errors' => 'Gambar belum dipilih',
		// 	'is_image' => 'Yang Anda pilih bukan gambar',
		// 	'mime_in' => 'Yang Anda pilih bukan gambar'
		// ]);

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'EVORIA - Tambah Jasa';
			$data['user'] = $this->db->get_where('users', ['email' =>
			$this->session->userdata('email')])->row_array();
			$data['kategori_jasa'] = $this->KategoriModel->getdata();
			$this->load->view('templates/header_evoria', $data);
			$this->load->view('templates/carousel_home', $data);
			$this->load->view('seller/tambah_jasa');
			$this->load->view('templates/seller_footer');
		} else {

			$config['upload_path'] = './assets/img/jasa/';
			$config['allowed_types']        = 'jpeg|jpg|png|PNG';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->dispay_errors();
			} else {
				$gambar = $this->upload->data('file_name');
				// $this->input->post('gambar', $gambar);
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'harga' => htmlspecialchars($this->input->post('harga', true)),
					'gambar' => $gambar,
					'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
					'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
					'date_created' => time()
				];
				$this->db->insert('jasa', $data);

				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Data Berhasil Ditambahkan!
					</div>');
				redirect('seller/tambah_jasa');
			}
		}
	}

	// private function _uploadImage()
	// {
	// 	$config['upload_path']          = './assets/img/jasa/';
	// 	$config['allowed_types']        = 'gif|jpg|png';
	// 	$config['file_name']            = $this->id;
	// 	$config['overwrite']			= true;
	// 	$config['max_size']             = 1024; // 1MB
	// 	// $config['max_width']            = 1024;
	// 	// $config['max_height']           = 768;

	// 	$this->load->library('upload', $config);

	// 	if ($this->upload->do_upload('image')) {
	// 		return $this->upload->data("file_name");
	// 	}

	// 	return "default.jpg";
	// }

	public function table()
	{
		$data['judul'] = 'EVORIA - Tabel Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/table');
		$this->load->view('templates/seller_footer');
	}
	public function login()
	{
		$data['judul'] = 'EVORIA - Login Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/login');
		$this->load->view('templates/seller_footer');
	}
	public function register()
	{
		$data['judul'] = 'EVORIA - Register Penjual';
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/register');
		$this->load->view('templates/seller_footer');
	}
}
