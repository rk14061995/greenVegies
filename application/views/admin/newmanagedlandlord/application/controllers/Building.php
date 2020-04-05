<?php
class Building extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		$this->load->model('Owner_model');
		 $this->load->model('Building_model');
	}
	
	public function addBuildingSection()
	{
		$data['fetch_owner']=$this->Owner_model->fetchownerid();
		 $data['fetchCountries']=$this->Owner_model->fetchCountries();
		 $data['fetch_Amenities']=$this->Building_model->fetchAmenitiesData();
		$this->load->view('Layout/header');
		$this->load->view('Pages/add_building',$data);
		// $this->load->view('Layout/footer');
	}
	public function get_States()
    {
        $data=$this->Building_model->fetchState_Byid($this->input->post('countryid'));
        
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
        $data=$this->Building_model->fetchCities_Byid($this->input->post('stateId'));
        
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

	public function add_building()
	{	
	     $amenities = $this->input->post('amenities');
	     $amenitiesdata=implode(",", $amenities);
	   //  print_r($amenitiesdata);
		if(isset($_POST['buy']))
			{
				$buy=1;
			}
			else
			{
				$buy=0;
			}

		if(isset($_POST['rent']))
			{
				$rent=1;
			}
			else
			{
				$rent=0;
			}

		if(isset($_POST['lease']))
			{
				$lease=1;
			}
			else
			{
				$lease=0;
			}

		// print_r($_POST);
		$data = array();
		        
		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "Building_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/Building_image/';
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
		            $checkpurpose=$this->input->post('checkbox');
		            $purpose_property=implode(',',$checkpurpose);


		        if(!empty($uploadData))
		         {

	             $data=array("address"=>$this->input->post('address'),
	             			 "p_buy"=>$buy,
	             			 "p_rent"=>$rent,
	             			 "p_lease"=>$lease,
	             			 "building_name"=>$this->input->post('buildingname'),
	             			"price"=>$this->input->post('price'),
				        	"owner_id"=>$this->input->post('owner'),
						"number_units"=>$this->input->post('Nunits'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"pincode"=>$this->input->post('zc'),
						"note"=>$this->input->post('note'),
						"latitude"=>$this->input->post('laltitude'),
	             			"longitude"=>$this->input->post('longitude'),
				        	"registration_num"=>$this->input->post('registration'),
						"amenities_id"=>$amenitiesdata,
						"area"=>$this->input->post('area'),
				 		"building_image"=>$pics);
				//  		print_r($data);

        	    $results=$this->Building_model->insert_building($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Building Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Building/addBuildingSection');

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

	 public function ViewBuildingSection()
	{
		 $data['fetch_building']=$this->Building_model->fetchBuilding();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewbuilding',$data);
		// $this->load->view('Layout/footer');
	}

	public function editBuilding($id)
	  {
	  	// $cond=array('building_id'=>$id);
	  	// $data['prev_owner']=$this->Building_model->getOwnerOfParticularBuilding($id);
		 $data['building_data']=$this->Building_model->fetchParticularBuildingData($id);
	  	// $data['edit_owner']=$this->Owner_model->editOwnerForm();
		  $data['fetch_owner']=$this->Owner_model->fetchownerid();
		  $data['fetchCountries']=$this->Building_model->fetchCountries();
		$this->load->view('Layout/header');
		$this->load->view('Pages/editbuilding',$data);
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

	public function UpdateBuildingDetails()
	{// print_r($_POST);
		if(isset($_POST['buy'])==1)
			{
				$buy=1;
				if($_POST['buy']=="")
				{
					$buy=0;
				}
				else
				{
					$buy=1;
				}
			}
			else
			{
				$buy=0;
			}
		if(isset($_POST['rent']))
			{
				$rent=1;
				if($_POST['rent']=="")
				{
					$rent=0;
				}
				else
				{
					$rent=1;
				}
			}
			else
			{
				$rent=0;
			}
		if(isset($_POST['lease']))
			{
				$lease=1;
				if($_POST['lease']=="")
				{
					$lease=0;
				}
				else
				{
					$lease=1;
				}
			}
			else
			{
				$lease=0;
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
		                $_FILES['file']['name']     = "Building_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/Building_image/';
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
    				 $buildId=$this->input->post('building_id');
    				 // $preowner=$this->input->post('prevowner');  				
		            $data=array("address"=>$this->input->post('address'),
	             			 "p_buy"=>$buy,
	             			 "p_rent"=>$rent,
	             			 "p_lease"=>$lease,
	             			"price"=>$this->input->post('price'),
				        	"owner_id"=>$this->input->post('owner'),
						"number_units"=>$this->input->post('Nunits'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"pincode"=>$this->input->post('zc'),
						"note"=>$this->input->post('note'),
						"latitude"=>$this->input->post('laltitude'),
	             			"longitude"=>$this->input->post('longitude'),
				        	"registration_num"=>$this->input->post('registration'),
						"amenities"=>$this->input->post('editor1'),
						"area"=>$this->input->post('area'),
				 		"building_image"=>$pics);


        	     $results=$this->Building_model->Update_BuildingInfo($data,$buildId);
        	 

        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Building Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Building/ViewBuildingSection');

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

	public function DeleteBuilding()
	{

		$data=array('building_id'=>$this->input->post('building_id'));

		$results=$this->Building_model->DeleteBuilding($data);
		die(json_encode($results));

	}
	public function amenitiesSection()
	{
    	$this->load->view('Layout/header');
		$this->load->view('Pages/add_amenities');
		// $this->load->view('Layout/footer');
	    
	}
	public function addAmenities()
	{
	    	if(!empty($_FILES['userfile']['name']))
	    	{   
	       // 	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       // 	$_FILES['file']['name'] = "country_image-".date("Y-m-d-H-i-s").$ext;
                $configg['upload_path'] = 'assets/amenities_image/';
                $configg['allowed_types'] = 'jpg|jpeg|png|gif';
                $configg['file_name'] = $_FILES['userfile']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$configg);
                $this->upload->initialize($configg);
                
                    if($this->upload->do_upload('userfile'))
                    {
                        $uploadData = $this->upload->data();
                        $amenitiespicture =$uploadData['file_name'];
                    }
                    else
                    {
                        $amenitiespicture = '';
                    }
                }
                else{
                	echo"single error";
                }
                     if(!empty($uploadData))
		         {					
	             $data=array("amenities_name"=>$this->input->post('amenities'),
	             			"amenities_image"=>$amenitiespicture,
	             			"amenities_date"=>date('d-m-y'));

        	    $results=$this->Building_model->AddAmenities($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Amenities Add Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

					redirect('Building/amenitiesSection');

		        }

		        else
		        {
		        	echo"error";
		        }
	}
	 public function ViewAmenitiesSection()
	 {
	 	 $data['fetch_Amenities']=$this->Building_model->fetchAmenitiesData();
	 	$this->load->view('Layout/header');
	 	$this->load->view('Pages/view_amenities',$data);
	 	// $this->load->view('Layout/footer');
	 }
	 
	  public function edit_amenities($id)
	  {

	  	// $catid=array('category_id'=>$id);
	   $data['Particular_amenities_data']=$this->Building_model->fetchParticularAmenitiesData($id);
		$this->load->view('Layout/header');
		$this->load->view('Pages/edit_amenities',$data);
		// $this->load->view('Layout/footer');
	 
	  }
// 	 	  public function updateAmenities()
// 	{
// 		// $CatId=$this->input->post('category_id');
// 		 // print_r($CatId);
// 		$condition=array("category_id"=>$this->input->post('category_id'));
// 		// print_r($condition);
// 		$data=array('category_name'=>$this->input->post('category_name'));
// 		// print_r($data);

// 		$results=$this->Category_model->updateCatData($data,$condition);	
// 		if($results==1){
// 			$this->session->set_flashdata('msg','Category Updated Successfully');
// 		}else{
// 			$this->session->set_flashdata('msg','Error');
// 		}
// 		redirect('Category/ViewcategorySection');
// 	}
	 public function DeleteAmenities()
	{

		$data=array('amenities_id'=>$this->input->post('amenities_id'));
		$results=$this->Building_model->DeleteAmenities($data);
		 die(json_encode($results));

	}
	
	public function AmenitiesdeleteParticularImageFromArray()
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
	
	public function UpdateAmenities()
	{
	     

		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		    	 
		  	if(!empty($_FILES['userfile']['name']))
	    	{   
	       // 	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       // 	$_FILES['file']['name'] = "country_image-".date("Y-m-d-H-i-s").$ext;
                $configg['upload_path'] = 'assets/amenities_image/';
                $configg['allowed_types'] = 'jpg|jpeg|png|gif';
                $configg['file_name'] = $_FILES['userfile']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$configg);
                $this->upload->initialize($configg);
                
                    if($this->upload->do_upload('userfile'))
                    {
                        $uploadData = $this->upload->data();
                        $amenitiespicture =$uploadData['file_name'];
                    }
                   
                    else
                    {
                        $amenitiespicture = '';
                    }
                     $arrysmerge=array_merge($amenitiespicture,$converted);
                     print_r($arraymerge);
                }
                else{
                	echo"single error";
                }
                
    //                  if(!empty($uploadData))
		  //       {					
	   //          $data=array("amenities_name"=>$this->input->post('amenities'),
	   //          			"amenities_image"=>$arrysmerge,
	   //          			"amenities_date"=>date('d-m-y'));

    //     	    $results=$this->Building_model->AddAmenities($data);
        	  

    //      	  switch($results) 
				// {
				// 	case 0:$this->session->set_flashdata('msg','Error');
				// 		break;
				// 	case 1:$this->session->set_flashdata('msg','Update Amenities Successfully');
				// 		break;
				// 	case 2:$this->session->set_flashdata('msg','Already exist');
				// 		break;
					
				// 	default:$this->session->set_flashdata('msg','Error');
				// 		break;
				// }

				// 	redirect('Building/amenitiesSection');

		  //      }

		      //  else
		      //  {
		      //  	echo"error";
		      //  }

		           
	       
	}

	 
}