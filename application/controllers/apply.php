<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {
	public function index() {
		header('location: /apply/application');		
	}

	public function application() {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		$this->load->model('applymodel');
		@$is_submitted = $this->applymodel->is_submitted($this->session->userdata['id']);

		if($cur_method == 'GET' && $is_submitted == 0) {
			$sidebarList = array(
				"apply/application" => "참가신청"
				);

			
			$applyData = $this->applymodel->getApplyData($this->session->userdata('id'));

			$data = array(
					"title" => "참가신청",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList, "applyData" => $applyData),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			//$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('apply_application'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		} else if($cur_method == 'GET' && $is_submitted == 1) {
			$this->load->helper('url');
			redirect('/apply/complete');
		}

		if($cur_method == 'POST') {
			if($_POST['submitflag'] == 'finalSave') {
				$represent = $_POST['represent'];
				$team = $_POST['team'];
				$product = $_POST['product'];
				$other = $_POST['other'];
				$milestone = $_POST['milestone'];
				//$file_route = $_POST['file'];
				$file_route = 0;
				$apply_id = $_POST['apply_id'];

				$this->applymodel->updateApplyData($represent, $team, $product, $other, $milestone, $file_route, $apply_id, 1);

				$this->load->helper('url');
				redirect('/apply/complete');
			}
			if($_POST['submitflag'] == 'tempSave') {
				$represent = $_POST['represent'];
				$team = $_POST['team'];
				$product = $_POST['product'];
				$other = $_POST['other'];
				$milestone = $_POST['milestone'];
				//$file_route = $_POST['file'];
				$file_route = 0;
				$apply_id = $_POST['apply_id'];

				$this->applymodel->updateApplyData($represent, $team, $product, $other, $milestone, $file_route, $apply_id, 0);

				$this->load->helper('url');
				redirect($_SERVER['HTTP_REFERER']);
			}
		}
	}

	public function complete() {
		$sidebarList = array(
			"apply/application" => "참가신청"
			);

		$this->load->model('applymodel');

		$data = array(
				"title" => "참가신청",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		//$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('apply_complete'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function admin_view($id) {
		if(!$this->session->userdata('is_admin')) {
			redirect('/');
		}

		$sidebarList = array(
			"apply/application" => "참가신청"
			);

		$this->load->model('applymodel');
		$applyData = $this->applymodel->getApplyData($id);

		$data = array(
				"title" => "참가신청",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "applyData" => $applyData),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		//$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('apply_readonly'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function apply_list() {
		if(!$this->session->userdata('is_admin')) {
			redirect('/');
		}

		$sidebarList = array(
			"apply/application" => "참가신청",
			"apply/apply_list" => "신청현황"
			);

		$this->load->model('applymodel');
		$applyList = $this->applymodel->getApplyList();

		$data = array(
				"title" => "참가신청",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "applyList" => $applyList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('apply_list'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}
}
