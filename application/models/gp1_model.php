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




	

}


?>