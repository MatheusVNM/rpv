<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:14 PM
 */

class gerenciar_rodoviaria_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('rodoviaria_model', 'rodoviaria');
        $this->output->enable_profiler(false);
    }

    public function index()
    {
//        $data['rodoviarias'] = $this->rodoviaria_model->getRodoviarias();
//        $this->load->view('gerenciar_rodoviaria_view/tela_inicial', $data);
        $r = $this->rodoviaria->getRodoviarias();
        print_r($r);

    }



}