<?php
	Class Accountmodel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }
		/*
		function getAdminInfo() {
			$currentadmin = $this->session->userdata('admin_id'); //login.php 컨트롤러에서 admin_id라는 이름으로 userdata에 id를 저장.
			$qry_admininfo = "SELECT id FROM ACCOUNT_ADMIN WHERE user="."'".$currentadmin."'";
			
			$query = $this->db->query($qry_admininfo);
			return $query->result_array();
		}

		function getAuthorFromNews($id) {
			$qry_author = "SELECT S.user FROM ACCOUNT_ADMIN AS S JOIN NEWS C ON S.id = C.ACCOUNT_ADMIN_id WHERE C.id=".$id;

			$query = $this->db->query($qry_author);
			return $query->result_array();
		}
		*/
		function checkAuth($id, $pw) {
			$qry_auth = "SELECT * FROM ACCOUNT WHERE user_id='$id' && user_pw='$pw'";

			$query = $this->db->query($qry_auth);
			$result = $query->result_array();

			if($result != null) {
				return true;
			}
		}

		function checkAdmin($id) {
			$qry_auth = "SELECT * FROM ACCOUNT WHERE user_id='$id' && class='1'";

			$query = $this->db->query($qry_auth);
			$result = $query->result_array();

			if($result != null) {
				return true;
			}
		}

		function checkDupId($id) {
			$qry_id = "SELECT user_id FROM ACCOUNT WHERE user_id='$id'";

			$query = $this->db->query($qry_id);
			$result = $query->result_array();

			if($result != null) {
				return true;
			} else {
				return false;
			}
		}

		function addUser($id, $pw, $class, $nickname) {
			$data_user = array(
				'user_id' => $id,
				'user_pw' => $pw,
				'class' => $class,
				'nickname' => $nickname,
				);

			$this->db->insert('ACCOUNT', $data_user);
			$result = $this->db->insert_id();

			if($result != null) {
				return true;
			}
		}

		function getNicknameByUserId($id) {
			$qry_nn = "SELECT nickname FROM ACCOUNT WHERE user_id='$id'";

			$query = $this->db->query($qry_nn);
			$result = $query->result_array();

			return $result;
		}
		/*
		function insertPw($id, $pw) {
			$query = "UPDATE ACCOUNT_ADMIN SET password=password('$pw') WHERE id=$id";
			
			$this->db->query($query);
		} */
	}

?>