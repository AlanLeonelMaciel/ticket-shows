<?php

class User_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function add_new_user($user_data)
    {
        $this->db->insert('users', $user_data);
    }

    public function check_login($data)
    {
        // Consultar la base de datos para encontrar el usuario con el email
        $query = $this->db->get_where('users', ['email' => $data['email']]); //devuelve el objeto de consulta completo

        if ($query->num_rows()==1) {
            $user = $query->row();
            // Verificar si la contraseña es correcta (estan encriptadas en la bd)
            if (password_verify($data['password'], $user->password)) {
                return $user;  // Retornar el usuario si las credenciales son correctas
            }
        }
        return false;  // Retornar false si las credenciales son incorrectas
    }
}