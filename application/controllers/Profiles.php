<?php

class Profiles extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('zone_model');
        $this->load->model('address_model');
    }

    public function show($id)
    {
        if($this->session->userdata('profile_id') != $id && $this->session->userdata('role') != 'admin') {
            show_error('No estás autorizado.');
        }

        $profile = $this->profile_model->get_profile_by_id($id);
        $address = $this->address_model->get_address_by_id($profile ? $profile->address_id : null);
        $zone = $this->zone_model->get_zone_by_id($address ? $address->zone_id : null);

        $main_data = [
            'inner_view_path' => 'profiles/show',
            'profile' => $profile,
            'address' => $address,
            'zone' => $zone
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function edit($id)
    {   
        $profile = $this->profile_model->get_profile_by_id($id);

        if($profile == null) {
            show_404();
        }

        if($this->session->userdata('profile_id') != $id) {
            show_error('No estás autorizado.');
        }

        $data = [
            'profile' => $profile,
            'zones' => $this->zone_model->get_all_zones(),
            'address' => $this->address_model->get_address_by_id($profile->address_id),
            'inner_view_path' => 'profiles/edit'
        ];
        $this->load->view('layouts/main', $data);
    }

    public function update($id)
    {
        if($this->profile_model->get_profile_by_id($id) == null) {
            show_404();
        }

        if($this->session->userdata('profile_id') != $id){
            show_error('No estás autorizado.');
        }

        $this->form_validation->set_rules('name','Name','required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('surname','Surname','required|min_length[2]|max_length[100]');
        $this->form_validation->set_rules('phone','Phone','required|numeric|min_length[6]|max_length[15]');
        $this->form_validation->set_rules('dni','DNI','required|numeric|min_length[7]|max_length[8]');
        $this->form_validation->set_rules('street','Street','required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('number','Number','required|numeric');
        $this->form_validation->set_rules('zone_id','Zone','required');

        $input_data = $this->input->post();

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('input_data', $input_data);
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('profiles/edit/'.$id);
        }

        $profile_data = [
            'name' => $input_data['name'],
            'surname' => $input_data['surname'],
            'phone' => $input_data['phone'],
            'dni' => $input_data['dni'],
            'address_id' => $this->address_model->get_address_id($input_data['street'], $input_data['number'], $input_data['zone_id']) ?: $this->address_model->create_address($input_data['street'], $input_data['number'], $input_data['zone_id'])
        ];
        
        $this->profile_model->update_profile($id, $profile_data);
        $this->session->set_flashdata('success', 'El perfil ha sido actualizado con éxito.');
        redirect('profiles/show/' . $id);
    }

    public function update_picture()
    {
        if(!$this->session->userdata('logged_in')) {
            show_error('No estás autorizado.');
        }

        $profile_id = $this->session->userdata('profile_id');

        $upload_config = [
            'upload_path' => './assets/img/profiles/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 4096,
            'encrypt_name' => true
        ];

        $this->upload->initialize($upload_config);

        if($this->upload->do_upload('picture')) {
            $upload_data = $this->upload->data();
            $current_picture = $this->profile_model->get_profile_picture_by_id($profile_id);
    
            if($current_picture != null) {
                unlink($current_picture);
            }
    
            $profile_data['picture'] = 'assets/img/profiles/' . $upload_data['file_name'];
            $this->profile_model->update_profile($profile_id, $profile_data);
        } else {
            $this->session->set_flashdata('errors', ['upload_errors' => $this->upload->display_errors()]);
        }

        redirect('profiles/show/' . $profile_id);
    }
}