<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qna extends CI_Controller {
	public function index() {
		header('location: /qna/faq');		
	}

	public function faq() {
		$sidebarList = array(
			"qna/faq" => "FAQ"
			);

		$this->load->model('faqmodel');
		$faqList = $this->faqmodel->getFaqList();

		$data = array(
				"title" => "FAQ",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "faqList" => $faqList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('qna_faq'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function question() {
		if(!$this->session->userdata('is_login') == true) {
			$this->load->helper('url');
			redirect('/auth/login');
			exit("로그인 후 이용해주세요.");
		}
		$sidebarList = array(
			"qna/question" => "질문하기",
			"qna/faq" => "FAQ"
			);

		$this->load->model('questionmodel');
		$questionList = $this->questionmodel->getQuestionList();
		$replyList = $this->questionmodel->getReplyList();

		$data = array(
				"title" => "질문하기",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "questionList" => $questionList, "replyList" => $replyList),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('qna_question'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function preQues($qid) {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"qna/question" => "질문하기",
				"qna/faq" => "FAQ"
				);

			$this->load->model('questionmodel');

			$data = array(
					"title" => "질문하기",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('qna_pw'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$pw = $_POST['password'];

			$this->load->model('questionmodel');
			if($this->questionmodel->checkPw($qid, $pw)) {
				$this->load->helper('url');
				redirect('/qna/view/'.$qid);
			} else {		
				$this->load->helper('url');
				redirect('/qna/preques/'.$qid, 'GET');

			}
		}
	}

	public function view($qid) {
		$sidebarList = array(
			"qna/question" => "질문하기",
			"qna/faq" => "FAQ"
			);

		$this->load->model('questionmodel');
		$question = $this->questionmodel->getQuestionById($qid);
		$question_fk = $this->questionmodel->checkFkId($qid);
		$originalId;

		if($question_fk[0]['fk_id'] == NULL) {
			$originalId = $question_fk[0]['id'];
		} else {
			$originalId = $question_fk[0]['fk_id'];
		}

		$data = array(
				"title" => "질문하기",
				"heading" => "",
				"messge" => "",
				"result" => "",
				"items" => array("sidebarList" => $sidebarList, "question" => $question, "originalId" => $originalId),
				"jsfile" => "",
			);

		$this->load->view('layout/html_head', $data);
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar'); //사이드바
		$this->load->view('qna_question_view'); //바디
		$this->load->view('layout/footer');
		$this->load->view('layout/html_tail');
	}

	public function write($qid=0) {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"qna/question" => "질문하기",
				"qna/faq" => "FAQ"
			);

			$this->load->model('questionmodel');

			$question = $this->questionmodel->getQuestionById($qid);

			$data = array(
					"title" => "NOTICE",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList, "question" => $question),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('qna_question_write'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$password = $_POST['password'];

			$this->load->model('accountmodel');
			$author_raw = $this->accountmodel->getNicknameByUserId($this->session->userdata('id'));
			$author = $author_raw[0]['nickname'];

			$this->load->model('questionmodel');

			if($qid == 0) { //새로쓰는경우
				$this->questionmodel->addQuestionById($qid, $title, $content, $author, $password);
			} else { //edit하는경우
				$this->questionmodel->editQuestionById($qid, $title, $content, $author, $password);
			}

			$this->load->helper('url');
			redirect('/qna/question');
		}
	}

	public function reply($rid) {
		$cur_method = $_SERVER['REQUEST_METHOD'];

		if($cur_method == 'GET') {
			$sidebarList = array(
				"qna/question" => "질문하기",
				"qna/faq" => "FAQ"
			);

			$this->load->model('questionmodel');

			$data = array(
					"title" => "질문하기",
					"heading" => "",
					"messge" => "",
					"result" => "",
					"items" => array("sidebarList" => $sidebarList),
					"jsfile" => "",
				);

			$this->load->view('layout/html_head', $data);
			$this->load->view('layout/header');
			$this->load->view('layout/sidebar'); //사이드바
			$this->load->view('qna_question_reply'); //바디
			$this->load->view('layout/footer');
			$this->load->view('layout/html_tail');
		}

		if($cur_method == 'POST') {
			$title = $_POST['title'];
			$content = $_POST['content'];
			$password = $_POST['password'];

			$this->load->model('accountmodel');
			$author_raw = $this->accountmodel->getNicknameByUserId($this->session->userdata('id'));

			$author = $author_raw[0]['nickname'];

			$this->load->model('questionmodel');

			$this->questionmodel->addQuestionById($rid, $title, $content, $author, $password);

			$this->load->helper('url');
			redirect('/qna/question');
		}
	}

	public function remove($qid) {
		$this->load->model('questionmodel');
		$this->announcemodel->removeQuestionById($qid);

		$this->load->helper('url');
		redirect('/qna/question');
	}
}
