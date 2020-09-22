<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kas_model extends CI_Model {

	private $table = 'kas';

	public function index()
	{
		return $this->db->get($this->table)->row();
	}

	public function update($id, $data)
	{
		return $this->db->update($this->table, $data, ['id' => $id]);
	}

}

/* End of file Kas_model.php */
/* Location: ./application/models/Kas_model.php */