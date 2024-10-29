<?php

class Zone_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_zones() {
        return $this->db->get('zones')->result();
    }

    public function get_zone_by_id($id) {
        return $this->db->get_where('zones', ['id' => $id])->row();
    }
}