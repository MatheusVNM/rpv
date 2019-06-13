<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:14 PM
 */

class Gerenciar_frota_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('onibus_model', 'onibus');
        // $this->load->model('onibus_municipal_model', 'onibus_municipal');
        $this->load->model('categoria_onibus_model', 'categoria_onibus');
        $this->load->model('cidade_model', 'cidades');
        $this->load->model('estado_model', 'estados');
        $this->output->enable_profiler(false);
    }

    public function index()
    {
        $data['frota'] = $this->onibus->getOnibus()['result'] ?? null;
        $data['estados'] = $this->estados->getEstados()['result'];
        $data['categoriaonibus'] = $this->categoria_onibus->getCategoriaOnibus();
        $onibusSemContrato['onibus_sem_contrato'] = $this->onibus->getTodosOsOnibusSemContrato()['result'];
        echo_r($onibusSemContrato);
        //$this->load->view('gerenciar_frota_view/tela_inicial', $data);
        //$this->load->view('gerenciar_contratos_seguro_onibus_view/tela_inicial', $onibusSemContrato);
    }

    public function ajax_db_getOnibus()
    {
        // echo "olamundo";
        echo json_encode($this->onibus->getOnibus()['result'] ?? null);
    }
    public function ajax_db_getOnibusEspecifico()
    {
        $this->form_validation->set_rules('onibus_id', 'ID do Onibus', 'required|trim|numeric');

        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->onibus->getOnibusEspecifico($this->input->post('onibus_id'))['result'] ?? null;
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }


    public function ajax_db_insertOnibus()
    {
        $this->form_validation->set_rules('onibus_placa', '', 'required|trim|regex_match[/[a-zA-Z]{3}\d{4}/]|exact_length[7]|strtoupper');
        $this->form_validation->set_rules('onibus_numero', '', 'required|trim|min_length[1]|greater_than[0]|max_length[4]|numeric');
        $this->form_validation->set_rules('onibus_numero_antt', '', 'required|trim|exact_length[9]|greater_than[0]|numeric');
        $this->form_validation->set_rules('onibus_num_chassis', '', 'required|trim|exact_length[17]|strtoupper');
        $this->form_validation->set_rules('onibus_num_lugares', '', 'required|trim|min_length[1]|greater_than[0]|max_length[3]|numeric');
        $this->form_validation->set_rules('onibus_marca', '', 'required|trim|strtoupper');
        $this->form_validation->set_rules('onibus_potencial_motor', '', 'required|trim|numeric|greater_than[1]');
        $this->form_validation->set_rules('onibus_propriedade_veiculo', '', 'required|trim|strtoupper');
        $this->form_validation->set_rules('onibus_ano_fab', '', 'required|trim|exact_length[4]|numeric');
        $this->form_validation->set_rules('onibus_quilometragem', '', 'required|trim|greater_than_equal_to[0]');
        $this->form_validation->set_rules('onibus_is_municipal', '', 'required|trim');
        $this->form_validation->set_rules('onibus_is_municipal', '', 'required|trim');
        // echo $this->input->post('onibus_cidade');
        if ($this->input->post('onibus_is_municipal')) {
            if (filter_var($this->input->post('onibus_is_municipal'), FILTER_VALIDATE_BOOLEAN)) {
                $isMunicipal = true;
                $this->form_validation->set_rules('onibus_cidade', '', 'required|trim|numeric|greater_than[0]');
            } else {
                $isMunicipal = false;
                $this->form_validation->set_rules('onibus_categoria_intermunicipal', '', 'required|trim|numeric|greater_than[0]');
            }
        }
        $this->form_validation->set_rules('onibus_ar_condicionado', '', 'required|trim');
        $this->form_validation->set_rules('onibus_adaptado_deficiente', '', 'required|trim');

        // echo_r($this->input->post());

        if ($this->form_validation->run() !== false) {
            $onibus_placa = $this->input->post('onibus_placa');
            $onibus_numero = $this->input->post('onibus_numero');
            $onibus_numero_antt = $this->input->post('onibus_numero_antt');
            $onibus_num_chassis = $this->input->post('onibus_num_chassis');
            $onibus_num_lugares = $this->input->post('onibus_num_lugares');
            $onibus_marca = $this->input->post('onibus_marca');
            $onibus_potencial_motor = $this->input->post('onibus_potencial_motor');
            $onibus_propriedade_veiculo = $this->input->post('onibus_propriedade_veiculo');
            $onibus_ano_fab = $this->input->post('onibus_ano_fab');
            $onibus_quilometragem = $this->input->post('onibus_quilometragem');
            // $onibus_is_municipal = $this->input->post('onibus_is_municipal');
            $onibus_cidade = $this->input->post('onibus_cidade');
            $onibus_categoria_intermunicipal = $this->input->post('onibus_categoria_intermunicipal');
            $onibus_ar_condicionado =
                filter_var($this->input->post('onibus_ar_condicionado'), FILTER_VALIDATE_BOOLEAN);
            $onibus_adaptado_deficiente =
                filter_var($this->input->post('onibus_adaptado_deficiente'), FILTER_VALIDATE_BOOLEAN);


            if ($isMunicipal)
                $result = $this->onibus->insertOnibusMunicipal(
                    $onibus_placa,
                    $onibus_numero,
                    $onibus_numero_antt,
                    $onibus_num_chassis,
                    $onibus_num_lugares,
                    $onibus_marca,
                    $onibus_potencial_motor,
                    $onibus_propriedade_veiculo,
                    $onibus_ano_fab,
                    $onibus_quilometragem,
                    $onibus_cidade,
                    $onibus_ar_condicionado,
                    $onibus_adaptado_deficiente
                );
            else
                $result = $this->onibus->insertOnibusIntermunicipal(
                    $onibus_placa,
                    $onibus_numero,
                    $onibus_numero_antt,
                    $onibus_num_chassis,
                    $onibus_num_lugares,
                    $onibus_marca,
                    $onibus_potencial_motor,
                    $onibus_propriedade_veiculo,
                    $onibus_ano_fab,
                    $onibus_quilometragem,
                    $onibus_categoria_intermunicipal,
                    $onibus_ar_condicionado,
                    $onibus_adaptado_deficiente
                );


            if ($result['success'] === true) {
                $result['message'] = successAlert('Onibus cadastrado com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a onibus: ' . json_encode($result['error']) . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a onibus: Algum campo não foi preenchido corretamente', false);
            $result['error_messages'] = $this->form_validation->error_array();
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }

        echo json_encode($result);
    }

    public function ajax_db_updateOnibus()
    {
        $this->form_validation->set_rules('onibus_id', '', 'required|trim|greater_than[0]|numeric');
        $this->form_validation->set_rules('onibus_placa', '', 'required|trim|regex_match[/[a-zA-Z]{3}\d{4}/]|exact_length[7]|strtoupper');
        $this->form_validation->set_rules('onibus_numero', '', 'required|trim|min_length[1]|greater_than[0]|max_length[4]|numeric');
        $this->form_validation->set_rules('onibus_numero_antt', '', 'required|trim|exact_length[9]|greater_than[0]|numeric');
        $this->form_validation->set_rules('onibus_num_chassis', '', 'required|trim|exact_length[17]|strtoupper');
        $this->form_validation->set_rules('onibus_num_lugares', '', 'required|trim|min_length[1]|greater_than[0]|max_length[3]|numeric');
        $this->form_validation->set_rules('onibus_marca', '', 'required|trim|strtoupper');
        $this->form_validation->set_rules('onibus_potencial_motor', '', 'required|trim|numeric|greater_than[1]');
        $this->form_validation->set_rules('onibus_propriedade_veiculo', '', 'required|trim|strtoupper');
        $this->form_validation->set_rules('onibus_ano_fab', '', 'required|trim|exact_length[4]|numeric');
        $this->form_validation->set_rules('onibus_quilometragem', '', 'required|trim|greater_than_equal_to[0]');
        $this->form_validation->set_rules('onibus_is_municipal', '', 'required|trim');
        // echo $this->input->post('onibus_cidade');
        if ($this->input->post('onibus_is_municipal')) {
            if (filter_var($this->input->post('onibus_is_municipal'), FILTER_VALIDATE_BOOLEAN)) {
                $isMunicipal = true;
                $this->form_validation->set_rules('onibus_cidade', '', 'required|trim|numeric|greater_than[0]');
            } else {
                $isMunicipal = false;
                $this->form_validation->set_rules('onibus_categoria_intermunicipal', '', 'required|trim|numeric|greater_than[0]');
            }
        }
        $this->form_validation->set_rules('onibus_ar_condicionado', '', 'required|trim');
        $this->form_validation->set_rules('onibus_adaptado_deficiente', '', 'required|trim');

        // echo_r($this->input->post());

        if ($this->form_validation->run() !== false) {
            $onibus_id = $this->input->post('onibus_id');
            $onibus_placa = $this->input->post('onibus_placa');
            $onibus_numero = $this->input->post('onibus_numero');
            $onibus_numero_antt = $this->input->post('onibus_numero_antt');
            $onibus_num_chassis = $this->input->post('onibus_num_chassis');
            $onibus_num_lugares = $this->input->post('onibus_num_lugares');
            $onibus_marca = $this->input->post('onibus_marca');
            $onibus_potencial_motor = $this->input->post('onibus_potencial_motor');
            $onibus_propriedade_veiculo = $this->input->post('onibus_propriedade_veiculo');
            $onibus_ano_fab = $this->input->post('onibus_ano_fab');
            $onibus_quilometragem = $this->input->post('onibus_quilometragem');
            $onibus_cidade = $this->input->post('onibus_cidade');
            $onibus_categoria_intermunicipal = $this->input->post('onibus_categoria_intermunicipal');
            $onibus_ar_condicionado =
                filter_var($this->input->post('onibus_ar_condicionado'), FILTER_VALIDATE_BOOLEAN);
            $onibus_adaptado_deficiente =
                filter_var($this->input->post('onibus_adaptado_deficiente'), FILTER_VALIDATE_BOOLEAN);
            $result = $this->onibus->updateOnibus(
                $onibus_id,
                $onibus_placa,
                $onibus_numero,
                $onibus_numero_antt,
                $onibus_num_chassis,
                $onibus_num_lugares,
                $onibus_marca,
                $onibus_potencial_motor,
                $onibus_propriedade_veiculo,
                $onibus_ano_fab,
                $onibus_quilometragem,
                $isMunicipal,
                $onibus_cidade,
                $onibus_categoria_intermunicipal,
                $onibus_ar_condicionado,
                $onibus_adaptado_deficiente
            );

            if ($result['success'] === true) {
                $result['message'] = successAlert('Onibus atualizado com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar a onibus: ' . json_encode($result['error']) . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a onibus: Algum campo não foi preenchido corretamente', false);
            $result['error_messages'] = $this->form_validation->error_array();
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }

        echo json_encode($result);
    }
}
