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
    
    public function get_all_profiles_with_user_details() {
        $this->db->select('profiles.*, users.email, roles.name AS role_name, addresses.street, addresses.number, addresses.zone_id, zones.name AS zone_name');
        $this->db->from('profiles');
        $this->db->join('users', 'profiles.user_id = users.id'); // Unir con la tabla de usuarios
        $this->db->join('roles', 'users.role_id = roles.id'); // Unir con la tabla de roles
        $this->db->join('addresses', 'profiles.address_id = addresses.id', 'left'); // Unir con la tabla de direcciones, si existe
        $this->db->join('zones', 'addresses.zone_id = zones.id', 'left'); // Unir con la tabla de zonas, si existe
        $query = $this->db->get();
        return $query->result(); // Devuelve todos los perfiles con información del usuario, dirección, rol y zona
    }

    public function get_profile_by_id($profile_id)
    {
        return $this->db->get_where('profiles', ['id' => $profile_id])->row();
    }

    public function get_profile_id_by_user_id($user_id)
    {
        $row = $this->db->get_where('profiles', ['user_id' => $user_id])->row();
        return $row ? $row->id : null;
    }

    public function get_profile_picture_by_id($profile_id)
    {
        $row = $this->db->select('picture')->from('profiles')->where('id', $profile_id)->get()->row();
        return $row ? $row->picture : null;
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
