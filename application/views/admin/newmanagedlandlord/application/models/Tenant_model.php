<?php

class Tenant_model extends CI_Model
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
	public function add_currDetails($data)
	{
		$this->db->where($data);
// 		print_r($data);
		$re=$this->db->get('current_tenant')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('current_tenant',$data);
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
// 	public function add_PastDetails($data)
// 	{
// 		$this->db->where($data);
// 		$re=$this->db->get('past_tenant')->result();
// 		if(count($re)==0)
// 		{
// 			$results=$this->db->insert('past_tenant',$data);
// 			if($results)
// 			{
// 				return 1;
// 			}
// 			else
// 			{
// 				return 0;
// 			}

// 		}
// 		else
// 		{
// 			return 2;
// 	    }
// 	}

	public function fetchCurrentTenantDetails()
	{
// 		$this->db->select('building.address as building_address,current_tenant.address as ten_address, building.*,current_tenant.*');
//       $this->db->from('building');
//       $this->db->where('tenant_moved_out',0);
//       $this->db->join('current_tenant','current_tenant.building_id = building.building_id');
//       return $this->db->get()->result();
       return $this->db->query("select current_tenant.*,building.*,building.address as building_address,current_tenant.address as ten_address,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from current_tenant join countries on countries.country_id= current_tenant.country join cities on cities.cities_id=current_tenant.city join states on states.states_id=current_tenant.state join building on building.building_id=current_tenant.building_id where tenant_moved_out=0")->result();
        

	}

	public function fetchParticularCurrentTenantData($id)
	{
// 		$this->db->select('building.address as building_address,current_tenant.address as ten_address, building.*,current_tenant.*');
//       $this->db->from('building');
//       $this->db->where('tcurrent_id',$id);
//       $this->db->join('current_tenant','current_tenant.building_id = building.building_id');
// 		return $this->db->get()->result();
		// print_r( $this->db->get()->result());
		return $this->db->query("select current_tenant.*,building.address as building_address,current_tenant.address as ten_address,building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from current_tenant join countries on countries.country_id= current_tenant.country join cities on cities.cities_id=current_tenant.city join states on states.states_id=current_tenant.state join building on building.building_id = current_tenant.building_id where current_tenant.tcurrent_id='$id'")->result();
	}

	public function Update_currTenantInfo($data,$tenantId)
	{
		$this->db->where('tcurrent_id',$tenantId);
		 $results=$this->db->update('current_tenant',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteCurrdata($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('current_tenant');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	} 

	public function fetchPastTenantDetails()
	{	
// 		$this->db->select('building.address as building_address,current_tenant.address as ten_address, building.*,current_tenant.*');
//       $this->db->from('building');
//          $this->db->where('tenant_moved_out',1);
//       $this->db->join('current_tenant','current_tenant.building_id = building.building_id');
//       return $this->db->get()->result();
        return $this->db->query("select current_tenant.*,building.*,building.address as building_address,current_tenant.address as ten_address,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from current_tenant join countries on countries.country_id= current_tenant.country join cities on cities.cities_id=current_tenant.city join states on states.states_id=current_tenant.state join building on building.building_id=current_tenant.building_id where tenant_moved_out=1")->result();
	}


	public function fetchParticularPastTenantData($id)
	{
// 		$this->db->select('building.address as building_address,current_tenant.address as ten_address, building.*,current_tenant.*');
//       $this->db->from('building');
//       $this->db->where('tpast_id',$id);
//       $this->db->join('current_tenant','current_tenant.building_id = building.building_id');
// 		return $this->db->get()->result();
		// print_r( $this->db->get()->result());
// 		$this->db->where('tenant_moved_out',1);
			return $this->db->query("select current_tenant.*,building.address as building_address,current_tenant.address as ten_address,building.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from current_tenant join countries on countries.country_id= current_tenant.country join cities on cities.cities_id=current_tenant.city join states on states.states_id=current_tenant.state join building on building.building_id = current_tenant.building_id where current_tenant.tcurrent_id='$id' and current_tenant.tenant_moved_out=1")->result();
	}

	public function Update_pastTenantInfo($data,$tenantId)

	{

		$this->db->where('tcurrent_id',$tenantId);
		 $results=$this->db->update('current_tenant',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteCPastdata($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('current_tenant');
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