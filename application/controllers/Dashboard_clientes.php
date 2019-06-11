<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_clientes extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->model('passagens_model');
		//Do your magic here
	}

	public function index()
	{
		$this->load->view('dashboard_clientes');
	}

	public function pontos()
	{
		$data['pontos'] = $this->usuario_model->getPontosUsuarioLogado();
		$this->load->view('pontos', $data);
	}

	public function minhasPassagens(){
		$data['passagens'] = $this->passagens_model->getPassagensUsuarioLogado()??array();
		$this->load->view('passagens', $data);

	}
}
