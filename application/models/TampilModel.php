<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TampilModel extends CI_Model
{
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
}
