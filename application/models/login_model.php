<?php if (! defined('BASEPATH')) exit('No direct script access allowed');


class login_model extends CI_model{

	function __construct() {
           parent::__construct();
         }

         public function validate(){

         	$username=$this->input->post('username');
         	$password=MD5($this->input->post('password'));

             $this->db->select('*');
             $this->db->from('users');
             $this->db->where('username',$username);
             $this->db->where('password',$password);

             $query=$this->db->get();

             if($query->num_rows()==1){
             	$row=$query->row();
             	$data=array(
             		'id'=>$row->id,
             		'user_id'=>$row->username,
             		'user_role'=>$row->user_role,
             		'user_role_id'=>$row->user_role_id,
             		'name'=>$row->name,
             		'user_group'=>$row->user_group,
             		'user_client_type'=>$row->user_client_type,
             		'team_lead'=>$row->team_lead,
             		'hrm'=>$row->hrm,
             		'hr'=>$row->hr,
             		'branch'=>$row->branch,
             		'data_allocate'=>$row->data_allocate,
             		'recruitment'=>$row->recruitment,
             		'tele_group'=>$row->tele_group,
             		'tele_lead'=>$row->tele_lead,
             		'tele_lead_group'=>$row->tele_lead_group,
             		'sales_grp_lead'=>$row->sales_grp_lead,
             		'sales_grp'=>$row->sales_grp,
             		'data_entry'=>$row->data_entry,
             		'customer_service'=>$row->customer_service,
             		'data_entry_team'=>$row->data_entry_team
             		);
             	$this->session->set_userdata($data);
             	return true;
             }
             else{
             	return false;
             }
         }
}
























?>