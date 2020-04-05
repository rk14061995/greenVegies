<?php

class Tenant extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
	// 	if(!$this->session->userdata('login')){
	// 	redirect('Login-Page');
	// }
		 $this->load->model('Tenant_model');
		 $this->load->model('Building_model');
	}

	public function currentTenantSection()
	{
     $data['fetchCountries']=$this->Tenant_model->fetchCountries();
		$data['fetch_building']=$this->Building_model->fetchbuildingdata();
		$this->load->view('Layout/header');
		$this->load->view('Pages/add_current_tenant',$data);
		// $this->load->view('Layout/footer');
	}
	 public function get_States()
    {
        $data=$this->Tenant_model->fetchState_Byid($this->input->post('countryid'));
        
        // print_r($data);
        if(count($data)>0)
        {
            die(json_encode(array('code'=>1,"data"=>$data)));
        }
        else
        {
             die(json_encode(array('code'=>0,"data"=>"No data Found ")));
        }
    }
    public function get_Cities()
    {
        $data=$this->Tenant_model->fetchCities_Byid($this->input->post('stateId'));
        
        // print_r($data);
        if(count($data)>0)
        {
            die(json_encode(array('code'=>1,"data"=>$data)));
        }
        else
        {
             die(json_encode(array('code'=>0,"data"=>"No data Found ")));
        }
    }
	public function pastTenantSection()
	{
		$data['fetch_building']=$this->Building_model->fetchbuildingdata();
		$this->load->view('Layout/header');
		$this->load->view('Pages/add_past_tenant',$data);
		// $this->load->view('Layout/footer');
	}
	public function add_current_tenant()
	{	
	   
	    if(isset($_POST['tenant_moved_out']))
	    {
	        $tmo=1;
	    }
	    else
	    {
	        $tmo=0;
	    }

		$data = array();
		        
		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "tenant_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/tenant_image/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file'))
		                {
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                $images[]=$_FILES['file']['name'];

		            }
		            $pics=implode(",",$images);
		             
		         

		        if(!empty($uploadData))
		         {
		            
																								
	             $data=array("fname"=>$this->input->post('fname'),
				        	"lname"=>$this->input->post('lname'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
					    "country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zipcode'),
						"home_number"=>$this->input->post('home_number'),
						"work_number"=>$this->input->post('work_number'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
				 		"rent_amount"=>$this->input->post('rent_amount'),
				 	   "payment_type"=>$this->input->post('payment_type'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"move_date"=>$this->input->post('move_date'),
						"lease_startdate"=>$this->input->post('lease_startdate'),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=>$tmo,
				 	    "note"=>$this->input->post('note'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
						"tenant_image"=>$pics);
				// 		print_r($data);

        	    $results=$this->Tenant_model->add_currDetails($data);
        	   // print_r($results);
        	  
    
         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Tenant Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Tenant/currentTenantSection');

		        }

		        else
		        {
		        	echo"error";
		        }
		           
	       }
		        
		        else
		        {

		        	echo "Try Again ";
		        }

	 }



	 public function fetchBuilbyid()
	 {
	 	 $build_id=array('building_id'=>$this->input->post('buildingid'));
	 	
	 	 $results=$this->Building_model->fetchBuild_Byid($build_id);
	 	 die(json_encode($results));

	 	 
	 	
	 }

	 public function add_Past_tenant()
	{	
	     if(isset($_POST['tenant_moved_out']))
	    {
	        $tmo=1;
	    }
	    else
	    {
	        $tmo=0;
	    }


		$data = array();
		        
		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "tenant_past_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/tenant_past_image/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file'))
		                {
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                $images[]=$_FILES['file']['name'];

		            }
		            $pics=implode(",",$images);
		             
		         

		        if(!empty($uploadData))
		         {
																								
	             $data=array("fname"=>$this->input->post('fname'),
				        	"lname"=>$this->input->post('lname'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zipcode'),
						"home_number"=>$this->input->post('home_number'),
						"work_number"=>$this->input->post('work_number'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
				 		"rent_amount"=>$this->input->post('rent_amount'),
				 	   "payment_type"=>$this->input->post('payment_type'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"move_date"=>$this->input->post('move_date'),
						"lease_startdate"=>$this->input->post('lease_startdate'),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=>$tmo,
				 	    "note"=>$this->input->post('note'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
						"tenant_image"=>$pics);

        	    $results=$this->Tenant_model->add_PastDetails($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Tenant Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Tenant/pastTenantSection');

		        }

		        else
		        {
		        	echo"error";
		        }
		           
	       }
		        
		        else
		        {

		        	echo "Try Again ";
		        }

	 }

	  public function ViewCurrentTenantSection()
	  {
		$data['fetch_current_tenantDetails']=$this->Tenant_model->fetchCurrentTenantDetails();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewCurrTenant',$data);
		// print_r($data['fetch_current_tenantDetails']);
		// die;
		// $this->load->view('Layout/footer');
   	}

   	public function editCurrentTenantSection($id)
	  {
	  	// $cond=array('building_id'=>$id);
	  	// $data['prev_owner']=$this->Building_model->getOwnerOfParticularBuilding($id);
		
		 // print_r($data['currentTenant_data']);

	  	// $data['edit_owner']=$this->Owner_model->editOwnerForm();
		 // $data['fetch_owner']=$this->Owner_model->fetchownerid();
		  $data['currentTenant_data']=$this->Tenant_model->fetchParticularCurrentTenantData($id);
		  $data['fetchCountries']=$this->Tenant_model->fetchCountries();
		 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
		$this->load->view('Layout/header');
		$this->load->view('Pages/editcurrenttenant',$data);
		// $this->load->view('Layout/footer');
	 
	  }

	  public function deleteParticularImageFromArray()
	 {
	 	// print_r($_POST);
	 	// echo 'callsed';
	 	$imgIndex=$this->input->post('imgIndex');
	 	$imgString=$this->input->post('imgString');
	 	$imgArray=explode(',',$imgString);
	 	// print_r($imgArray);
	 	if(array_splice($imgArray,$imgIndex,1))
	 	{
	 		// print_r(print_r($imgArray));
	 		$newImageString=implode(',',$imgArray);
	 		die(json_encode(array("code"=>1,"newString"=>$newImageString)));
	 	}
	 	else{
	 		// print_r($imgArray);
	 		die(json_encode(array("code"=>0)));
	 	}
	}

	public function UpdateCurrentTenantDetails()
	{
	    if(isset($_POST['tenant_moved_out'])==1)
	    {
	        $tmo=1;
	        if($_POST['tenant_moved_out']=="")
	        {
	            $tmo=0;
	        }
	        else
	        {
	            $tmo=1;
	        }
	    }
	    else
	    {
	        $tmo=0;
	    }
		$data = array();
		        
		  if($this->input->post() && !empty($_FILES['files']['name']))
		    {

		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		  

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "tenant_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/tenant_image/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file'))
		                {
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                   $images[]=$_FILES['file']['name'];
	                        $arrysmerge=array_merge($images,$converted);
		           }

		            		$pics=implode(",",$arrysmerge);
		          				 // print_r($pics);

		        if(!empty($uploadData))
		         {
    				 $tenantId=$this->input->post('tcurrent_id');
    				  				
		            $data=array("fname"=>$this->input->post('fname'),
				        	"lname"=>$this->input->post('lname'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zipcode'),
						"home_number"=>$this->input->post('home_number'),
						"work_number"=>$this->input->post('work_number'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
				 		"rent_amount"=>$this->input->post('rent_amount'),
				 	   "payment_type"=>$this->input->post('payment_type'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"move_date"=>$this->input->post('move_date'),
						"lease_startdate"=>$this->input->post('lease_startdate'),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=>$tmo,
				 	    "note"=>$this->input->post('note'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
						"tenant_image"=>$pics);
				 		 


        	     $results=$this->Tenant_model->Update_currTenantInfo($data,$tenantId);
        	 

        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Tenant Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Tenant/ViewCurrentTenantSection');

		        }

		        else
		        {
		        	echo"error";
		        }
		           
	       }
		        
		        else{

		        	echo "Try Again ";
		        }

		   }

    public function DeleteCurrentData()
	{

		$data=array('tcurrent_id'=>$this->input->post('currtenant_id'));

		$results=$this->Tenant_model->DeleteCurrdata($data);
		die(json_encode($results));

	}

	 public function ViewpastTenantSection()
	  {
		$data['fetch_past_tenantDetails']=$this->Tenant_model->fetchPastTenantDetails();
		// print_r($data['fetch_past_tenantDetails']);
		// die;
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewpasttenant',$data);
		// $this->load->view('Layout/footer');
   	}

   		public function editPastTenantSection($id)
	  {
	  	// $cond=array('building_id'=>$id);
	  	// $data['prev_owner']=$this->Building_model->getOwnerOfParticularBuilding($id);
// 		 $data['PastTenant_data']=$this->Tenant_model->fetchParticularPastTenantData($id);
		 // print_r($data['currentTenant_data']);

	  	// $data['edit_owner']=$this->Owner_model->editOwnerForm();
		 // $data['fetch_owner']=$this->Owner_model->fetchownerid();

// 		 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
// 		$this->load->view('Layout/header');
// 		$this->load->view('Pages/editpasttenant',$data);
// 		$this->load->view('Layout/footer');
		
		$data['PastTenant_data']=$this->Tenant_model->fetchParticularPastTenantData($id);
		  $data['fetchCountries']=$this->Tenant_model->fetchCountries();
		 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
		$this->load->view('Layout/header');
		$this->load->view('Pages/editpasttenant',$data);
		// $this->load->view('Layout/footer');
	 
	  }

	  public function deleteParticularImageFromArrayPT()
	 {
	 	// print_r($_POST);
	 	// echo 'callsed';
	 	$imgIndex=$this->input->post('imgIndex');
	 	$imgString=$this->input->post('imgString');
	 	$imgArray=explode(',',$imgString);
	 	// print_r($imgArray);
	 	if(array_splice($imgArray,$imgIndex,1))
	 	{
	 		// print_r(print_r($imgArray));
	 		$newImageString=implode(',',$imgArray);
	 		die(json_encode(array("code"=>1,"newString"=>$newImageString)));
	 	}
	 	else{
	 		// print_r($imgArray);
	 		die(json_encode(array("code"=>0)));
	 	}
	}

	public function UpdatePastTenantDetails()
	{
	     if(isset($_POST['tenant_moved_out'])==1)
	    {
	        $tmo=1;
	        if($_POST['tenant_moved_out']=="")
	        {
	            $tmo=0;
	        }
	        else
	        {
	            $tmo=1;
	        }
	    }
	    else
	    {
	        $tmo=0;
	    }
		$data = array();
		        
		  if($this->input->post() && !empty($_FILES['files']['name']))
		    {

		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		  

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "tenant_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/tenant_image/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
		                
		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);
		                
		                // Upload file to server
		                if($this->upload->do_upload('file'))
		                {
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['file_name'] = $fileData['file_name'];
		                    $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
		                }
		                   $images[]=$_FILES['file']['name'];
	                        $arrysmerge=array_merge($images,$converted);
		           }

		            		$pics=implode(",",$arrysmerge);
		          				 // print_r($pics);

		        if(!empty($uploadData))
		         {
    				 $tenantId=$this->input->post('tpast_id');
    				 // print_r($tenantId);
    				  				
		            $data=array("fname"=>$this->input->post('fname'),
				        	"lname"=>$this->input->post('lname'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zipcode'),
						"home_number"=>$this->input->post('home_number'),
						"work_number"=>$this->input->post('work_number'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
				 		"rent_amount"=>$this->input->post('rent_amount'),
				 	   "payment_type"=>$this->input->post('payment_type'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"move_date"=>$this->input->post('move_date'),
						"lease_startdate"=>$this->input->post('lease_startdate'),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=> $tmo,
				 	    "note"=>$this->input->post('note'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
						"tenant_image"=>$pics);
				 		 


        	     $results=$this->Tenant_model->Update_pastTenantInfo($data,$tenantId);
        	 

        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Past Tenant Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Tenant/ViewpastTenantSection');

		        }

		        else
		        {
		        	echo"error";
		        }
		           
	       }
		        
		        else{

		        	echo "Try Again ";
		        }
		 }

    public function DeletePastData()
	{

		$data=array('tpast_id'=>$this->input->post('pasttenant_id'));

		$results=$this->Tenant_model->DeleteCPastdata($data);
		die(json_encode($results));

	}
	
}
