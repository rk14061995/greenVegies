<?php
class Dashboard_model extends CI_Model
{
    public function get_OwnerDetail()
    {
     return $this->db->get('owner')->num_rows();
 
    }
    
    public function building_Detail()
    {
     return $this->db->get('building')->num_rows();
     
    }
     public function Curr_tenant_Detail()
    {
     return $this->db->get('current_tenant')->num_rows();
     
    }
     public function Past_tenant_Detail()
    {
     return $this->db->get('past_tenant')->num_rows();
    }
    
}