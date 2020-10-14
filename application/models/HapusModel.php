<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HapusModel extends CI_Model
{
	public function hapusJasa($id)
	{
		return $this->db->delete('jasa', ['id' => $id]);
	}
}
