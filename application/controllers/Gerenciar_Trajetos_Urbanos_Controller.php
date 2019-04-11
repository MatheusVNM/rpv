<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_Trajetos_Urbanos_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('tarifa_model', 'tarifas');
        $this->load->model('parada_model', 'paradas');
        $this->load->model('trajeto_urbano_model', 'trajetos');
    }

    public function index()
    {
        $data['trajetos'] = $this->trajetos->getTrajetos();
        for ($i = 0; $i < sizeof($data['trajetos']); $i++) {
            $data['trajetos'][$i]['trajetourbano_nome_tarifa'] = $this->tarifas->getNomeTarifa($data['trajetos'][$i]['trajetourbano_tarifa'])[0]['tarifa_nome'];
        }

        // print_r($data);

        $this->load->view('gerenciar_trajeto_urbano/gerenciar_Trajeto_Urbano_Inicial', $data);
    }


    public function cadastrarnovotrajeto()
    {

        $data['possiveisParadas'] = $this->paradas->getParadas();
        $data['tarifas'] = $this->tarifas->getTarifasAtivas();

        $this->load->view('gerenciar_trajeto_urbano/gerenciar_trajeto_urbano_criar', $data);
    }


    public function editarTrajeto()
    {
        $this->form_validation->set_rules('trajetourbano_id', 'ID', 'required');
        if ($this->form_validation->run() !== false) {

            $data['tarifas'] = $this->tarifas->getTarifasAtivas();

            $data['trajeto'] = $trajeto = $this->trajetos->getTrajetoEspecifico($this->input->post('trajetourbano_id'));
            $data['paradastrajeto'] = $paradastrajeto = $this->trajetos->getParadasVinculadasAoTrajeto($trajeto['trajetourbano_id']);


            $data['paradasnaovinculadas'] =  $paradasnaovinculadas = $this->trajetos->getParadasNaoVinculadasAoTrajeto($trajeto['trajetourbano_id']);

            $this->load->view('gerenciar_trajeto_urbano/gerenciar_Trajeto_Urbano_Editar', $data);
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Aconteceu Algum Erro, tente novamente</div>');
            redirect('dashboard/trajetos/urbanos');
        }
    }


    public function createTrajeto()
    {
        $post = $this->input->post();
        print_r($post);
        echo "<br>";


        $this->form_validation->set_rules('paradas', 'Paradas', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('tempomedio', 'Tempo Médio', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tarifa', 'Tarifa', 'required');
        if ($this->form_validation->run() !== false) {

            $paradas = $this->input->post('paradas');
            $nome = $this->input->post('nome');
            $tempomedio = $this->input->post('tempomedio');
            $status = $this->input->post('status');
            $tarifa =  $this->input->post('tarifa');

            //todo validate the explosion
            $paradas = explode(',', $paradas);
            if (sizeof($paradas) >= 2) {
                $this->trajetos->create($paradas, $nome, $tempomedio, $status, $tarifa);
                $this->session->set_flashdata('success', '<div class="alert alert-success mt-3 mx-auto">Trajeto Cadastrado com Sucesso</div>');
                redirect('dashboard/trajetos/urbanos');
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Deve-se ter ao menos duas paradas</div>');
                redirect('dashboard/trajetos/urbanos/cadastrar');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Preencha o formulario corretamente</div>');
            redirect('dashboard/trajetos/urbanos/cadastrar');
        }
    }


    public function editTrajeto()
    {

        $this->form_validation->set_rules('paradas', 'Paradas', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('tempomedio', 'Tempo Médio', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tarifa', 'Tarifa', 'required');
        if ($this->form_validation->run() !== false) {

            $paradas = $this->input->post('paradas');
            $nome = $this->input->post('nome');
            $tempomedio = $this->input->post('tempomedio');
            $status = $this->input->post('status');
            $tarifa =  $this->input->post('tarifa');

            //todo validate the explosion
            $paradas = explode(',', $paradas);
            if (sizeof($paradas) >= 2) {
                $this->trajetos->create($paradas, $nome, $tempomedio, $status, $tarifa);
                $this->session->set_flashdata('success', '<div class="alert alert-success mt-3 mx-auto">Trajeto Cadastrado com Sucesso</div>');
                redirect('dashboard/trajetos/urbanos');
            } else {
                $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Deve-se ter ao menos duas paradas</div>');
                redirect('dashboard/trajetos/urbanos/cadastrar');
            }
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Preencha o formulario corretamente</div>');
            redirect('dashboard/trajetos/urbanos/cadastrar');
        }
    }
}
