<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Admin extends CI_Controller
	 {
	 	function __construct(){

			parent::__construct();
			
			$this->load->model('Login_model');
			$this->load->model('Product_model','products');
          $this->load->model('Category_model','Category');
		}
		
		public function index()
		{
			$this->load->view('admin/Pages/login');
			$this->session->sess_destroy();
		}
        public function editProducts(){
            // print_r($_POST);
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

                         $results=$this->products->update_Products($data, $this->input->post('pro_id'));
              

                    if($results==1){
                            die(json_encode(array('status'=>'1','data'=>"Updated Successfully.")));
                    }else{
                            die(json_encode(array('status'=>'0','data'=>"Failed To Update.")));
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
        public function editProductView($id){
            $data['fetch_category']=$this->Category->fetchcategory();
            $data['productDetails']=$this->products->getProductDetial($id);
            $this->load->view('admin/Layout/header');
            $this->load->view('admin/Pages/editProduct',$data);
            // $this->load->view('Layout/footer');
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
	  public function ordersSection(){
       		
            $orderDetail=$this->products->getorders();
       		// print_r($orderDetail);
            // die;
            $productsArr=array();
            $newAr=array();
            foreach ($orderDetail as $key => $value) {
                $value=(array)$value;
                $cart=unserialize($value['cart_details']);
                foreach ($cart as $key_ => $value_) {
                    $product_id=$value_['productId'];
                    // print_r($value_);
                    foreach ($product_id as $id) {
                       // print_r($this->getProductDetail($id));
                        $productsArr[]=(array)$this->getProductDetail($id);
                        // $productsArr[]=array("product_detail"=>$this->getProductDetail($id));
                    }
                    // print_r($value_);
                    // $value_['productId']=$this->getProductDetail($id);
                    // $productsArr[]=array("product_detail"=>$this->getProductDetail($product_id));
                }

                $newAr[]=array_merge($value,array("product_Detail"=>$productsArr));  
            }
           $data['fetchorders']=$newAr;
            // print_r($newAr);
                 
                           // print_r($orderDetail);
            // print_r($productsArr);
       		// die;
       		$this->load->view('admin/Layout/header');
			$this->load->view('admin/Pages/vieworders',$data);
       }
       public function getProductDetail($id){
        return $this->db->where('product_id',$id)->get('crops_')->row();
       }
       public function viewOrderDetails($id)
       {

            $orderDetail=(array)$this->db->where('order_id',$id)->get('orders_')->row();
            
            $cartDetills=unserialize($orderDetail['cart_details']);
            $cart=$cartDetills[0]['productId'];
            $productsArr=array();
            foreach ($cart as $key_ => $value_) {
                $productsArr[]=(array)$this->getProductDetail($value_);

            }
           $newAr[]=array_merge($orderDetail,array("product_Detail"=>$productsArr));
            
           $data['fetchorders']=$newAr;
            $this->load->view('admin/Layout/header');
            $this->load->view('admin/Pages/viewOrderDetails',$data);
       }
	}
