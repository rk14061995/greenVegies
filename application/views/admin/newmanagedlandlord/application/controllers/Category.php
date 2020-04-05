<?php
class Category extends CI_Controller
{
	function __construct()
	{
		 parent::__construct();
		 if(!$this->session->userdata('login')){
		redirect('Login-Page');
	}
		 $this->load->model('Category_model');	
	}

	public function categorySection()
	{
		 $this->load->view('Layout/header');
		 $this->load->view('Pages/add_expensecategory');
		 // $this->load->view('Layout/footer');
	}

	public function addCategory()
	{
		$data=array('category_name'=>$this->input->post('category'));

		$results=$this->Category_model->addCategory($data);

		 switch($results) 
				{
					case 0:$this->session->set_flashdata('msg','Error');
						break;
					case 1:$this->session->set_flashdata('msg','Category Added Successfully');
						break;
					case 2:$this->session->set_flashdata('msg','Already exist');
						break;
					
					default:$this->session->set_flashdata('msg','Error');
						break;
				}
				redirect('Category/categorySection');
	}

	public function ViewcategorySection()
	{
		 $data['fetch_category']=$this->Category_model->fetchcategory();
		 $this->load->view('Layout/header');
		 $this->load->view('Pages/viewcategory',$data);
		 // $this->load->view('Layout/footer');
	}

	 public function editCategory($id)
	  {

	  	// $catid=array('category_id'=>$id);
	   $data['Particular_category_data']=$this->Category_model->fetchParticularCatData($id);
		$this->load->view('Layout/header');
		$this->load->view('Pages/editcategory',$data);
		// $this->load->view('Layout/footer');
	 
	  }

	  public function updateCategory()
	{
		// $CatId=$this->input->post('category_id');
		 // print_r($CatId);
		$condition=array("category_id"=>$this->input->post('category_id'));
		// print_r($condition);
		$data=array('category_name'=>$this->input->post('category_name'));
		// print_r($data);

		$results=$this->Category_model->updateCatData($data,$condition);	
		if($results==1){
			$this->session->set_flashdata('msg','Category Updated Successfully');
		}else{
			$this->session->set_flashdata('msg','Error');
		}
		redirect('Category/ViewcategorySection');
	}

	public function DeleteCategory()
	{

		$data=array('category_id'=>$this->input->post('cat_id'));
		$results=$this->Category_model->DeleteCat($data);
		 die(json_encode($results));

	}

}