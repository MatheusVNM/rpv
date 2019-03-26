<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{
	public function index()
	{
		$this->load->view('teste');
	}

	public function product_lookup($nome)
	{
        $this->load->view($nome);
    }
}
