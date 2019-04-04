<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerenciar_Tarifa_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tarifa_model');
    }

    public function index($data = array())
    {

        $data['tarifas'] = $this->tarifa_model->getTarifas();
        // print_r($data['tarifas']);
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_Opcao', $data);
    }


    public function editarTarifa($data=array())
    {
        $this->form_validation->set_rules('tarifa_id', 'tarifa_id', 'required');

        if ($this->form_validation->run() !== false) {
            $id  = $this->input->post('tarifa_id', true);
            $data['valores'] = $this->tarifa_model->getValoresTarifa($id);

            if (sizeof($data['valores']) > 0) {
                $data['tarifaAtual']=$this->tarifa_model->getValorTarifaVigente($id);

                $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_ValoresTarifa', $data);
            } else {
                $this->erroValoresTarifas();
            }
        } else {
                $this->erroValoresTarifas();
            }
    }

    private function erroValoresTarifas()
    {
        $this->session->set_flashdata('error','<div class="alert alert-danger mt-3 mx-auto">Erro ao tentar buscar os valores da tarifa</div>');
        $this->index();
    }


    public function cadastrarTarifaView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_NovaTarifa');
    }

    public function listarTarifasView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_ListaTarifas');
    }


    public function catastrarNovaTarifa()
    {
        // $this->tarifa_model->create();
        $this->session->set_flashdata('success' ,'<div class="alert alert-success m-2">FAKE: Tarifa cadastrada com sucesso</div>');
        $this->index();
    }

    public function atualizarValorTarifa()
    {

        $this->form_validation->set_rules('tarifa_id', 'ID', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');

        if ($this->form_validation->run() !== false) {
            $id  = $this->input->post('tarifa_id', true);
            $valor  = $this->input->post('valor', true);
            $date  = date('Y-m-d');
            
            $result = $this->tarifa_model->updateTarifa($id, $valor, $date );
            if($result['success']){
               $this->session->set_flashdata('success' , '<div class="alert alert-success m-2">Valor da tarifa atualizado com sucesso</div>');
                $this->index();
            }else{
                $this->session->set_flashdata('error' ,  '<div class="alert alert-danger mt-3 mx-auto">Erro ao atualizar as tarifas: '.$result['error'].'</div>');
                $this->editarTarifa();                
            }
            
        }else{
            $this->session->set_flashdata('error' ,   '<div class="alert alert-danger mt-3 mx-auto">Erro ao atualizar as tarifas: Algum campo ficou em branco</div>');
            $this->editarTarifa();                
        }
    }
}
