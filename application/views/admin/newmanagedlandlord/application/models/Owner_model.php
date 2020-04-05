<?php
class Owner_model extends CI_Model
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
	public function insert_Owner($data)
	{
		$this->db->where($data);
		$re=$this->db->get('owner')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('owner',$data);
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

	public function fetchownerid()
	{   
return $this->db->query("select owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from owner join countries on countries.country_id= owner.country join cities on cities.cities_id=owner.city join states on states.states_id=owner.state")->result();
// 		return $this->db->get('owner')->result();
	}

	public function editOwnerForm($data)
	{	$this->db->where($data);
		return $this->db->get('owner')->result();

	}
	public function fetchParticularOwnerData($id)
	{
	   // print_r($data);
	   // $this->db->select('countries.name as count','owner.*');
	   // $this->db->from('owner');
	   
	   // $this->db->join('countries','countries.country_id=owner.country');
// 		 $this->db->where('owner.owner_id',$id);
		return $this->db->query("select owner.*,countries.*,states.*, cities.* ,countries.name as country_name, states.name as state_name, cities.name as city_name from owner join countries on countries.country_id= owner.country join cities on cities.cities_id=owner.city join states on states.states_id=owner.state where owner.owner_id='$id'")->result();
        // return $this->db->get()->result();
	}

	public function Update_OwnerInfo($data,$ownerId)
	{

		$this->db->where('owner_id',$ownerId);
		 $results=$this->db->update('owner',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteOwner($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('owner');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
		


	}

	public function totalownerdata()
	{
		 // return $totalowner=$this->db->get('owner')->num_rows();
		 $this->db->select('*');
    $this->db->from('owner');
    $query = $this->db->get();
    return $query->result_array();

	}

	public function OwnersDetailsForWeb()
	{
		$this->db->order_by("owner_id","desc");
		  $this->db->limit(6);
		return $this->db->get('owner')->result();
	}

	

}