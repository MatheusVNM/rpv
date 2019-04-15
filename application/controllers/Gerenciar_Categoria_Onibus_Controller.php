<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_Categoria_Onibus_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoriaonibus_model');

    }

    public function index($data = array())
    {
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibus();
        $this->load->view('gerenciar_categoria_onibus_intermunicipais', $data);
    }

    public function criarTipoOnibus()
    {

        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|decimal');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $this->categoriaonibus_model->save($nome, $precokm);
            $this->session->set_flashdata('success', '<div class="alert alert-success mt-3 mx-auto">Edição feita com sucesso</div>');
            redirect('Gerenciar_Categoria_Onibus_Controller');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Preencha o formulario corretamente</div>');
            redirect('Gerenciar_Categoria_Onibus_Controller');
        }
    }

    public function alterarStatusTipoOnibus()
    {
        $id = $this->input->post('id', true);
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibusEspecifica($id);
        $this->categoriaonibus_model->updateStatus($data['cat_onibus'][0]['catOnibus_id'], $data['cat_onibus'][0]['catOnibus_status']);
        redirect('Gerenciar_Categoria_Onibus_Controller');

    }

    public function editarTipoOnibus()
    {
        $id = $this->input->post('id', true);
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibusEspecifica($id);
        $this->load->view('gerenciar_categoria_onibus_intermunicipais_editar', $data);

    }

    public function atualizarCatOnibus(){
        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $id = $this->input->post('id', true);
            $this->categoriaonibus_model->update($id, $nome, $precokm);
            $this->session->set_flashdata('success', '<div class="alert alert-success mt-3 mx-auto">Edição feita com sucesso</div>');
            redirect('Gerenciar_Categoria_Onibus_Controller');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Não foi possivel salvar a edição. Por favor preencha o formulario corretamente</div>');
            redirect('Gerenciar_Categoria_Onibus_Controller');
        }

    }

}