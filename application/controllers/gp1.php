<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gp1 extends MY_Controller {



	function __construct() {
            parent::__construct();
                   }
    
    public function index()
	{   
		
		$this->load->model('gp1_model');
		$data['get_project'] = $this->gp1_model->get_project('');
		$data['current_page'] = 'Dashboard';
		$this->load->view('template/includes/header',$data);
		$this->load->view('template/includes/menu',$data);
		$this->load->view('template/includes/top-menu');
		$this->load->view('template/user_group_1/dashboard_ug1');
		$this->load->view('template/includes/footer');
	}

	public function add_project()
	{
		// $this->load->model('gp1_model');
		$data['current_page'] = 'Add Project';
		$this->load->view('template/includes/header',$data);
		$this->load->view('template/includes/menu',$data);
		$this->load->view('template/includes/top-menu');
		$this->load->view('template/add_project');
		$this->load->view('template/includes/footer');
	}

	public function addnewclient(){
		$data['current_page'] = 'Add Company';
		$this->load->view('template/includes/header',$data);
		$this->load->view('template/includes/menu',$data);
		$this->load->view('template/includes/top-menu');
		$this->load->view('template/addnewclient_view');
		$this->load->view('template/includes/footer');
	}
}

?>
