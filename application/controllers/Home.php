<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$main_data = [
			'inner_view_path' => 'home'
		];

		$this->load->view('layouts/main', $main_data);
	}
}
