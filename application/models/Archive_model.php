<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archive_model extends CI_Model {

	private $table = 'kas_archives';

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

	public function check_collect($date)
	{
		return $this->db->get_where($this->table, ['date' => $date])->row();
	}	

}

/* End of file Archive_model.php */
/* Location: ./application/models/Archive_model.php */