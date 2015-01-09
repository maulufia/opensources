<?php
	Class QuestionModel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }
		
		function getQuestionList() {
			$qry_question = "SELECT id, depth, title, article, substring(reg_date, 1, 10) AS reg_date, author FROM QUESTION WHERE fk_id is NULL";
			
			$query = $this->db->query($qry_question);
			return $query->result_array();
		}

		function getReplyList() {
			$qry_question = "SELECT id, fk_id, depth, title, article, substring(reg_date, 1, 10)AS reg_date, author FROM QUESTION WHERE fk_id is not NULL";
			
			$query = $this->db->query($qry_question);
			return $query->result_array();
		}

		function getQuestionById($qid) {
			$qry_question = "SELECT id, title, substring(reg_date, 1, 10) AS reg_date, author, article, password FROM QUESTION WHERE id=$qid";
			
			$query = $this->db->query($qry_question);
			return $query->result_array();
		}

		function addQuestionById($qid, $title, $content, $author, $password) {
			if($qid == 0) { //새글로 add하는 경우
				$data_question = array(
					"title" => $title,
					"article" => $content,
					"author" => $author,
					"password" => $password
				);

				$this->db->insert('QUESTION', $data_question);
				$result = $this->db->insert_id();

				if($result != null) {
					return true;
				}
			} else { //답글로 add하는 경우
				$qry_count = "SELECT id FROM QUESTION WHERE fk_id=$qid";
				$query = $this->db->query($qry_count);
				$result = $query->result_array($query);
				$count = count($result); //글수를 세서 depth를 결정

				$data_question = array(
					"fk_id" => $qid,
					"title" => $title,
					"depth" => $count + 1,
					"article" => $content,
					"author" => $author,
					"password" => $password
				);

				$this->db->insert('QUESTION', $data_question);
				$result = $this->db->insert_id();
			}
			
		}

		function editQuestionById($nid, $title, $content, $password) {
			$data_question = array(
				"title" => $title,
				"article" => $content,
				"password" => $password
			);

			$this->db->where('id', $nid);
			$this->db->update('QUESTION', $data_question);

			return true;
		}

		function removeQuestionById($qid) {
			$this->db->delete('QUESTION', array('id' => $qid));

			return true;
		}

		function increaseHitsById($nid) {
			$query_org = "SELECT hits FROM ANNOUNCE WHERE id=$nid";
			$query = $this->db->query($query_org);
			$result = $query->result_array($query);

			$data_hits = array(
				"hits" => $result[0]['hits'] + 1,
				);

			$this->db->where('id', $nid);
			$this->db->update('ANNOUNCE', $data_hits);
		}

		function checkFkId($qid) {
			$query_fk = "SELECT id, fk_id FROM QUESTION WHERE id=$qid";
			$query = $this->db->query($query_fk);
			$result = $query->result_array($query);

			return $result;
		}

		function checkPw($qid, $pw) {
			$query_pw = "SELECT id FROM QUESTION WHERE id=$qid && password=$pw";
			$query = $this->db->query($query_pw);
			$result = $query->result_array($query);

			if($result != null) {
				return true;
			} else {
				return false;
			}
		}

	}

?>