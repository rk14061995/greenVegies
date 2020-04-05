<?php
class Property_model extends CI_Model
{
public function insert_userdata($data)
	{
		$this->db->where($data);
		$re=$this->db->get('usersignup')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('usersignup',$data);
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
	
    	public function Users_Login($data)
    	{
    	   // print_r($data);
    		$this->db->where($data);
    		$success=$this->db->get('usersignup')->result();
    			if(count($success)>0)
    	    {
                // print_r($success);
    			$this->session->set_userdata('login',$success);
    			return true;
    		}
    		 else
    	    {
    			return false;
    		}
    	}
	}
	
		
	
	
	
	
	
	