<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index() {
		$this->load->model('announcemodel');

		$announceListMain = $this->announcemodel->getAnnounceListMain();

		$data = array(
				"title" => "공지사항",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("announceListMain" => $announceListMain),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('main'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
		
	}
}
