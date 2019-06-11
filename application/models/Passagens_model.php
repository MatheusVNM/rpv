<?php


class Passagens_model extends CI_Model
{



    public function getPassagensUsuarioLogado()
    {
        $result = $this->db->select('comprapassagem.*, ocupacaocadeira_numero, c1.cidade_nome as cidade_origem, c2.cidade_nome as cidade_destino, alocacaointermunicipal_id,alocacaointermunicipal_data_hora_inicio,alocacaointermunicipal_trajetointerurbano,  rotas_trajetointerurbano_id, rotas_trajetointerurbano_tempo,  rotas_trajetointerurbano_tempo_origem, trajetointerurbano_nome')
            ->distinct()
            ->from('comprapassagem' )
            ->join('ocupacaocadeira', 'comprapassagem_cadeira=ocupacaocadeira_id')
            ->join('alocacaointermunicipal','ocupacaocadeira_alocacaointermunicipal=alocacaointermunicipal_id')
            ->join('trajetointerurbano', 'alocacaointermunicipal_trajetointerurbano=trajetointerurbano_id')
            ->join('rotas_trajetointerurbano', 'trajetointerurbano_id=rotas_trajetointerurbano_trajeto_id')
            ->join('cidade c1', 'c1.cidade_id=rotas_trajetointerurbano_cidade_origem')
            ->join('cidade c2', 'c2.cidade_id=rotas_trajetointerurbano_cidade_destino')
            ->group_by('comprapassagem.comprapassagem_id')
            ->order_by('comprapassagem_data', 'DESC')
            ->where('comprapassagem_usuario',  $this->session->userdata('id'))->get()->result_array()  ;
            // echo_r($this->db->error());
            // echo_r($result);
            return $result;
    }

    public function criarPassagemComUsuario($idCadeira, $precocadeira)
    {

        $this->db->select('IFNULL(MAX(`comprapassagem_id`), 0) AS `maxid`', false);
        $codigo = sprintf('TKT%07d', ($this->db->get('comprapassagem', 1)->result_array()[0]['maxid'] + 1));

        $insertArray = array(
            'comprapassagem_usuario' => $this->session->userdata('id'),
            'comprapassagem_valor_compra' => $precocadeira,
            'comprapassagem_data' => date("Y-m-d H:i:s"),
            'comprapassagem_cadeira' => $idCadeira,
            'comprapassagem_pontos_gerados' => $precocadeira * 10,
            'comprapassagem_num_ticket' => $codigo,
            'comprapassagem_tipo_passagem' => $this->session->userdata('dados')['tipo_passagem_id'],
        );
        // echo_r($insertArray);
        $this->db->insert('comprapassagem', $insertArray);

        $this->load->model('usuario_model');
        $this->usuario_model->somarPontosUsuarioLogado($precocadeira*10);
        return $codigo;
    }
}
