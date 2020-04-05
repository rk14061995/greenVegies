<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Admin extends CI_Controller
	 {
	 	function __construct(){

			parent::__construct();
			
			$this->load->model('Login_model');
		}
		
		public function index()
		{
			$this->load->view('admin/Pages/login');
			$this->session->sess_destroy();
		}

		public function login_validate()
		{
			$data=array("email"=>$this->input->post('email'),
						"password"=>base64_encode($this->input->post('password')));

			$result=$this->Login_model->admin_Login($data);
			if($result)
			{
				redirect('Dashboard/viewDashbaord');;
			}
			else
			{
			   
			   $this->session->set_flashdata('msg','Invalid Email Or Password');
				redirect('Login');
			}
		}
		public function logOut(){
			$this->session->sess_destroy();
			redirect('Login-Page');
		}
		public function viewDashbaord()
		{
	// 		
	    	 $data['category_dashboard']=$this->Dashboard_model->category_Detail();
	    	 $data['product_dashboard']=$this->Dashboard_model->product_Detail();
	         $data['feedback_dashboard']=$this->Dashboard_model->feedback_Detail();
	         $data['user_dashboard']=$this->Dashboard_model->user_Detail();
	        
			 $this->load->view('admin/Layout/header');
			
	 	}
	 }

?>