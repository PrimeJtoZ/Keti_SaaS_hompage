<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start(); //we need to start session in order to access it through CI

class Page extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		//var_dump($this->session->userdata('session_test'));
		//$this->session->set_userdata('session_test', 'egoing');
	}

	//main page
	public function index()
	{
		//if do not login
		if(!$this->session->userdata('is_login')){
			$this->load->helper('url');
			redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page/login');
		}
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
	}
	
	public function login()
	{
		$this->load->view('bt_header');
		$this->load->view('bt_login');
		$this->load->view('bt_footer');
	}
	
	public function authentication()
	{
		$authentication = $this->config->item('authentication');
		if($this->input->post('id') == $authentication['id'] &&
		   $this->input->post('password') == $authentication['password']
		){
			$this->session->set_userdata('is_login', true);
			$this->load->helper('url');
			redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page');
		}else{
			$this->session->set_flashdata('message', 'Login Fail. Please check your id or password');
			$this->load->helper('url');
			redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page/login');
		}
	}
}
