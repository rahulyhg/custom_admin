<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gp1 extends MY_Controller {

	
	function __construct() {
            parent::__construct();
                   }
    
    public function index()
	{   
		
		$this->load->model('gp1_model');
		$data['current_page'] = 'Dashboard';
		$this->load->view('template/includes/header');
		//$this->load->view('template/includes/menu');
		$this->load->view('template/includes/top-menu');
		$this->load->view('template/user_group_1/dashboard_ug1');
		$this->load->view('template/includes/footer');
	}

}

?>
