<?php

class Address_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_address_id($street, $number, $zone_id) {
        $this->db->where('street', $street);
        $this->db->where('number', $number);
        $this->db->where('zone_id', $zone_id);
        $address = $this->db->get('addresses')->row();
        return $address ? $address->id : false;
    }

    public function get_address_by_id($address_id) {
        return $this->db->get_where('addresses', ['id' => $address_id])->row();
    }

    public function get_all_addresses() {
        return $this->db->get('addresses')->result();
    }
    
    // Returns id from new address or null
    public function create_address($street, $number, $zone_id) {
        $data = [
            'street' => $street,
            'number' => $number,
            'zone_id' => $zone_id
        ];
        $this->db->insert('addresses', $data);
        return $this->db->insert_id();
    }
}