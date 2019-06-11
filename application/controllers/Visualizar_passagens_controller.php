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
        $data['passagens_vendidas_inteiras'] = $this->passagens->getPassagensTipo(1)['result'];
        $data['passagens_vendidas_meia'] = $this->passagens->getPassagensTipo(2)['result'];
        $data['passagens_vendidas_isenta'] = $this->passagens->getPassagensTipo(3)['result'];
        //echo_r($data);
        $this->load->view('visualizar_passagens_view/tela_inicial', $data);
    }
    public function ajax_db_getPassagensTrajetoEspecifico()
    {
        $this->form_validation->set_rules('comprapassagem_id', '', 'trim|required|numeric');
        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->passagens->getPassagensEspecificas($this->input->post('comprapassagem_id'))['result'];
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
}
