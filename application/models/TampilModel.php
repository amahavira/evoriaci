<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilModel extends CI_Model
{
	public function getKeyword($keyword)
	{
		$queryJasa = "SELECT jasa.*, users.nama_bisnis
		FROM jasa JOIN users
		ON jasa.id_seller = users.id
		WHERE nama LIKE '%$keyword%'";
		return $this->db->query($queryJasa)->result_array();
	}
	public function getTampilVendor($id = NULL)
	{
		$query = $this->db->get_where('users', array('id' => $id))->row();
		return $query;
	}
	public function getTampilInspirasi()
	{
		$queryInspirasi = "SELECT inspirasi.*, users.nama_bisnis, users.alamat, users.medsos
		FROM inspirasi JOIN users
		ON inspirasi.id_seller = users.id
		WHERE users.role_id = 4";
		return $this->db->query($queryInspirasi)->result_array();
	}
	public function getTampilEditInspirasi($id = NULL)
	{
		$query = $this->db->get_where('inspirasi', array('id' => $id))->row();
		return $query;
	}
	public function getEditInspirasi($id = NULL)
	{
		$query = $this->db->get_where('inspirasi', array('id' => $id))->row_array();
		return $query;
	}
	public function getTampilJasa($id = NULL)
	{
		$query = $this->db->get_where('jasa', array('id' => $id))->row();
		return $query;
	}
	public function getEditJasa($id = NULL)
	{
		$query = $this->db->get_where('jasa', array('id' => $id))->row_array();
		return $query;
	}
	public function getTampilPayment($id = NULL)
	{
		$query = $this->db->get_where('pemesanan', array('id' => $id))->row();
		return $query;
	}
}
