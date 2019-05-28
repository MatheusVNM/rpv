<?php


class Gerenciar_venda_passagens_online_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_intermunicipal_model', 'alocacoes');
        $this->load->model('cidade_model', 'cidades');
        $this->load->model('ocupacao_cadeira_model', 'cadeira');
        $this->output->enable_profiler(true);
    }

    public function index()
    {
        // Pegar por cidades selecionadas
        $data['alocacoes'] = $this->alocacoes->getAlocacoes()['result'];
        foreach ($data['alocacoes'] as $row) {
            $id_alocacao[] = $row['alocacaointermunicipal_id'];
        }
        $data['cadeirasdisponiveis']= $this->cadeira->getNumeroDeCadeirasDisponiveis($id_alocacao);
        $this->load->view('compra_passagem_online_view/tela_inicial', $data);

    }


}