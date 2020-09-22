<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule_model extends CI_Model {

	private $table = 'kas_schedules';

	public function index()
	{
		$this->db->order_by('day', 'asc');
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

	public function getByDay($day)
	{
		return $this->db->get_where($this->table, ['day' => $day])->row();
	}

}

/* End of file Schedule_model.php */
/* Location: ./application/models/Schedule_model.php */