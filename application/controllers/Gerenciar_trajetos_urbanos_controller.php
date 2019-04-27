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


    public function editarTrajeto($id = false)
    {

        $this->form_validation->set_rules('trajetourbano_id', 'ID', 'required');
        if ($this->form_validation->run() !== false) {

            $data['tarifas'] = $this->tarifas->getTarifasAtivas();
            if ($id === false) {
                $id = $this->input->post('trajetourbano_id');
            }
            $data['trajeto'] = $trajeto = $this->trajetos->getTrajetoEspecifico($id);
            $data['paradastrajeto'] = $paradastrajeto = $this->trajetos->getParadasVinculadasAoTrajeto($trajeto['trajetourbano_id']);


            $data['paradasnaovinculadas'] =  $paradasnaovinculadas = $this->trajetos->getParadasNaoVinculadasAoTrajeto($trajeto['trajetourbano_id']);

            $data['todasparadas'] = $this->paradas->getParadas();
            if (sizeof('trajeto') > 0) {
                $this->load->view('gerenciar_trajeto_urbano/gerenciar_Trajeto_Urbano_Editar', $data);
            } else {
                $this->session->set_flashdata('error', errorAlert('Aconteceu algum rrro, tente novamente'));
                redirect('dashboard/trajetos/urbanos');
            }
        } else {
            $this->session->set_flashdata('error', errorAlert('Aconteceu algum erro, tente novamente'));
            redirect('dashboard/trajetos/urbanos');
        }
    }


    public function createTrajeto()
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
                $this->session->set_flashdata('success', successAlert('Trajeto Cadastrado com Sucesso'));
                redirect('dashboard/trajetos/urbanos');
            } else {
                $this->session->set_flashdata('error', errorAlert('Deve-se ter ao menos duas paradas'));
                redirect('dashboard/trajetos/urbanos/cadastrar');
            }
        } else {
            $this->session->set_flashdata('error', errorAlert('Preencha o formulario corretamente'));
            redirect('dashboard/trajetos/urbanos/cadastrar');
        }
    }


    public function editTrajeto()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('paradas', 'Paradas', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('tempomedio', 'Tempo Médio', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('tarifa', 'Tarifa', 'required');
        $id = $this->input->post('id');

        if ($this->form_validation->run() !== false) {

            $paradas = $this->input->post('paradas');
            $nome = $this->input->post('nome');
            $tempomedio = $this->input->post('tempomedio');
            $status = $this->input->post('status');
            $tarifa =  $this->input->post('tarifa');

            //todo validate the explosion
            $paradas = explode(',', $paradas);
            if (sizeof($paradas) >= 2) {
                $this->trajetos->edit($id, $paradas, $nome, $tempomedio, $status, $tarifa);
                $this->session->set_flashdata('success', successAlert('Trajeto Cadastrado com Sucesso'));
                redirect('dashboard/trajetos/urbanos');
            } else {
                $this->session->set_flashdata('error', errorAlert('Deve-se ter ao menos duas paradas'));
                // redirect('dashboard/trajetos/urbanos/editar');
                $this->editarTrajeto($id);
            }
        } else {
            $this->session->set_flashdata('error', errorAlert('Preencha o formulario corretamente'));
            // redirect('dashboard/trajetos/urbanos/editar');
            $this->editarTrajeto($id);
        }
    }

    public function  changeStatus()
    {
        $this->form_validation->set_rules('trajetourbano_id', 'ID', 'required');

        if ($this->form_validation->run() !== false) {
            $id  = $this->input->post('trajetourbano_id', true);

            $result = $this->trajetos->changeStatusTrajeto($id);
            $this->session->set_flashdata('success',successAlert('Status do trajeto alterado com sucesso'));
                redirect('dashboard/trajetos/urbanos');
            } else {
            $this->session->set_flashdata('error',   errorAlert('Erro ao mudar status do trajeto'));
                redirect('dashboard/trajetos/urbanos');
            }
    }
}
