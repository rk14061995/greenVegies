<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class About extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 	}
	 	public function index(){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		// echo 'good to go ';
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/about');
	 		$this->load->view('common/footer');
	 	}
	 	
	 }

?>