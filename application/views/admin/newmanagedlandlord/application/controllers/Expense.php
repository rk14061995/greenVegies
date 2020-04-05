<?php
class Expense extends CI_Controller
{	
	function __construct()
	{
		 parent::__construct();
		 if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		 $this->load->model('Expense_model');
		  $this->load->model('Building_model');
		     $this->load->model('Vendor_model');
		     $this->load->model('Category_model');
		
	}
	public function addExpenseSection()
	{
		 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
		 $data['fetch_vendor']=$this->Vendor_model->fetchVendorData();
		 $data['fetch_category']=$this->Category_model->fetchcategory();
		 $this->load->view('Layout/header');
		 $this->load->view('Pages/add_expense',$data);
		//  $this->load->view('Layout/footer');
	}

	public function addExpenseDetail()
	{
		$data = array();
		        
		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "expense_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/expense_image/';
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
				 																	
	             $data=array("description"=>$this->input->post('desc'),
				        	"building_id"=>$this->input->post('building_id'),
						"vendor_id"=>$this->input->post('payeename'),
						"expense_amount"=>$this->input->post('examount'),
						"expense_date"=>$this->input->post('exdate'),
						"check_no"=>$this->input->post('checkno'),
						"category_id"=>$this->input->post('catname'),
						"expense_repeat"=>$this->input->post('exrepeat'),
						"note"=>$this->input->post('note'),					
						"expense_image"=>$pics);


         	    $results=$this->Expense_model->add_Expensedetails($data);
         	   
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Expense Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Expense/addExpenseSection');

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

	public function viewExpenseData()
	{
		 $data['fetch_expense']=$this->Expense_model->fetchtExpenseData();
		 // print_r($data['fetch_expense']);
		 $this->load->view('Layout/header');
		 $this->load->view('Pages/viewexpense',$data);
		//  $this->load->view('Layout/footer');
	}

	public function editExpenseSection($id)
	  {
	  	 $data['fetch_building']=$this->Building_model->fetchbuildingdata();
		 $data['fetch_vendor']=$this->Vendor_model->fetchVendorData();
		 $data['fetch_category']=$this->Category_model->fetchcategory();
		 $data['Expense_data']=$this->Expense_model->fetchtParticularExpenseData($id);
		 
		$this->load->view('Layout/header');
		$this->load->view('Pages/editexpense',$data);
		// $this->load->view('Layout/footer');
	 
	  }

	  public function UpdateExpenseDetail()
	{
		$data = array();
		        
		  // if($this->input->post() && !empty($_FILES['files']['name']))
		  //   {

		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		  

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "expense_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/expense_image/';
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

		        // if(!empty($uploadData))
		        //  {
    				 $expenseId=$this->input->post('expense_id');  
    				// $building_id_prev=$this->input->post('building_id_prev') 
    				// $newBuild_id=$this->input->post('building_id');	
    				// if($newBuild_id!=0){
    				// 	$builDingId=
    				// }		  				
		             $data=array("description"=>$this->input->post('desc'),
				         "building_id"=>$this->input->post('building_id')	,
						"vendor_id"=>$this->input->post('payeename'),
						"expense_amount"=>$this->input->post('examount'),
						"expense_date"=>$this->input->post('exdate'),
						"check_no"=>$this->input->post('checkno'),
						"category_id"=>$this->input->post('catname'),
						"expense_repeat"=>$this->input->post('exrepeat'),
						"note"=>$this->input->post('note'),					
						"expense_image"=>$pics);


        	     $results=$this->Expense_model->Update_ExpenseInfo($data,$expenseId);
        	 

        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Expense Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Expense/viewExpenseData');

		        // }

		        // else
		        // {
		        // 	echo"error Due to Image";
		        // }
		           
	       // }
		        
		        // else{

		        // 	echo "Try Again ";
		        // }

		   }

	 public function deleteParticularImageFromArrayExepnse()
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

	public function DeleteExpenseData()
	{

		$data=array('expense_id'=>$this->input->post('expense_id'));

		$results=$this->Expense_model->DeleteExpensedata($data);
		die(json_encode($results));

	}

}