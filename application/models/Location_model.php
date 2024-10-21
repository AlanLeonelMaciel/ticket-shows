<?php

class Location_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_locations()
    {
        return $this->db->get('locations')->result();
    }

    public function get_location_id_by_name($name)
    {
        $row = $this->db->select('id')
            ->where('name', $name)
            ->get('locations')
            ->row();

        return $row ? $row->id : null;
    }
}
