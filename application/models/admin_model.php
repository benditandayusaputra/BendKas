<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	private $table = 'admin';

	public function login($username, $password)
	{
		return $this->db->get_where($this->table, ['username' => $username, 'password' => sha1($password)])->row();
	}

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */