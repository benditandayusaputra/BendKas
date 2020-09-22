<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spending extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('spending_model', 'spending');
		$this->load->model('kas_model', 'kas');
		$this->load->helper('string');
	}

	public function index()
	{
		$data = [
			'content'	=> 'spending/index',
			'page'		=> 'Pengeluaran Kas',
			'css'		=> base_url('template/vendor/datatables/dataTables.bootstrap4.min.css'),
			'js'		=> [base_url('template/vendor/datatables/jquery.dataTables.min.js'), base_url('template/vendor/datatables/dataTables.bootstrap4.min.js'), base_url('modules/spending.js')]
		];

		$this->load->view('layouts/app', $data, FALSE);
	}

	public function insert()
	{
		if ( $this->input->is_ajax_request() ) {
			$message = ['success' => false, 'errors' => null];

			$this->form_validation->set_rules('amount', 'Jumlah', 'required');
			$this->form_validation->set_rules('explanation', 'Keterangan', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$data = [
					'amount'		=> $this->input->post('amount', true),
					'explanation'	=> $this->input->post('explanation', true),
					'date'			=> date('Y-m-d')
				];

				$this->spending->insert($data);	

				$kas = $this->kas->index();

				$object = [
					'amount'	=> (int)($kas->amount - $this->input->post('amount')),
					'spending'	=> $this->input->post('amount'), 
				];

				$this->kas->update(1, $object);

				$message['success'] = "Pengeluaran Kas Berhasil Di Tambahkan";
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

			$this->form_validation->set_rules('amount', 'Jumlah', 'required');
			$this->form_validation->set_rules('explanation', 'Keterangan', 'required');
			$this->form_validation->set_message('required', '%s Harus Di Isi');

			if ( $this->form_validation->run() ) {
				$kas = $this->kas->index();
				$spending = $this->spending->edit($this->input->post('id'));
				$amount = (int)(($kas->amount + $spending->amount) - $this->input->post('amount'));

				$object = [
					'amount'	=> $amount,
					'spending'	=> $this->input->post('amount'), 
				];

				$this->kas->update(1, $object);

				$data = [
					'amount'		=> $this->input->post('amount', true),
					'explanation'	=> $this->input->post('explanation', true),
					'date'			=> date('Y-m-d')
				];

				$this->spending->update($this->input->post('id'), $data);	

				$message['success'] = "Pengeluaran Kas Berhasil Di Edit";
			} else {
				$message['errors'] = validation_errors();
			}

			$this->output->set_content_type('application/json')->set_output(json_encode($message));
		}
	}

	public function edit($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->spending->edit($id)));
		}
	}

	public function delete($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$kas = $this->kas->index();
			$spending = $this->spending->edit($id);
			$object = [
				'amount'	=> (int)($kas->amount + $spending->amount),
				'spending'	=> $spending->amount, 
			];
			$this->spending->delete($id);
			$this->output->set_content_type('application/json')->set_output(json_encode("Pengeluaran Kas Berhasil Di Hapus"));
		}
	}

	public function get()
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->spending->index()));
		}
	}

}

/* End of file Spending.php */
/* Location: ./application/controllers/Spending.php */