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
        // echo_r($data);
        $this->load->view('gerenciar_frota_view/tela_inicial', $data);
    }

    public function ajax_db_getFrotaIntermunicipal()
    {
        echo json_encode($this->onibus->getOnibus()['result'] ?? null);
    }
    public function ajax_db_getFrotaMunicipal()
    {
        echo json_encode($this->onibus_municipal->getOnibus()['result'] ?? null);
    }

    public function ajax_db_getOnibusEspecifico()
    {
        $this->form_validation->set_rules('onibus_id', 'ID do Onibus', 'trim|required|numeric');

        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] = $this->onibus->getRodoviaria($this->input->post('rodoviaria_id'))['result'];

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
        $this->form_validation->set_rules('onibus_placa', '', 'required');
        $this->form_validation->set_rules('onibus_numero', '', 'required');
        $this->form_validation->set_rules('onibus_numero_antt', '', 'required');
        $this->form_validation->set_rules('onibus_num_chassis', '', 'required');
        $this->form_validation->set_rules('onibus_num_lugares', '', 'required');
        $this->form_validation->set_rules('onibus_marca', '', 'required');
        $this->form_validation->set_rules('onibus_potencial_motor', '', 'required');
        $this->form_validation->set_rules('onibus_propriedade_veiculo', '', 'required');
        $this->form_validation->set_rules('onibus_ano_fab', '', 'required');
        $this->form_validation->set_rules('onibus_quilometragem', '', 'required');
        $this->form_validation->set_rules('onibus_is_municipal', '', 'required');
        // echo_r($this->input->post());
        echo $this->input->post('onibus_cidade');
        if ($this->input->post('onibus_is_municipal')) {
            if (filter_var($this->input->post('onibus_is_municipal'), FILTER_VALIDATE_BOOLEAN)) {
                $isMunicipal = true;
                $this->form_validation->set_rules('onibus_cidade', '', 'required|numeric|greater_than[0]');
            } else {
                $isMunicipal = false;
                $this->form_validation->set_rules('onibus_categoria_intermunicipal', '', 'required');
            }
        }
        $this->form_validation->set_rules('onibus_ar_condicionado', '', 'required');
        $this->form_validation->set_rules('onibus_adaptado_deficiente', '', 'required');

        //    echo_r($this->input->post());

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


            if ($result['success']) {
                $result['message'] = successAlert('Onibus cadastrado com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a onibus: ' . json_encode($result['error']) . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a onibus: Algum campo não foi preenchido corretamente');
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }

        echo json_encode($result);
    }

    public function ajax_db_updateRodoviaria()
    {
        $this->form_validation->set_rules('rodoviaria_id', 'Rua', 'required');
        $this->form_validation->set_rules('rodoviaria_rua', 'Rua', 'required');
        $this->form_validation->set_rules('rodoviaria_cep', 'Cep', 'required');
        $this->form_validation->set_rules('rodoviaria_nome', 'Email', 'required');
        $this->form_validation->set_rules('rodoviaria_email', 'Email', 'required');
        $this->form_validation->set_rules('rodoviaria_bairro', 'Bairro', 'required');
        $this->form_validation->set_rules('rodoviaria_numero', 'NUmero', 'required|numeric');
        $this->form_validation->set_rules('rodoviaria_qntdbox', 'Boxes', 'required|numeric');
        $this->form_validation->set_rules('rodoviaria_telefone', 'telefone', 'required|numeric');
        $this->form_validation->set_rules('rodoviaria_cidade_id', 'Nome da Cidade', 'required|numeric');

        if ($this->form_validation->run() !== false) {
            $rodoviaria_id = $this->input->post('rodoviaria_id');
            $rodoviaria_rua = $this->input->post('rodoviaria_rua');
            $rodoviaria_cep = $this->input->post('rodoviaria_cep');
            $rodoviaria_nome = $this->input->post('rodoviaria_nome');
            $rodoviaria_email = $this->input->post('rodoviaria_email');
            $rodoviaria_bairro = $this->input->post('rodoviaria_bairro');
            $rodoviaria_numero = $this->input->post('rodoviaria_numero');
            $rodoviaria_qntdbox = $this->input->post('rodoviaria_qntdbox');
            $rodoviaria_telefone = $this->input->post('rodoviaria_telefone');
            $rodoviaria_cidade_id = $this->input->post('rodoviaria_cidade_id');

            $result = $this->rodoviaria->updateRodoviaria(
                $rodoviaria_id,
                $rodoviaria_nome,
                $rodoviaria_rua,
                $rodoviaria_numero,
                $rodoviaria_bairro,
                $rodoviaria_cep,
                $rodoviaria_email,
                $rodoviaria_telefone,
                $rodoviaria_qntdbox,
                $rodoviaria_cidade_id
            );

            if ($result['success']) {
                $result['message'] = successAlert('Rodoviaria atualizada com sucess o');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar arodoviaria: '  . $result['error'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a rodoviaria: Algum campo não foi preenchido corretamente');
        }

        echo json_encode($result);
    }
}
