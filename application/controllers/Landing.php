<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Model_warga');
		$this->load->model('M_agama');
		$this->load->model('M_landing');
		$this->load->helper('cookie');

		$this->load->helper('decodedata');

		$this->load->helper('encodedata');

		$this->load->library('session');

		$this->load->helper('captcha');

		$this->load->library('form_validation');

		$this->load->library(array('form_validation', 'session')); 

		$this->load->helper(array('form', 'url')); 

		$this->load->helper('access');
	}

	public function index()
	{
		$this->load->view('landing/index');
	}

	public function detail()
	{
		$id = $this->input->get('q');
		$data['data'] = $this->M_landing->getDetail($id);
		$data['berita'] = $this->M_landing->getBerita();
		$this->load->view('landing/detail-berita',$data);
	}

}
