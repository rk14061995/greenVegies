<?php
class Building_model extends CI_Model
{
    public function fetchCountries()
    {
         return $this->db->get('countries')->result();
    }
    
    public function fetchState_Byid($countryid)
	{
		$this->db->where('country_id',$countryid);
		return $this->db->get('states')->result();
	}
	public function fetchCities_Byid($stateId)
	{
		$this->db->where('state_id',$stateId);
		return $this->db->get('cities')->result();
	}
	public function insert_building($data)
	{
		$this->db->where($data);
		$re=$this->db->get('building')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('building',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}

		}
		else
		{
			return 2;
	    }
	}

	public function fetchbuildingdata()
	{
	 
 		return $this->db->get('building')->result();

	}
	public function sortbyascending()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id order by price asc ")->result();

	}
		public function sortbydescending()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id order by price desc ")->result();

	}

	public function fetchBuild_Byid($build_id)
	{
		$this->db->where($build_id);
		return $this->db->get('building')->result();
	}


	public function fetchBuilding()
	{
// 	 $this->db->select('building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,building.*,owner.*');
// //       $this->db->from('owner');
//     // $this->db->select('*');
//       $this->db->join('owner','building.owner_id = owner.owner_id');
// //       return $this->db->get()->result();
// 	return $this->db->get('building')->result();
	 return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id")->result();
	}
	

	public function fetchParticularBuildingData($id)
	{
// 		$this->db->select('*');
//       $this->db->from('owner');
//       $this->db->where('building_id',$id);
//       $this->db->join('building','building.owner_id = owner.owner_id');
// 		return $this->db->get()->result();
	return $this->db->query("select building.*,building.amenities_id as buildamenities,building.address as buildaddress,building.note as buildnote,owner.*,countries.*,states.*, cities.*,countries.name as country_name, states.name as state_name, cities.name as city_name  from building  join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on building.owner_id = owner.owner_id where building.building_id='$id'")->result();
	}
	
	public function Update_BuildingInfo($data,$buildId)
	{
		$this->db->where('building_id',$buildId);
		 $results=$this->db->update('building',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteBuilding($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('building');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function fetchBuyBuildingdata()
	{
// 	 $this->db->select('*');
// 	 $this->db->from('building');    
//       $this->db->where('p_buy','1');
//       return $this->db->get()->result();
      	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_buy='1'")->result();

	}
	
	public function fetchBuyBuildingAscending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_buy='1' order by price asc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}
	public function fetchBuyBuildingDescending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_buy='1' order by price desc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}

	public function fetchRentBuildingdata()
	{
// 	 $this->db->select('building.*,owner.*,','sdf','sdfsd');
// 	 $this->db->from('building');    
//       $this->db->where('p_rent','1');
//       return $this->db->get()->result();
//       // print_r($re);
     return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_rent='1'")->result();

	
	}
	
	public function fetchrentBuildingAscending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_rent='1' order by price asc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}
	public function fetchrentBuildingDescending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_rent='1' order by price desc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}
	public function fetchLeaseBuildingdata()
	{
// 	 $this->db->select('*');
// 	 $this->db->from('building');    
//       $this->db->where('p_lease','1');
//       return $this->db->get()->result();
//       // print_r($re);
return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_lease='1'")->result();
	
	}
	
	public function fetchleaseBuildingAscending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_lease='1' order by price asc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}
	public function fetchleaseBuildingDescending()
	{
	    	return $this->db->query("select building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state  where building.p_lease='1' order by price desc")->result();
	   // 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where p_buy=1 order by price asc ")->result();
	}
// 	public function fetchbuildingAccToListingSale()
//  	{
// 	  	return $this->db->query("select building.*,countries.*,states.*, cities.*,owner.*, building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id= building.owner_id where building.p_buy='1'");
//     //   return $this->db->get()->result();
// 	   }
	    
	  
// 	   public function fetchbuildingAccToListingRent()
// 	   {
// 	         $this->db->select('building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,building.*,owner.*');
//           $this->db->from('building');
//           $this->db->where('p_rent','1');
//           $this->db->join('owner','owner.owner_id = building.owner_id');
//           return $this->db->get()->result();
//          }
	    
// 	   public function fetchbuildingAccToListingLease()
// 	    {
// 	         $this->db->select('building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,building.*,owner.*');
//           $this->db->from('owner');
//           $this->db->where('p_lease','1');
//           $this->db->join('building','building.owner_id = owner.owner_id');
//           return $this->db->get()->result();
          
// 	   }
// 		public function fetchbuildingAccToListing($id)
// 	{
// 	    if($id==1)
// 	    {
// 	       return $this->db->query("select building.*,countries.*,states.*, cities.*,owner.*, building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id= building.owner_id where building.p_buy='1'")->result();
// 	    }
	    
// 	    elseif($id==2)
// 	    {
// 	         $this->db->select('building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,building.*,owner.*');
//           $this->db->from('owner');
//           $this->db->where('p_rent','1');
//           $this->db->join('building','building.owner_id = owner.owner_id');
//           return $this->db->get()->result();
//           }
	    
// 	    else
// 	    {
// 	         $this->db->select('building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,building.*,owner.*');
//           $this->db->from('owner');
//           $this->db->where('p_lease','1');
//           $this->db->join('building','building.owner_id = owner.owner_id');
//           return $this->db->get()->result();
          
// 	    }
		
// 	}
	
	
    	public function sortbyascendingforSale()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where building.p_buy='1' order by price asc ")->result();

	}
		public function sortbydescendingforSale()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where building.p_buy='1' order by price desc ")->result();

	}
		public function sortbyascendingforrent()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where building.p_rent='1' order by price asc ")->result();

	}
		public function sortbydescendingforrent()
	{
	   
 	return $this->db->query("select building.*,building.note as building_note,building.state as building_state,building.address as building_address,building.city as building_city,owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from building join countries on countries.country_id= building.country join cities on cities.cities_id=building.city join states on states.states_id=building.state join owner on owner.owner_id=building.owner_id where building.p_rent='1' order by price desc ")->result();

	}
	public function AddAmenities($data)
	{
	  $this->db->where($data);
		$re=$this->db->get('amenities')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('amenities',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}

		}
		else
		{
			return 2;
	    }  
	}
	
	public function fetchAmenitiesData()
	{
	    	return $this->db->get('amenities')->result();
	}
		public function fetchParticularAmenitiesData($id)
	{
		$this->db->where('amenities_id',$id);
		// return $this->db->get()->result();
		return $this->db->get('amenities')->result();
	}
	public function DeleteAmenities($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('amenities');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	} 
	public function fetchReviewByBuilding($id)
	{
	    
	    	$this->db->where('building_id',$id);
		
		return $this->db->get('customer_review')->result();
	}
}