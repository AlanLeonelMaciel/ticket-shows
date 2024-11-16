<?php

class Role_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_role_id_by_name($name)
    {
        $this->db->select('id');
        $this->db->where('name', $name);
        $row = $this->db->get('roles')->row();

        return $row ? $row->id : null;
    }

    public function get_role_name_by_id($id)
    {
        $this->db->select('name');
        $this->db->where('id', $id);
        $row = $this->db->get('roles')->row();

        return $row ? $row->name : null;
    }
}