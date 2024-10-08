<?php

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('role_model');
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

        $this->user_model->add_new_user([
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role_id' => $this->role_model->get_role_id_by_name('customer')
        ]);

        $this->session->set_flashdata('success', 'El usuario fue registrado con éxito.');
        redirect('auth/register_form');
    }
}