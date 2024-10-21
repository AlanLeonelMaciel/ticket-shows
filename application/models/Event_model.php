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
}
