<?php
class Category extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 if(!$this->session->userdata('login')){
		redirect('Login-PagecategorySection');
	}
		 $this->load->model('Category_model','Category');	
	}

	public function CategorySection()
	{
		 $this->load->view('admin/Layout/header');
		 $this->load->view('admin/Pages/add_category');
		 // $this->load->view('Layout/footer');
	}

	public function addCategory()
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
                    $picture =$uploadData['file_name'];
                }
                else
                {
                	
                    $picture = '';
                } 
            }else{
            	echo"";
            	
            }
            if(!empty($uploadData))
	        {				
             	$category=$this->input->post('category');
             	$image=$picture ;
			 		   
             	// print_r($image);
             	// die;
             	
             	$results=$this->Category->addCategory($category,$image);
             	if($results==1)
             	{
             		die(json_encode(array('status'=>'1','data'=>$results)));
             	}
             	elseif ($results==2)
	         	 {
	         		die(json_encode(array('status'=>'2','data'=>$results)));
	     		 }
	     		 else
	     		 {
	     		 	die(json_encode(array('status'=>'0','data'=>$results)));
	     		 }
        	  
            
	        }
	        else
	        {
	        	die(json_encode(array('status'=>'3','data'=>'Choose Image')));
	        }

	     
	    

       }	        

	public function ViewcategorySection()
	{
		 $data['fetch_category']=$this->Category->fetchcategory();
		 $this->load->view('admin/Layout/header');
		 $this->load->view('admin/Pages/viewcategory',$data);
		 // $this->load->view('Layout/footer');
	}

	 

	  public function updateCategory()
	{
		// $CatId=$this->input->post('category_id');
		 // print_r($CatId);
		$condition=array("category_id"=>$this->input->post('category_id'));
		// print_r($condition);
		$data=array('category_name'=>$this->input->post('category_name'));
		// print_r($data);

		$results=$this->Category_model->updateCatData($data,$condition);	
		if($results==1){
			$this->session->set_flashdata('msg','Category Updated Successfully');
		}else{
			$this->session->set_flashdata('msg','Error');
		}
		redirect('Category/ViewcategorySection');
	}

	public function DeleteCategory()
	{

		$data=array('id'=>$this->input->post('cat_id'));
		$results=$this->Category_model->DeleteCat($data);
		 die(json_encode($results));

	}

}