
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_contoller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('API_Model','API');
	}
	public function validateLogin(){
		// print_r($_POST);
		$data=array("u_email"=>$this->input->post('email'),"u_password"=>$this->input->post('pass_code'));
		$res = $this->API->verifyThisUser($data);
// 		print_r($res);
		if($res!=false){
		   
			die(json_encode(array("code"=>1,"data"=>$res[0])));
		}else{
			die(json_encode(array("code"=>0,"data"=>'Invalid Username or Password.')));
		}
	}
	public function submitListingQuery(){
	    $data=array(
		            "owner_name"=>$this->input->post('owner_name'),
		           
		            "owner_email"=>$this->input->post('owner_email'),
		            "property_details"=>$this->input->post('property_details'),
		            );
		          //  print_r($data);
		$res = $this->API->userPropListing($data);
		switch($res){
		    case 0:die(json_encode(array("code"=>0,"data"=>'Failed To Register.')));break;
		    case 1:die(json_encode(array("code"=>1,"data"=>"Success")));break;
		    case 2:die(json_encode(array("code"=>2,"data"=>"Your Query is already Exists.")));break;
		    default:die(json_encode(array("code"=>3,"data"=>"Server Not Found.")));break;
		}
	}
	public function registerUser(){
		$data=array(
		            "username"=>$this->input->post('username'),
		            "u_password"=>$this->input->post('password'),
		            "u_name"=>$this->input->post('full_name'),
		            "u_email"=>$this->input->post('email'),
		            "mobile"=>$this->input->post('mobile'),
		            );
		$res = $this->API->createUser($data);
		switch($res){
		    case 0:die(json_encode(array("code"=>0,"data"=>'Failed To Register.')));break;
		    case 1:die(json_encode(array("code"=>1,"data"=>"Registered Successfully.")));break;
		    case 2:die(json_encode(array("code"=>2,"data"=>"User Already Exists.")));break;
		    default:die(json_encode(array("code"=>3,"data"=>"Server Not Found.")));break;
		}
	}
	public function fetchOwners(){
		if(count($data=$this->API->getAllOwners())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function compress($source, $destination, $quality) {

	    $info = getimagesize($source);

	    if ($info['mime'] == 'image/jpeg') 
	        $image = imagecreatefromjpeg($source);

	    elseif ($info['mime'] == 'image/gif') 
	        $image = imagecreatefromgif($source);

	    elseif ($info['mime'] == 'image/png') 
	        $image = imagecreatefrompng($source);

	    imagejpeg($image, $destination, $quality);

	    return $destination;
	}
	public function addOwner(){
	    //android Key
		$imgDetails=pathinfo($_FILES['owner_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Owner-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/Owner_image/";
		$source_img =$_FILES['owner_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
// 		print_r($ds);
		//android Key
		$data=array(
					"fname"=>$this->input->post('fName'),
					"lname"=>$this->input->post('lName'),
					"address"=>$this->input->post('address'),
					"country"=>$this->input->post('country'),
					"city"=>$this->input->post('city'),
					"state"=>$this->input->post('state'),
					"zip_code"=>$this->input->post('zip_code'),
					"home_phone"=>$this->input->post('homePhone'),
					"work_phone"=>$this->input->post('workPhone'),
					"mobile"=>$this->input->post('mobile'),
					"email"=>$this->input->post('email'),
					"note"=>$this->input->post('note'),
					"owner_image"=>$imageName
					);
					//total 12
				// 	print_r($data);
		if($ds){
		   $status=$this->API->addNewOwner($data);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Add Owner.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Owner Added Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>2,"data"=>"Owner Already Exists.")));
    				break;	
    			default:
    				# code...
    				// sad
    				break;
    		} 
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
	public function shortOwnerDetails(){
	    $this->db->select('owner_id,fname,lname');
	   // $this->db->from('owner');
	    $ownDe=$this->db->get('owner')->result();
	    if(count($ownDe)>0){
	        die(json_encode(array("code"=>1,"data"=>$ownDe)));
	    }else{
	        die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
	    }
	}
	public function shortBuildingDetails(){
	    $this->db->select('building_id,building_name');
	   // $this->db->from('owner');
	    $ownDe=$this->db->get('building')->result();
	    if(count($ownDe)>0){
	        die(json_encode(array("code"=>1,"data"=>$ownDe)));
	    }else{
	        die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
	    }
	}
	public function editOwner(){
	    //android Key
		$imgDetails=pathinfo($_FILES['owner_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Owner-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/Owner_image/";
		$condition=array("owner_id"=>$this->input->post('owner_id'));
		$source_img =$_FILES['owner_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
		//android Key
		$data=array(
						"fname"=>$this->input->post('fName'),
						"lname"=>$this->input->post('lName'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"city"=>$this->input->post('city'),
						"state"=>$this->input->post('state'),
						"zip_code"=>$this->input->post('zip_code'),
						"home_phone"=>$this->input->post('homePhone'),
						"work_phone"=>$this->input->post('workPhone'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
						"note"=>$this->input->post('note'),
						"owner_image"=>$imageName
						
					);
					//total 12
				// 	print_r($data);
		if($ds){
		   $status=$this->API->editOwner($data,$condition);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Edit Owner.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"  Owner Edit Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>2,"data"=>"Owner Already Exists.")));
    				break;	
    			default:
    				# code...
    				// sad
    				break;
    		} 
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
	public function fetchCountry(){
	    if(count($data=$this->db->get('countries')->result())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function fetchState(){
	    $this->db->where('country_id',$this->input->post('c_id'));
	    if(count($data=$this->db->get('states')->result())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function fetchCity(){
	    $this->db->where('state_id',$this->input->post('s_id'));
	    if(count($data=$this->db->get('cities')->result())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	//To Fetch All Building List
	public function fetchBuilding(){
	    if(count($data=$this->API->getAllBuilding())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
		//To Fetch Building List By id
	public function fetchBuildingbyid(){
	    $building_id=$this->input->post('building_id');
	    if(count($data=$this->API->getAllBuildingbyid($building_id))>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	//To Fetch owner List By building id
	public function fetchownerbyid(){
	    $building_id=$this->input->post('building_id');
	    if(count($data=$this->API->getownerbyid($building_id))>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function addBuilding(){
		$imgDetails=pathinfo($_FILES['building_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Building-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/Building_image/";
		$source_img =$_FILES['building_image']['tmp_name'];
		
		
		$filesCount = count($_FILES['building_image']['name']);
        for($i = 0; $i < $filesCount; $i++)
           {
               $ext = pathinfo($_FILES['building_image']['name'][$i], PATHINFO_EXTENSION);
                $_FILES['file']['name']     = "Building_image-".date("Y-m-d-H-i-s").$i.".".$ext;
                $_FILES['file']['type']     = $_FILES['building_image']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['building_image']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['building_image']['error'][$i];
                $_FILES['file']['size']     = $_FILES['building_image']['size'][$i];
                
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
		
		    
		
// 		$destination_img =$updDirectory.$imageName ;
// 		$ds=$this->compress($source_img, $destination_img, 60);
        if(!empty($uploadData)){
		    $data=array(
						"building_name"=>$this->input->post('building_name'),
						"price"=>$this->input->post('price'),
						"p_buy"=>$this->input->post('p_buy'),
						"p_rent"=>$this->input->post('p_rent'),
						"p_lease"=>$this->input->post('p_lease'),
						"owner_id"=>$this->input->post('owner_id'),
						"address"=>$this->input->post('address'),
						"number_units"=>$this->input->post('number_units'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"pincode"=>$this->input->post('pincode'),
						"building_image"=>$pics,
						"note"=>$this->input->post('note'),
					);
		
		    $status=$this->API->addNewBuilding($data);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Add Building.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Building Added Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Building Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
	public function editBuilding(){
		$imgDetails=pathinfo($_FILES['building_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Building-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/Building_image/";
		$source_img =$_FILES['building_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
		$condition=array("building_id"=>$this->input->post('building_id'));
		$data=array(
						"building_name"=>$this->input->post('building_name'),
						"price"=>$this->input->post('price'),
						"p_buy"=>$this->input->post('p_buy'),
						"p_rent"=>$this->input->post('p_rent'),
						"p_lease"=>$this->input->post('p_lease'),
						"owner_id"=>$this->input->post('owner_id'),
						"address"=>$this->input->post('address'),
						"number_units"=>$this->input->post('number_units'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"pincode"=>$this->input->post('pincode'),
						"building_image"=>$imageName,
						"note"=>$this->input->post('note'),
					);
				// 	print_r($data);
		if($ds){
		    $status=$this->API->editBuilding($data,$condition);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Edit Building.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Building Edit Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Building Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
	public function fetchTenant(){
	    if(count($data=$this->API->getAllTenant())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function addTenant(){
		$imgDetails=pathinfo($_FILES['tenant_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Tenant-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/tenant_image/";
		$source_img =$_FILES['tenant_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
		
		$data=array(
						"fname"=>$this->input->post('fName'),
						"lname"=>$this->input->post('lName'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"zipcode"=>$this->input->post('zipCode'),
						"home_number"=>$this->input->post('homePhone'),
						"work_number"=>$this->input->post('workPhone'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
						"note"=>$this->input->post('note'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
					
					    "move_date"=>date('d-m-y h:i:s',strtotime($this->input->post('move_date'))),
						"lease_startdate"=>date('d-m-y h:i:s',strtotime($this->input->post('lease_startdate'))),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=>$this->input->post('tenant_moved_out'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"rent_amount"=>$this->input->post('rent_amount'),
						"payment_type"=>$this->input->post('payment_type'),
					
						"tenant_image"=>$imageName
					);
		if($ds){
		   $status=$this->API->addNewTenant($data);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Add Tenant.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Tenant Added Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Tenant Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
// 		compress($source_img, $destination_img, 90);
// 		$imgDetails=pathinfo($_FILES['owner_image']['name']);
// 		$img_extension=$imgDetails['extension'];
// 		$imageName="Owner-Profile-Image-".date('dmyhis').'-.'.$img_extension;
// 		$updDirectory="./ownersImage/";
// 		$source_img =$updDirectory.$imageName ;
// 		$destination_img = 'destination .jpg';
// `current_tenant`(`tcurrent_id`, `fname`, `lname`, `building_id`, `address`, `country`, 
// `city`, `state`, `zipcode`, `home_number`, `work_number`, `mobile`, `email`, `rent_amount`,
// `payment_type`, `deposit_amount`, `dep_paid_date`, `move_date`, `lease_startdate`, `lease_period`,
// `lease_period_time`, `rent_due_day`, `tenant_moved_out`, `note`, `first_contact`, `first_phone`, 
// `second_contact`, `second_phone`, `tenant_image`)
// 		$data=array(
// 						"fname"=>$this->input->post('fName'),
// 						"lname"=>$this->input->post('lName'),
// 						"building_id"=>$this->input->post('building_id'),
// 						"address"=>$this->input->post('address'),
// 						"country"=>$this->input->post('country'),
// 						"state"=>$this->input->post('state'),
// 						"city"=>$this->input->post('city'),
// 						"zipcode"=>$this->input->post('zipCode'),
// 						"home_number"=>$this->input->post('homePhone'),
// 						"work_number"=>$this->input->post('workPhone'),
// 						"move_date"=>date('d-m-y h:i:s',strtotime($this->input->post('move_date'))),
// 						"lease_startdate"=>date('d-m-y h:i:s',strtotime($this->input->post('lease_startdate'))),
// 						"lease_period"=>$this->input->post('lease_period'),
// 						"lease_period_time"=>$this->input->post('lease_period_time'),
// 						"rent_due_day"=>$this->input->post('rent_due_day'),
// 						"tenant_moved_out"=>$this->input->post('tenant_moved_out'),
// 						"mobile"=>$this->input->post('mobile'),
// 						"email"=>$this->input->post('email'),
// 						"note"=>$this->input->post('note'),
// 						"first_contact"=>$this->input->post('first_contact'),
// 						"first_phone"=>$this->input->post('first_phone'),
// 						"second_contact"=>$this->input->post('second_contact'),
// 						"second_phone"=>$this->input->post('second_phone')
// 					);
		
	}
	public function editTenant(){
	    $t_id=$this->input->post('tcurrent_id');
		$imgDetails=pathinfo($_FILES['tenant_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Tenant-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/tenant_image/";
		$source_img =$_FILES['tenant_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
		$condition=array("tcurrent_id"=>$t_id);
		$data=array(
						"fname"=>$this->input->post('fName'),
						"lname"=>$this->input->post('lName'),
						"building_id"=>$this->input->post('building_id'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"zipcode"=>$this->input->post('zipCode'),
						"home_number"=>$this->input->post('homePhone'),
						"work_number"=>$this->input->post('workPhone'),
						"move_date"=>date('d-m-y h:i:s',strtotime($this->input->post('move_date'))),
						"lease_startdate"=>date('d-m-y h:i:s',strtotime($this->input->post('lease_startdate'))),
						"lease_period"=>$this->input->post('lease_period'),
						"lease_period_time"=>$this->input->post('lease_period_time'),
						"rent_due_day"=>$this->input->post('rent_due_day'),
						"tenant_moved_out"=>$this->input->post('tenant_moved_out'),
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
						"note"=>$this->input->post('note'),
						"dep_paid_date"=>$this->input->post('dep_paid_date'),
						"deposit_amount"=>$this->input->post('deposit_amount'),
						"rent_amount"=>$this->input->post('rent_amount'),
						"payment_type"=>$this->input->post('payment_type'),
						"first_contact"=>$this->input->post('first_contact'),
						"first_phone"=>$this->input->post('first_phone'),
						"second_contact"=>$this->input->post('second_contact'),
						"second_phone"=>$this->input->post('second_phone'),
						"tenant_image"=>$imageName
					);
		if($ds){
		   $status=$this->API->updateTenant($data,$condition);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Edit Tenant.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Tenant Edit Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Tenant Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}

		
	}
	public function addVendor(){
		$imgDetails=pathinfo($_FILES['vendor_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Vendor-Image-".date('d-m-Y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/vendor_image/";
		$source_img =$_FILES['vendor_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
// 		echo 'Upload Status';
		$data=array(
						"fname"=>$this->input->post('fName'),
						"lname"=>$this->input->post('lName'),
						"website"=>$this->input->post('website'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"zipcode"=>$this->input->post('zipCode'),
						"hphone"=>$this->input->post('homePhone'),
						"wphone"=>$this->input->post('workPhone'),
						
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
						"note"=>$this->input->post('note'),
						"miscreport"=>$this->input->post('miscreport'),
						"vinsured"=>$this->input->post('vinsured'),
						"vendor_image"=>$imageName,

					);
				// 	print_r($data);
				// 	die;
		if($ds){
		    $status=$this->API->addNewVendor($data);
		    
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Add Vendor.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Vendor Added Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Vendor Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
	public function editVendor(){
        $vendor_id=$this->input->post('vendor_id');
        $condition=array("vendor_id"=>$vendor_id);
		$imgDetails=pathinfo($_FILES['vendor_image']['name']);
		$img_extension=$imgDetails['extension'];
		$imageName="Vendor-Image-".date('d-m-y-h-i-s').'.'.$img_extension;
		$updDirectory="assets/vendor_image/";
		$source_img =$_FILES['vendor_image']['tmp_name'];
		$destination_img =$updDirectory.$imageName ;
		$ds=$this->compress($source_img, $destination_img, 60);
// 		echo 'Upload Status';
		$data=array(
						"fname"=>$this->input->post('fName'),
						"lname"=>$this->input->post('lName'),
						"website"=>$this->input->post('website'),
						"address"=>$this->input->post('address'),
						"country"=>$this->input->post('country'),
						"state"=>$this->input->post('state'),
						"city"=>$this->input->post('city'),
						"zipcode"=>$this->input->post('zipCode'),
						"hphone"=>$this->input->post('homePhone'),
						"wphone"=>$this->input->post('workPhone'),
						
						"mobile"=>$this->input->post('mobile'),
						"email"=>$this->input->post('email'),
						"note"=>$this->input->post('note'),
						"miscreport"=>$this->input->post('miscreport'),
						"vinsured"=>$this->input->post('vinsured'),
						"vendor_image"=>$imageName,

					);
				// 	print_r($data);
		if($ds){
		    $status=$this->API->editVendor($data,$condition);
    		switch ($status) {
    			case 0:
    				die(json_encode(array("code"=>0,"data"=>"Failed To Edit Owner.")));
    				break;
    			case 1:
    				die(json_encode(array("code"=>1,"data"=>"Vendor Edit Successfully.")));
    				break;
    			case 2:
    				die(json_encode(array("code"=>0,"data"=>"Vendor Already Exists.")));
    				break;	
    			default:
    				# code...
    				break;
    		}
		}else{
		   die(json_encode(array("code"=>0,"data"=>"Failed To Upload.")));
		}
		
	}
    public function fetchVendor(){
	    if(count($data=$this->API->getAllVendor())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
	public function fetchEmailTemplate(){
	    if(count($data=$this->API->getAllEmailTemplate())>0){
			die(json_encode(array("code"=>1,"data"=>$data)));
		}else{
			die(json_encode(array("code"=>0,"data"=>"No Data Found.")));
		}
	}
}
