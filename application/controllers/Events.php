<?php

class Events extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('event_model');
        $this->load->model('location_model');
    }

    public function index()
    {
        $main_data = [
            'inner_view_path' => 'events/index',
            'events' => $this->event_model->get_all_events()
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function show($id)
    {
        if($this->event_model->get_event_by_id($id) == null) {
            show_404();
        }

        $main_data = [
            'inner_view_path' => 'events/show',
            'event' => $this->event_model->get_event_by_id($id)
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function create()
    {
        if($this->session->userdata('role') != 'admin') {
            show_error('No estás autorizado.');
        }

        $main_data = [
            'inner_view_path' => 'events/create',
            'locations' => $this->location_model->get_all_locations()
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function store()
    {
        $this->form_validation->set_rules('location-name', 'location-name', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('time', 'time', 'required');
        
        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('input_data', $this->input->post());
            redirect('events/create');
        }

        $upload_config = [
            'upload_path' => './assets/img/events/',
            'allowed_types' => 'jpg|jpeg|png',
            'max_size' => 4096,
            'encrypt_name' => true
        ];

        $this->upload->initialize($upload_config);

        if($this->upload->do_upload('picture')) {
            $upload_data = $this->upload->data();

            $event_data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'date' => $this->input->post('date'),
                'time' => $this->input->post('time'),
                'picture' => 'assets/img/events/' . $upload_data['file_name'],
                'location_id' => $this->location_model->get_location_id_by_name($this->input->post('location-name'))
            ];

            $this->event_model->add_new_event($event_data);
            $this->session->set_flashdata('success', 'El evento ha sido creado con éxito.');
        } else {
            $this->session->set_flashdata('errors', ['upload_errors' => $this->upload->display_errors()]);
            $this->session->set_flashdata('input_data', $this->input->post());
        }

        redirect('events/create');
    }

    public function edit($id)
    {
        if($this->event_model->get_event_by_id($id) == null) {
            show_404();
        }

        $main_data = [
            'inner_view_path' => 'events/edit',
            'event' => $this->event_model->get_event_by_id($id),
            'locations' => $this->location_model->get_all_locations()
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function update($id)
    {
        if($this->event_model->get_event_by_id($id) == null) {
            show_404();
        }

        $this->form_validation->set_rules('location-name', 'location-name', 'required');
        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('date', 'date', 'required');
        $this->form_validation->set_rules('time', 'time', 'required');

        if($this->form_validation->run() == false) {
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            $this->session->set_flashdata('input_data', $this->input->post());
            redirect('events/edit/' . $id);
        }

        $new_event_data = [
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'date' => $this->input->post('date'),
            'time' => $this->input->post('time'),
            'location_id' => $this->location_model->get_location_id_by_name($this->input->post('location-name'))
        ];

        if(!empty($_FILES['picture']['name'])) {
            $upload_config = [
                'upload_path' => './assets/img/events/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => 4096,
                'encrypt_name' => true
            ];
    
            $this->upload->initialize($upload_config);

            if($this->upload->do_upload('picture')) {
                $upload_data = $this->upload->data();
                $new_event_data['picture'] = 'assets/img/events/' . $upload_data['file_name'];
                unlink($this->event_model->get_event_picture_by_id($id));
            } else {
                $this->session->set_flashdata('errors', ['upload_errors' => $this->upload->display_errors()]);
                $this->session->set_flashdata('input_data', $this->input->post());
                redirect('events/edit/' . $id);
            }
        }

        $this->event_model->update_event_by_id($id, $new_event_data);
        redirect('events/show/' . $id);
    }

    public function delete($id)
    {
        if($this->event_model->get_event_by_id($id) == null) {
            show_404();
        }

        unlink($this->event_model->get_event_picture_by_id($id));
        $this->event_model->delete_event_by_id($id);
        redirect('events');
    }

}