<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Contact extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 	}
	 	public function index(){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
	 		// echo 'good to go ';
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/contact');
	 		$this->load->view('common/footer');
	 	}
	 	
	 }

?>