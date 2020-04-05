<?php
class Vendor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	// 	if(!$this->session->userdata('login')){
	// 	redirect('Login-Page');
	// }
		$this->load->model('Vendor_model');	
		

	}
	public function addVendorSection()
	{
        $data['GetCountries']=$this->Vendor_model->fetchCountries();
        // print_r( $data['GetCountries']);
		$this->load->view('Layout/header');
		$this->load->view('Pages/add_vendor',$data);
		// $this->load->view('Layout/footer');
	}
	
	 public function get_States()
    {
        $data=$this->Vendor_model->fetchState_Byid($this->input->post('countryid'));
        
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
        $data=$this->Vendor_model->fetchCities_Byid($this->input->post('stateId'));
        
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

	public function addVendor()
	{
	    if(isset($_POST['misc']))
	    {
	        $misc=1;
	    }
	    else
	    {
	        $misc=0;
	    }
	     if(isset($_POST['vinsured']))
	    {
	        $vinsc=1;
	    }
	    else
	    {
	        $vinsc=0;
	    }
		$data = array();

		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "vendor_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/vendor_image/';
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
						"website"=>$this->input->post('website'),
						"address"=>$this->input->post('address'),
					"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zc'),
						"hphone"=>$this->input->post('hc'),
						"wphone"=>$this->input->post('wc'),
						"mobile"=>$this->input->post('mob'),
						"email"=>$this->input->post('email'),
				 		"miscreport"=>$misc,
				 	   "vinsured"=>$vinsc,
						"note"=>$this->input->post('note'),
						"vendor_image"=>$pics);

        	      $results=$this->Vendor_model->addVendorDetail($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Vendor Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Vendor/addVendorSection');

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

	public function ViewVendorDetails()
	{
		$data['Vendor_data']=$this->Vendor_model->fetchVendorData();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewvendor',$data);
		// $this->load->view('Layout/footer');
	}

	public function editVendorSection($id)
	  {
	  	
		 $data['Vendor_data']=$this->Vendor_model->fetchParticularVendorData($id);
		 $data['fetchCountries']=$this->Vendor_model->fetchCountries();
		$this->load->view('Layout/header');
		$this->load->view('Pages/editvendor',$data);
		// $this->load->view('Layout/footer');
	 
	  }


	  public function deleteParticularImageFromArrayVendor()
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

	public function updateVendorDetails()
	{
	    if(isset($_POST['misc'])==1)
	    {
	        $misc=1;
	        if($_POST['misc']=="")
	        {
	            $misc=0;
	        }
	        else
	        {
	            $misc=1;
	        }
	    }
	    else
	    {
	        $misc=0;
	    }
	    
	    if(isset($_POST['vinsured'])==1)
	    {
	        $vinsc=1;
	        if($_POST['vinsured']=="")
	        {
	            $vinsc=0;
	        }
	        else
	        {
	            $vinsc=1;
	        }
	    }
	    else
	    {
	        $vinsc=0;
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
		                $_FILES['file']['name']     = "vendor_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/vendor_image/';
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
    				 $vendorId=$this->input->post('vendor_id');
    				 // print_r($tenantId);
    				  				
		            $data=array("fname"=>$this->input->post('fname'),
				        	"lname"=>$this->input->post('lname'),
						"website"=>$this->input->post('website'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zipcode"=>$this->input->post('zc'),
						"hphone"=>$this->input->post('hc'),
						"wphone"=>$this->input->post('wc'),
						"mobile"=>$this->input->post('mob'),
						"email"=>$this->input->post('email'),
				 		"miscreport"=>$misc,
				 	   "vinsured"=>$vinsc,
						"note"=>$this->input->post('note'),
						"vendor_image"=>$pics);


        	     $results=$this->Vendor_model->Update_VendorInfo($data,$vendorId);
        	 

        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Vendor Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Vendor/ViewVendorDetails');

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

   public function DeleteVendorData()
	{

		$data=array('vendor_id'=>$this->input->post('vendor_id'));

		$results=$this->Vendor_model->DeleteVendordata($data);
		die(json_encode($results));

	}
}