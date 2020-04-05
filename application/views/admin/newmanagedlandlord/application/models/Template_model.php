<?php
class Template_model extends CI_Model
{
	public function insert_Template($data)
	{
		$this->db->where($data);
		$re=$this->db->get('email_template')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('email_template',$data);
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

	public function fetchEmailTemplate()
	{
		return $this->db->get('email_template')->result();
	}

	public function editEmailTemplatedata($id)
	{
		$this->db->where('etmp_id',$id);
		return $this->db->get('email_template')->result();

	}

	public function updateEmailData($data,$etmpId)
	{
		$this->db->where('etmp_id',$etmpId);
		$results=$this->db->update('email_template',$data);
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteEmpTempinfo($data)
	{
		$this->db->where($data);
		$results=$this->db->delete('email_template');
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