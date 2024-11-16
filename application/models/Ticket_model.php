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
    public function get_tickets_by_sale_id($sale_id) {
        $this->db->select('tickets.id, events.title as event_title, events.date as event_date, events.time as event_time');
        $this->db->from('tickets');
        $this->db->join('events', 'tickets.event_id = events.id');
        $this->db->where('tickets.sale_id', $sale_id);
        $query = $this->db->get();
        return $query->result();
    }
}
