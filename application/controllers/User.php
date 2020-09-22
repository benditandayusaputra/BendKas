<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'user');
		$this->load->helper('string');
	}

	public function index()
	{
		$data = [
			'content'	=> 'user/index',
			'page'		=> 'Users',
			'css'		=> base_url('template/vendor/datatables/dataTables.bootstrap4.min.css'),
			'js'		=> [base_url('template/vendor/datatables/jquery.dataTables.min.js'), base_url('template/vendor/datatables/dataTables.bootstrap4.min.js'), base_url('modules/user.js')]
		];

		$this->load->view('layouts/app', $data, FALSE);
	}

	public function insert()
	{
		if ( $this->input->is_ajax_request() ) {
			$message = ['success' => false, 'errors' => null];

			$this->form_validation->set_rules('nis', 'NIS', 'required');
			$this->form_validation->set_rules('no', 'Absen', 'required');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('user_type', 'Tipe User', 'required');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$data = [
					'nis'		=> $this->input->post('nis', true),
					'no'		=> $this->input->post('no', true),
					'name'		=> $this->input->post('name', true),
					'gender'	=> $this->input->post('gender', true),
					'password'  => strtoupper(random_string('alnum', 8)),
					'user_type' => $this->input->post('user_type', true),
					'role'		=> 0	
				];

				$this->user->insert($data);	

				$message['success'] = "User Berhasil Di Tambahkan";
			} else {
				$message['errors'] = validation_errors();
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($message));
		}
	}

	public function update()
	{
		if ( $this->input->is_ajax_request() ) {
			$message = ['success' => false, 'errors' => null];

			$this->form_validation->set_rules('id', 'ID', 'required');
			$this->form_validation->set_rules('nis', 'NIS', 'required');
			$this->form_validation->set_rules('no', 'Absen', 'required');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('user_type', 'Tipe User', 'required');
			$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$data = [
					'nis'		=> $this->input->post('nis', true),
					'no'		=> $this->input->post('no', true),
					'name'		=> $this->input->post('name', true),
					'gender'	=> $this->input->post('gender', true),
					'user_type' => $this->input->post('user_type', true)
				];

				$this->user->update($this->input->post('id'), $data);	

				$message['success'] = "User Berhasil Di Edit";
			} else {
				$message['errors'] = validation_errors();
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($message));
		}
	}

	public function edit($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->user->edit($id)));
		}
	}

	public function delete($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$this->user->delete($id);
			$this->output->set_content_type('application/json')->set_output(json_encode("User Berhasil Di Hapus"));
		}
	}

	public function get()
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->user->index()));
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */