<?php
class MY_Controller extends CI_Controller{

	public  $userdata = null;

	public function  __construct(){
		parent::__construct();
            $this->load->library('form_validation');
			$this->load->library('session');
			

			$this->load->helper('form');
			$this->load->helper('cookie');
			$this->load->helper('url');
			$this->load->helper('date');
			$this->load->helper('text');



		$this->load->model('common_model');
		if($this->session->id){

			$username=$this->session->user_id;
			$this->$userdata =$this->common_model->getUserData($username);
		}
	}
	
	public function getID(){
	   return $this->$userdata;
	}
	
}
?>