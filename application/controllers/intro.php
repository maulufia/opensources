<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intro extends CI_Controller {
	public function index() {
		header('location: /intro/summary');
	}

	public function summary() {
		$sidebarList = array(
			"intro/summary" => "ABOUT",
			"intro/support" => "SPONSOR"
			);

		$this->load->model('boardadminmodel');
		$article = $this->boardadminmodel->getArticleByCategory(0);

		$data = array(
				"title" => "대회소개",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "article" => $article),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('intro_body'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function schedule() {
		$sidebarList = array(
			"intro/summary" => "대회개요",
			"intro/schedule" => "대회일정",
			"intro/award" => "시상내역",
			"intro/support" => "후원기관",
			);

		$this->load->model('boardadminmodel');
		$article = $this->boardadminmodel->getArticleByCategory(1);

		$data = array(
				"title" => "대회소개",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "article" => $article),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('intro_body'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function award() {
		$sidebarList = array(
			"intro/summary" => "대회개요",
			"intro/schedule" => "대회일정",
			"intro/award" => "시상내역",
			"intro/support" => "후원기관",
			);

		$this->load->model('boardadminmodel');
		$article = $this->boardadminmodel->getArticleByCategory(2);

		$data = array(
				"title" => "대회소개",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "article" => $article),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('intro_body'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function support() {
		$sidebarList = array(
			"intro/summary" => "ABOUT",
			"intro/support" => "SPONSOR"
			);

		$this->load->model('boardadminmodel');
		$article = $this->boardadminmodel->getArticleByCategory(3);

		$data = array(
				"title" => "스폰서",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "article" => $article),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('intro_body'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function edit($editParam) {
		if(!$this->session->userdata('is_admin')) {
			$this->load->helper('url');
			redirect('/');
		}

		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"intro/summary" => "ABOUT",
				);

			$this->load->model('boardadminmodel');
			$article = $this->boardadminmodel->getArticleByCategory($editParam);
			
			$data = array(
					"title" => "Edit",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList, "article" => $article),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('editor'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$article = $_POST['content'];

			$this->load->model('boardadminmodel');
			$this->boardadminmodel->insertArticle($editParam, $article);

			$this->load->helper('url');
			redirect('/intro');
		}
	}
}
