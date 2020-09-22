<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income_model extends CI_Model {

	private $table = 'kas_incomes';

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

}

/* End of file Income_model.php */
/* Location: ./application/models/Income_model.php */