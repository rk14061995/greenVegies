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
		public function reg_user($data){
			if(count($response=$this->db->where('email',$data['email'])->get('user')->result())==0){
				if($this->db->insert('user',$data)){
					return 1;
				}else{
					return 0;
				}
			}else{
				return 2;
			}
		}
	}
	
?>