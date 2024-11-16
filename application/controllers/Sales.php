<?php

class Sales extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('sale_model');
        $this->load->model('ticket_model');
    }

    public function index() 
    {
        if($this->session->userdata('role') != 'admin') {
            show_error('No estás autorizado.');
        }

        $main_data = [
            'inner_view_path' => 'sales/index',
            'sales' => $this->sale_model->get_all_sales()
        ];

        $this->load->view('layouts/main', $main_data);
    }

    public function view_tickets($sale_id) 
    {
        if($this->session->userdata('role') != 'admin') {
            show_error('No estás autorizado.');
        }

        $tickets = $this->ticket_model->get_tickets_by_sale_id($sale_id);

        if (empty($tickets)) {
            show_404(); // Opcional: muestra un error si no hay tickets
        }

        $main_data = [
            'inner_view_path' => 'tickets/view_by_sale',
            'tickets' => $tickets
        ];

        $this->load->view('layouts/main', $main_data);
    }
}