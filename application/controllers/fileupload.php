<?php
class fileupload extends CI_Controller {

	public function index() {
		$this->load->library('filelib');
		$this->filelib->uploadTemp($_FILES);	
	}

	public function submit_final() {
		$this->load->library('filelib');
		$this->filelib->confirmUpload();

		//temp폴더 삭제해주는 코드
		$this->filelib->removeDir('temp');
	}	
}

?>