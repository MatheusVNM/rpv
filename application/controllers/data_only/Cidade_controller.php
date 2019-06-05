<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cidade_controller extends CI_Controller
{
	public function ajax_db_getCidadesPorEstado()
	{
		$this->load->model('cidade_model', 'cidades');
		$this->form_validation->set_rules('estado_id', 'ID do Estado', 'trim|required|numeric|min_length[1]|max_length[2]');

		if ($this->form_validation->run() !== FALSE) {
			$retorno['success'] = true;
			$retorno['data'] = $this->cidades->getCidadesPorEstado($this->input->post('estado_id'))['result'];
			
			echo json_encode($retorno);
		} else {
			$retorno['success'] = false;
			$retorno['error'] = validation_errors();
			echo json_encode($retorno);
		}
	}

	public function ajax_db_getCidadesComEstados(){
		$this->load->model('cidade_model', 'cidades');

		$retorno['success'] = true;
		$retorno['data'] = $this->cidades->getCidades()['result'];
		
		echo json_encode($retorno);
	}

}
