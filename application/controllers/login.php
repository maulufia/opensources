<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index() {
		header('location: /login/login');
		/*
		if(!$this->session->userdata('is_login')) {
			$data = array(
					"title" => "main page",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => "",
					"jsfile" => "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js'></script>",
			//		"todos" => $lines
				);
	
			$this->load->view('admin/layout/h-head', $data);
			//$this->load->view('bodycontent', $data);
			$this->load->view('admin/main');
			$this->load->view('admin/layout/h-foot');
		} else {
			$this->load->helper('url');
			redirect('/admin/news');
		} */
	}

	public function login() {
		$sidebarList = array(
			"1" => "LOGIN",
			"2" => "JOIN",
			"3" => "IDPW SEARCH"
			);

		$data = array(
				"title" => "로그인",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('login_login'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	/*	
	public function auth() {
		$this->load->model('adminmodel');
		$id = $_POST['id'];
		$pw = $_POST['password'];
		$auth = $this->adminmodel->checkAuth($id, $pw);

		if($auth) {
			$this->session->set_userdata('is_login', true);
			$this->session->set_userdata('admin_id', $this->input->post('id'));
			$this->load->helper('url');
			redirect('admin/news');
		} else {
			$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
			$this->load->helper('url');
			redirect('/admin/login');
		}
	}

	function out() {
		$this->session->set_userdata('is_login', false);
		$this->load->helper('url');
		redirect('/');
	} */
}

?>