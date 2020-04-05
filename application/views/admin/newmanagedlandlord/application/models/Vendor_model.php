<?php
class Vendor_model extends CI_Model
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
	public function addVendorDetail($data)
	{
	    $this->db->where($data);
		$re=$this->db->get('vendor')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('vendor',$data);
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

    public function fetchVendorData()
	{
// 		return $this->db->get('vendor')->result();
		 return $this->db->query("select vendor.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from vendor join countries on countries.country_id= vendor.country join cities on cities.cities_id=vendor.city join states on states.states_id=vendor.state")->result();

	}

	public function fetchParticularVendorData($id)
	{
// 		$this->db->where('vendor',$id);
// 		// return $this->db->get()->result();
// 		return $this->db->get('vendor')->result();
			return $this->db->query("select vendor.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from vendor join countries on countries.country_id= vendor.country join cities on cities.cities_id=vendor.city join states on states.states_id=vendor.state where vendor.vendor_id='$id'")->result();
	}

	public function Update_VendorInfo($data,$vendorId)
	{
		$this->db->where('vendor_id',$vendorId);
		 $results=$this->db->update('vendor',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteVendordata($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('vendor');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}
}