<?php
class Users extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		
		 $this->load->model('Users_model','Users');
		

	}
	public function UsersDetailSection()
	{
	$data['fetch_users']=$this->Users->fetchusers();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewusers',$data);
		
	}
	public function UsersFeedbackSection()
	{
		$data['fetch_Feedback']=$this->Users->fetchUsersfeedback();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewuserfeedback',$data);
		
	}
	public function UsersReviewsSection()
	{
		$data['fetch_Reviews']=$this->Users->fetchUsersReviews();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewuserreview',$data);
		
	}
}