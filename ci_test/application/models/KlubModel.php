<?php

class KlubModel extends CI_Model
{
	public function get_club()
	{
		return $this->db->get('tbl_club')->result_array();
	}
	public function input_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function input_name($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function multiple_insert($data, $table)
	{
		$this->db->insert_batch($table, $data);
	}

	public function single_insert($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function get_poin($nama)
	{
		$query = $this->db->get_where('tbl_poin', array('nama_club' => $nama));
		return $query->result_array();
	}

	public function update_poin($data, $nama)
	{
		$this->db->where('nama_club', $nama);
		$this->db->update('tbl_poin', $data);
	}

	public function seri($data, $table)
	{
		$this->db->update_batch($table, $data, 'nama_club');
	}
}
