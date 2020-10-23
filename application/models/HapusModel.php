<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HapusModel extends CI_Model
{
	public function hapusRole($id)
	{
		return $this->db->delete('user_role', ['id' => $id]);
	}

	public function hapusKategori($id)
	{
		return $this->db->delete('kategori_jasa', ['id' => $id]);
	}

	public function hapusMenu($id)
	{
		return $this->db->delete('user_menu', ['id' => $id]);
	}

	public function hapusSubMenu($id)
	{
		return $this->db->delete('user_sub_menu', ['id' => $id]);
	}

	public function hapusInspirasi($id)
	{
		return $this->db->delete('inspirasi', ['id' => $id]);
	}

	public function hapusJasa($id)
	{
		return $this->db->delete('jasa', ['id' => $id]);
	}
}
