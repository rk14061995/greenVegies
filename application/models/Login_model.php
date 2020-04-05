<?php

class Login_model extends CI_Model{

	public function admin_Login($data)
	{
	   // print_r($data);
		$this->db->where($data);
		$success=$this->db->get('admins')->result();
		
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
} ?>