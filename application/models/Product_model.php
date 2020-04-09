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
	public function getProductDetial($id){
		return $this->db->where("product_id",$id)->get('crops_')->row();
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
	public function update_Products($data, $pro_id){
		if($this->db->where('product_id',$pro_id)->update('crops_',$data)){
			return true;
		}else{
			return false;
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
	public function WebdetailsData()
	{
	    	return $this->db->get('website_name_logo')->result();
	}
	public function Update_webInfo($data)
	{
		$this->db->where($data);
		 $results=$this->db->update('website_name_logo',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}
	public function AddQRimage($data)
	{
	  $this->db->where($data);
		$re=$this->db->get('qr_image')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('qr_image',$data);
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
	public function getorders()
	{
	    	return $this->db->get('orders_')->result();
	}


}