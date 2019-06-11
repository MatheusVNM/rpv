<?php


class Gerenciar_venda_passagens_online_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alocacao_intermunicipal_model', 'alocacoes');
        $this->load->model('cidade_model', 'cidades');
        $this->load->model('ocupacao_cadeira_model', 'cadeira');
        $this->load->model('usuario_model');
        // $this->output->enable_profiler(true);
    }

    public function index()
    {
        // $data['alocacoes'] = $this->alocacoes->getAlocacoesPorCidades(4214, 4174, new DateTime('2019-05-30'))['result'];
        // echo_r($data['alocacoes']);
        $data['cidades'] = $this->cidades->getCidades()['result'];
        // echo_r($t);
        $this->load->view('compra_passagem_online_view/tela_inicial', $data);
    }

    public function selecionarAcento()
    {
        $this->form_validation->set_rules('alocacaointermunicipal_id', 'ID da alocacao', 'required|trim|numeric|greater_than[0]');
        $this->form_validation->set_rules('rotas_trajetointerurbano_id', 'ID da rota', 'required|trim|numeric|greater_than[0]');
        if ($this->form_validation->run() !== false) {
            $id = $this->input->post('alocacaointermunicipal_id');
            $rota = $this->input->post('rotas_trajetointerurbano_id');
            $resultAlocacao = $this->alocacoes->getAlocacao($id, $rota);
            if ($resultAlocacao['success'] === true) {
                $data['pontos']=$this->usuario_model->getPontosUsuarioLogado();
                $data['alocacao'] = $resultAlocacao['result'];
                $data['cadeirasOcupadas'] = $this->cadeira->getCadeirasOcupadasPorAlocacao($id)['result'];
                // $data['configs'] = $this->cadeira->getCadeirasOcupadasPorAlocacao($id)['result'];
                $this->load->view('compra_passagem_online_view/selecao_acento', $data);
            } else {
                $this->session->set_flashdata('error', errorAlert('Algum erro ocorreu, tente novamente'));
                // redirect('clientes/compra_passagem');
                echo_r($resultAlocacao);
            }
        } else {
            $this->session->set_flashdata('error', errorAlert('Algum erro ocorreu, tente novamente'));
            // redirect('clientes/compra_passagem');
            echo validation_errors();
        }
    }



    public function ajax_db_getAlocacoesPorCidade()
    {

        $this->form_validation->set_rules('origem_id', 'ID da Origem', 'required|trim|numeric');
        $this->form_validation->set_rules('destino_id', 'ID do Destino', 'required|trim|numeric');
        $this->form_validation->set_rules('data', 'Data', 'required|trim');
        if ($this->form_validation->run() !== false) {
            $origem = $this->input->post('origem_id', true);
            $destino = $this->input->post('destino_id', true);
            $dataSaida = $this->input->post('data', true);
            $result = $this->alocacoes->getAlocacoesPorCidades($origem, $destino,  new DateTime($dataSaida)) ?? null;
            $data['success'] = $result === null ? false : $result['success'];
            if ($data['success'] === true)
                $data['alocacoes'] = $this->alocacoes->getAlocacoesPorCidades($origem, $destino,  new DateTime($dataSaida))['result'] ?? null;
            else
                $data['noresult'] = true;

            // echo_r($data['alocacoes']);
            // $data['cadeirasdisponiveis'] = $this->countCadeirasDisponiveis($data['alocacoes']);
            echo json_encode($data);
        } else {
            $data['success'] = false;
            $data['error'] = validation_errors();
            echo json_encode($data);
        }
    }


    public function ajax_db_comprarPassagem()
    {
        // echo_r($this->input->post());
        $this->form_validation->set_rules('alocacaointermunicipal_id', 'ID da alocacao', 'required|trim|numeric');
        $this->form_validation->set_rules('rotas_trajetointerurbano_id', 'ID da rota', 'required|trim|numeric');
        $this->form_validation->set_rules('cadeiras[]', 'Cadeiras', 'required');
        if ($this->form_validation->run() !== false) {
            $alocacao_id=$this->input->post("alocacaointermunicipal_id");
            $rota=$this->input->post("rotas_trajetointerurbano_id");
            $cadeiras=$this->input->post("cadeiras");
            $result = $this->alocacoes->efetuarCompra($alocacao_id, $cadeiras, $rota);
            // echo_r($result);
            $data['success'] = $result === null ? false : $result['success'];
            if ($data['success'] === true){
                $data['tickets'] = $result['tickets'];
                // $data['alocacoes'] = $this->alocacoes->getAlocacoesPorCidades($origem, $destino,  new DateTime($dataSaida))['result'] ?? null;
            }
            else{
                $data['noresult'] = true;
                $data['db_error'] = $this->db->error();
            }

            // echo_r($data['alocacoes']);
            // $data['cadeirasdisponiveis'] = $this->countCadeirasDisponiveis($data['alocacoes']);
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
    { }
}
