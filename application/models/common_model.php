<?php

class common_model extends CI_Model{


		public function getUserData($data){
			$query=$this->db->query('SELECT id,username,user_role_id,user_role_name,name,user_group,user_client_type,profile_image,unique_id,
			team_lead,HRM,hr,branch,data_allocate,recruitment,tele,tele_group,tele_lead,tele_lead_group,customer_service,sales_grp_lead,sales_grp,data_entry,data_entry_team,active FROM users WHERE username=?',array($data));


			if ($query->num_rows()){
				return $query->result();
			}
			else{
				return FALSE;
			}
		}

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

// end of project_count

public function count_completed_projects($type,$user_id,$user_name){

  if(!$type && !$user_id && !$user_name){
    $query = $this->db->query("SELECT * FROM projects WHERE project_status = 'completed'");
    echo $count=$query->num_rows();
  }

  elseif($type && !$user_id && !$user_name){
    $query =$this->db->query("SELECT * FROM projects WHERE project_status = 'completed' AND project_package_type = ?",array($type));
    echo $count= $query->num_rows();
  }
  elseif($type && $user_id && !$user_name){
    $query=$this->db->query("SELECT * FROM projects WHERE project_status = 'completed' AND project_package_type = ? AND alloted_to = ?",array($type,$user_id));
    echo $count=$query->num_rows();
  }
  elseif(!$type && !$user_id && $user_name){
    $query=$this->db->query("SELECT * FROM projects WHERE  project_status = 'completed' AND project_sales_executive = ? ",              array($user_name));
    echo $count =$query->num_rows();
  }
}

//end of count_completed_projects

public function count_ongoing($type,$user_id,$user_name){
   if(!$type && !$user_id && !$user_name){
    $query = $this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing'");
    echo $count=$query->num_rows();
  }

  elseif($type && !$user_id && !$user_name){
    $query =$this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing' AND project_package_type = ?",array($type));
    echo $count= $query->num_rows();
  }
  elseif($type && $user_id && !$user_name){
    $query=$this->db->query("SELECT * FROM projects WHERE project_status = 'ongoing' AND project_package_type = ? AND alloted_to = ?",array($type,$user_id));
    echo $count=$query->num_rows();
  }
  elseif(!$type && !$user_id && $user_name){
    $query=$this->db->query("SELECT * FROM projects WHERE  project_status = 'ongoing' AND project_sales_executive = ? ",              array($user_name));
    echo $count =$query->num_rows();
  }
 }

  public function count_company($type,$user_id,$user_name){
   if(!$type && !$user_id && !$user_name){
    $query = $this->db->query("SELECT * FROM clients");
     echo $count=$query->num_rows();
    }

  elseif($type && !$user_id && !$user_name){
     $i = 0;
     $query =$this->db->query("SELECT project_client_id FROM projects WHERE  AND project_package_type = ?",array($type));
     foreach ($query->result() as $row)
      {
              $data = $row->project_client_id;
              $query_client=$this->db->query("SELECT * FROM clients WHERE client_id=?",array($data));
              $i+= $count=$query_client->num_rows(); 
      } 
      echo $i;
    
  }
  elseif($type && $user_id && !$user_name){
     $i = 0;
     $query =$this->db->query("SELECT project_client_id FROM projects WHERE  AND project_package_type = ? AND alloted_to = ? ",array($type,$user_id));
     foreach ($query->result() as $row)
      {
              $data = $row->project_client_id;
              $query_client=$this->db->query("SELECT * FROM clients WHERE client_id=?",array($data));
              $i+= $count=$query_client->num_rows(); 
      } 
      echo $i;
  }
  elseif(!$type && !$user_id && $user_name){
    $query=$this->db->query("SELECT * FROM clients WHERE  client_sales_executive = ? ",array($user_name));
    echo $count =$query->num_rows();
  }
 }

	
}

?>