
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
 		// echo 'good to go ';
 		$data['webDetail']=$this->db->get('website_name_logo')->row();
 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
 		$this->load->view('common/header',$data);
 		$this->load->view('pages/my-account');
 		$this->load->view('common/footer');
	}
	public function orders(){
		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
		$data['myOrders']=$this->db->order_by('order_id','desc')->get('orders_')->result();
 		// echo 'good to go ';
 		$data['webDetail']=$this->db->get('website_name_logo')->row();
 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
 		$this->load->view('common/header',$data);
 		$this->load->view('pages/orders');
 		$this->load->view('common/footer');
	}
}
