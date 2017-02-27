<?php

class common_model extends CI_Model{


		public function  __construct(){
			parent::__construct();

		public function getUserData($data){
			$query=$this->db->query("SELECT id,usename,user_role_id,user_role_name,name,user_group,user_client_type,profile_image,unique_id,
			team_lead,HRM,hr,branch,data_allocate,recruitment,tele,tele_group,tele_lead,tele_lead_group,customer_service,sales_grp_lead,sales_grp,data_entry,data_entry_team,active FROM users WHERE username=?",array($data));

			if ($query->num_rows()){
				return $query->result();
			}
			else{
				return FALSE;
			}
		}
	}
}

?>