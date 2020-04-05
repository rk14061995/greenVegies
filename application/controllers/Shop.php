<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Shop extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 	}
	 	public function index($category){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		$category_=$data['categories'];
	 		$data['crops_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->where('categories.category',$category)->get('crops_')->result();
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		// echo 'good to go ';
	 		$dr=array();
	 		foreach ($category_ as $key => $value) {
	 			# code...
	 			
	 			// print_r($res);
	 			$res['category']=$value->category;
	 			$res['items']=$this->productByCategory($value->id);
	 			$dr[]=$res;
	 		}
	 		// print_r($dr);
	 		$data['Cat_Crops']=$dr;
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
	 		$this->load->view('common/header',$data);
	 		
	 		$this->load->view('pages/shop');
	 		$this->load->view('common/footer');
	 	}
	 	public function productByCategory($cat_id){
	 		return $this->db->where('veg_category',$cat_id)->get('crops_')->result_array();
	 	}
	 	public function productDetail($product){
	 		// echo 'good to go ';
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		$data['Item']=$this->db->join('categories','categories.id= crops_.veg_category')->where('crops_.product_id',$product)->get('crops_')->result();
	 		$data['Reviews']=$this->db->join('crops_','crops_.product_id=reviews_.product_id')->get('reviews_')->result();
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/shop-detail');
	 		$this->load->view('common/footer');
	 	}
	 	
	 	
	 }

?>