<?php

class Visualizar_passagens_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('visualizar_passagens_model', 'passagens');
    }
    public function index()
    {

        $data['passagens_vendidas_total']=$this->db->select('trajetointerurbano_nome,alocacaointermunicipal.alocacaointermunicipal_id, onibus.onibus_placa, onibus.onibus_id, COUNT(comprapassagem.comprapassagem_id)')
            ->from('alocacaointermunicipal')
            ->join('onibus', 'alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id')
            ->join('trajetointerurbano', 'trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano')
            ->join('ocupacaocadeira','ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = alocacaointermunicipal.alocacaointermunicipal_id')
            ->join('comprapassagem','comprapassagem.comprapassagem_cadeira = ocupacaocadeira.ocupacaocadeira_id')
            ->group_by('onibus.onibus_placa')
            ->group_by('alocacaointermunicipal.alocacaointermunicipal_id')->get()->result_array();
        //         // $data['passagens_vendidas_total'] =
        //          $t= $this->passagens->getPassagensTotal();
        // echo_r($t);
        //         $data['trajetos_cidade_final'] = $this->passagens->pegarTrajetoFimDeTodas()['result'];
        //         //echo_r($data);
        $this->load->view('visualizar_passagens_view/tela_inicial', $data);
    }
    public function ajax_db_getPassagensTrajetoEspecifico()
    {

        $this->form_validation->set_rules('alocacaointermunicipal_id', '', 'trim|required|numeric');
        $this->form_validation->set_rules('onibus_id', '', 'trim|required|numeric');
        if ($this->form_validation->run() !== FALSE) {
            $retorno['success'] = true;
            $retorno['data'] =$this->db->select('sum(comprapassagem_valor_compra) AS comprapassagem_valor_compra, tipo_passagem.tipo_passagem_nome_tipo, COUNT(comprapassagem.comprapassagem_tipo_passagem) ')
            ->from("comprapassagem")
            ->join("tipo_passagem", "comprapassagem_tipo_passagem=tipo_passagem_id" )
            ->join("ocupacaocadeira", "comprapassagem_cadeira=ocupacaocadeira_id")
            ->join("alocacaointermunicipal", "alocacaointermunicipal_id=ocupacaocadeira_alocacaointermunicipal")
            ->join("onibus","alocacaointermunicipal_onibus=onibus_id")->get()->result_array();
            // echo_r($this->db->error());
            // $retorno['data'] = $this->passagens->getPassagensEspecificas($this->input->post('alocacaointermunicipal_id'), $this->input->post('onibus_id'))['result'];
            echo json_encode($retorno);
        } else {
            $retorno['success'] = false;
            $retorno['error'] = validation_errors();
            $retorno['teste'] = $this->input->post();
            echo json_encode($retorno);
        };
    }
}
