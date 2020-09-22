<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection_model extends CI_Model {

	private $table = 'kas_collections';

	public function index()
	{
		return $this->db->get($this->table)->result();		
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function edit($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function update($id, $data)
	{
		return $this->db->update($this->table, $data, ['id' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete($this->table, ['id' => $id]);
	}

	public function countUserKas($date)
	{
		$this->db->select('COUNT(id) AS jumlah');
		return $this->db->get_where($this->table, ['date' => $date, 'status_kas' => 'Sudah'])->row()->jumlah;	
	}

	public function countUserNotKas($date)
	{
		$this->db->select('COUNT(id) AS jumlah');
		return $this->db->get_where($this->table, ['date' => $date, 'status_kas' => 'Belum'])->row()->jumlah;	
	}

	public function collect($date)
	{
		$this->db->select('kas_collections.*, users.name');
		$this->db->join('users', 'kas_collections.users_id = users.id', 'left');
		return $this->db->get_where($this->table, ['date' => $date])->result();
	}	

	public function collecting($date)
	{
		$this->db->select('kas_collections.*, users.name');
		$this->db->join('users', 'kas_collections.users_id = users.id', 'left');
		return $this->db->get_where($this->table, ['date' => $date, 'status_kas' => 'Sudah'])->result();
	}

}

/* End of file Collection_model.php */
/* Location: ./application/models/Collection_model.php */