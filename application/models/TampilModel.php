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
		// $this->db->select('*');
		// $this->db->from('jasa');
		// $this->db->like('nama', $keyword);
		// return $this->db->get()->result_array();
	}
	public function getTampilVendor($id = NULL)
	{
		$query = $this->db->get_where('users', array('id' => $id))->row();
		return $query;
	}
	public function getTampilJasa($id = NULL)
	{
		$query = $this->db->get_where('jasa', array('id' => $id))->row();
		return $query;
	}
	public function getTampilPayment($id = NULL)
	{
		$query = $this->db->get_where('pemesanan', array('id' => $id))->row();
		return $query;
	}
	public function getEditJasa($id = NULL)
	{
		$query = $this->db->get_where('jasa', array('id' => $id))->row_array();
		return $query;
	}
}
