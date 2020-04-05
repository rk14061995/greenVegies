<?php

class Template extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
	// 	if(!$this->session->userdata('login')){
	// 	redirect('Login-Page');
	// }
		 $this->load->model('Template_model');
		
	}

	public function templateSection()
	{

		
		$this->load->view('Layout/header');
		$this->load->view('Pages/addtemplate');
		// $this->load->view('Layout/footer');
	}
	public function addtemplateSection()
	{

		$data=array('etemp_name'=>$this->input->post('tname'),
					'etemp_msg'=>$this->input->post('message'),
					'date'=>date('Y-m-d'));

		$results=$this->Template_model->insert_Template($data);

		switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Template Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Template/templateSection');
	}

	public function viewEmailTemplate()
	{
		$data['Email_template']=$this->Template_model->fetchEmailTemplate();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewemailtemplate',$data);
		// $this->load->view('Layout/footer');
	}

	public function editEmailTemplateById($id)
	{	
    	$data['email_tempdata']=$this->Template_model->editEmailTemplatedata($id);
		$this->load->view('Layout/header');
		$this->load->view('Pages/editemailtemplate',$data);
		// $this->load->view('Layout/footer');

		//die(json_encode($results));



	}

	public function updateEmailTemp()
	{
		$etmpId=$this->input->post('etmp_id');
		print_r($etmp_id);

		$data=array('etemp_name'=>$this->input->post('tname'),
					'etemp_msg'=>$this->input->post('message'),
					'date'=>date('Y-m-d'));
		$results=$this->Template_model->updateEmailData($data,$etmpId);

		 switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Template Updated Successfully');
						break;
					
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}
				redirect('Template/viewEmailTemplate');
	}

	public function deleteEmpTemp()
	{
		$data=array('etmp_id'=>$this->input->post('emtmp_id'));
		$results=$this->Template_model->DeleteEmpTempinfo($data);
		 die(json_encode($results));
	}

}