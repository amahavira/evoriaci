<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KategoriModel extends CI_Model
{
	function getdata()
	{
		$query = $this->db->query("SELECT * FROM kategori_jasa ORDER BY nama ASC");
		return $query->result_array();
	}
}
