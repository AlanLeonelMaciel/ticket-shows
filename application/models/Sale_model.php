<?php

class Sale_model extends CI_Model {

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }

    public function create_sale($data) 
    {
        return $this->db->insert('sales', $data);
    }
    public function get_all_sales() 
    {
        $this->db->select('sales.*, users.email as user_email');
        $this->db->from('sales');
        $this->db->join('users', 'sales.user_id = users.id');
        $query = $this->db->get();
        return $query->result();
    }
}