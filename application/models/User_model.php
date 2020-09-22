<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	private $table = 'users';

	public function index()
	{
		$this->db->order_by('no', 'asc');
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

	public function count_user()
	{
		$this->db->select('COUNT(id) as amount');
		return $this->db->get($this->table)->row()->amount;		
	}

	public function login($username, $password)
	{
		return $this->db->get_where($this->table, ['username' => $username, 'password' => $password])->row();
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */