<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:14 PM
 */

class Gerenciar_tarifa_encomenda_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tarifaencomenda_model', 'tarifaencomenda');
        // $this->output->enable_profiler(true);
    }

    public function index()
    {
        // $t = $this->tarifaencomenda->getTarifasEncomendas();
        // echo_r($t);
        $data['tarifas'] = $this->tarifaencomenda->getTarifasEncomendas()['result'] ?? null;
        $this->load->view('gerenciar_tarifa_encomendas_view/tela_inicial', $data);
    }

    public function ajax_db_getTarifasEncomendas()
    {
        echo json_encode($this->tarifaencomenda->getTarifasEncomendas()['result'] ?? null);
    }
    public function ajax_db_getTarifaEncomendasEspecifica()
    {
        $this->form_validation->set_rules('tarifaencomenda_id', 'ID da Tarifa', 'required|trim|numeric');
        // echo_r($this->input->post());
        if ($this->form_validation->run() !== FALSE) {
            $result = $this->tarifaencomenda->getTarifaEncomendaEspecifica($this->input->post('tarifaencomenda_id'));
            $retorno['success'] = $result['success'];
            $retorno['data'] = $result['result'] ?? null;
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }


    public function ajax_db_insertTarifaEncomenda()
    {
        // echo_r($this->input->post());
        // echo "<hr>";

        $this->form_validation->set_rules('tarifaencomenda_preco_peso', '', 'required|trim|min_length[1]|greater_than[0]|numeric');
        $this->form_validation->set_rules('tarifaencomenda_preco_volume', '', 'required|trim|min_length[1]|greater_than[0]|numeric');
        $this->form_validation->set_rules('tarifaencomenda_nome', '', 'required|trim');
        $this->form_validation->set_rules('tarifaencomenda_tipocalculo', '', 'required|trim');

        if ($this->form_validation->run() !== false) {
            $tarifaencomenda_preco_peso = $this->input->post('tarifaencomenda_preco_peso');
            $tarifaencomenda_preco_volume = $this->input->post('tarifaencomenda_preco_volume');
            $tarifaencomenda_nome   = $this->input->post('tarifaencomenda_nome');
            $tarifaencomenda_tipocalculo = $this->input->post('tarifaencomenda_tipocalculo');


            $result = $this->tarifaencomenda->insertTarifaEncomenda(
                $tarifaencomenda_preco_peso,
                $tarifaencomenda_preco_volume,
                $tarifaencomenda_nome,
                $tarifaencomenda_tipocalculo
            );

            if ($result['success'] === true) {
                $result['message'] = successAlert('Tarifa cadastrada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao cadastrar a tarifa: ' . json_encode($result['error']) . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao cadastrar a tarifa: Algum campo não foi preenchido corretamente', false);
            $result['error_messages'] = $this->form_validation->error_array();
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }

        echo json_encode($result);
    }
    public function ajax_db_updateTarifaEncomenda()
    {
        // echo_r($this->input->post());
        // echo "<hr>";

        $this->form_validation->set_rules('tarifaencomenda_id', '', 'required|trim|min_length[1]|greater_than[0]|numeric');
        $this->form_validation->set_rules('tarifaencomenda_preco_peso', '', 'required|trim|min_length[1]|greater_than[0]|numeric');
        $this->form_validation->set_rules('tarifaencomenda_preco_volume', '', 'required|trim|min_length[1]|greater_than[0]|numeric');
        $this->form_validation->set_rules('tarifaencomenda_nome', '', 'required|trim');
        $this->form_validation->set_rules('tarifaencomenda_tipocalculo', '', 'required|trim');

        if ($this->form_validation->run() !== false) {
            $tarifaencomenda_id = $this->input->post('tarifaencomenda_id');
            $tarifaencomenda_preco_peso = $this->input->post('tarifaencomenda_preco_peso');
            $tarifaencomenda_preco_volume = $this->input->post('tarifaencomenda_preco_volume');
            $tarifaencomenda_nome   = $this->input->post('tarifaencomenda_nome');
            $tarifaencomenda_tipocalculo = $this->input->post('tarifaencomenda_tipocalculo');


            $result = $this->tarifaencomenda->updateTarifaEncomenda(
                $tarifaencomenda_id,
                $tarifaencomenda_preco_peso,
                $tarifaencomenda_preco_volume,
                $tarifaencomenda_nome,
                $tarifaencomenda_tipocalculo
            );

            if ($result['success'] === true) {
                $result['message'] = successAlert('Tarifa atualizada com sucesso');
            } else {
                $result['message'] = errorAlert('Erro ao atualizar a tarifa: ' . json_encode($result['error']) . '');
            }
        } else {
            $result['success'] = false;
            $result['message'] = errorAlert('Erro ao atualizar a tarifa: Algum campo não foi preenchido corretamente', false);
            $result['error_messages'] = $this->form_validation->error_array();
            $result['error_fields'] = array();
            foreach ($this->form_validation->error_array() as $key => $value) {
                array_push($result['error_fields'], $key);
            }
        }

        echo json_encode($result);
    }

    // public function ajax_db_updateTarifaEncomenda()
    // {
    //     echo_r($this->input->post());
    //     $this->form_validation->set_rules('tarifaencomenda_numero', '', 'required|trim|min_length[1]|greater_than[0]|max_length[4]|numeric');
    //     $this->form_validation->set_rules('tarifaencomenda_marca', '', 'required|trim|strtoupper');

    //     if ($this->form_validation->run() !== false) {
    //         $tarifaencomenda_numero = $this->input->post('tarifaencomenda_numero');
    //         $tarifaencomenda_marca = $this->input->post('tarifaencomenda_marca');
    //         $result = $this->tarifaencomenda->updateTarifaEncomenda(
    //             $tarifaencomenda_numero,
    //             $tarifaencomenda_marca
    //         );

    //         if ($result['success'] === true) {
    //             $result['message'] = successAlert('tarifaencomenda cadastrado com sucesso');
    //         } else {
    //             $result['message'] = errorAlert('Erro ao cadastrar a tarifaencomenda: ' . json_encode($result['error']) . '');
    //         }
    //     } else {
    //         $result['success'] = false;
    //         $result['message'] = errorAlert('Erro ao cadastrar a tarifaencomenda: Algum campo não foi preenchido corretamente', false);
    //         $result['error_messages'] = $this->form_validation->error_array();
    //         $result['error_fields'] = array();
    //         foreach ($this->form_validation->error_array() as $key => $value) {
    //             array_push($result['error_fields'], $key);
    //         }
    //     }

    //     echo json_encode($result);
    // }

}
