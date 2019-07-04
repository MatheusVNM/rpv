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
        $onibusSemContrato['onibus_sem_contrato'] = $this->onibus->getTodosOsOnibusSemContrato()['result'] ?? null;
        $onibusSemContrato['onibus_com_contrato'] = $this->onibus->getTodosOsOnibusComContrato()['result'] ?? null;
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
                $this->session->set_flashdata('success', '<div class="alert alert-success m-2">Ação salva com sucesso</div>');
                redirect('dashboard/contrato_onibus');
            } else {
                $result['message'] = errorAlert('Erro ao adicionar documento de seguro.');
                $this->session->set_flashdata('success', '<div class="alert alert-success m-2">Ação salva com sucesso</div>');
                redirect('dashboard/contrato_onibus');
            }
        }
    }
}
