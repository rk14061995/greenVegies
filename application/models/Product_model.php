<?php
class Product_model extends CI_Model
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
	public function insert_Products($data)
	{
		$this->db->where($data);
		$re=$this->db->get('crops_')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('crops_',$data);
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

	

	public function fetchProducts()
	{
	 
      $this->db->join('categories','categories.id =crops_.veg_category');      
	return $this->db->get('crops_')->result();
	
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

	public function DeleteProducts($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('crops_');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function AddBanners($data)
	{
	  $this->db->where($data);
		$re=$this->db->get('banner_')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('banner_',$data);
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
	
	public function fetchBannerData()
	{
	    	return $this->db->get('banner_')->result();
	}
		
	public function DeleteBanner($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('banner_');
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