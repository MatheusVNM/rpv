<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
//        ECHO "000";
//        print_r($data);
        $this->load->view('geren_paradas', $data);
    }



}