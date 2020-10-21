<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RatingModel extends CI_Model
{
	public function getRating($id)
	{
		$query = "SELECT pemesanan.rating, users.id 
		FROM pemesanan 
		JOIN users ON pemesanan.id_seller = users.id 
		WHERE pemesanan.id_seller = '$id'";

		return $this->db->query($query)->result_array();
	}
	public function getRatingIndex()
	{
		$query = "SELECT pemesanan.rating, users.id 
		FROM pemesanan 
		JOIN users ON pemesanan.id_seller = users.id 
		WHERE pemesanan.id_seller = users.id";

		return $this->db->query($query)->result_array();
	}
}
