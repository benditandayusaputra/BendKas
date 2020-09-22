<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('schedule_model', 'schedule');
		$this->load->helper('string');
	}

	public function index()
	{
		$data = [
			'content'	=> 'schedule/index',
			'page'		=> 'Schedules',
			'css'		=> base_url('template/vendor/datatables/dataTables.bootstrap4.min.css'),
			'js'		=> [base_url('template/vendor/datatables/jquery.dataTables.min.js'), base_url('template/vendor/datatables/dataTables.bootstrap4.min.js'), base_url('modules/schedule.js')]
		];

		$this->load->view('layouts/app', $data, FALSE);
	}

	public function insert()
	{
		if ( $this->input->is_ajax_request() ) {
			$message = ['success' => false, 'errors' => null];

			$this->form_validation->set_rules('day', 'Hari', 'required');
			$this->form_validation->set_rules('amount', 'Jumlah', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$data = [
					'day'		=> $this->input->post('day', true),
					'amount'	=> $this->input->post('amount', true)
				];

				$this->schedule->insert($data);	

				$message['success'] = "Jadwal Berhasil Di Tambahkan";
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

			$this->form_validation->set_rules('day', 'Hari', 'required');
			$this->form_validation->set_rules('amount', 'Jumlah', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$data = [
					'day'		=> $this->input->post('day', true),
					'amount'	=> $this->input->post('amount', true)
				];

				$this->schedule->update($this->input->post('id'), $data);	

				$message['success'] = "Jadwal Berhasil Di Edit";
			} else {
				$message['errors'] = validation_errors();
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($message));
		}
	}

	public function edit($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->schedule->edit($id)));
		}
	}

	public function delete($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$this->schedule->delete($id);
			$this->output->set_content_type('application/json')->set_output(json_encode("Jadwal Berhasil Di Hapus"));
		}
	}

	public function get()
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->schedule->index()));
		}
	}

}

/* End of file Schedule.php */
/* Location: ./application/controllers/Schedule.php */