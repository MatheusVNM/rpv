<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/9/2019
 * Time: 9:09 PM
 */

class Gerenciar_manutencoes_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manutencao_model');
    }

    public function index()
    {
        $data['manutencoes'] = $this->manutencao_model->getManutencoes();
        $this->load->view('gerenciar_manutencao_view/tela_inicial', $data);

    }

}