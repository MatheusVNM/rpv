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

        print_r($this->rodoviaria->insertRodoviaria('tenso', 'teste', 1, 'Coelho',
            999, 'rodo@teste.com', 69696969, 4,
            60000));
    }

    public function getRodoviarias(){

    }


}