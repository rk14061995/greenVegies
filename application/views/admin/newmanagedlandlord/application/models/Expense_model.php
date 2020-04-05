<?php
class Expense_model extends CI_Model
{
	public function add_Expensedetails($data)
	{
		$this->db->where($data);
		$re=$this->db->get('building_expense')->result();
		if(count($re)==0)
		{
			$results=$this->db->insert('building_expense',$data);
			if($results)
			{
				return 1;
			}
			else
			{
				return 0;
			}

		}
		else
		{
			return 2;
	    }
	}

	public function fetchtExpenseData()
	{
	   $this->db->select('building_expense.building_id as building_address,building_expense.vendor_id as vendorname,building_expense.category_id as category_name,building_expense.*,building.*,category.*,vendor.*');
       $this->db->from('building_expense');
       $this->db->join('vendor','vendor.vendor_id=building_expense.building_id');
        $this->db->join('category','category.category_id=building_expense.category_id');
        $this->db->join('building','building.building_id=building_expense.building_id');
		return $this->db->get()->result();
		
	}

	public function fetchtParticularExpenseData($id)
	{
	   $this->db->select('building_expense.building_id as building_address,building_expense.vendor_id as building_expense_vendor_id,building_expense.category_id as category_name,building_expense.*,building.*,category.*,vendor.*,vendor.vendor_id as vendor_table_id');
       $this->db->from('building_expense');
       $this->db->where('expense_id',$id);
       $this->db->join('vendor','vendor.vendor_id=building_expense.building_id');
        $this->db->join('category','category.category_id=building_expense.category_id');
        $this->db->join('building','building.building_id=building_expense.building_id');
		return $this->db->get()->result();
		
	}

	public function Update_ExpenseInfo($data,$expenseId)

	{

		$this->db->where('expense_id',$expenseId);
		 $results=$this->db->update('building_expense',$data);
		
			if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}

	public function DeleteExpensedata($data)
	{
		$this->db->where($data);
		 $results=$this->db->delete('building_expense');
		 if($results)
			{
				return 1;
			}
	
			else
			{
				return 0;
		    }
	}
}