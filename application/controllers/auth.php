<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index() {
		header('location: /auth/login');
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
		if(!$this->session->userdata('is_login')) {

			$cur_method = $_SERVER['REQUEST_METHOD'];

			if($cur_method == 'GET') {
				$sidebarList = array(
					"auth/login" => "LOGIN",
					"auth/join" => "JOIN",
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
				$this->load->view('auth_login'); //바디
				$this->load->view('layout/footer');
				$this->load->view('layout/html_tail');
			}

			if($cur_method == 'POST') {
				$this->load->model('accountmodel');
				$id = $_POST['id'];
				$pw = $_POST['password'];
				$auth = $this->accountmodel->checkAuth($id, $pw);
				$admin = $this->accountmodel->checkAdmin($id);

				if($auth) {
					$this->session->set_userdata('is_login', true);

					if($admin) $this->session->set_userdata('is_admin', true);

					$this->session->set_userdata('id', $this->input->post('id'));
					$this->session->set_flashdata('message', $id.'님 환영합니다.');
					$this->load->helper('url');
					redirect($_SERVER['HTTP_REFERER']);
				} else {
					$this->session->set_flashdata('message', '로그인에 실패 했습니다.');
					$this->load->helper('url');
					redirect('/auth/login');
				}
			}
		} else {
			$this->load->helper('url');
			redirect('/');
		}
	}

	public function join() {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"auth/login" => "LOGIN",
				"auth/join" => "JOIN",
			);

			$data = array(
					"title" => "회원가입",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('auth_join'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$this->load->model('accountmodel');
			$id = $_POST['id'];
			$pw = $_POST['password'];
			$nickname = $_POST['nickname'];

			$callback = $this->accountmodel->adduser($id, $pw, 0, $nickname);

			if($callback != true) {
				$this->load->helper('url');
				redirect('/auth/join');
				exit('회원가입에 실패하였습니다.');
			} else {
				$this->load->helper('url');
				redirect('/auth/login');
				exit('회원가입에 성공하였습니다.');
			}
		}
	}

	public function checkId() {
		$id = $_POST['id'][0];

		$this->load->model('accountmodel');
		$idFlag = $this->accountmodel->checkDupId($id);

		if($idFlag == true) {
			echo '1';
		} else {
			echo '0';
		}
	}

	public function out() {
		$this->session->set_userdata('is_login', false);
		$this->session->set_userdata('is_admin', false);
		$this->session->set_flashdata('message', '로그아웃에 성공했습니다.');
		$this->load->helper('url');
		redirect('/', 'refresh');
	}
}

?>