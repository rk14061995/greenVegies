<?php
class Users_model extends CI_Model
{
    public function fetchusers()
    {
         return $this->db->get('user')->result();
    }
     public function fetchUsersfeedback()
    {
         return $this->db->get('feedback')->result();
    }
    public function fetchUsersReviews()
    {
    	$this->db->join('crops_','crops_.product_id=reviews_.product_id');
         return $this->db->get('reviews_')->result();
    }
}