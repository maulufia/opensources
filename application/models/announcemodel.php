<?php
	Class AnnounceModel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }
		
		function getAnnounceList() {
			$qry_announce = "SELECT id, title, article, substring(reg_date, 1, 10) AS reg_date, hits FROM ANNOUNCE";
			
			$query = $this->db->query($qry_announce);
			return $query->result_array();
		}

		function getAnnounceListMain() {
			$qry_announce = "SELECT id, title, substring(reg_date, 1, 10) AS reg_date FROM ANNOUNCE";
			
			$query = $this->db->query($qry_announce);
			return $query->result_array();
		}

		function getAnnounceById($nid) {
			$qry_announce = "SELECT id, title, substring(reg_date, 1, 10) AS reg_date, hits, article FROM ANNOUNCE WHERE id=$nid";
			
			$query = $this->db->query($qry_announce);
			return $query->result_array();
		}

		function addAnnounceById($nid, $title, $content) {
			$data_announce = array(
				"title" => $title,
				"article" => $content
			);

			$this->db->insert('ANNOUNCE', $data_announce);
			$result = $this->db->insert_id();

			if($result != null) {
				return true;
			}
		}

		function editAnnounceById($nid, $title, $content) {
			$data_announce = array(
				"title" => $title,
				"article" => $content
			);

			$this->db->where('id', $nid);
			$this->db->update('ANNOUNCE', $data_announce);

			return true;
		}

		function removeAnnounceById($nid) {
			$this->db->delete('ANNOUNCE', array('id' => $nid));

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

	}

?>