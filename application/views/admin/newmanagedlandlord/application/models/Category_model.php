<?php
class Category_model extends CI_Model
{
		
    public function addCategory($data)
	   {
	    $this->db->where($data);
		$re=$this->db->get('category')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('category',$data);
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

    public function fetchcategory()
    {
    	return $this->db->get('category')->result();
    }

   
	public function fetchParticularCatData($id)
	{
		$this->db->where('category_id',$id);
		// return $this->db->get()->result();
		return $this->db->get('category')->result();
	}


	public function updateCatData($data,$condition)
	{
		$this->db->where($condition);
		 $results=$this->db->update('category',$data);
		 // print_r( $results);

		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteCat($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('category');
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