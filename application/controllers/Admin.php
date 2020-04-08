<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Admin extends CI_Controller
	 {
	 	function __construct(){

			parent::__construct();
			
			$this->load->model('Login_model');
			$this->load->model('Product_model','products');
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
	 	public function webDetails()
		{
			$data['webDetails']=$this->products->WebdetailsData('website_name_logo');
			$this->load->view('admin/Layout/header');
			$this->load->view('admin/Pages/webDetails',$data);
			
	 	}
	 	public function updatewebdetails()
	 	{
	 			if(!empty($_FILES['userfile']['name']))
	    	{    
	       		// $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       		// $_FILES['file']['name'] = "category_image-".date("Y-m-d-H-i-s").$ext;
                $config['upload_path'] = 'assets/category_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['userfile']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('userfile'))
                {
                	
                    $uploadData = $this->upload->data();
                    $logo =$uploadData['file_name'];
                }
                else
                {
                	
                    $logo = '';
                } 
            }
            else{
            	echo"";
            	
            }
            if(!empty($uploadData))
	        {	       			
             	$data=array('logo_'=>$logo,
             				'website_name'=>$this->input->post('wname'),
             				'contact_no'=>$this->input->post('contact'),
             				'address_'=>$this->input->post('address'),
             				'email_'=>$this->input->post('email'),
             				'business_time'=>$this->input->post('btime'),
             				'about_'=>$this->input->post('about'),
             				'tag_line'=>$this->input->post('tagline'),
             				'currency_'=>$this->input->post('currency'));

             	$results=$this->products->Update_webInfo($data);
             	if($results==1)
             	{
             		die(json_encode(array('status'=>'1','data'=>$results)));
             	}
             	
	     		 else
	     		 {
	     		 	die(json_encode(array('status'=>'0','data'=>$results)));
	     		 }
        	  
            
	        }
	        else
	        {
	        	$data=array('website_name'=>$this->input->post('wname'),
             				'contact_no'=>$this->input->post('contact'),
             				'address_'=>$this->input->post('address'),
             				'email_'=>$this->input->post('email'),
             				'business_time'=>$this->input->post('btime'),
             				'about_'=>$this->input->post('about'),
             				'tag_line'=>$this->input->post('tagline'),
             				'currency_'=>$this->input->post('currency'));
     
             	$results=$this->products->Update_webInfo($data);
             	if($results==1)
             	{
             		die(json_encode(array('status'=>'1','data'=>$results)));
             	}
             	
	     		 else
	     		 {
	     		 	die(json_encode(array('status'=>'0','data'=>$results)));
	     		 }
	        }
       }
       public function QRsection()
       {
       	$this->load->view('admin/Layout/header');
			$this->load->view('admin/Pages/qrcode');
       }
       public function AddQRCode()
	 	{
	 			if(!empty($_FILES['userfile']['name']))
	    	{    
	       		// $ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       		// $_FILES['file']['name'] = "category_image-".date("Y-m-d-H-i-s").$ext;
                $config['upload_path'] = 'assets/category_image/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['userfile']['name'];
                //Load upload library and initialize configuration
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('userfile'))
                {
                	
                    $uploadData = $this->upload->data();
                    $qr_img =$uploadData['file_name'];
                }
                else
                {
                	
                    $qr_img = '';
                } 
            }
            else{
            	echo"";
            	
            }
            if(!empty($uploadData))
	        {	       			
             	$data=array('qr_img'=>$qr_img,
             				);

             	$results=$this->products->AddQRimage($data);
             	if($results==1)
             	{
             		die(json_encode(array('status'=>'1','data'=>$results)));
             	}
             	
	     		 else
	     		 {
	     		 	die(json_encode(array('status'=>'0','data'=>$results)));
	     		 }
        	  
            
	        }	
	        else
	        {
	        	die(json_encode(array('status'=>'2','data'=>$results)));
	        }
	
	 }
	  public function ordersSection()
       {
       		$data['fetchorders']=$this->products->getorders();
       		// print_r($data['fetchorders']);
       		// die;
       		$this->load->view('admin/Layout/header');
			$this->load->view('admin/Pages/vieworders');
       }
	}
