<?php

class MY_Controller extends CI_Controller{

	public $userdata=null ;

	public function  __construct(){
		parent::__construct();


		$this->load->model('common_model');
		if($this->sesion->id){

			$username=$this->session->user_id;
			$this->$userdata =$this->common_model->getUserData($username);
		}
	}
}
?>