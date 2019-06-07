<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerenciar_formas_pagamento_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forma_pagamento', 'formas');
    }

    public function index()
    {

        // $t=
        $data['formasPagamento'] = $this->formas->getFormasPagamento()['result'];
        // echo_r($t);
        $this->load->view('gerenciar_formas_pagamento_view/tela_inicial', $data);
    }

    public function updatePayments()
    {
        // echo_r($this->input->post('method'));

        $this->form_validation->set_rules('method[]', '', 'required');
        if ($this->form_validation->run() !== false) {
            $array = $this->input->post('method');
            $this->formas->updateFormasPagamento($array);
            $this->session->set_flashdata('success', successAlert('Formas de pagamento atualizadas com sucesso'));

            redirect('dashboard/formas_pagamentos');
        } else {
            $this->session->set_flashdata('error', errorAlert('Algum erro aconteceu, tente novamente mais tarde'));
            redirect('dashboard/formas_pagamentos');
        }
    }
}
