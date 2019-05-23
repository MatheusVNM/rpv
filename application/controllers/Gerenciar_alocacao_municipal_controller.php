<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/11/2019
 * Time: 3:59 PM
 */

class Gerenciar_alocacao_municipal_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_municipal_model', 'alocacao');
        $this->load->model('funcionarios_model', 'funcionarios');
        $this->load->model('tipo_funcionario_model', 'tipofuncionario');
        $this->output->enable_profiler(true);
    }

    public function index()
    {
        // $data['alocacaomunicipal'] = $this->alocacao->getAlocacoes()['result'];
        //echo_r( $this->alocacao->getAlocacoes()['result']);
        //echo_r($this->alocacao->getAlocacao(1)['result']);
        // $data['funcionarios'] = $this->funcionarios->getFuncionarios()['result'];
        //print_r($data['alocacoes']);
    }
    public function ajax_db_getAlocacoes()
    {
        echo json_encode($this->alocacao->getAlocacoes()['result']);
    }
    public function ajax_db_getAlocacaoEspecifica()
    {
        $this->form_validation->set_rules('alocacaomunicipal_id', 'ID da Locação Municipal', 'trim|required|numeric');

        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->alocacao-- > get($this->input->post('alocacaomunicipal_id'))['result'];

            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
    public function ajax_db_insertAlocacaoMunicipal()
    {
        $this->form_validation->set_rules('alocacaomunicipal_cobrador_id', 'Cobrador ID', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataFinal', 'Data final', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataInicial', 'Data inicial', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_motorista_id', 'ID motorista', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_onibus_id', 'ID onibus', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_trajetourbano_id', 'ID trajeto', 'required');

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_cobrador_id = $this->input->post('alocacaomunicipal_cobrador_id');
            $alocacaomunicipal_dataFinal = $this->input->post('alocacaomunicipal_dataFinal');
            $alocacaomunicipal_dataInicial = $this->input->post('alocacaomunicipal_dataInicial');
            $alocacaomunicipal_motorista_id = $this->input->post('alocacaomunicipal_motorista_id');
            $alocacaomunicipal_onibus_id = $this->input->post('alocacaomunicipal_onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('alocacaomunicipal_trajetourbano_id');

            $result = $this->alocacao->insertAlocacao(
                $alocacaomunicipal_cobrador_id,
                $alocacaomunicipal_dataFinal,
                $alocacaomunicipal_dataInicial,
                $alocacaomunicipal_motorista_id,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id
            );

            if ($result['success']) {
                $result['message'] = successAlert('Alocação cadastrada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a alocação: ' . $result['error'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }
    public function ajax_db_updateAlocacao()
    {
        $this->form_validation->set_rules('alocacaomunicipal_id', 'ID alocacao', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_cobrador_id', 'Cobrador ID', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataFinal', 'Data final', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_dataInicial', 'Data inicial', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_motorista_id', 'ID motorista', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_onibus_id', 'ID onibus', 'required');
        $this->form_validation->set_rules('alocacaomunicipal_trajetourbano_id', 'ID trajeto', 'required');

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_id = $this->input->post('alocacaomunicipal_id');
            $alocacaomunicipal_cobrador_id = $this->input->post('alocacaomunicipal_cobrador_id');
            $alocacaomunicipal_dataFinal = $this->input->post('alocacaomunicipal_dataFinal');
            $alocacaomunicipal_dataInicial = $this->input->post('alocacaomunicipal_dataInicial');
            $alocacaomunicipal_motorista_id = $this->input->post('alocacaomunicipal_motorista_id');
            $alocacaomunicipal_onibus_id = $this->input->post('alocacaomunicipal_onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('alocacaomunicipal_trajetourbano_id');

            $result = $this->alocacao->updateAlocacao(
                $alocacaomunicipal_id,
                $alocacaomunicipal_cobrador_id,
                $alocacaomunicipal_dataFinal,
                $alocacaomunicipal_dataInicial,
                $alocacaomunicipal_motorista_id,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id
            );

            if ($result['success']) {
                $result['message'] = successAlert('Alocação atualizada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar a alocação: ' . $result['error'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }
}
