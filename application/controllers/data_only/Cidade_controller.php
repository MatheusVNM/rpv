<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cidade_controller extends CI_Controller
{
	public function ajax_db_getCidadesPorEstado($id)
	{
        echo json_encode( $this->input->post());
	}
}