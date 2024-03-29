<?php

class Seller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('KategoriModel');
		$this->load->model('TampilModel');
		$this->load->model('RatingModel');
		$this->load->model('PesananModel');
		$this->load->model('HapusModel');
		$this->load->library('typography');
	}

	public function user()
	{
		$data['judul'] = 'My Profile';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/index', $data);
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
			$this->load->view('templates/seller_header', $data);
			$this->load->view('seller/edit', $data);
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
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;
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
			redirect('seller/user');
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
			$this->load->view('templates/seller_header', $data);
			$this->load->view('seller/changepassword', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$currentPassword = $this->input->post('currentPassword');
			$newPassword = $this->input->post('newPassword1');
			if (!password_verify($currentPassword, $data['user']['password'])) {
				$this->session->set_flashdata('message', '
                <div class="alert alert-danger" role="alert">
                    Wrong current password!
                </div>');
				redirect('seller/changepassword');
			} else {
				if ($currentPassword == $newPassword) {
					$this->session->set_flashdata('message', '
                    <div class="alert alert-danger" role="alert">
                        New password cannot be the same as current password!
                    </div>');
					redirect('seller/changepassword');
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
					redirect('seller/changepassword');
				}
			}
		}
	}

	// Halaman Seller

	public function profile_seller()
	{
		$data['judul'] = 'EVORIA - Profil Penjual';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['rating'] = $this->RatingModel->getRating($data['user']['id']);
		$data['ratings'] = 0; //inisiasi awal agar variabel tersebut bisa dilakukan perhitungan
		$pembagi = 0; //inisiasi awal agar variabel tersebut bisa dilakukan perhitungan (pembagi = jumlah reviewer)

		foreach ($data['rating'] as $r) {
			if ($r['rating'] > 0) {
				$data['ratings'] += floatval($r['rating']); //untuk menjumlahkan semua rating
				$pembagi += 1; //untuk mencari jumlah pembagi selain yg nilai ratingnya 0
			}
		}

		if ($pembagi > 0) {
			$data['ratings'] = round(($data['ratings'] / $pembagi), 1); //untuk error handling ketika tidak ada nilai rating yg lebih dari 0
		}
		$data['pembagi'] = $pembagi; //untuk menampilkan jumlah reviewer ke view

		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/profile', $data);
		$this->load->view('templates/seller_footer');
	}
	public function edit_profile_seller()
	{
		$data['judul'] = 'EVORIA - Edit Profil Penjual';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/edit_profile');
		$this->load->view('templates/seller_footer');
	}

	public function halaman_bisnis()
	{
		$data['judul'] = 'EVORIA - Halaman Bisnis';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('templates/seller_header', $data);
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
			$this->load->view('templates/seller_header', $data);
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
				redirect('seller/tambah_jasa');
			}
		}
	}

	public function tambah_inspiration()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'EVORIA - Tambah Inspirasi';
			$data['user'] = $this->db->get_where('users', ['email' =>
			$this->session->userdata('email')])->row_array();
			$this->load->view('templates/seller_header', $data);
			$this->load->view('seller/tambah_inspirasi');
			$this->load->view('templates/seller_footer');
		} else {

			$config['upload_path'] = './assets/img/inspirasi/';
			$config['allowed_types']        = 'jpeg|jpg|png|PNG';
			$config['max_size']             = 10000;
			$config['max_width']            = 10000;
			$config['max_height']           = 10000;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				echo $this->upload->display_errors();
			} else {
				$gambar = $this->upload->data('file_name');
				$data = [
					'id_seller' => htmlspecialchars($this->input->post('id_seller', true)),
					'nama' => htmlspecialchars($this->input->post('nama', true)),
					'gambar' => $gambar,
					'date_created' => time()
				];
				$this->db->insert('inspirasi', $data);

				$this->session->set_flashdata('message', '
					<div class="alert alert-success" role="alert">
					Data Berhasil Ditambahkan!
					</div>');
				redirect('seller/tambah_inspiration');
			}
		}
	}

	//profile Seller (serangkaian proses edit data)
	public function tampil_edit_jasa($id)
	{
		$data['judul'] = 'Edit Jasa';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori_jasa'] = $this->KategoriModel->getdata();
		$editj = $this->TampilModel->getTampilJasa($id);
		$data['editj'] = $editj;
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/edit_jasa', $data);
		$this->load->view('templates/seller_footer');
	}
	public function tampil_edit_inspirasi($id)
	{
		$data['judul'] = 'Edit Inspirasi';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$editi = $this->TampilModel->getTampilEditInspirasi($id);
		$data['editi'] = $editi;
		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/edit_inspirasi', $data);
		$this->load->view('templates/seller_footer');
	}

	public function edit_inspirasi()
	{
		$data['judul'] = 'Edit Inspirasi';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$id = $this->input->post('id');
		$editi = $this->TampilModel->getEditInspirasi($id);
		$data['editi'] = $editi;

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/seller_header', $data);
			$this->load->view('seller/edit_inspirasi', $data);
			$this->load->view('templates/seller_footer');
		} else {
			$nama = $this->input->post('nama');

			//cek kalau ada gambar baru
			$uploadGambar = $_FILES['gambar']['name'];
			if ($uploadGambar) {
				$config['upload_path'] = './assets/img/inspirasi/';
				$config['allowed_types']        = 'jpeg|jpg|png|PNG';
				$config['max_size']             = 10000;
				$config['max_width']            = 10000;
				$config['max_height']           = 10000;

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('gambar')) {
					$oldFile = $data['editi']['gambar'];
					if ($oldFile != ' ') {
						unlink(FCPATH . '/assets/img/inspirasi/' . $oldFile);
					}
					$newFile = $this->upload->data('file_name');
					$this->db->set('gambar', $newFile);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('nama', $nama);
			$this->db->where('id', $id);
			$this->db->update('inspirasi');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diperbarui!
            </div>');
			redirect('seller/profile_seller');
		}
	}

	public function edit_jasa()
	{
		$data['judul'] = 'Edit Jasa';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori_jasa'] = $this->KategoriModel->getdata();
		$id = $this->input->post('id');
		$editj = $this->TampilModel->getEditJasa($id);
		$data['editj'] = $editj;

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'required|trim');
		$this->form_validation->set_rules('harga', 'Harga', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('syarat', 'Syarat', 'required|trim');
		$this->form_validation->set_rules('id_kategori', 'Kategori', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/seller_header', $data);
			$this->load->view('seller/edit_jasa', $data);
			$this->load->view('templates/seller_footer');
		} else {
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
					if ($oldFile != ' ') {
						unlink(FCPATH . '/assets/img/jasa/' . $oldFile);
					}
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
			$this->db->where('id', $id);
			$this->db->update('jasa');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Data Berhasil Diperbarui!
            </div>');
			redirect('seller/profile_seller');
		}
	}

	public function hapusInspirasi($id)
	{
		$hapusi = $this->TampilModel->getEditInspirasi($id);
		$data['hapusi'] = $hapusi;
		$oldFile = $data['hapusi']['gambar'];
		if ($oldFile != ' ') {
			unlink(FCPATH . '/assets/img/inspirasi/' . $oldFile);
		}
		$this->HapusModel->hapusInspirasi($id);
		redirect('seller/profile_seller');
	}

	public function hapusJasa($id)
	{
		$hapusj = $this->TampilModel->getEditJasa($id);
		$data['hapusj'] = $hapusj;
		$oldFile = $data['hapusj']['gambar'];
		if ($oldFile != ' ') {
			unlink(FCPATH . '/assets/img/jasa/' . $oldFile);
		}
		$this->HapusModel->hapusJasa($id);
		redirect('seller/profile_seller');
	}

	//edit data bisnis
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
			$this->load->view('templates/seller_header', $data);
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
					if ($oldFile != ' ') {
						unlink(FCPATH . '/assets/dokumen/npwp/' . $oldFile);
					}
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
			redirect('seller/profile_seller');
		}
	}

	// Pesanan

	public function pesanan()
	{
		$data['judul'] = 'Halaman Pesanan';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pesanan'] = $this->PesananModel->getPesanan();

		$this->load->view('templates/seller_header', $data);
		$this->load->view('seller/pesanan', $data);
		$this->load->view('templates/profile_footer');
	}

	//Konfirmasi pesanan
	public function konfirmasi()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('pemesanan');

		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Pesanan Dikonfirmasi
            </div>');
		redirect('seller/pesanan');
	}

	public function konfirmasi_bayar()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('pemesanan');

		$this->session->set_flashdata('message', '
		<div class="alert alert-success" role="alert">
		Pembayaran Dikonfirmasi
		</div>');
		redirect('seller/pesanan');
	}

	public function konfirmasi_selesai_seller()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('pemesanan');

		$this->session->set_flashdata('message', '
		<div class="alert alert-success" role="alert">
		Pesanan Telah Selesai
		</div>');
		redirect('seller/pesanan');
	}

	public function batal_seller()
	{
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->db->set('status', $status);
		$this->db->where('id', $id);
		$this->db->update('pemesanan');

		$this->session->set_flashdata('message', '
			<div class="alert alert-danger" role="alert">
				Pesanan Dibatalkan
			</div>');
		redirect('seller/pesanan');
	}
}
