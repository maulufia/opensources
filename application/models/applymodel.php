<?php
	Class Applymodel extends CI_MODEL {
		 function __construct()
	    {
	        parent::__construct();
	    }

	    function addApplyData($represent, $team, $product, $other, $milestone, $file_route, $apply_id) {
	    	$qry_apply = array(
    			'represent[0]' => @$represent[0],
    			'represent[1]' => @$represent[1],
    			'represent[2]' => @$represent[2],
    			'represent[3]' => @$represent[3],
    			'represent[4]' => @$represent[4],
    			'team[0]' => @$team[0],
    			'team[1]' => @$team[1],
    			'team[2]' => @$team[2],
    			'team[3]' => @$team[3],
    			'product[0]' => @$product[0],
    			'product[1]' => @$product[1],
    			'product[2]' => @$product[2],
    			'product[3]' => @$product[3],
    			'product[4]' => @$product[4],
    			'product[5]' => @$product[5],
    			'product[6]' => @$product[6],
                'product[7]' => @$product[7],
    			'other[0]' => @$other[0],
    			'other[1]' => @$other[1],
    			'other[2]' => @$other[2],
    			'other[3]' => @$other[3],
    			'other[4]' => @$other[4],
    			'other[5]' => @$other[5],
                'milestone[0]' => @$milestone[0],
    			'file' => @$file_route,
                'apply_id' => $apply_id
    		);

    		$this->db->insert('APPLICATION', $qry_apply);

    		$result = $this->db->insert_id();

			if($result != null) {
				return true;
			}
	    }

        function updateApplyData($represent, $team, $product, $other, $milestone, $file_route, $apply_id, $is_submitted) {
            $qry_apply = array(
                'represent[0]' => @$represent[0],
                'represent[1]' => @$represent[1],
                'represent[2]' => @$represent[2],
                'represent[3]' => @$represent[3],
                'represent[4]' => @$represent[4],
                'team[0]' => @$team[0],
                'team[1]' => @$team[1],
                'team[2]' => @$team[2],
                'team[3]' => @$team[3],
                'team[4]' => @$team[4],
                'product[0]' => @$product[0],
                'product[1]' => @$product[1],
                'product[2]' => @$product[2],
                'product[3]' => @$product[3],
                'product[4]' => @$product[4],
                'product[5]' => @$product[5],
                'product[6]' => @$product[6],
                'product[7]' => @$product[7],
                'other[0]' => @$other[0],
                'other[1]' => @$other[1],
                'other[2]' => @$other[2],
                'other[3]' => @$other[3],
                'other[4]' => @$other[4],
                'other[5]' => @$other[5],
                'milestone[0]' => @$milestone[0],
                'file' => @$file_route,
                'finalsubmit' => $is_submitted
            );

            $is_in = $this->getApplyData($apply_id);
            if($is_in == null) {
                $this->addApplyData('','','','','','',$apply_id);
            }

            $this->db->where('apply_id', $apply_id);
            $this->db->update('APPLICATION', $qry_apply);
        }

        function getApplyData($apply_id) {
            $qry_apply = "SELECT * FROM APPLICATION WHERE apply_id='$apply_id'";

            $query = $this->db->query($qry_apply);

            return $query->result_array();
        }

        function getApplyList() {
            //$qry_apply = "SELECT 'id', 'represent[0]' FROM APPLICATION";

            $this->db->select('id, represent[0], represent[1], represent[3], apply_id');

            $query = $this->db->get('APPLICATION');

            return $query->result_array();
        }

        function is_submitted($apply_id) {
            $qry_apply = "SELECT finalsubmit FROM APPLICATION WHERE apply_id='$apply_id'";
            $query = $this->db->query($qry_apply);

            $result = $query->result_array();

            return @$result[0]['finalsubmit'];
        }

	}

?>