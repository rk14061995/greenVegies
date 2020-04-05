<?php
class Employee_model extends CI_Model
{
	public function insert_Employee($data)
	{
		$this->db->where($data);
		$re=$this->db->get('employee')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('employee',$data);
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
}