<?php

class Visualizar_passagens_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('visualizar_passagens_model', 'passagens');
    }
    public function index()
    {
        $data['passagens_vendidas_total'] = $this->passagens->getPassagensTotal()['result'];
        $data['passagens_vendidas_inteiras'] = $this->passagens->getPassagensTipo(1)['result'];
        $data['passagens_vendidas_meia'] = $this->passagens->getPassagensTipo(2)['result'];
        $data['passagens_vendidas_isenta'] = $this->passagens->getPassagensTipo(3)['result'];
        echo_r($data);
        //$this->load->view('visualizar_passagens_view/tela_inicial', $data);
    }
    public function getPassagensTrajetoEspecifico()
    { 
        
    }
}
