<?php
class Products extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		
		 $this->load->model('Product_model','products');
		  $this->load->model('Category_model','Category');

	}
	
	public function ProductsSection()
	{
	$data['fetch_category']=$this->Category->fetchcategory();
	$data['fetchCountries']=$this->products->fetchCountries();
		$this->load->view('admin/Layout/header');
		$this->load->view('admin/Pages/add_products',$data);
		// $this->load->view('Layout/footer');
	}
	
	public function get_States()
    {
        $data=$this->products->fetchState_Byid($this->input->post('countryid'));
        
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
        $data=$this->products->fetchCities_Byid($this->input->post('stateId'));
        
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

	public function add_Products()
	{	
		$data = array();
		    if($this->input->post('status')=='on'){
                $status=1;
            }else{
                $status=0;
            }
		  if(!empty($_FILES['files']['name']))
		    {
		         $filesCount = count($_FILES['files']['name']);
		          for($i = 0; $i < $filesCount; $i++)
		           {
		               $ext = pathinfo($_FILES['files']['name'][$i], PATHINFO_EXTENSION);
		                $_FILES['file']['name']     = "products_image-".date("Y-m-d-H-i-s").$i.".".$ext;
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];
		                
		                // File upload configuration
		                $uploadPath = 'assets/products_image/';
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
		            // $checkpurpose=$this->input->post('checkbox');
		            // $purpose_property=implode(',',$checkpurpose);


		        if(!empty($uploadData))
		         {

	             	$data=array("name"=>$this->input->post('name'),
	             			 
	             			 "description"=>$this->input->post('description'),
	             			"price"=>$this->input->post('price'),
				        	"veg_category"=>$this->input->post('veg_category'),
							"quant_type"=>$this->input->post('quant_type'),
							// "country"=>$this->input->post('country'),
							// "city"=>$this->input->post('city'),
							// "state"=>$this->input->post('state'),
							"status"=>$status,
							"discount"=>$this->input->post('discount'),
							"totl_quant"=>$this->input->post('totl_quant'),
					 		"image"=>$pics);
				  		// print_r($data);
				  		// die;

        	   			 $results=$this->products->insert_Products($data);
        	  

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
		        	die(json_encode(array('status'=>'3','data'=>'Try Again')));
		        }
		           
	       }
		        
		        else
		        {

		        	die(json_encode(array('status'=>'3','data'=>'Image Not upload')));
		        }

	 }

	 public function ViewProductSection()
	{
		 $data['fetchProducts']=$this->products->fetchProducts();
		 // print_r($data['fetchProducts']);
		 // die;
		$this->load->view('admin/Layout/header');
		$this->load->view('admin/Pages/viewproducts',$data);
		// $this->load->view('Layout/footer');
	}

	

	public function DeleteProducts()
	{

		$data=array('product_id'=>$this->input->post('product_id'));

		$results=$this->products->DeleteProducts($data);
		die(json_encode($results));

	}
	public function BannerSection()
	{
    	$this->load->view('admin/Layout/header');
		$this->load->view('admin/Pages/add_banner');
		// $this->load->view('Layout/footer');
	    
	}
	public function addBanner()
	{
	    	if(!empty($_FILES['userfile']['name']))
	    	{   
	       // 	$ext = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
	       // 	$_FILES['file']['name'] = "banner_image-".date("Y-m-d-H-i-s").$ext;
                $configg['upload_path'] = 'assets/banner_image/';
                $configg['allowed_types'] = 'jpg|jpeg|png|gif';
                $configg['file_name'] = $_FILES['userfile']['name'];
                
                //Load upload library and initialize configuration
                $this->load->library('upload',$configg);
                $this->upload->initialize($configg);
                
                    if($this->upload->do_upload('userfile'))
                    {
                        $uploadData = $this->upload->data();
                        $banner =$uploadData['file_name'];
                    }
                    else
                    {
                        $banner = '';
                    }
                }
                else{
                	echo"single error";
                }
                 if(!empty($uploadData))
		         {					
		             $data=array("banner_path"=>$banner);

	        	    $results=$this->products->AddBanners($data);
	        	  
					if($results==1)
	             	{
	             		die(json_encode(array('status'=>'1','data'=>'Added')));
	             	}
	             	elseif ($results==2)
		         	 {
		         		die(json_encode(array('status'=>'2','data'=>'Already')));
		     		 }
		     		 else
		     		 {
		     		 	die(json_encode(array('status'=>'0','data'=>'Try Again')));
		     		 }

		       	 }

		        else
		        {
		        	die(json_encode(array('status'=>'0','data'=>'Server Error')));
		        }
	}
	public function ViewBannerSection()
	{
	 	 $data['fetch_banner']=$this->products->fetchBannerData();
	 	$this->load->view('admin/Layout/header');
	 	$this->load->view('admin/Pages/view_banner',$data);
	 	// $this->load->view('Layout/footer');
	}
	 
	 
	public function DeleteBanner()
	{
		$data=array('id'=>$this->input->post('banner_id'));
		$results=$this->products->DeleteBanner($data);
		 die(json_encode($results));
	}
	
	
	

	 
}