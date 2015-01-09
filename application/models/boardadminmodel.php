<?php
	Class Boardadminmodel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }

	    function getArticleByCategory($category) {
	    	$qry_article = "SELECT article FROM BOARD_ADMIN WHERE category=$category ORDER BY revision desc";

	    	$query = $this->db->query($qry_article);
	    	$result = $query->result_array();

	    	if($result != null) {
	    		return $result;
	    	}
	    }

	    function insertArticle($category, $article) {
	    	$data_article = array(
	    		'category' => $category,
	    		'article' => $article,
	    	);

	    	$this->db->insert('BOARD_ADMIN', $data_article);
			$result = $this->db->insert_id();

			if($result != null) {
				return true;
			}
	    }

	}
?>