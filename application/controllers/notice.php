<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notice extends CI_Controller {
	public function index() {
		header('location: /notice/announce');		
	}

	public function announce() {
		$sidebarList = array(
			"notice/announce" => "NOTICE",
			);

		$this->load->model('announcemodel');

		$announceList = $this->announcemodel->getAnnounceList();

		$data = array(
				"title" => "NOTICE",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "announceList" => $announceList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('notice_announce'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function view($nid) {
		$sidebarList = array(
			"notice/announce" => "NOTICE",
			);

		$this->load->model('announcemodel');

		$announce = $this->announcemodel->getAnnounceById($nid);
		$this->announcemodel->increaseHitsById($nid);

		$data = array(
				"title" => "NOTICE",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "announce" => $announce),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('notice_announce_view'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function write($nid=0) {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"notice/announce" => "NOTICE",
				);

			$this->load->model('announcemodel');

			$announce = $this->announcemodel->getAnnounceById($nid);

			$data = array(
					"title" => "NOTICE",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList, "announce" => $announce),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('notice_announce_write'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$title = $_POST['title'];
			$content = $_POST['content'];

			$this->load->model('announcemodel');

			if($nid == 0) {
				$this->announcemodel->addAnnounceById($nid, $title, $content);
			} else {
				$this->announcemodel->editAnnounceById($nid, $title, $content);
			}

			$this->load->helper('url');
			redirect('/notice/announce');
		}
	}

	public function remove($nid) {
		$this->load->model('announcemodel');
		$this->announcemodel->removeAnnounceById($nid);

		$this->load->helper('url');
		redirect('/notice/announce');
	}
}
