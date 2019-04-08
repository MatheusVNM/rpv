<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_Trajetos_Urbanos_Controller extends CI_Controller
{ 
    public function index(){
        $this->load->view('gerenciar_trajeto_urbano/gerenciar_Trajeto_Urbano_Inicial');
    }


    public function cadastrarnovotrajeto(){

        $this->load->view('gerenciar_trajeto_urbano/gerenciar_trajeto_urbano_criar');
    }
}
