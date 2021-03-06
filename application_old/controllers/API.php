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
	 	public function regNewUser(){
	 		$name=$this->input->post('first_name').' '.$this->input->post('last_name');
	 		$data=array("name"=>$name,"email"=>$this->input->post('email'),"password"=>$this->input->post('password'));
	 		$res=$this->API->reg_user($data);
	 		switch ($res) {
	 			case '0': die(json_encode(array('code'=>0,'msg'=>"Failed to register User."))); break;
	 			case '1': die(json_encode(array('code'=>1,'msg'=>"Registered Successfully."))); break;
	 			case '2': die(json_encode(array('code'=>2,'msg'=>"User with same Email already exists.")));
	 			default: die(json_encode(array('code'=>3,'msg'=>"Server Error.")));
	 		}
	 	}
	 	
	 }

?>