<?php
defined('BASEPATH') or exit('No direct script access allowed');


class gerenciar_categoria_onibus_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoria_onibus_model');

    }

    public function index($data = array())
    {
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibus();
        $this->load->view('gerenciar_categoria_onibus_view/tela_inicial', $data);
    }

    public function _insertCategoriaOnibus()
    {

        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|decimal');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $this->categoriaonibus_model->save($nome, $precokm);
            $this->session->set_flashdata('success', successAlert('Edição feita com sucesso'));
        } else {
            $this->session->set_flashdata('error', errorAlert('Preencha o formulario corretamente'));
        }
        redirect('dashboard/categorias/onibus');

    }

    public function _updateStatusCategoriaOnibus()
    {
        $id = $this->input->post('id', true);
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibusEspecifica($id);
        $this->categoriaonibus_model->updateStatus($data['cat_onibus'][0]['catOnibus_id'], $data['cat_onibus'][0]['catOnibus_status']);
        redirect('dashboard/categorias/onibus');

    }

    public function editarCategoriaOnibus()
    {
        $id = $this->input->post('id', true);
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibusEspecifica($id);
        $this->load->view('gerenciar_categoria_onibus_view/tela_editar', $data);

    }

    public function atualizarCatOnibus(){
        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $id = $this->input->post('id', true);
            $this->categoriaonibus_model->update($id, $nome, $precokm);
            $this->session->set_flashdata('success', successAlert('Edição feita com sucesso'));
            redirect('dashboard/categorias/onibus');
        } else {
            $this->session->set_flashdata('error', errorAlert('Não foi possivel salvar a edição. Por favor preencha o formulario corretamente'));
            redirect('dashboard/categorias/onibus');
        }

    }

}