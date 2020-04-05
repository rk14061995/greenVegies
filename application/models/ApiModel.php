<?php
	
	class ApiModel extends CI_Model
	{
		public function login_validate($data){
			if(count($response=$this->db->where($data)->get('user')->result())>0){
				return $response;
			}else{
				return false;
			}
		}
	}
	
?>