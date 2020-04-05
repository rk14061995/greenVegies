<?php

class PropertTrack extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
     $this->load->model('Owner_model');
     $this->load->model('Building_model');
     $this->load->model('Blog_model');
      $this->load->model('Property_model');
  }

  public function index()
  {
    $data['fetch_building_data']=$this->Building_model->fetchBuilding();
    $data['fetch_building_Asending']=$this->Building_model->sortbyascending();
     $data['fetch_building_Descending']=$this->Building_model->sortbydescending();
     $data['fetch_countries']=$this->Building_model->fetchCountries();
    // print_r($data['fetch_building_data']);
    $data['buildings']=$this->db->get('building')->result();
    $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    $data['categories']=$this->db->get('category')->result();
	    foreach($data['categories'] as &$cat){
	        $cat->blogs=$this->db->get_where('blogs',array('category_id'=>$cat->category_id))->result();
	    }
    //$data['fetch_blogs_data']=$this->Blog_model->fetchBlogData();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/index',$data);
    $this->load->view('propertytrack/footer');
  } 
  public function error404(){
      $this->load->view('propertytrack/error404');
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

  public function registrationForUsers()
  {
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/register');
    $this->load->view('propertytrack/footer');
  }

  public function Login()
  {
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/login');
    $this->load->view('propertytrack/footer');
  }



  public function ViewParticularproperty($id)
  {
   $data['fetch_particular_property']=$this->Building_model->fetchParticularBuildingData($id);
   $data['All_Review_Data']=$this->Building_model->fetchReviewByBuilding($id);
  $newpp= $data['fetch_particular_property'];

    $AmnArryDetails=array();
      $amntsdataready=$newpp[0]->buildamenities;
      $amntsArr=explode(",",$amntsdataready);
      foreach($amntsArr as $amn){
        //   print_r($amn);
        if(count($details=$this->getAmentyDetails($amn))>0){
            $AmnArryDetails[]=$details;
        }
          
      }
      $data['ameDetails']=$AmnArryDetails;

    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/property_details',$data);
    $this->load->view('propertytrack/footer');
  }
  public function ViewParticularproperty_($id)
  {
   $data['fetch_particular_property']=$this->Building_model->fetchParticularBuildingData($id); 
  $newpp= $data['fetch_particular_property'];

    $AmnArryDetails=array();
      $amntsdataready=$newpp[0]->buildamenities;
      $amntsArr=explode(",",$amntsdataready);
      foreach($amntsArr as $amn){
        //   print_r($amn);
        if(count($details=$this->getAmentyDetails($amn))>0){
            $AmnArryDetails[]=$details;
        }
          
      }
      $data['ameDetails']=$AmnArryDetails;

    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/property_details_backUp',$data);
    $this->load->view('propertytrack/footer');
  }
    public function getAmentyDetails($amnt_id){
        $this->db->where('amenities_id',$amnt_id);
        return $this->db->get('amenities')->result();
    }
  public function ViewBlogdata()
  {
    $data['fetch_blog']=$this->Blog_model->fetchBlogData(); 
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/blog',$data);
    $this->load->view('propertytrack/footer');
  }

  public function ViewParticularBlog($id)
  {
    $data['fetch_particular_blog']=$this->Blog_model->fetchParticularBlogData($id); 
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/blog',$data);
    $this->load->view('propertytrack/footer');
  }

  public function ViewSaleData()
  {
   
    $data['fetch_BuyBuilding_Data']=$this->Building_model->fetchBuyBuildingdata();
     $data['fetch_BuyBuilding_Ascending']=$this->Building_model->fetchBuyBuildingAscending();
      $data['fetch_BuyBuilding_Descending']=$this->Building_model->fetchBuyBuildingDescending();
     $data['fetch_building_Asending']=$this->Building_model->sortbyascending();
     $data['fetch_building_Descending']=$this->Building_model->sortbydescending();
     $data['buildings']=$this->db->get('building')->result();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/buy',$data);
    $this->load->view('propertytrack/footer');
  }

  public function ViewRentData()
  {
       $data['fetch_rentBuilding_Ascending']=$this->Building_model->fetchrentBuildingAscending();
      $data['fetch_rentBuilding_Descending']=$this->Building_model->fetchrentBuildingDescending();
    $data['fetch_RentBuilding_Data']=$this->Building_model->fetchRentBuildingdata();
     $data['buildings']=$this->db->get('building')->result();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/rent',$data);
    $this->load->view('propertytrack/footer');
  }
  public function ViewLeaseData()
  {
    $data['fetch_LeaseBuilding_Data']=$this->Building_model->fetchLeaseBuildingdata();
     $data['fetch_leaseBuilding_Ascending']=$this->Building_model->fetchleaseBuildingAscending();
      $data['fetch_leaseBuilding_Descending']=$this->Building_model->fetchleaseBuildingDescending();
     $data['buildings']=$this->db->get('building')->result();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/lease',$data);
    $this->load->view('propertytrack/footer');
  }

  public function AboutUs()
  {
    $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
  
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/about',$data);
    $this->load->view('propertytrack/footer');
  }

  public function ContactUs()
  {
    $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/contact',$data);
    $this->load->view('propertytrack/footer');
  }
  
  public function addContactUsdetails()
    { 
    $data=array('user_name'=>$this->input->post('fullname'),
         'user_email'=>$this->input->post('email'),
         'user_subject'=>$this->input->post('subject'),
         'mobile'=>$this->input->post('mobile'),
         'user_message'=>$this->input->post('message'),
         'query_date'=>date('Y-m-d'));
         print_r($data);
    $results=$this->Blog_model->insertContact($data);
    switch ($results) 
        {
         case 0:$this->session->set_flashdata('msg','Error Try Again');
            break;
         case 1:$this->session->set_flashdata('msg','Query Submitted Successfully');
            break;
        
          
         default:$this->session->set_flashdata('msg','Error');
            break;
        }
      redirect('PropertTrack/ContactUs');
        
    }
    
    // public function viewParticularPropertyAccToListing($id)
    // {
         
    // $data['fetch_building_data']=$this->Building_model->fetchbuildingAccToListing($id);
   
    //  $data['fetch_building_Asending']=$this->Building_model->sortbyascendingforSale();
    //  $data['fetch_building_Descending']=$this->Building_model->sortbydescendingforSale();
    //  $data['buildings']=$this->db->get('building')->result();
    // $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    // $data['fetch_blogs_data']=$this->Blog_model->fetchBlogData();
    // $this->load->view('propertytrack/header');
    // $this->load->view('propertytrack/index',$data);
    // $this->load->view('propertytrack/footer');
    // }
    //  public function viewParticularPropertyAccToListingRent()
    // {
         
    // $data['fetch_building_data']=$this->Building_model->fetchbuildingAccToListingRent();
    //  $data['fetch_building_Asending']=$this->Building_model->sortbyascendingforrent();
    //  $data['fetch_building_Descending']=$this->Building_model->sortbydescendingforrent();
    //  $data['buildings']=$this->db->get('building')->result();
    // $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    // $data['fetch_blogs_data']=$this->Blog_model->fetchBlogData();
    // $this->load->view('propertytrack/header');
    // $this->load->view('propertytrack/index',$data);
    // $this->load->view('propertytrack/footer');
    // }
    //  public function viewParticularPropertyAccToListingLease()
    // {
         
    // $data['fetch_building_data']=$this->Building_model->fetchbuildingAccToListingLease();
    //  $data['fetch_building_Asending']=$this->Building_model->sortbyascendingforSale();
    //  $data['fetch_building_Descending']=$this->Building_model->sortbydescendingforSale();
    //  $data['buildings']=$this->db->get('building')->result();
    // $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    // $data['fetch_blogs_data']=$this->Blog_model->fetchBlogData();
    // $this->load->view('propertytrack/header');
    // $this->load->view('propertytrack/index',$data);
    // $this->load->view('propertytrack/footer');
    // }
    
    public function View_List()
     {
     
    $data['fetch_building_data']=$this->Building_model->fetchBuilding();
    $data['buildings']=$this->db->get('building')->result();
    $data['fetch_owners_data']=$this->Owner_model->OwnersDetailsForWeb();
    $data['fetch_blogs_data']=$this->Blog_model->fetchBlogData();
    $this->load->view('propertytrack/header');
    $this->load->view('propertytrack/view_list',$data);
    $this->load->view('propertytrack/footer');
    } 
    
    public function addUserReview()
    { 
    $data=array('building_id'=>$this->input->post('build_id'),
         'user_name'=>$this->input->post('uname'),
         'user_email'=>$this->input->post('email'),
         'user_phn'=>$this->input->post('phone'),
         'user_review'=>$this->input->post('review'),
           '	user_rating'=>$this->input->post('star'),
         'review_date'=>date('Y-m-d'));
         
    $results=$this->Blog_model->insertReview($data);
    switch ($results) 
        {
         case 0:$this->session->set_flashdata('msg','Error Try Again');
            break;
         case 1:$this->session->set_flashdata('msg','Review Submitted Successfully');
            break;
        
          
         default:$this->session->set_flashdata('msg','Error');
            break;
        }
        
      redirect('PropertTrack/ViewParticularproperty/'.$this->input->post('build_id'));
        
    }
    
    
    public function usersregister()
	{	
        $data=array("u_name"=>$this->input->post('uname'),
                    "u_email"=>$this->input->post('uemail'),
                    "u_password"=>$this->input->post('upass'),
                    "u_date"=>date('Y-m-d'));
                    
        $results=$this->Property_model->insert_userdata($data);
        
        
       if($results==1)
       {
           
            $this->session->set_flashdata('msg','Registered Successefully');
            	redirect('PropertTrack/Login');
           
       }
       elseif($results==0)
       {
            $this->session->set_flashdata('msg','Error Try Again');
       }
       else
       {
          $this->session->set_flashdata('msg','Email Already Exist'); 
       }
        
       redirect('PropertTrack/index');
        
        }
        
        public function Userlogin_validate()
	    {
	        
		$data=array("u_email"=>$this->input->post('uemail'),
					"u_password"=>$this->input->post('password'));

		$result=$this->Property_model->Users_Login($data);
		if($result)
		{
		  //   $this->session->set_flashdata('msg','Successfully Login');
			redirect('PropertTrack/index');
		}
		else
		{
		   $this->session->set_flashdata('msg','Invalid Email Or Password');
			redirect('PropertTrack/Login');
		}
	}
		public function Logout()
		{
            $this->session->sess_destroy();
            redirect('PropertTrack/Login');
    	}
    	public function Payments()
         {
           
            // $this->load->view('propertytrack/header');
            $this->load->view('propertytrack/payments');
            //  $this->load->view('propertytrack/footer');
        }
     

}