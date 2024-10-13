<?php

class Profile_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_new_profile($profile_data)
    {
        $this->db->insert('profiles', $profile_data);
    }
}
