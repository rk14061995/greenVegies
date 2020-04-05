<?php
class Dashboard_model extends CI_Model
{
   public function category_Detail()
    {
     return $this->db->get('categories')->num_rows();
     
    }
     public function product_Detail()
    {
     return $this->db->get('cart')->num_rows();
     
    }
     public function feedback_Detail()
    {
     return $this->db->get('feedback')->num_rows();
    }
    public function user_Detail()
    {
     return $this->db->get('user')->num_rows();
    }
}