<?php

class Events extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('location_model');
		$this->load->model('address_model');
		$this->load->model('zone_model');
		$this->load->model('sale_model'); 
		$this->load->model('ticket_model');
	}

	public function index()
	{
		// Obtener los eventos
        $events = $this->event_model->get_all_events();

        // Obtener la información adicional para cada evento
        foreach ($events as $event) {
            $location = $this->location_model->get_location_by_id($event->location_id);
            $address = $this->address_model->get_address_by_id($location->address_id);
            $zone = $this->zone_model->get_zone_by_id($address->zone_id); // Obtener la zona

            $event->location_name = $location->name;
            $event->street = $address->street;
            $event->number = $address->number;
            $event->zone_name = $zone->name; // Agregar el nombre de la zona
        }

		$main_data = [
			'inner_view_path' => 'events/index',
			'events' => $events
		];

		$this->load->view('layouts/main', $main_data);
	}

	public function show($id) {
		// Obtener el evento por ID
		$event = $this->event_model->get_event_by_id($id);

		// Verificar si el evento existe
		if ($event == null) {
			show_404();
		}

		// Obtener la información adicional del evento
		$location = $this->location_model->get_location_by_id($event->location_id);
		$address = $this->address_model->get_address_by_id($location->address_id);
		$zone = $this->zone_model->get_zone_by_id($address->zone_id); // Obtener la zona

		// Calcular el cupo disponible
		$tickets_sold = $this->event_model->get_count_tickets_sold($event->id);
		$capacity = $this->event_model->get_event_capacity($event->id);
		
		if ($capacity === null) {
			show_error('No se pudo obtener la capacidad del evento.');
		}

		$cupo = $capacity - $tickets_sold;

		$event->location_name = $location->name;
		$event->street = $address->street;
		$event->number = $address->number;
		$event->zone_name = $zone->name; // Agregar el nombre de la zona
		$event->cupo = $cupo; // Agregar el cupo disponible

		$main_data = [
			'inner_view_path' => 'events/show',
			'event' => $event
		];

		$this->load->view('layouts/main', $main_data);
	}

	public function create()
	{
		if ($this->session->userdata('role') != 'admin') {
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
		if ($this->session->userdata('role') != 'admin') {
			show_error('No estás autorizado.');
		}

		$this->form_validation->set_rules('location-name', 'location-name', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('time', 'time', 'required');
		$this->form_validation->set_rules('price', 'price', 'required');

		if ($this->form_validation->run() == false) {
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

		if ($this->upload->do_upload('picture')) {
			$upload_data = $this->upload->data();

			$event_data = [
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'date' => $this->input->post('date'),
				'time' => $this->input->post('time'),
				'price' => $this->input->post('price'),
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
		if ($this->session->userdata('role') != 'admin') {
			show_error('No estás autorizado.');
		}

		$event = $this->event_model->get_event_by_id($id);

		if($event == null) {
			show_404();
		}

		$main_data = [
			'inner_view_path' => 'events/edit',
			'event' => $event,
			'locations' => $this->location_model->get_all_locations()
		];

		$this->load->view('layouts/main', $main_data);
	}

	public function update($id)
	{
		if ($this->session->userdata('role') != 'admin') {
			show_error('No estás autorizado.');
		}

		if ($this->event_model->get_event_by_id($id) == null) {
			show_404();
		}

		$this->form_validation->set_rules('location-name', 'location-name', 'required');
		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('date', 'date', 'required');
		$this->form_validation->set_rules('time', 'time', 'required');

		if ($this->form_validation->run() == false) {
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

		if (!empty($_FILES['picture']['name'])) {
			$upload_config = [
				'upload_path' => './assets/img/events/',
				'allowed_types' => 'jpg|jpeg|png',
				'max_size' => 4096,
				'encrypt_name' => true
			];

			$this->upload->initialize($upload_config);

			if ($this->upload->do_upload('picture')) {
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
		if ($this->session->userdata('role') != 'admin') {
			show_error('No estás autorizado.');
		}

		if ($this->event_model->get_event_by_id($id) == null) {
			show_404();
		}

		unlink($this->event_model->get_event_picture_by_id($id));
		$this->event_model->delete_event_by_id($id);
		$this->session->set_flashdata('success', 'El evento ha sido eliminado con éxito.');
		redirect('events');
	}

	public function buy($event_id) {
		// Verificar si el usuario está autenticado
		if (!$this->session->userdata('logged_in')) {
			redirect('auth/login_form');
		}

		if ($this->session->userdata('role') == 'admin') {
			show_error('No estás autorizado.');
		}

		$user_id = $this->session->userdata('user_id');
		// Obtener la cantidad y el precio total del formulario
		$quantity = $this->input->post('quantity');
		$price = $this->input->post('price');
		$total = $this->input->post('total');
	
		// Obtener el evento por ID para verificar el precio
		$event = $this->event_model->get_event_by_id($event_id);
	
		// Verificar si el evento existe
		if ($event == null) {
			show_404();
		}
	
		// Verificar que la cantidad no exceda la capacidad del evento
		$tickets_sold = $this->event_model->get_count_tickets_sold($event->id);
		$cupo = ($this->event_model->get_event_capacity($event_id)) - $tickets_sold;
		if ($quantity > $cupo) {
			show_error('La cantidad solicitada excede la capacidad disponible.');
		}
	
		// Verificar que el precio total sea correcto
		$expected_total = $quantity * $event->price;
		if ($total != $expected_total) {
			show_error('El precio total no es correcto.');
		}
		
		// Crear la venta
		$sale_data = [
			'amount' => $total,
			'date' => date('Y-m-d'),
			'user_id' => $user_id
		];
	
		$this->sale_model->create_sale($sale_data);
		$sale_id = $this->db->insert_id(); // Obtener el ID de la venta recién creada
	
		// Crear los tickets
		for ($i = 0; $i < $quantity; $i++) {
			$ticket_data = [
				'event_id' => $event_id,
				'sale_id' => $sale_id
			];
			$this->ticket_model->create_ticket($ticket_data);
		}
	
		// Redirigir a una página de confirmación o de detalles de la venta
		$this->load->view('layouts/main', ['inner_view_path' => 'sales/confirmation']);
	}
}