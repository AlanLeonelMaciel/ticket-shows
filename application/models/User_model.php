<?php

class User_model extends CI_Model{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_new_user($user_data)
    {
        $this->db->insert('users', $user_data);
    }

    public function get_user_by_email($email)
    {
        // Consultar la base de datos para encontrar el usuario con el email
        $query = $this->db->get_where('users', ['email' => $email]); //devuelve el objeto de consulta completo

        if ($query->num_rows() == 1) {
            $user = $query->row();
            return $user;
        }
        return false;  // Retornar false si las credenciales son incorrectas
    }
}
