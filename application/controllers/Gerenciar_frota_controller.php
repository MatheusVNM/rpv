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
        $this->load->model('onibus_municipal_model', 'onibus_municipal');
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


    public function ajax_db_insertRodoviaria()
    {

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
            $rodoviaria_rua = $this->input->post('rodoviaria_rua');
            $rodoviaria_cep = $this->input->post('rodoviaria_cep');
            $rodoviaria_nome = $this->input->post('rodoviaria_nome');
            $rodoviaria_email = $this->input->post('rodoviaria_email');
            $rodoviaria_bairro = $this->input->post('rodoviaria_bairro');
            $rodoviaria_numero = $this->input->post('rodoviaria_numero');
            $rodoviaria_qntdbox = $this->input->post('rodoviaria_qntdbox');
            $rodoviaria_telefone = $this->input->post('rodoviaria_telefone');
            $rodoviaria_cidade_id = $this->input->post('rodoviaria_cidade_id');

            $result = $this->rodoviaria->insertRodoviaria(
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
                $result['message'] = successAlert('Rodoviaria cadastrada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a rodoviaria: ' . $result['error'] . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a rodoviaria: Algum campo não foi preenchido corretamente');
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
