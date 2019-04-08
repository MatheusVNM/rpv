<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id;

class Paradas_Controller extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('parada_model');

    }

    public function index($data = array())
    {
        $data['paradas'] = $this->parada_model->getParadas();
        $this->load->view('geren_paradas', $data);
    }

    public function criarParada()
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
            redirect('paradas_controller');
        } else {
            redirect('paradas_controller');
        }


    }

    public function statusParada()
    {
        $id = $this->input->post('id', true);
        $data['parada'] = $this->parada_model->getParadaEspecifica($id);
        $this->parada_model->updateStatus($data['parada'][0]['parada_id'], $data['parada'][0]['parada_status'] );
        redirect('paradas_controller');



    }

    public function editarParada()
    {
        $id = $this->input->post('id', true);
        $data['parada'] = $this->parada_model->getParadaEspecifica($id);
        $this->load->view('geren_paradas_editar', $data);
    }


    public function atualizarParada()
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
            $id = $this->input->post('id', true);
            $this->parada_model->update($id, $bairro, $rua, $nmr);
            redirect('paradas_controller');
        } else {
            redirect('paradas_controller');
        }

    }

    public function cancelar()
    {


    }


}