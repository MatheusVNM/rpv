<?php

class Gerenciar_contrato_seguro_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('onibus_model', 'onibus');
    }
    public function index()
    {
        $onibusSemContrato['onibus_sem_contrato'] = $this->onibus->getTodosOsOnibusSemContrato()['result'];
        //echo_r($onibusSemContrato);
        $this->load->view('gerenciar_contratos_seguro_onibus_view/tela_inicial', $onibusSemContrato);
    }
    public function ajax_db_updateContratoSeguro()
    {
        $this->form_validation->set_rules('onibus_id', '', 'required|trim');
        if ($this->form_validation->run() !== false) {
            $onibus_id = $this->input->post('onibus_id');
            $result = $this->onibus->updateContratoOnibus(
                $onibus_id
            );
            if ($result['success']) {
                $result['message'] = successAlert('Documento de seguro adicionado com sucesso.');
            } else {
                $result['message'] = errorAlert('Erro ao adicionar documento de seguro.');
            }
        }
    }
}
