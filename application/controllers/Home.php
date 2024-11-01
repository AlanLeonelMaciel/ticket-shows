<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event_model');
		$this->load->model('location_model');
		$this->load->model('address_model');
		$this->load->model('zone_model');
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
			'inner_view_path' => 'home',
			'events' => $events
		];

		$this->load->view('layouts/main', $main_data);
	}
}
