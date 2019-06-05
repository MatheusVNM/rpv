<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_clientes extends CI_Controller
{
	public function index()
	{
		$this->load->view('dashboard_clientes');
	}
}