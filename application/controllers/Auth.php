<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Auth', 'auth');
	}

	public function index()
	{
		check_is_login();
		$data = array('title' => 'Halaman Login');
		$this->load->view('templates/auth/v_header', $data);
		$this->load->view('auth/v_login', $data);
		$this->load->view('templates/auth/v_footer', $data);
	}

	public function check_login()
	{
		check_is_login();
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			redirect('auth');
		} else {
			$this->auth->login();
		}
	}

	public function logout()
	{
		$this->auth->logout();
	}
}
