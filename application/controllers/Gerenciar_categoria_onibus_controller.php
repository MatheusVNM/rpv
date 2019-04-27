<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_categoria_onibus_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoria_onibus_model');

    }

    public function index($data = array())
    {   
        $data['categoriaonibus'] = $this->categoria_onibus_model->getcategoriaonibus();
        $this->load->view('gerenciar_categoria_onibus_view/tela_inicial', $data);
    }

    public function db_insertCategoriaOnibus()
    {

        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|decimal');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $this->categoria_onibus_model->save($nome, $precokm);
            $this->session->set_flashdata('success', successAlert('Edição feita com sucesso'));
        } else {
            $this->session->set_flashdata('error', errorAlert('Preencha o formulario corretamente'));
        }
        redirect('dashboard/categorias/onibus');

    }

    public function db_updateStatusCategoriaOnibus()
    {
        $id = $this->input->post('id', true);
        $this->categoria_onibus_model->updateStatus($id);
         redirect('dashboard/categorias/onibus');

    }

    public function view_editarCategoriaOnibus()
    {
        $id = $this->input->post('id', true);
        $data['categoriaonibus'] = $this->categoria_onibus_model->getcategoriaonibussEspecifica($id);
        $this->load->view('gerenciar_categoria_onibus_view/tela_editar', $data);

    }

    public function db_updateCategoriaOnibus(){
        $this->form_validation->set_rules('name_nome', 'Bairro', 'required');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $id = $this->input->post('id', true);
            $this->categoria_onibus_model->update($id, $nome, $precokm);
            $this->session->set_flashdata('success', successAlert('Edição feita com sucesso'));
            redirect('dashboard/categorias/onibus');
        } else {
            $this->session->set_flashdata('error', errorAlert('Não foi possivel salvar a edição. Por favor preencha o formulario corretamente'));
            redirect('dashboard/categorias/onibus');
        }

    }

}