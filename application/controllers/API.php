<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class API extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 		$this->load->model('ApiModel','API');
	 	}
	 	public function loginValidate(){
	 		$email=$this->input->post('em_ail');
	 		$password=base64_encode($this->input->post('pass_w'));
	 		$data=array('email'=>$email,'password'=>$password);
	 		// print_r($data);
	 		if(($res=$this->API->login_validate($data))!=false){

	 			$this->session->set_userdata('logged_user',serialize($res));
	 			die(json_encode(array('code'=>1)));
	 		}else{
	 			die(json_encode(array('code'=>0)));
	 		}
	 	}
	 	public function logOut(){
	 		if($this->session->userdata('logged_user')){
	 			$this->cart->destroy();
	 			$this->session->unset_userdata('logged_user');
	 		}
	 		redirect('Home');
	 	}
	 	public function verifyOTP(){
	 		// echo $this->session->userdata('otp').' || '.$this->input->post('otp_') ;
	 		if($this->session->userdata('otp')==$this->input->post('otp_')){
	 			if($this->verifyThisUser($this->input->post('mobile_no'))){
	 				die(json_encode(array('code'=>1,'msg'=>"Registered Successfully.")));
	 			}else{
	 				die(json_encode(array('code'=>23,'msg'=>"Failed To Verify.")));
	 			}
	 			
	 		}else{
	 			die(json_encode(array('code'=>0,'msg'=>"Failed to register")));
	 		}
	 	}
	 	public function verifyThisUser($mobile){
	 		if($this->db->where('phone',$mobile)->update('user',array('verified'=>1))){
	 			return true;
	 		}else{
	 			return false;
	 		}
	 	}
	 	public function regNewUser(){
	 		$name=$this->input->post('full_name');
	 		$data=array("name"=>$name,"phone"=>$this->input->post('mobile_'),"email"=>$this->input->post('email'),"password"=>base64_encode($this->input->post('password')));
	 		$res=$this->API->reg_user($data);
	 		if($res==1){
	 			$otp=rand(11111,99999);
	 			$this->sendOtp($otp);
	 			
	 			$this->session->set_userdata('otp',$otp);
	 		}
	 		switch ($res) {
	 			case '0': die(json_encode(array('code'=>0,'msg'=>"Failed to register User.","mobile"=>$this->input->post('mobile_')))); break;
	 			case '1': die(json_encode(array('code'=>1,'msg'=>"Registered Successfully.","mobile"=>$this->input->post('mobile_')))); break;
	 			case '2': die(json_encode(array('code'=>2,'msg'=>"User with same Email already exists.","mobile"=>$this->input->post('mobile_')))); break;
	 			default: die(json_encode(array('code'=>3,'msg'=>"Server Error.")));
	 		}
	 	}
	 	public function sendOtp($otp){
	 		// Authorisation details.
			$username = "greenvegiess@gmail.com";
			$hash = "77839a7e1daae7dea24bf3c6f36d06dcf2f2d460e6c99ae6aeeae14a0065171d";

			// Config variables. Consult http://api.textlocal.in/docs for more info.
			$test = "0";

			// Data for text message. This is the text message data.
			$sender = "TXTLCL"; // This is who the message appears to be from.
			$numbers = "916397392256"; // A single number or a comma-seperated list of numbers
			$message = "Your verification OTP is : ".$otp;
			// 612 chars or less
			// A single number or a comma-seperated list of numbers
			$message = urlencode($message);
			$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
			$ch = curl_init('http://api.textlocal.in/send/?');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return $result = curl_exec($ch); // This is the result from the API

			curl_close($ch);
	 	}
	 	public function sendFeedBack(){
	 		
			$data=array(
						"name"=>$this->input->post('name'),
						"email"=>$this->input->post('email'),
						"subject"=>$this->input->post('subject'),
						"message"=>$this->input->post('message'),
						);
			if(count($this->db->where($data)->get('feedback')->result())==0){
				if($this->db->insert('feedback',$data)){
					die(json_encode(array('code'=>1,'msg'=>"Feedback Sent.")));
				}else{
					die(json_encode(array('code'=>0,'msg'=>"Failed to Send Feedback.")));
				}
			}else{
				die(json_encode(array('code'=>2,'msg'=>"Feedback already Exists.")));
			}
	 		
	 	}
	 	
	 }

?>