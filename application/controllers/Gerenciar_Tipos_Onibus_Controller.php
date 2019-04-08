<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_Tipos_Onibus_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categoriaonibus_model');

    }

    public function index($data = array())
    {   $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibus();
        $this->load->view('gerenciar_tipos_onibus_intermunicipais', $data);
    }

    public function criarTipoOnibus()
    {

        $this->form_validation->set_rules('name_nome', 'Bairro', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('name_precokm', 'Rua', 'required|decimal');
        if ($this->form_validation->run() !== false) {
            $nome = $this->input->post('name_nome', true);
            $precokm = $this->input->post('name_precokm', true);
            $this->categoriaonibus_model->save($nome, $precokm);
            redirect('gerenciar_tipos_onibus_controller');
        } else {
           redirect('gerenciar_tipos_onibus_controller');
        }
    }

    public function alterarStatusTipoOnibus()
    {
        $id = $this->input->post('id', true);
        $data['cat_onibus'] = $this->categoriaonibus_model->getCatOnibusEspecifica($id);
        $this->parada_model->updateStatus($data['cat_onibus'][0]['catOnibus_id'], $data['cat_onibus'][0]['catOnibus_status'] );
        redirect('gerenciar_paradas_controller');

    }

}