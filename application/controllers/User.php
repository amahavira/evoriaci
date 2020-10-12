<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth');
		// }
		is_logged_in();
		$this->load->model('KategoriModel');
		$this->load->model('TampilModel');
		$this->load->library('typography');
	}

	public function index()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('user/index', $data);
		$this->load->view('templates/profile_footer');
	}

	public function edit()
	{
		$data['judul'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('nohp', 'No HP', 'required|trim');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_evoria', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$nohp = $this->input->post('nohp');
			$pekerjaan = $this->input->post('pekerjaan');

			//cek kalau ada gambar baru
			$uploadImage = $_FILES['image']['name'];

			if ($uploadImage) {
				$config['allowed_types'] = 'jpg|png';
				$config['max_size'] = '5000';
				$config['upload_path'] = './assets/img/profile/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('image')) {
					$oldImage = $data['user']['image'];
					if ($oldImage != 'default.png') {
						unlink(FCPATH . 'assets/img/profile/' . $oldImage);
					}
					$newImage = $this->upload->data('file_name');
					$this->db->set('image', $newImage);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->set('nohp', $nohp);
			$this->db->set('pekerjaan', $pekerjaan);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                You profile has been updated!
            </div>');
			redirect('user');
		}
	}

	public function changePassword()
	{
		$data['judul'] = 'Change Password';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[6]|matches[newPassword2]');
		$this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[6]|matches[newPassword1]');

		if ($this->form_validation->run() == false) {
			// $this->load->view('templates/profile_header', $data);
			// $this->load->view('templates/sidebar', $data);
			// $this->load->view('templates/topbar', $data);
			$this->load->view('templates/header_evoria', $data);
			$this->load->view('user/changepassword', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword1');
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Wrong current password!
                </div>');
				redirect('user/changepassword');
			} else {
				if ($currentPassword == $newPassword) {
					$this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!
                    </div>');
					redirect('user/changepassword');
				} else {
					//password sudah ok
					$password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('users');

					$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        Password changed!
                    </div>');
					redirect('user/changepassword');
				}
			}
		}
	}

	public function evoria()
	{
		$data['judul'] = 'EVORIA - Event Organizer';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('templates/carousel_home1');
		$this->load->view('home/index');
		$this->load->view('templates/footer', $data);
	}
	public function inspiration()
	{
		$data['judul'] = 'EVORIA - Inspirasi';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('home/inspiration');
		$this->load->view('templates/footer');
	}
	public function detail($id)
	{
		$data['judul'] = 'EVORIA - Detail';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$tampilj = $this->TampilModel->getTampilJasa($id);
		$data['tampilj'] = $tampilj;
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('templates/carousel_home');
		$this->load->view('home/detail', $data);
		$this->load->view('templates/footer');
	}
	public function payment($id)
	{
		$data['judul'] = 'EVORIA - Pembayaran';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$tampilp = $this->TampilModel->getTampilJasa($id);
		$data['tampilp'] = $tampilp;
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('templates/carousel_home');
		$this->load->view('home/payment', $data);
		$this->load->view('templates/footer');
	}
	public function mou()
	{
		$data['judul'] = 'EVORIA - MOU';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
		$this->load->view('templates/carousel_home');
		$this->load->view('home/mou');
		$this->load->view('templates/footer');
	}
	public function p_seller($id)
	{
		$data['judul'] = 'EVORIA - Penjual';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$tampil = $this->TampilModel->getTampilVendor($id);
		$data['tampil'] = $tampil;
		// $data['seller'] = $this->db->get_where('users', ['role_id' => 4]);

		$this->load->view('templates/header_evoria', $data);
		$this->load->view('home/p_seller', $data);
		$this->load->view('templates/footer');
	}

	// Halaman Seller

	public function profile_seller()
	{
		$data['judul'] = 'EVORIA - Profil Penjual';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/header_evoria', $data);
		$this->load->view('seller/profile');
		$this->load->view('templates/seller_footer');
	}
	public function edit_profile_seller()
	{
		$data['judul'] = 'EVORIA - Edit Profil Penjual';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/header_evoria', $data);
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
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('syarat', 'Syarat', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'EVORIA - Tambah Jasa';
			$data['user'] = $this->db->get_where('users', ['email' =>
			$this->session->userdata('email')])->row_array();
			// $this->load->model('BisnisModel');
			$data['kategori_jasa'] = $this->KategoriModel->getdata();
			// $data['jasa'] = $this->BisnisModel->getJasa();
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
				echo $this->upload->display_errors();
			} else {
				$gambar = $this->upload->data('file_name');
				// $this->input->post('gambar', $gambar);
				$data = [
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'harga' => htmlspecialchars($this->input->post('harga', true)),
					'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
					'syarat' => htmlspecialchars($this->input->post('syarat', true)),
					'gambar' => $gambar,
					'lokasi' => htmlspecialchars($this->input->post('lokasi', true)),
					'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
					'id_seller' => htmlspecialchars($this->input->post('id_seller', true)),
					'date_created' => time()
				];
				$this->db->insert('jasa', $data);

				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Data Berhasil Ditambahkan!
					</div>');
				redirect('user/tambah_jasa');
			}
		}
	}

	public function edit_jasa($id)
	{
		$data['judul'] = 'Edit Jasa';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori_jasa'] = $this->KategoriModel->getdata();
		$editj = $this->TampilModel->getTampilJasa($id);
		$data['editj'] = $editj;

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('syarat', 'Syarat', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_evoria', $data);
			$this->load->view('seller/edit_jasa', $data);
			$this->load->view('templates/seller_footer');
		} else {
			$idj = $this->input->post('id');
			$nama = $this->input->post('nama');
			$lokasi = $this->input->post('lokasi');
			$harga = $this->input->post('harga');
			$deskripsi = $this->input->post('deskripsi');
			$syarat = $this->input->post('syarat');
			$id_kategori = $this->input->post('id_kategori');

			//cek kalau ada gambar baru
			$uploadGambar = $_FILES['gambar']['name'];
			if ($uploadGambar) {
				$config['upload_path'] = './assets/img/jasa/';
				$config['allowed_types']        = 'jpeg|jpg|png|PNG';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$oldFile = $data['editj']['gambar'];
					// 		// if ($oldFile) {
					unlink(FCPATH . '/assets/img/jasa/' . $oldFile);
					// 		// }
					$newFile = $this->upload->data('file_name');
					$this->db->set('gambar', $newFile);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->set('lokasi', $lokasi);
			$this->db->set('harga', $harga);
			$this->db->set('deskripsi', $deskripsi);
			$this->db->set('syarat', $syarat);
			$this->db->set('id_kategori', $id_kategori);
			$this->db->where('id', $idj);
			$this->db->update('jasa');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diperbarui!
            </div>');
			redirect('user/profile_seller');
		}
	}

	public function data_bisnis()
	{
		$data['judul'] = 'Data Tentang Bisnis';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_bisnis', 'Nama Bisnis', 'required|trim');
		$this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('medsos', 'Medsos', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header_evoria', $data);
			$this->load->view('seller/data_bisnis', $data);
			$this->load->view('templates/seller_footer');
		} else {
			$email = $this->input->post('email');
			$nama_bisnis = $this->input->post('nama_bisnis');
			$tentang = $this->input->post('tentang');
			$alamat = $this->input->post('alamat');
			$kota = $this->input->post('kota');
			$medsos = $this->input->post('medsos');

			//cek kalau ada gambar baru
			$uploadNpwp = $_FILES['npwp']['name'];
			if ($uploadNpwp) {
				$config['upload_path'] = './assets/dokumen/npwp/';
				$config['allowed_types']        = 'pdf';
				$config['max_size']             = 10000;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('npwp')) {
					$oldFile = $data['user']['npwp'];
					// 		// if ($oldFile) {
					unlink(FCPATH . '/assets/dokumen/npwp/' . $oldFile);
					// 		// }
					$newFile = $this->upload->data('file_name');
					$this->db->set('npwp', $newFile);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama_bisnis', $nama_bisnis);
			$this->db->set('tentang', $tentang);
			$this->db->set('alamat', $alamat);
			$this->db->set('kota', $kota);
			$this->db->set('medsos', $medsos);
			$this->db->where('email', $email);
			$this->db->update('users');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diperbarui!
            </div>');
			redirect('user/profile_seller');
		}
	}
}
