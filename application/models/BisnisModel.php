<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BisnisModel extends CI_Model
{
	public function getJasa()
	{
		// $query = "SELECT * FROM users_bisnis ORDER BY nama ASC";
		$query = "SELECT `jasa`.*, `users`.`id`
                FROM `jasa` JOIN `users`
                ON `jasa`.`id_seller` = `users`.`id`
        ";

		return $this->db->query($query)->result_array();
	}
}
