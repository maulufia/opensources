<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Filelib {
	public function uploadTemp($files) {
			$this->removeDir('temp');

			if(!is_dir('temp')) {
				mkdir('temp', 0777);
			}
			
			$array_files = array();

			foreach($files as $tempFiles) {
				move_uploaded_file($tempFiles['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/temp/'.$tempFiles['name']); /* temp폴더로 임시 이동 */
				array_push($array_files, '/temp/'.$tempFiles['name']); /* 경로 배열에 저장 */
			}
			echo json_encode($array_files);
			exit();
		}

	public function confirmUpload() {
		/* temp에 있는 파일을 files 디렉토리로 이동 */
		$filehandle = opendir('temp/');
		while($file = readdir($filehandle)) {
			if($file=="."||$file=="..") {continue;}
			rename('temp/'.$file, 'files/'.$file);
		}
	}

	public	function removeDir($path) {
			if(!is_dir($path)) {
				return false;
			}
			$dirs = dir($path);
		    while(false !== ($entry = $dirs->read())) {
		      if(($entry != '.') && ($entry != '..')) {
		         if(is_dir($path.'/'.$entry)) {
		            rmdirAll($path.'/'.$entry);
		         } else {
		            unlink($path.'/'.$entry);
		         }
		       }
		    }
		    $dirs->close();
		    rmdir($path);
		}

	public	function countFiles($dir) {
		  	$dir_count=0;
		  	$file_count=0;

		  	$result=opendir($dir); //opendir함수를 이용해서 디렉토리의 핸들을 얻어옴

		  	// readdir함수를 이용해서 디렉토리에 있는 디렉토리와 파일들의 이름을 배열로 읽어들임 
		  	while($file=readdir($result)) {
		     
		    if($file=="."||$file=="..") {continue;} // file명이 ".", ".." 이면 무시함
		     	$fileInfo = pathinfo($file);
		     	$fileExt = $fileInfo['extension']; // 파일의 확장자를 구함

		     	if (empty($fileExt)){
		        	$dir_count++; // 파일에 확장자가 없으면 디렉토리로 판단하여 dir_count를 증가시킴
		     	} else {
		        	$file_count++;// 파일에 확장자가 있으면 file_count를 증가시킴
		     	}
		   	}

		   	return $file_count;
		}
}