<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
            parent::__construct();
                   }

	
	public function index()
	{
		$this->load->view('login_view');
	}

	public function process()
	{
       $this->load->model('login_model');
       $this->form_validation->set_rules('username','Username','trim|required');
       $this->form_validation->set_rules('password','Password','trim|required');
       $result=$this->login_model->validate();


       if(!$result){

       	 $this->index();
       }
       else{
       	 redirect('Dashboard');
       }
	}
}
