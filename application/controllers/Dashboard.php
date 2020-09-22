<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->model('kas_model', 'kas');
	}

	public function index()
	{
		$data = [
			'content'	=> 'dashboard/index',
			'page'		=> 'Dashboard',
			'kas'		=> $this->kas->index(),
			'user'		=> $this->user->count_user()
		];

		$this->load->view('layouts/app', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */