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

        $this->load->view('compra_passagem_online_view/tela_inicial');

    }

    public function ajax_db_getAlocacoesPorCidade()
    {

        $this->form_validation->set_rules('origem_id', 'ID da Origem', 'required|trim|numeric');
        $this->form_validation->set_rules('destino_id', 'ID do Destino', 'required|trim|numeric');
        $this->form_validation->set_rules('data_id', 'ID da Data', 'required|matches[(0[1-9]|[12][0-9]|3[01])[-](0[1-9]|1[012])[-]\d{4}]');
        if ($this->form_validation->run() !== false) {
            $origem = $this->input->post('origem_id', true);
            $destino = $this->input->post('destino_id', true);
            $dataSaida = $this->input->post('data_id', true);
            $data['success'] = true;
            $data['alocacoes'] = $this->alocacoes->getAlocacoesPorCidade($origem, $destino, $dataSaida)['result'] ?? null;
            $data['cadeirasdisponiveis'] = $this->countCadeirasDisponiveis($data['alocacoes']);
            echo json_encode($data);
        } else {
            $data['success'] = false;
            $data['error'] = validation_errors();
            echo json_encode($data);
        }

    }


    //todo falta a entrada do métodos post -> + válidações
    public function countCadeirasDisponiveis($data)
    {

        foreach ($data as $row) {
            $id_alocacao[] = $row['alocacaointermunicipal_id'];
        }
        return $this->cadeira->getNumeroDeCadeirasDisponiveis($id_alocacao);

    }

    public function ajax_db_getVenderCadeira()
    {


    }

}