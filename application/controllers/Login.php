<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

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
       	$this->dashboard();
       }
	}

      public function dashboard()
      {
            
           switch($this->userdata[0]->user_group){
            case "1":
                  redirect('gp1');
                  break;
            case "2":
                  redirect('gp2');
                  break;
            case "3":
                  redirect('user_group_3');
                  break;
            case "4":
                  redirect('user_group_4');
                  break;
            case "5":
                  redirect('user_group_5');
                  break;
            case "6":
                  redirect('user_group_6');
                  break;
            case "7":
                  redirect('user_group_7');
                  break;
            case "9":
                  redirect('user_group_9');
                  break;
            case "10":
                  redirect('user_group_10');
                  break;
            case "11":
                  redirect('user_group_11');
                  break;
            case "12":
                  redirect('user_group_12');
                  break;
      }


      }
}
