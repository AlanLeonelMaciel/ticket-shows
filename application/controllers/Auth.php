<?php

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
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
        $this->form_validation->set_rules('email', 'email', 'required|max_length[50]|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|min_length[6]|max_length[20]');
        $this->form_validation->set_rules('confirm-password', 'confirm-password', 'required|min_length[6]|max_length[20]|matches[password]');

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('auth/register_form');
        }

        // Falta guardar el usuario si el registro fue exitoso.
    }
}