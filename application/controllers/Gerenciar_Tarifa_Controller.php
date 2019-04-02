<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerenciar_Tarifa_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tarifa_model');
    }

    public function index($data=array())
    {

        $data['tarifas'] = $this->tarifa_model->getTarifas();


        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_Opcao', $data);
    }


    public function editarTarifa()
    {
        $this->form_validation->set_rules('tarifa_id', 'tarifa_id', 'required');

        if ($this->form_validation->run() !== false) {
            $id  = $this->input->post('tarifa_id', true);
            $valores['valores'] = $this->tarifa_model->getValoresTarifa($id);


            //gambi
            foreach ($valores['valores'] as $valor) {
                if ($valor['valores_is_vigente'] == true)
                $valores['tarifaAtual'] = $valor;
            }


            $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_ValoresTarifa', $valores);
        } else {
            $data['error'] = '<div class="alert alert-danger mt-3 mx-auto">Erro ao tentar buscar as tarifas</div>';
            $this->index($data);
        }
    }


    public function cadastrarTarifaView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_NovaTarifa');
    }

    public function listarTarifasView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_ListaTarifas');
    }


    public function catastrarNovaTarifa(){
        // $this->tarifa_model->create();
            $data['sucessocadastro']='<div class="alert alert-success m-2">Tarifa cadastrada com sucesso</div>';
            $this->index($data);
    }

    public function atualizarValorTarifa(){
        // $this->tarifa_model->updateValue();
        $data['sucessoatt']='<div class="alert alert-success m-2">Valor da tarifa atualizado com sucesso</div>';
        $this->index($data);

    }
}
