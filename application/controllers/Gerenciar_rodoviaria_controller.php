<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:14 PM
 */

class Gerenciar_rodoviaria_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rodoviaria_model', 'rodoviaria');
        $this->output->enable_profiler(false);
    }

    public function index()
    {
        $data['rodoviarias'] = $this->rodoviaria->getRodoviarias();
        $this->load->view('gerenciar_rodoviaria_view/tela_inicial', $data);
    }

    public function db_insert(){

        print_r($this->input->post());


        // $this->rodoviaria->insertRodoviaria($rodoviaria_nome, $rodoviaria_rua, $rodoviaria_numero, $rodoviaria_bairro,
        // $rodoviaria_cep, $rodoviaria_email, $rodoviaria_telefone, $rodoviaria_qntdbox,
        // $rodoviaria_cidade)
    }


}