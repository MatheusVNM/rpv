<?php


class Gerenciar_venda_passagens_online_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_intermunicipal_model', 'alocacoes');
        $this->load->model('trajeto_interurbano_model', 'trajetos');
    }

    public function index()
    {
        $this->output->enable_profiler(TRUE);
        $data['alocacoes'] = $this->alocacoes->getAlocacoes();
        print_r($data);

        //$this->load->view('gerenciar_trajeto_urbano/gerenciar_Trajeto_Urbano_Inicial', $data);
    }



}