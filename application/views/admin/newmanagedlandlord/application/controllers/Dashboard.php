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
// 		 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
// 		 $data['fetch_vendor']=$this->Vendor_model->fetchVendorData();
    	 $data['owner_dashboard']=$this->Dashboard_model->get_OwnerDetail();
    	 $data['building_dashboard']=$this->Dashboard_model->building_Detail();
         $data['Currtenant_dashboard']=$this->Dashboard_model->Curr_tenant_Detail();
         $data['Pasttenant_dashboard']=$this->Dashboard_model->Past_tenant_Detail();
        //  print_r( $data['$Pasttenant_dashboard']);
		 $this->load->view('Layout/header');
		 $this->load->view('Pages/index',$data);
		//  $this->load->view('Layout/footer');
	}



}