<?php
class Blog_model extends CI_Model
{
	public function insert_blog($data)
	{
		$this->db->where($data);
		$re=$this->db->get('blogs')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('blogs',$data);
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

	public function fetchBlogData()
	{
		return $this->db->get('blogs')->result();

	}

	public function fetchParticularBlogData($id)
	{
		$this->db->select('*');
       $this->db->from('blogs');
       $this->db->where('blog_id',$id);
		return $this->db->get()->result();
		// print_r($re);
	}
	
	public function Update_BlogInfo($data,$blogId)
	{
		$this->db->where('blog_id',$blogId);
		 $results=$this->db->update('blogs',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteBlog($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('blogs');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
		


	}
	public function insertContact($data)
    {
        $this->db->where($data);
    	$results=$this->db->insert('users_query',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}

	
    }
    	public function fetchQuery()
    {
       return $this->db->get('users_query')->result();

    }
    
    	public function insertReview($data)
    {
        $this->db->where($data);
    	$results=$this->db->insert('customer_review',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}

	
    }
    	public function fetchParticularRatingData($id)
    	{
    	    return $this->db->query("select avg(user_rating) as rating from  customer_review where building_id='$id'")->result();
            
        }
        public function InsertJobApps($data)
    {
        if($this->db->insert('tbl_job_appliactions',$data))
        {
            return 1;
            
        }
        else{
            return 0;
        }
    }
        
  
    }