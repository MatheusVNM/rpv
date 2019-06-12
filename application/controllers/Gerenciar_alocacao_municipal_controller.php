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
        $this->load->model('onibus_model', 'onibus');
        $this->load->model('funcionarios_model', 'funcionarios');
        $this->load->model('tipo_funcionario_model', 'tipofuncionario');
        $this->load->model('trajeto_urbano_model', 'trajetourbano');
        // $this->output->enable_profiler(true);
    }

    public function index()
    {
        $data['alocacaomunicipal'] = $this->alocacao->getAlocacoes()['result'];
        $data['onibus'] = $this->onibus->getOnibusMunicipalNaoAlocado()['result'];
        $data['motoristas'] = $this->funcionarios->getMotoristasNaoAlocados()['result'];
        $data['cobradores'] = $this->funcionarios->getCobradoresNaoAlocados()['result'];
        $data['trajetourbano'] = $this->trajetourbano->getTrajetos();
        //$data['cobradores_nao_alocados_editar'] = $this->funcionarios->getCobradoresNaoAlocadosEditar(1)['result'];
        //echo_r( $this->funcionarios->getMotoristasNaoAlocados()['result']);
        //echo_r($this->funcionarios->getCobradoresNaoAlocados()['result']);
        // $data['funcionarios'] = $this->funcionarios->getFuncionarios()['result'];
        //print_r($data['alocacoes']);
        //echo_r($data);
        $this->load->view('gerenciar_alocacao_municipal_view/tela_inicial', $data);
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
            $retorno['data'] = $this->alocacao->getAlocacao($this->input->post('alocacaomunicipal_id'))['result'];
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
    public function ajax_db_getAlocacaoParaEditar()
    {
        echo json_encode($this->alocacao->getAlocacoes()['result']);
    }
    public function ajax_db_insertAlocacaoMunicipal()
    {
        $this->form_validation->set_rules('motorista_id[]', '', 'trim|required');
        $this->form_validation->set_rules('motorista_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_id[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required');
        $this->form_validation->set_rules('trajetourbano_id', '', 'trim|required');
        $this->form_validation->set_rules('alocacaomunicipal_data_inicio', '', 'trim|required');
        // if ($this->form_validation->run() !== false) {
        //     echo json_encode(array(
        //         "result" => true,
        //         "message" => "Todos dados preenchidos corretamente.",
        //         "post_data" => $this->input->post()
        //     ));
        // } else {
        //     echo json_encode(array(
        //         "result" => false,
        //         "message" => "Algum campo não foi preenchido corretamente.",
        //         "post_data" => $this->input->post()
        //     ));
        // }

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_data_inicio = $this->input->post('alocacaomunicipal_data_inicio');
            $alocacaomunicipal_data_final = $this->input->post('alocacaomunicipal_data_final');
            $alocacaomunicipal_onibus_id = $this->input->post('onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('trajetourbano_id');
            $alocacaomunicipal_motorista_funcionario_id = $this->input->post('motorista_id[0]');
            $alocacaomunicipal_motorista_expediente_hora_inicio = $this->input->post('motorista_appt[0]');
            $alocacaomunicipal_motorista_expediente_hora_final = $this->input->post('motorista_appt[1]');
            $alocacaomunicipal_cobrador_funcionario_id =  $this->input->post('cobrador_id[0]');
            $alocacaomunicipal_cobrador_expediente_hora_inicio = $this->input->post('cobrador_appt[0]');
            $alocacaomunicipal_cobrador_expediente_hora_final = $this->input->post('cobrador_appt[1]');

            $result = $this->alocacao->insertAlocacao(
                $alocacaomunicipal_data_inicio,
                $alocacaomunicipal_data_final,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id,

                $alocacaomunicipal_motorista_funcionario_id,
                $alocacaomunicipal_motorista_expediente_hora_inicio,
                $alocacaomunicipal_motorista_expediente_hora_final,

                $alocacaomunicipal_cobrador_funcionario_id,
                $alocacaomunicipal_cobrador_expediente_hora_inicio,
                $alocacaomunicipal_cobrador_expediente_hora_final
            );
            $this->output->enable_profiler(true);
            if ($result['success']) {
                $result['message'] = successAlert('Alocação cadastrada com sucesso');
                header("Refresh: 0");
            } else {
                //$result['message'] = errorAlert('Erro ao cadastrar a alocação: ' . $result['error'] . '');
                $result['message'] = errorAlert('Erro ao cadastrar a alocação');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }

    public function ajax_db_updateAlocacao()
    {
        $this->form_validation->set_rules('motorista_id[]', '', 'trim|required');
        $this->form_validation->set_rules('motorista_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_id[]', '', 'trim|required');
        $this->form_validation->set_rules('cobrador_appt[]', '', 'trim|required');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required');
        $this->form_validation->set_rules('trajetourbano_id', '', 'trim|required');
        $this->form_validation->set_rules('alocacaomunicipal_data_inicio', '', 'trim|required');
        // if ($this->form_validation->run() !== false) {
        //     echo json_encode(array(
        //         "result" => true,
        //         "message" => "Todos dados preenchidos corretamente.",
        //         "post_data" => $this->input->post()
        //     ));
        // } else {
        //     echo json_encode(array(
        //         "result" => false,
        //         "message" => "Algum campo não foi preenchido corretamente.",
        //         "post_data" => $this->input->post()
        //     ));
        // }

        if ($this->form_validation->run() !== false) {
            $alocacaomunicipal_data_inicio = $this->input->post('alocacaomunicipal_data_inicio');
            $alocacaomunicipal_data_final = $this->input->post('alocacaomunicipal_data_final');
            $alocacaomunicipal_onibus_id = $this->input->post('onibus_id');
            $alocacaomunicipal_trajetourbano_id = $this->input->post('trajetourbano_id');
            $alocacaomunicipal_motorista_funcionario_id = $this->input->post('motorista_id[0]');
            $alocacaomunicipal_motorista_expediente_hora_inicio = $this->input->post('motorista_appt[0]');
            $alocacaomunicipal_motorista_expediente_hora_final = $this->input->post('motorista_appt[1]');
            $alocacaomunicipal_cobrador_funcionario_id =  $this->input->post('cobrador_id[0]');
            $alocacaomunicipal_cobrador_expediente_hora_inicio = $this->input->post('cobrador_appt[0]');
            $alocacaomunicipal_cobrador_expediente_hora_final = $this->input->post('cobrador_appt[1]');
            $alocacaomunicipal_id = $this->input->post('alocacaomunicipal_id');

            $result = $this->alocacao->updateAlocacao(
                $alocacaomunicipal_data_inicio,
                $alocacaomunicipal_data_final,
                $alocacaomunicipal_onibus_id,
                $alocacaomunicipal_trajetourbano_id,

                $alocacaomunicipal_motorista_funcionario_id,
                $alocacaomunicipal_motorista_expediente_hora_inicio,
                $alocacaomunicipal_motorista_expediente_hora_final,

                $alocacaomunicipal_cobrador_funcionario_id,
                $alocacaomunicipal_cobrador_expediente_hora_inicio,
                $alocacaomunicipal_cobrador_expediente_hora_final,
                $alocacaomunicipal_id
            );

            if ($result['success']) {
                $result['message'] = successAlert('Alocação cadastrada com sucesso');
                header("Refresh: 0");
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a alocação');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a alocação: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }
}
