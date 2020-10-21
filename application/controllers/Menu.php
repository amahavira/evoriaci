<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();

		$this->load->model('HapusModel');
	}

	public function index()
	{
		$data['judul'] = 'Menu Management';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        New menu added!
                    </div>');
			redirect('menu');
		}
	}

	public function submenu()
	{
		$data['judul'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('MenuModel', 'menu');

		$data['submenu'] = $this->menu->getSubMenu();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '
                    <div class="alert alert-success" role="alert">
                        New sub menu added!
                    </div>');
			redirect('menu/submenu');
		}
	}

	public function editMenu()
	{
		$data['judul'] = 'Menu Management';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$id = $this->input->post('id');
			$menu = $this->input->post('menu');

			$this->db->set('menu', $menu);
			$this->db->where('id', $id);
			$this->db->update('user_menu');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Menu Berhasil Di-Edit
            </div>');
			redirect('menu');
		}
	}

	public function editSubMenu()
	{
		$data['judul'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('users', ['email' =>
		$this->session->userdata('email')])->row_array();

		$this->load->model('MenuModel', 'menu');

		$data['submenu'] = $this->menu->getSubMenu();

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/profile_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/profile_footer');
		} else {
			$id = $this->input->post('id');
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');

			$this->db->set('title', $title);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('url', $url);
			$this->db->set('icon', $icon);
			$this->db->set('is_active', $is_active);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', '
            <div class="alert alert-success" role="alert">
                Sub Menu Berhasil Di-Edit
            </div>');
			redirect('menu/submenu');
		}
	}

	public function hapusMenu($id)
	{
		$this->HapusModel->hapusMenu($id);
		redirect('menu');
	}

	public function hapusSubMenu($id)
	{
		$this->HapusModel->hapusSubMenu($id);
		redirect('menu/submenu');
	}
}
