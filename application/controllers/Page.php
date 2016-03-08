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
		//if(!$this->session->userdata('is_login')){
		//	$this->load->helper('url');
		//	redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page/login');
		//}
		$this->load->view('header');
		$this->load->view('main');
		$this->load->view('footer');
	}
	
	//login page
	public function login()
	{
		$this->load->view('bt_header');
		$this->load->view('bt_login');
		$this->load->view('bt_footer');
	}
	
	//logout
	public function logout()
	{
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page');
	}
	
	//authentication part
	public function authentication()
	{
		//$authentication = $this->config->item('authentication');
		$this->load->model('user_model');
		$user = $this->user_model->getByEmail(array('email'=>$this->input->post('email')));
		if($this->input->post('email') == $user->email &&
		   //$this->input->post('password') == $user->password
		   password_verify($this->input->post('password'), $user->password)
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
	
	public function register()
	{
		$this->load->view('bt_header');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email');
    	$this->form_validation->set_rules('nickname', '닉네임', 'required|min_length[5]|max_length[20]');
    	$this->form_validation->set_rules('password', '비밀번호', 'required|min_length[6]|max_length[30]|matches[re_password]');
    	$this->form_validation->set_rules('re_password', '비밀번호 확인', 'required');
		
		if($this->form_validation->run() === false){
			$this->load->view('bt_register');
		}else{
			if(!function_exists('password_hash')){
				$this->load->helper('password');
			}
			$hash = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
			
			$this->load->model('user_model');
			$this->user_model->add(array(
				'email'=>$this->input->post('email'),
            	'password'=>$hash,
            	'nickname'=>$this->input->post('nickname')
			));
			$this->session->set_flashdata('message', 'Sign Up Success!');
			$this->load->helper('url');
			redirect('https://keti-saas-hompage-maninbalck.c9users.io/index.php/page');
		}
		
		$this->load->view('bt_footer');
	}
}
