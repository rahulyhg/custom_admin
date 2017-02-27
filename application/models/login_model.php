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
             		'user_role_id'=>$row->user_role_id
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