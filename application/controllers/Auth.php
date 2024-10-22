<?php

class Auth extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('role_model');
        $this->load->model('profile_model');
    }

    public function register_form()
    {
        $main_data = [
            'inner_view_path' => 'auth/register_form'
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function register()
    {
        $this->form_validation->set_rules('email', 'email', 'required|max_length[50]|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirm-password', 'confirm-password', 'required|min_length[6]|max_length[20]|matches[password]');

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('auth/register_form');
        }

        $new_user_id = $this->user_model->add_new_user([
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => $this->role_model->get_role_id_by_name('customer')
        ]);

        if($new_user_id) {
            $this->profile_model->add_new_profile(['user_id' => $new_user_id]);
        }

        $this->session->set_flashdata('success', 'El usuario fue registrado con éxito.');
        redirect('auth/register_form');
    }

    // Función para cargar el formulario
    public function login_form()
    {
        $main_data = [
            'inner_view_path' => 'auth/login_form'
        ];
        // Se carga la vista con el formulario de login
        $this->load->view('layouts/main', $main_data);
    }

    // Función para el manejo del formulario tipo post
    public function login()
    {
        // Reglas de validación del formulario de login
        $this->form_validation->set_rules('email', 'email', 'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');

        $input_data = [
            'email' => $this->input->post('email')
        ];

        // Validación del formulario
        if($this->form_validation->run() == false) {
            // Si la validación falla, guarda los errores en la sesión y redirige al form.
            $this->session->set_flashdata('input_data', $input_data);
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('auth/login_form');
        } else {
            // Validar credenciales
            $data['email'] = $this->input->post('email');
            $data['password'] = $this->input->post('password');

            // Se obtiene el user por mail
            $user = $this->user_model->get_user_by_email($data['email']);

            if($user && password_verify($data['password'], $user->password)) {
                // Credenciales correctas: iniciar sesión
                
                $session_data = [
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'role' => $this->role_model->get_role_name_by_id($user->role_id),
                    'profile_id' => $this->profile_model->get_profile_by_user_id($user->id)->id,
                    'logged_in' => true
                ];

                $this->session->set_userdata($session_data);
                redirect('welcome');  // Redirige a lo que queramos
            } else {
                // Credenciales incorrectas
                $this->session->set_flashdata('input_data', $input_data);
                $this->session->set_flashdata('errors', ['login_error' => 'Incorrect username or password. Please try again.']);
                redirect('auth/login_form');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login_form');
    }
}
