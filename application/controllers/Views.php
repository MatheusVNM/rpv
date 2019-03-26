<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Views extends CI_Controller
{
	public function index()
	{
		$this->load->view('template');
	}

	public function loadview($string)
	{
		$this->load->view($string);
	}
}
