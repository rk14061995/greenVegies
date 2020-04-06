<?php
	 defined('BASEPATH') OR exit('No direct script access allowed');
	 class Cart extends CI_Controller
	 {
	 	
	 	function __construct()
	 	{
	 		parent::__construct();
	 	}
	 	public function index(){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		// echo 'good to go ';
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/cart');
	 		$this->load->view('common/footer');
	 	}
	 	public function orderPlaced(){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		// echo 'good to go ';
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();

	 		$cartItems=$this->cart->contents();
	 		foreach ($cartItems as $key => $value) {
	 			// print_r($value);
	 			// `cart`(`id`, `user_id`, `product_id`, `quantity`, `price`);
	 			// [id] => Product-Id-7
	    //         [qty] => 1
	    //         [price] => 50
	    //         [name] => peas
	    //         [options] => Array
	    //             (
	    //                 [image] => coupon_121218044337.jpg
	    //                 [product_id] => 7
	    //                 [quant_type] => Kg
	    //             )

	    //         [rowid] => ccf53d5440335065386229916cb9f864
	    //         [subtotal] => 50
	            $session=unserialize($this->session->logged_user);
	         $order=array("user_id"=>$session[0]->id,"product_id"=>$value['options']['product_id'],"quantity"=>$value['qty'],"price"=>$value['price']);
	         print_r($order);   
	 		}
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/orderConfirmed');
	 		$this->load->view('common/footer');
	 	}
	 	public function addToCart(){
	 		$productDetails=$this->db->where('product_id',$this->input->post('product_id'))->get('crops_')->row();
	 		// print_r($productDetails);
	 		$data = array(
			        'id'      => 'Product-Id-'.$productDetails->product_id,
			        'qty'     => 1,
			        'price'   => $productDetails->price,
			        'name'    => $productDetails->name,
			        'options' => array(
			        					'image' => $productDetails->image, 
			        					'product_id'=>$productDetails->product_id,
			        					// 'total'=>(int)($productDetails->price) * (int)(1),
			        					'quant_type' => $productDetails->quant_type
			        					
			        				)
			);
	 		// // print_r($data);
	 		if($this->cart->insert($data)){
	 			// $this->session->set_flashdata('msg',"Product Added Successfully.");
	 			// redirect(base_url('Home'));
	 			die(json_encode(array("code"=>1)));
	 		}else{
	 			// $this->session->set_flashdata('msg',"Failed To Add.");
	 			// redirect(base_url('Home'));
	 			die(json_encode(array("code"=>0)));
	 		}
	 		
			// $this->cart->insert($data);
	 	}
	 	public function addToCartFromShop(){
	 		// print_r($_POST);
	 		$productDetails=$this->db->where('product_id',$this->input->post('product_id'))->get('crops_')->row();
	 		$data = array(
			        'id'      => 'Product-Id-'.$productDetails->product_id,
			        'qty'     => $this->input->post('quantity'),
			        'price'   => $productDetails->price,
			        'name'    => $productDetails->name,
			        'options' => array(
			        					'image' => $productDetails->image, 
			        					'product_id'=>$productDetails->product_id,
			        					// 'total'=>(int)($productDetails->price) * (int)(1),
			        					'quant_type' => $productDetails->quant_type
			        					
			        				)
			);
	 		 print_r($data);
	 		if($this->cart->insert($data)){
	 			$this->session->set_flashdata('msg',"Product Added Successfully.");
	 			redirect(base_url('Shop/productDetail/').$this->input->post('product_id'));
	 			// die(json_encode(array("code"=>1)));
	 		}else{
	 			$this->session->set_flashdata('msg',"Failed To Add.");
	 			redirect(base_url('Shop/productDetail/').$this->input->post('product_id'));
	 			// die(json_encode(array("code"=>0)));
	 		}
	 		
			// $this->cart->insert($data);
	 	}
	 	public function updateCart(){
	 		// print_r($_POST);
	 		$data=array();
	 		foreach ($_POST as $key => $value) {
	 			// echo ' Key : '.$key.' Value: '.$value.' <br>';
	 			$data[]=array(
					                'rowid'   => $key,
					                'qty'     => $value
					        );
	 		}
	 		// print_r($data);
	 		// $data = array(
				// 	        array(
				// 	                'rowid'   => 'b99ccdf16028f015540f341130b6d8ec',
				// 	                'qty'     => 3
				// 	        ),
				// 	        array(
				// 	                'rowid'   => 'xw82g9q3r495893iajdh473990rikw23',
				// 	                'qty'     => 4
				// 	        ),
				// 	        array(
				// 	                'rowid'   => 'fh4kdkkkaoe30njgoe92rkdkkobec333',
				// 	                'qty'     => 2
				// 	        )
				// 	);

			if($this->cart->update($data)){
				$this->session->set_flashdata('msg','Cart Updated Successfully.');
			}else{
				$this->session->set_flashdata('msg','Cart Updated Successfully.');
			}
			redirect('Cart');

	 	}
	 	public function removeItem($cart_id){
	 		$data=array(
               'rowid' => $cart_id,
               'qty'   => 0
            );

			$this->cart->update($data);
			redirect(base_url('Cart'));
	 	}
	 	public function checkOut(){
	 		$data['categories']=$this->db->order_by('rand()')->get('categories')->result();
	 		// echo 'good to go ';
	 		$data['webDetail']=$this->db->get('website_name_logo')->row();
	 		$data['gallery_']=$this->db->join('categories','categories.id= crops_.veg_category')->order_by('rand()')->get('crops_')->result();
	 		$this->load->view('common/header',$data);
	 		$this->load->view('pages/checkout');
	 		$this->load->view('common/footer');
	 		
	 	}
	 	
	 }

?>