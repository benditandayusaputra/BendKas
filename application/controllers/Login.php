<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');
		$this->form_validation->set_message('required', '%s Harus Di Isi');

		if ( $this->form_validation->run() ) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->auth->login($username, $password);
 		} else {
			$this->load->view('login/index', null, FALSE);
		}
	}

	public function logout()
	{
		$this->auth->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */