<?php

class Ticket_model extends CI_Model
{
    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_ticket($data)
    {
        return $this->db->insert('tickets', $data);
    }
}
