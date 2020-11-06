<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('HapusModel');
	}

	public function index()
	{
		$data['judul'] = 'Dashboard';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->view('templates/profile_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/profile_footer');
	}

	public function usermanagement()
	{
		$data['judul'] = 'User Management';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['pengguna'] = $this->db->get('users')->result_array();

		$this->load->view('templates/profile_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('templates/profile_footer');
	}

	public function role()
	{
		$data['judul'] = 'Role';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$data = [
				'role' => $this->input->post('role')
			];
			$this->db->insert('user_role', $data);
			$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        Role Baru Telah Ditambahkan!
                    </div>');
			redirect('admin/role');
		}
	}

	public function kategori()
	{
		$data['judul'] = 'Kategori';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori_jasa')->result_array();

		$this->form_validation->set_rules('nama', 'Kategori', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kategori', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$data = [
				'nama' => $this->input->post('nama')
			];
			$this->db->insert('kategori_jasa', $data);
			$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        Kategori Baru Telah Ditambahkan!
                    </div>');
			redirect('admin/kategori');
		}
	}

	public function roleAccess($role_id)
	{
		$data['judul'] = 'Role Access';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/profile_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/profile_footer');
	}

	public function changeAccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);
		if ($result->num_rows() < 1) {
			$this->db->insert('user_access_menu', $data);
		} else {
			$this->db->delete('user_access_menu', $data);
		}

		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Akses Telah Dirubah!
            </div>');
	}

	public function editRole()
	{
		$data['judul'] = 'Role';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$id = $this->input->post('id');
			$role = $this->input->post('role');

			$this->db->set('role', $role);
			$this->db->where('id', $id);
			$this->db->update('user_role');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Role Berhasil Di-Edit
            </div>');
			redirect('admin/role');
		}
	}

	public function editKategori()
	{
		$data['judul'] = 'Kategori';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->db->get('kategori_jasa')->result_array();

		$this->form_validation->set_rules('nama', 'Kategori', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('admin/kategori', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');

			$this->db->set('nama', $nama);
			$this->db->where('id', $id);
			$this->db->update('kategori_jasa');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Kategori Berhasil Di-Edit
            </div>');
			redirect('admin/kategori');
		}
	}

	public function hapusRole($id)
	{
		$this->HapusModel->hapusRole($id);
		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Role Berhasil Dihapus
            </div>');
		redirect('admin/role');
	}

	public function hapusKategori($id)
	{
		$this->HapusModel->hapusKategori($id);
		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                kategori Berhasil Dihapus
            </div>');
		redirect('admin/kategori');
	}
	public function hapusUser($id)
	{
		$this->HapusModel->hapusUser($id);
		$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Pengguna Berhasil Dihapus
            </div>');
		redirect('admin/usermanagement');
	}
}
