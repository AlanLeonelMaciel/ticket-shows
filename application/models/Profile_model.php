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

    public function get_all_profiles()
    {
        return $this->db->get('profiles')->result();
    }
    
    public function get_profile_by_id($profile_id)
    {
        return $this->db->get_where('profiles', ['id' => $profile_id])->row();
    }

    public function get_profile_by_user_id($user_id)
    {
        return $this->db->get_where('profiles', ['user_id' => $user_id])->row();
    }
    
    public function update_profile($profile_id, $profile_data)
    {
        $this->db->where('id', $profile_id);
        $this->db->update('profiles', $profile_data);
    }

    public function delete_profile($profile_id)
    {
        $this->db->where('id', $profile_id);
        $this->db->delete('profiles');
    }
}
