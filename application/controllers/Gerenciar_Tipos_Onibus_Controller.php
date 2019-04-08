<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_Tipos_Onibus_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('CategoriaOnibus_model');

    }

    public function index($data = array())
    {
        $data['tipo_onibus'] = $this->parada_model->getCatOnibus();
        $this->load->view('gerenciar_tipos_onibus_intermunicipais', $data);
    }

    public function criarTipoOnibus()
    {

        $this->form_validation->set_rules('name_bairro', 'Bairro', 'required|alpha_numeric_spaces', array('required' => 'Erro! O campo bairro é obrigatório',
            'alpha_numeric_spaces' => 'Use apenas caractéres alpha númericos.'));
        $this->form_validation->set_rules('name_rua', 'Rua', 'required|alpha_numeric_spaces', array('required' => 'Erro! O campo rua é obrigatório',
            'alpha_numeric_spaces' => 'Use apenas caractéres alpha númericos.'));
        $this->form_validation->set_rules('name_nmr', 'Rua', 'required|numeric', array('required' => 'Erro! O campo número é obrigatório',
            'numeric' => 'Use apenas caractéres númericos.'));
        if ($this->form_validation->run() !== false) {
            $bairro = $this->input->post('name_bairro', true);
            $rua = $this->input->post('name_rua', true);
            $nmr = $this->input->post('name_nmr', true);
            $this->parada_model->save($bairro, $rua, $nmr);
            redirect('gerenciar_paradas_controller');
        } else {
            redirect('gerenciar_paradas_controller');
        }
    }
}