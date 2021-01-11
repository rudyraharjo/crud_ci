<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Model_warga');
		$this->load->helper('cookie');
		$this->load->library('session');
	}

	public function index()
	{
	
		$data['content'] = 'dashboard/dashboard';
		$this->load->view('template/index', $data);
	}

}
