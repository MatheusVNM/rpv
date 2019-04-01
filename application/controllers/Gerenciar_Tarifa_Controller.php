<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerenciar_Tarifa_Controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_Opcao');
    }



    public function cadastrarTarifaView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_NovaTarifa');
    }

    public function listarTarifasView()
    {
        $this->load->view('gerenciar_tarifa/gerenciar_Tarifa_ListaTarifas');
    }

}



