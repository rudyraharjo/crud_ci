<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_login');
		$this->load->helper('cookie');
		$this->load->library('session');
	}

	public function index()
	{
		
		$this->load->view('login/Login');

	}

	public function login()
	{ 
		
		$form_response = $this->input->post('recaptcha_response');
	    $url = "https://www.google.com/recaptcha/api/siteverify";

	    $secretkey = "6LdfH7AZAAAAAFFlhXsz6awBRGh-bgGZN8jBuz2c";

	    $response = file_get_contents($url."?secret=".$secretkey."&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"]);
		
	    $data = json_decode($response);
		
	    if (isset($data->success) && $data->success=="true") {
	    		$username = $this->input->post("email");
				$password = $this->input->post("password");

		        $pass256 = hash('sha256', $password);
		        $pass512 = hash('sha512', $pass256);

		        
		        $user = $this->model_login->getUser($username, $pass256);

			        if($user) 
			        {
						
						//$checkRole = $this->model_login->checkRole($user[0]->role_id);
						
			        	$sessiondata = array(
		                  'userid' => $user[0]->id,
		                  'name' => $user[0]->name,
						  //'role' => $checkRole->role,
						  'kabupaten' => $user[0]->kabupaten
		                );
						
			        	$this->session->set_userdata($sessiondata);	
				        	$cookie= array(
								'name'   => 'id',
								'value'  => $user[0]->id,
								'expire' => '86500',
		            		);
		        		$this->input->set_cookie($cookie);
		        		redirect('Dashboard');
			        }else{
						
			        	$info['info'] ='<div class="alert alert-warning">
										<button class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
											PERIKSA KEMBALI NAMA PENGGUNA DAN PASSWORD ANDA!
										</div>';
			        	$this->load->view('login/Login', $info);
			        }
	    }else{
	    	$info['info'] ='<div class="alert alert-warning">
										<button class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
											Captcha error!
										</div>';
			        	$this->load->view('login/Login', $info);
	    }

    		  
      	
		       
	}

	public function logout()
  	{
		$this->session->unset_userdata($sessiondata);
		$this->session->sess_destroy();
		delete_cookie('id'); 
		redirect('login');
  	}

}
