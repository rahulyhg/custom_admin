<?php 

class menu_model extends CI_Model{


public function count_projects($type,$user_id,$user_name){
    if(!$type&& !$user_id && !$user_name){

    	$query=$this->db->query('SELECT * FROM projects');

	 echo $count=$query->num_rows();

    }
    elseif($type && !$user_id && !$user_name ){
    	$query=$this->db->query("SELECT * FROM projects WHERE project_package_type=?",array($type));
         echo $count=$query->num_rows();
    	
    }
    elseif( $type && $user_id && !$user_name ){
       $query=$this->db->query("SELECT * FROM projects WHERE project_package_type = ? AND alloted_to = ? ",array($type,$user_id));
       echo $count=$query->num_rows();
    }
	elseif(!$type && !$user_id && $user_name  ){
	
      $query=$this->db->query("SELECT * FROM projects WHERE project_sales_executive =?",array($user_name));
      echo $count=$query->num_rows();
	}


}
}
   

?>