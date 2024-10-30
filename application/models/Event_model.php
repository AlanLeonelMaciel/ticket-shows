<?php

class Event_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function add_new_event($event_data)
    {
        $this->db->insert('events', $event_data);
    }

    public function get_all_events()
    {
        return $this->db->get('events')->result();
    }

    public function get_event_by_id($id)
    {
        return $this->db->get_where('events', ['id' => $id])->row();
    }

    public function update_event_by_id($id, $event_data)
    {
        $this->db->update('events', $event_data, ['id' => $id]);
    }

    public function delete_event_by_id($id)
    {
        $this->db->delete('events', ['id' => $id]);
    }

    public function get_event_picture_by_id($id)
    {
        $row = $this->db->select('picture')->where('id', $id)->get('events')->row();
        return $row ? $row->picture : null;
    }

    public function get_count_tickets_sold($event_id) 
    {
        $this->db->where('event_id', $event_id);
        $this->db->from('tickets');
        return (int) $this->db->count_all_results();
    }
    
    public function get_event_capacity($event_id) 
    {
        $this->db->select('locations.capacity');
        $this->db->from('events');
        $this->db->join('locations', 'events.location_id = locations.id');
        $this->db->where('events.id', $event_id);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0) {
            return (int) $query->row()->capacity; // Convertir a entero antes de devolver
        } else {
            return null; // O lanza una excepción si prefieres manejarlo de esa manera
        }
    }
}
