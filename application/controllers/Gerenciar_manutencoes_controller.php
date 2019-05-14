<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/9/2019
 * Time: 9:09 PM
 */

class Gerenciar_manutencoes_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manutencao_model', 'manutencao');
        $this->load->model('onibus_model', 'onibus');
    }

    public function index()
    {
        $data['manutencao'] = $this->manutencao->getManutencoes()['result'] ?? null;
        $data['onibus'] = $this->onibus->getOnibus()['result'];
        $this->load->view('gerenciar_manutencao_view/tela_inicial', $data);
        $this->output->enable_profiler(false);
    }
    public function ajax_db_createManutencao()
    {
        $this->form_validation->set_rules('manutencao_valor', '', 'trim|required');
        $this->form_validation->set_rules('manutencao_descricao', '', 'trim|required');
        // $this->form_validation->set_rules('manutencao_is_finalizado', '', 'trim|required');
        $this->form_validation->set_rules('manutencao_dataInicio', '', 'trim|required');
        // $this->form_validation->set_rules('manutencao_dataFim', '', 'trim|required');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required');

        // echo_r($this->input->post());

        if ($this->form_validation->run() !== false) {
            $manutencao_valor = $this->input->post('manutencao_valor');
            $manutencao_descricao = $this->input->post('manutencao_descricao');
            $manutecao_is_finalizado = $this->input->post('manutencao_is_finalizado');
            $manutencao_dataInicio = $this->input->post('manutencao_dataInicio');
            $manutencao_dataFim = $this->input->post('manutencao_dataFim');
            $onibus_id = $this->input->post('onibus_id');

            $result = $this->manutencao->insertManutencao(
                $manutencao_valor,
                $manutencao_descricao,
                $manutecao_is_finalizado,
                $manutencao_dataInicio,
                $manutencao_dataFim,
                $onibus_id
            );
            if ($result['success']) {
                $result['message'] = successAlert('Manutenção cadastrada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a Manutenção: ' . $result['error']['code'] . ' - ' . $result['error']['message'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a manutenção: Algum campo não foi preenchido corretamente');
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }
        echo json_encode($result);
    }

    public function ajax_db_getManutencaoUnica()
    {
        $this->form_validation->set_rules('manutencao_id', 'ID da Manutenção', 'trim|required|numeric');
        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->manutencao->getManutencao($this->input->post('manutencao_id'))['result']??null;

            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
    public function ajax_db_getManutencoes()
    {
        echo json_encode($this->manutencao->getManutencoes()['result']);
    }
    public function ajax_db_updateManutencao()
    {
        $this->form_validation->set_rules('manutencao_valor', 'Valor', 'required|numeric');
        $this->form_validation->set_rules('manutencao_descricao', 'Descrição', 'trim|required');
        $this->form_validation->set_rules('manutencao_is_finalizado', 'Status', 'trim|required');
        $this->form_validation->set_rules('manutencao_dataFim', 'Data Fim', 'trim|required');
        $this->form_validation->set_rules('manutencao_id', 'ID', 'trim|required|numeric');
        if ($this->form_validation->run() !== false) {
            $manutencao_valor = $this->input->post('manutencao_valor');
            $manutencao_descricao = $this->input->post('manutencao_descricao');
            $manutecao_is_finalizado = $this->input->post('manutencao_is_finalizado');
            $manutencao_dataFim = $this->input->post('manutencao_dataFim');
            $manutencao_id = $this->input->post('manutencao_id');

            $result = $this->manutencao->updateManutencao(
                $manutencao_id,
                $manutencao_valor,
                $manutencao_descricao,
                $manutecao_is_finalizado,
                $manutencao_dataFim,
            );
            if ($result['success']) {
                $result['message'] = successAlert('Manutenção atualizada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar a manutenção: '. $result['error']['message'].' - ' . $result['error']['message'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a manutenção: Algum campo não foi preenchido corretamente');
        
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }
        echo json_encode($result);
    }
}
