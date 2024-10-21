<?php

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Profile_model');
        $this->load->model('User_model');
        $this->load->model('Zone_model');
        $this->load->model('Address_model');
    }

    public function index() {
        $data['profiles'] = $this->Profile_model->get_all_profiles();
        $this->load->view('profiles/index', $data);
    }

    public function view($id) {
        $data['profile'] = $this->Profile_model->get_profile_by_id($id);
        if (empty($data['profile'])) {
            show_404();
        }
        $this->load->view('profiles/view', $data);
    }

    public function edit()
    {
        // Obtener el user_id del usuario autenticado
        $user_id = $this->session->userdata('user_id');
        if (empty($user_id)) {
           // Redirige al inicio de sesión o muestra un error
         redirect('auth/login_form');
        }
     // Consultar los datos del perfil
        $profile = $this->Profile_model->get_profile_by_user_id($user_id);
        if (empty($profile)) {
           // Manejar el caso en que no se encuentre el perfil
           show_404();
        }
        
        $data = [
            'profile' => $profile,
            'zones' => $this->Zone_model->get_all_zones(),
            'address' => $this->Address_model->get_address_by_id($profile->address_id),
            'inner_view_path' => 'profiles/edit'
        ];
        $this->load->view('layouts/main', $data);
    }

    public function update()
    {
        // Obtener el user_id y el profile_id del usuario autenticado
        $user_id = $this->session->userdata('user_id');
        $profile_id = $this->session->userdata('profile_id');
        
        if(empty($user_id) || empty($profile_id)) {
            // Redirige al inicio de sesión o muestra un error
            redirect('auth/login_form');
        }

        $this->form_validation->set_rules(
            'name', 'Name', 
            'required|alpha|min_length[2]|max_length[100]'
        );

        $this->form_validation->set_rules(
            'surname', 'Surname', 
            'required|alpha|min_length[2]|max_length[100]'
        );

        $this->form_validation->set_rules(
            'phone', 'Phone', 
            'required|numeric|min_length[6]|max_length[15]'
        );

        $this->form_validation->set_rules(
            'dni', 'DNI', 
            'required|numeric|min_length[7]|max_length[8]'
        );

        $this->form_validation->set_rules(
            'street', 'Street', 
            'required|alpha_numeric_spaces|min_length[3]|max_length[100]'
        );

        $this->form_validation->set_rules(
            'number', 'Number', 
            'required|numeric'
        );

        $this->form_validation->set_rules(
            'zone_id', 'Zone', 
            'required|integer'
        );

        $input_data = [
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'phone' => $this->input->post('phone'),
            'dni' => $this->input->post('dni'),
            'picture' => $this->input->post('picture'),
            'street' => $this->input->post('street'),
            'number' => $this->input->post('number'),
            'zone_id' => $this->input->post('zone_id')
        ];

        if($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('input_data', $input_data);
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('profile/edit');
        }else{
            // Obtener el id de la dirección si no existe crearla
            $address_id = $this->Address_model->get_address_id($input_data['street'], $input_data['number'], $input_data['zone_id']) 
                          ?: $this->Address_model->create_address($input_data['street'], $input_data['number'], $input_data['zone_id']);
            // Eliminar los campos de dirección del array $input_data
            unset($input_data['street'], $input_data['number'], $input_data['zone_id']);
            // Combinar los arrays $input_data y $profile_data en un solo array.
            $profile_data = array_merge($input_data, ['address_id' => $address_id]);
            // Actualizar el perfil
            $this->Profile_model->update_profile($profile_id, $profile_data);
            redirect('profile/edit'); // Redirigir a la misma página de edición después de guardar los cambios
        }
    }

    public function delete($id) {
        $this->Profile_model->delete_profile($id);
        redirect('profile');
    }
}