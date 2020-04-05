<?php
class Blog extends CI_Controller
{
	function __construct()
	{
	 	parent::__construct();
		if(!$this->session->userdata('login') && $this->uri->segment(2)!="readblog"){
		redirect('Login-Page');
	}
		$this->load->model('Blog_model');	

	}	
	public function addBlogSection()
	{
		// $data['fetch_owner']=$this->Blog_model->insert_blog();
		$data['categories']=$this->db->get('category')->result();
		$this->load->view('Layout/header');
		$this->load->view('Pages/addblog',$data);
		// $this->load->view('Layout/footer');
	}
    public function readblog()
	{
	    $this->db->where('blog_slug',$this->uri->segment(3));
		$data['fetch_blogs_data']=$this->db->get_where('blogs')->result();
	
		 $this->load->view('propertytrack/header');
		$this->load->view('Pages/blogdetail',$data);
		//  $this->load->view('propertytrack/footer');
	}
	public function addBlog()
	{	
		
		$data = array();
		        
		  if(!empty($_FILES['files']['name']))
		    {
		        //  check for duplicate slug
                $this->db->where('blog_slug',$this->input->post('slug'));
                $already=$this->db->get('blogs')->result();
                if($already){
                    $this->session->set_flashdata('msg','Blog slug already exists');
                    	redirect('Blog/addBlogSection');
                }
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "blog_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/blog_image/';
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

	             $data=array(
	                        "category_id"=>$this->input->post('cat_id'),
	                        "blog_name"=>$this->input->post('blogname'),
	             			"blog_content"=>$this->input->post('blogcontent'),
	             			"blog_slug"=>$this->input->post('slug'),
	             			"date"=>date('Y-m-d'),
				 		    "blog_image"=>$pics);

        	    $results=$this->Blog_model->insert_blog($data);
        	  

         	  switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Blog Add Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				 redirect('Blog/addBlogSection');

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

	 public function ViewBlogSection()
	{
		 $data['fetch_blogs']=$this->Blog_model->fetchBlogData();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewblog',$data);
		// $this->load->view('Layout/footer');
	}

	public function editBlog($id)
	  {
	  	
		 $data['particular_blog']=$this->Blog_model->fetchParticularBlogData($id);
		//  print_r( $data['particular_blog']);
		 $data['categories']=$this->db->get('category')->result();
		//  print_r( $data['categories']);
		//  die;
		$this->load->view('Layout/header');
		$this->load->view('Pages/editblog',$data);
		// $this->load->view('Layout/footer');
	 
	  }
	   public function deleteParticularImageFromBlog()
	 {
	 	
	 	$imgIndex=$this->input->post('imgIndex');
	 	$imgString=$this->input->post('imgString');
	 	$imgArray=explode(',',$imgString);
	 	
	 	if(array_splice($imgArray,$imgIndex,1))
	 	{
	 		
	 		$newImageString=implode(',',$imgArray);

	 		die(json_encode(array("code"=>1,"newString"=>$newImageString)));
	 	}
	 	else{
	 		// print_r($imgArray);
	 		die(json_encode(array("code"=>0)));
	 	}
	}

	public function UpdateBlogDetails()
	{

  		 $data = array();
		        
		  if($this->input->post() && !empty($_FILES['files']['name']))
		    {
                
                //  check for duplicate slug
                $this->db->where('blog_id !=',$this->input->post('blog_id'));
                $this->db->where('blog_slug',$this->input->post('slug'));
                $already=$this->db->get('blogs')->result();
                if($already){
                    $this->session->set_flashdata('msg','Blog slug already exists');
                    	redirect('Blog/editBlog/'.$this->input->post('blog_id'));
                }
		    	$imageconvert=$this->input->post('image_string');
		    	$converted=explode(',',$imageconvert);
		  

		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "blog_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/blog_image/';
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
    				 $blogId=$this->input->post('blog_id');   				  				
		             $data=array(
		                    // "category_id"=>$this->input->post('cat_id'),
		                    "blog_name"=>$this->input->post('blogname'),
	             			"blog_content"=>$this->input->post('blogcontent'),
	             			"blog_slug"=>$this->input->post('slug'),
	             			"date"=>date('Y-m-d'),
				 		    "blog_image"=>$pics);

				 		 


        	     $results=$this->Blog_model->Update_BlogInfo($data,$blogId);
        	 
           
        	  switch ($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Blog Updated Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}

				redirect('Blog/ViewBlogSection');

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
		   
	public function DeleteBlog()
	{

		$data=array('blog_id'=>$this->input->post('blog_id'));

		$results=$this->Blog_model->DeleteBlog($data);
		die(json_encode($results));

	}
	 public function ViewUserQuery()
	{
		 $data['fetch_Query']=$this->Blog_model->fetchQuery();
		$this->load->view('Layout/header');
		$this->load->view('Pages/viewuserquery',$data);
		// $this->load->view('Layout/footer');
	}
	

		 
	

}