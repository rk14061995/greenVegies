<?php
class Dashboard extends CI_Controller
{	
	function __construct()
	{
		 parent::__construct();
		  if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		     $this->load->model('Dashboard_model');
		
	}
	public function viewDashbaord()
	{
// 		
    	 $data['category_dashboard']=$this->Dashboard_model->category_Detail();
    	 $data['product_dashboard']=$this->Dashboard_model->product_Detail();
         $data['feedback_dashboard']=$this->Dashboard_model->feedback_Detail();
         $data['user_dashboard']=$this->Dashboard_model->user_Detail();
        
		 $this->load->view('admin/Layout/header');
		 $this->load->view('admin/Pages/index',$data);
	}



}