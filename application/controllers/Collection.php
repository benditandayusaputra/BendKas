<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collection extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('collection_model', 'collection');
		$this->load->model('schedule_model', 'schedule');
		$this->load->model('archive_model', 'archive');
		$this->load->model('user_model', 'user');
	}

	public function index()
	{
		$data = [
			'content'	=> 'collection/index',
			'page'		=> 'Penarikan Kas',
			'css'		=> base_url('template/vendor/datatables/dataTables.bootstrap4.min.css'),
			'js'		=> [base_url('template/vendor/datatables/jquery.dataTables.min.js'), base_url('template/vendor/datatables/dataTables.bootstrap4.min.js'), base_url('modules/collection.js')]
		];

		$this->load->view('layouts/app', $data, FALSE);
	}

	public function start()
	{
		$this->session->set_userdata( ['collect' => true] );
		redirect(site_url('collection/collect'));
	}

	public function collect()
	{
		date_default_timezone_set('Asia/Jakarta');

		$check = $this->archive->check_collect(date('Y-m-d'));
		$schedule = $this->schedule->getByDay(date('N'));

		if ( empty($schedule) ) {
			$this->session->set_flashdata('error', 'Sekarang Bukan Jadwalnya Penarikan Kas!!');
			redirect(site_url('collection'));
		} else {
			if ( empty($check) ) {
				if ( $this->session->userdata('collect') == true ) {
					$users = $this->user->index();

					foreach ($users as $user) {
						$data = [
							'users_id'		=> $user->id,
							'amount'		=> $schedule->amount,
							'date'			=> date('Y-m-d'),
							'status_kas'	=> 'Belum'
						];	

						$this->collection->insert($data);
					}

					$data = [
						'content'	=> 'collection/collect',
						'page'		=> 'Penarikan Kas',
						'css'		=> base_url('template/vendor/datatables/dataTables.bootstrap4.min.css'),
						'js'		=> [base_url('template/vendor/datatables/jquery.dataTables.min.js'), base_url('template/vendor/datatables/dataTables.bootstrap4.min.js'), base_url('modules/collect.js')]
					];

					$this->load->view('layouts/app', $data, FALSE);
				} else {
					$this->session->set_flashdata('error', 'Hmm Mau Curang!!');
					redirect(site_url('collection'));
				}

			} else {
				$this->session->set_flashdata('error', 'Anda Telah Melakukan Penarikan!!');
				redirect(site_url('collection'));
			}
		}
	}

	public function finish()
	{
		$this->session->unset_userdata('collect');

		$collections = $this->collection->collectFinish(date('Y-m-d'));
		$userKas = $this->collection->countUserKas(date('Y-m-d'));
		$userNotKas = $this->collection->countUserNotKas(date('Y-m-d'));
		$amount = 0;
		foreach ($collections as $value) {
			$amount = (int)($amount + $value->amount);
		}

		$data = [
			'amount'		=> $amount,
			'user_kas'		=> $userKas,
			'user_not_kas'	=> $userNotKas,
			'date'			=> date('Y-m-d')
		];

		$this->archive->insert($data);

		$this->session->set_flashdata('success', 'Penarikan Kas Selesai');
		redirect(site_url('collection'),'refresh');
	}

	public function update($id)
	{
		if ( $this->input->is_ajax_request() ) {
			$message = ['success' => false, 'errors' => null];
			$data = [
				'status_kas' => 'Sudah',
			];
			$this->collection->update($id, $data);	

			$message['success'] = "Kas Berhasil";

			$this->output->set_content_type('application/json')->set_output(json_encode($message));
		}
	}

	public function get()
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->archive->index()));
		}
	}

	public function getCollect()
	{
		if ( $this->input->is_ajax_request() ) {
			$this->output->set_content_type('application/json')->set_output(json_encode($this->collection->collect(date('Y-m-d'))));
		}
	}

}

/* End of file Collection.php */
/* Location: ./application/controllers/Collection.php */