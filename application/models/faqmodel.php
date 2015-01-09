<?php
	Class Faqmodel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }

	    function getFaqList() {
	    	$qry_list = "SELECT * FROM FAQ";

	    	$query = $this->db->query($qry_list);
	    	$result = $query->result_array();

	    	if($result != null) {
	    		return $result;
	    	}
	    }
	}
?>