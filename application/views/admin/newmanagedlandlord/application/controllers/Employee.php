<?php
class Employee extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
    $this->load->model('Employee_model');
	}
	
	public function EmployeeSection()
	{
	
		$this->load->view('Layout/header');
		$this->load->view('Pages/addemployee');
		$this->load->view('Layout/footer');
	}

	public function add_Employee()
	{									

	          $data=array("emp_fname"=>$this->input->post('emp_fname'),
	             			 "emp_lname"=>$this->input->post('emp_lname'),
	             			 "emp_age"=>$this->input->post('emp_age'),
	             			 "emp_joiningdate"=>$this->input->post('emp_joiningdate'),
	             			 "emp_profileselected"=>$this->input->post('emp_profileselected'),
	             			"emp_paygrade"=>$this->input->post('emp_paygrade'),
				        	"emp_address"=>$this->input->post('emp_address'),
						"emp_contact"=>$this->input->post('emp_contact'));
						

        	    $results=$this->Employee_model->insert_Employee($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Employee  Add Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Employee/EmployeeSection');
		       
	 }

}