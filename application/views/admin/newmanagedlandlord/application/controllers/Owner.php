<?php
class Owner extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	// 	if(!$this->session->userdata('login')){
	// 	redirect('Login-Page');
	// }
		$this->load->model('Owner_model');
	}

	public function owner_section()
	{
	    $data['fetchCountries']=$this->Owner_model->fetchCountries();
	   // 
		$this->load->view('Layout/header');
		$this->load->view('Pages/add_owner',$data);
		// $this->load->view('Layout/footer');
	}
    public function get_States()
    {
        $data=$this->Owner_model->fetchState_Byid($this->input->post('countryid'));
        
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
        $data=$this->Owner_model->fetchCities_Byid($this->input->post('stateId'));
        
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
    
	public function add_Owner()
	{	

		$data = array();
		        
		  if($this->input->post() && !empty($_FILES['files']['name']))
		    {

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Owner_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/Owner_image/';
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
		            // print_r($pics);

		        if(!empty($uploadData))
		         {
    
		            $data=array("fname"=>$this->input->post('fname'),
						"lname"=>$this->input->post('lname'),
						"email"=>$this->input->post('email'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zip_code"=>$this->input->post('zc'),
						"home_phone"=>$this->input->post('hc'),
				 		"work_phone"=>$this->input->post('wc'),
						"mobile"=>$this->input->post('mob'),
			 			"note"=>$this->input->post('note'),
			            'owner_image'=>$pics);
		         
		           

        	   $results=$this->Owner_model->insert_Owner($data);
        	  // print_r($results);

         	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Owner Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Owner/viewOwner_section');

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

	 public function viewOwner_section()
	  {
	  	$data['viewowner']=$this->Owner_model->fetchownerid();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewowner',$data);
		// $this->load->view('Layout/footer');

	  }

	  public function editOwner($id)
	  {
	  	// $cond=array('owner.owner_id' =>$id);
		 $data['user_data']=$this->Owner_model->fetchParticularOwnerData($id);
// 		 print_r( $data['user_data']);
	  	// $data['edit_owner']=$this->Owner_model->editOwnerForm();
	  	 $data['fetchCountries']=$this->Owner_model->fetchCountries();
		$this->load->view('Layout/header');
		$this->load->view('Pages/editowner',$data);
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

	public function UpdateOwnerDetails()
	{
		$data = array();
		        
		  if($this->input->post() && !empty($_FILES['files']['name']))
		    {

		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		  

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Owner_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/Owner_image/';
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
    				$ownerId=$this->input->post('owner_id');
		            $data=array("fname"=>$this->input->post('fname'),
						"lname"=>$this->input->post('lname'),
						"email"=>$this->input->post('email'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zip_code"=>$this->input->post('zc'),
						"home_phone"=>$this->input->post('hc'),
				 		"work_phone"=>$this->input->post('wc'),
						"mobile"=>$this->input->post('mob'),
			 			"note"=>$this->input->post('note'),
			            'owner_image'=>$pics);
		         
		     
        	   $results=$this->Owner_model->Update_OwnerInfo($data,$ownerId);
        	  // print_r($results);

         	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Owner Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Owner/owner_section');

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

	public function DeleteOwner()
	{

		$data=array('owner_id'=>$this->input->post('owner_id'));

		$results=$this->Owner_model->DeleteOwner($data);
		die(json_encode($results));

	}

	public function totaldataOFOwner()
	{
		$data['Total_Owner_Data']=$this->Owner_model->totalownerdata();
		$this->load->view('Layout/header');
		$this->load->view('Pages/index.php',$data);
		// $this->load->view('Layout/footer');

	}
	   
	


}