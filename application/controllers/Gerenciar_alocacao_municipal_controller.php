<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/11/2019
 * Time: 3:59 PM
 */

class Gerenciar_alocacao_municipal_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_municipal_model', 'alocacao');
        $this->load->model('funcionarios_model', 'funcionarios');
        $this->output->enable_profiler(true);
    }

    public function index()
    {
        $data['alocacoes'] = $this->alocacao->getAlocacoes()['result'];
        $data['funcionarios'] = $this->funcionarios->getFuncionarios()['result'];
        print_r($data['alocacoes']);
        //print_r($data['funcionarios']);
        //$this->load->view('gerenciar_rodoviaria_view/tela_inicial', $data);
    }

}