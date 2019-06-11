<?php

class Visualizar_passagens_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('visualizar_passagens_model', 'passagens');
    }
    public function index()
    {
        $data['passagens_vendidas_total'] = $this->passagens->getPassagensTotal()['result'];
        $data['trajetos_cidade_final'] = $this->passagens->pegarTrajetoFimDeTodas()['result'];
        //echo_r($data);
        $this->load->view('visualizar_passagens_view/tela_inicial', $data);
    }
    public function ajax_db_getPassagensTrajetoEspecifico()
    {

        $this->form_validation->set_rules('alocacaointermunicipal_id', '', 'trim|required|numeric');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required|numeric');
        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->passagens->getPassagensEspecificas($this->input->post('alocacaointermunicipal_id'), $this->input->post('onibus_id'))['result'];
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
}
