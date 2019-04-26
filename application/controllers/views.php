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
	public function loadviewwithfolder($folder, $view ){
		$this->load->view($folder.'/'.$view);

	}

	public function teste(){
		if(getenv("CLEARDB_DATABASE_URL"))
			echo "true";
		else
			echo "false";
		;
	}
}
