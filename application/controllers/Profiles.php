<?php

class Profiles extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('profile_model');
        $this->load->model('zone_model');
        $this->load->model('address_model');
    }

    public function edit($id)
    {   
        if($this->session->userdata('profile_id') != $id){
            show_404();
        }
        // Consultar los datos del perfil
        $profile = $this->profile_model->get_profile_by_id($id);
        
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
        if($this->session->userdata('profile_id') != $id){
            show_404();
        }

        $this->form_validation->set_rules(
            'name', 'Name', 
            'required|min_length[2]|max_length[100]'
        );

        $this->form_validation->set_rules(
            'surname', 'Surname', 
            'required|min_length[2]|max_length[100]'
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
            'required|min_length[3]|max_length[100]'
        );

        $this->form_validation->set_rules(
            'number', 'Number', 
            'required|numeric'
        );

        $this->form_validation->set_rules(
            'zone_id', 'Zone', 
            'required'
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
            redirect('profiles/edit/'.$id);
        }else{
            // Obtener el id de la dirección si no existe crearla
            $input_data['address_id']=$this->address_model->get_address_id($input_data['street'], $input_data['number'], $input_data['zone_id']) 
                          ?: $this->address_model->create_address($input_data['street'], $input_data['number'], $input_data['zone_id']);
            // Eliminar los campos de dirección del array $input_data
            unset($input_data['street'], $input_data['number'], $input_data['zone_id']);
            // Actualizar el 
            //hacer un var dump de input data y que se pause el flujo
            $this->profile_model->update_profile($id, $input_data);
            redirect('profiles/edit/'.$id); // Redirigir a la misma página de edición después de guardar los cambios
        }
    }
}