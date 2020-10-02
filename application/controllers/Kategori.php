<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('KategoriModel');
	}
	public function kategori_latihan()
	{
		$data['kategori_jasa'] = $this->KategoriModel->getdata();
		$this->load->view('seller/tambah_jasa', $data);
	}
}
