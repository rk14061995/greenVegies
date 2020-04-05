<?php
	class API_Model extends CI_Model{
		public function getAllOwners(){
			return $this->db->get('owner')->result();
		}
		public function userPropListing($data){
		    
		    $this->db->where($data);
			if(count($result=$this->db->get('listing_query')->result())==0){
				if($this->db->insert('listing_query',$data)){
				    return 1;
				}else{
				    return 0;
				}
			}else{
				return 2;
			}
		}
		public function verifyThisUser($data){
			// $data['pass_code'];
			$this->db->where($data);
			if(count($result=$this->db->get('usersignup')->result())>0){
				return $result;
			}else{
				return false;
			}	
		}
		public function createUser($data){
		    $this->db->where($data);
			if(count($result=$this->db->get('usersignup')->result())==0){
				if($this->db->insert('usersignup',$data)){
				    return 1;
				}else{
				    return 0;
				}
			}else{
				return 2;
			}
		}
		public function addNewOwner($data){
			$this->db->where($data);
			if(count($this->db->get('owner')->result())>0){
				return 2;
			}else{
				if($this->db->insert('owner',$data)){
					return 1;
				}else{
					return 0;
				}

			}
		}
		public function getAllBuilding(){
		    $this->db->select('cities.name as cityname,countries.name as countryname,states.name as statename,building.*, owner.*');
		    $this->db->from('building');
		    $this->db->join('owner','owner.owner_id=building.owner_id');
		    $this->db->join('cities','cities.cities_id=building.city');
	        $this->db->join('countries','countries.country_id=building.country');
	        $this->db->join('states','states.states_id=building.state');
		    return $this->db->get()->result();
		}
		public function getAllBuildingbyid($building_id)
		{
		    $this->db->select('cities.name as cityname,countries.name as countryname,states.name as statename,building.*, owner.*');
		    $this->db->from('building');
		    $this->db->join('owner','owner.owner_id=building.owner_id');
		    $this->db->join('cities','cities.cities_id=building.city');
	        $this->db->join('countries','countries.country_id=building.country');
	        $this->db->join('states','states.states_id=building.state');
	        $this->db->where('building_id',$building_id);
		    return $this->db->get()->result();
		}
		public function getownerbyid($building_id){
		    $this->db->select('cities.name as cityname,countries.name as countryname,states.name as statename,owner.*');
		    $this->db->from('building');
		    $this->db->join('owner','owner.owner_id=building.owner_id');
		    $this->db->join('cities','cities.cities_id=owner.city');
	        $this->db->join('countries','countries.country_id=owner.country');
	        $this->db->join('states','states.states_id=owner.state');
	        $this->db->where('building_id',$building_id);
		    return $this->db->get()->result();
		}
		public function addNewBuilding($data){
			$this->db->where($data);
			if(count($this->db->get('building')->result())>0){
				return 2;
			}else{
				if($this->db->insert('building',$data)){
					return 1;
				}else{
					return 0;
				}

			}
		}
		public function addNewVendor($data){
		  //  print_r($data);
			$this->db->where($data);
			if(count($this->db->get('vendor')->result())>0){
				return 2;
			}
			else{
				if($this->db->insert('vendor',$data)){
					return 1;
				}else{
					return 0;
				}

			}
		}
		public function updateTenant($data,$condition){
		        $this->db->where($condition);
				if($this->db->update('current_tenant',$data)){
					return 1;
				}else{
					return 0;
				}
		}
		public function editBuilding($data,$condition){
		        $this->db->where($condition);
		      //  print_r($condition);
				if($this->db->update('building',$data)){
					return 1;
				}else{
					return 0;
				}
		}
		public function editVendor($data,$condition){
		        $this->db->where($condition);
				if($this->db->update('vendor',$data)){
					return 1;
				}else{
					return 0;
				}
		}
		public function editOwner($data,$condition){
		        $this->db->where($condition);
				if($this->db->update('owner',$data)){
					return 1;
				}else{
					return 0;
				}
		}
		public function getAllTenant(){
		    
		    $this->db->join('building','building.building_id=current_tenant.building_id');
		    return $this->db->get('current_tenant')->result();
		}
		public function addNewTenant($data){
			$this->db->where($data);
			if(count($this->db->get('current_tenant')->result())>0){
				return 2;
			}else{
				if($this->db->insert('current_tenant',$data)){
					return 1;
				}else{
					return 0;
				}

			}
		}
        public function getAllVendor(){
		    return $this->db->get('vendor')->result();
		}
		public function getAllEmailTemplate(){
		    return $this->db->get('email_template')->result();
		}
		
	}
?>