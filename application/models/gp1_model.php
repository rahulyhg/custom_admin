<?php if(! defined('BASEPATH')) exit ('No direct script access allowed');

class gp1_model extends MY_Model{
	function __construct(){
		parent::__construct();
	}

	

  public function total_projests_count($user_id,$user_name){

  	if($user_id && !$user_name){
  		$query = $this->db->query("SELECT * FROM projects WHERE project_sales_executive_id= ?",array($user_id));
  		echo $count = $query->num_rows();
  	}
  	elseif (!$user_id && $user_name) {
  		$query = $this->db->query("SELECT * FROM projects WHERE project_sales_executive= ?",array($user_name));
  		echo $count = $query->num_rows();
  		
  	}
  	elseif (!$user_id && !$user_name) {
  		$query = $this->db->query("SELECT * FROM projects ");
  		echo $count = $query->num_rows();
  		
  	}
  }

  public function total_clients($client_sales_executive,$user_name){
  	if($client_sales_executive && !$user_name){
  		$query = $this->db->query("SELECT * FROM clients WHERE client_sales_executive=?",array($client_sales_executive));
  		echo $count=$query->num_rows();
  	}
  	elseif(!$client_sales_executive && $user_name){
  		$query=$this->db->query("SELECT * FROM clients WHERE client_sales_executive=?",array($user_name));
  		echo $count = $query->num_rows();

  	}
  	elseif(!$client_sales_executive && !$user_name){
  		$query=$this->db->query("SELECT * FROM clients");
  		echo $count =$query->num_rows();
  	}
  }

public function total_completed($user_id,$user_name){
  	if($user_id && !$user_name){
  		$query = $this->db->query("SELECT * FROM projects WHERE project_status = 'completed'  project_sales_executive_id = ?",array($user_id));
  		echo $count=$query->num_rows();
  	}
  	elseif(!$user_id && $user_name){
  		$query=$this->db->query("SELECT * FROM projects WHERE project_status = 'completed'  project_sales_executive_id=?",array($user_name));
  		echo $count = $query->num_rows();

  	}
  	elseif(!$user_id && !$user_name){
  		$query=$this->db->query("SELECT * FROM projects  WHERE project_status = 'completed'");
  		echo $count =$query->num_rows();
  	}
  }

  public function total_ongoing($user_id,$user_name){
  	if($user_id && !$user_name){
  		$query = $this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing'  project_sales_executive_id = ?",array($user_id));
  		echo $count=$query->num_rows();
  	}
  	elseif(!$user_id && $user_name){
  		$query=$this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing'  project_sales_executive_id=?",array($user_name));
  		echo $count = $query->num_rows();

  	}
  	elseif(!$user_id && !$user_name){
  		$query=$this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing'");
  		echo $count =$query->num_rows();
  		
  	}
  }

  public function get_project(){
  	
  		/*$query = $this->db->query("SELECT project_client_id,project_id,project_title,project_duration FROM projects WHERE project_status='ongoing' ORDER BY project_date_created DESC LIMIT 5 ");
        foreach ($query->result() as $row)
		{
		        $project_client_id = $row->project_client_id;  
		       $project_id = $row->project_id;

		         $query2 =$this->db->query("SELECT client_company_name FROM clients WHERE client_id = '$project_client_id' ");
		        $query_total_count = $this->db->query("SELECT *  FROM milestones WHERE milestones_project_id = '$project_id' ");
		        $query_completed_count = $this->db->query("SELECT * FROM milestones WHERE milestones_project_id = '$project_id' AND milestones_status = 'completed'");
		        // $completed_percentage = $query_completed_count / $query_total_count * 100;
		       return $query;
		       return $query2;
		       return $query_total_count;
		       return $query_completed_count;

		}*/

		$query = $this->db->query("SELECT t1.project_client_id,t1.project_id,t1.project_title,t1.project_duration,t2.client_company_name, t3.* FROM projects t1 LEFT JOIN clients t2 ON t1.project_client_id = t2.client_id LEFT JOIN milestones t3 ON t1.project_id = t3.milestones_project_id AND t3.milestones_status = 'completed' WHERE t1.project_status='ongoing' ORDER BY t1.project_date_created DESC LIMIT 5 ");
		return $query;
        echo $total_count =$query->count_all_results('t3.milestones_id');


  	
  }

  public function latest_project(){}


}


?>