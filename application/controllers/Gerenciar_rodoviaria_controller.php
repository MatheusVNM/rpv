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
        $data = $this->rodoviaria->insertRodoviaria("dsfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddd", 'Maximinio', 120, 'Segabinazzi', 97543-410
            , 'teste@teste.com', "(55)997328105", 4,
            1);
        print_r($data);
//        $data['rodoviarias'] = $this->rodoviaria->getRodoviarias();
//        $this->load->view('gerenciar_rodoviaria_view/tela_inicial', $data);
    }


}