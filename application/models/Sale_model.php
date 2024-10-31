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
}