<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('user_model', 'user');
        $this->ci->load->model('admin_model', 'admin');
	}

	public function login($username, $password)
	{
		$user = $this->ci->user->login($username, $password);
		$admin = $this->ci->admin->login($username, $password);
		if ( !empty($user) ) {
			$session = [
				'bendkasLogin' 	=> true,
				'id'			=> $user->id,
				'nis'			=> $user->nis,
				'no'			=> $user->no,
				'name'			=> $user->name,	
				'gender'		=> $user->gender,	
				'wa'			=> $user->wa,	
				'user_type'		=> $user->user_type,	
				'role'			=> $user->role	
			];
			$this->ci->session->set_userdata($session);
			redirect(site_url('dashboard'),'refresh');
		} elseif ( !empty($admin) ) {
			$session = [
				'bendkasLogin'	=> true,
				'id'			=> $admin->id,
				'username'		=> $admin->username,
				'name'			=> $admin->name
			];
			$this->ci->session->set_userdata($session);
			redirect(site_url('dashboard'),'refresh');
		} else {
			$this->ci->session->set_flashdata('error', 'Username atau Password Salah');
			redirect('login','refresh');
		}
	}

	public function check_login()
	{
		if ( !$this->ci->session->userdata('bendkasLogin') ) {
			$this->ci->session->set_flashdata('warning', 'Anda Belum Login');
			redirect('login','refresh');
		}
	}

	public function logout()
	{
		$this->ci->session->unset_userdata('bendkasLogin');
		$this->ci->session->unset_userdata('id');
		$this->ci->session->unset_userdata('nis');
		$this->ci->session->unset_userdata('no');
		$this->ci->session->unset_userdata('name');
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('gender');
		$this->ci->session->unset_userdata('wa');
		$this->ci->session->unset_userdata('address');
		$this->ci->session->unset_userdata('password');
		$this->ci->session->unset_userdata('user_type');
		$this->ci->session->unset_userdata('role');
		$this->ci->session->unset_userdata('upated_at');

		$this->ci->session->set_flashdata('success', 'Anda Berhasil Logout');
		redirect(site_url('login'),'refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */
