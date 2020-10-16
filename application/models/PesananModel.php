<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesananModel extends CI_Model
{
	// public function getJasaUsers()
	// {
	// 	$query = "SELECT jasa.*, users.*
	// 	FROM jasa JOIN users
	// 	ON jasa.id_seller = users.id";

	// 	return $this->db->query($query)->result_array();
	// }
	public function getPesanan()
	{
		$query = "SELECT * FROM pemesanan";

		return $this->db->query($query)->result_array();
	}
}
