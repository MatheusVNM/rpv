<?php


class Alocacao_intermunicipal_model extends CI_Model
{

    public function getAlocacoes()
    {

        $this->db->select('alocacaointermunicipal.*, cidade_trajetointerurbano.cidade_trajetointerurbano_saidaDaCidade, cidade_trajetointerurbano.cidade_trajetointerurbano_chegadaNoDestino, 
        categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, trajetointerurbano.trajetointerurbano_distanciaTotal');
        $this->db->join('onibus', 'alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id');
        $this->db->join('trajetointerurbano', 'trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano');
        $this->db->join('cidade_trajetointerurbano', 'cidade_trajetointerurbano.cidade_trajetointerurbano_trajeto = trajetointerurbano.trajetointerurbano_id');
        $this->db->join('cidade', 'cidade_trajetointerurbano.cidade_trajetointerurbano_cidade = cidade_id');
        $this->db->from('alocacaointermunicipal');

        $result = $this->db->get();
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }

    public function getAlocacoesPorCidades($origem_id, $destino_id, $data_id)
    {

        // -Receber as cidades e a data -ok 
        // -Procurar todas as rotas que possuam a cidade $1 e que passam para a cidade $2 -ok 
        // -Procurar alocações daquela rota na data $3 que tenham cadeiras disponíveis -ok
        // -Fazer o calculo da hora de saida e de chegada -ok
        // -Retornar um array com todas as alocações, hora de saida e chegada -ok
        // -Verificar a história dos onibus -Q

        // echo_r(array($data_id));
        // $result = $this->db->select('trajetointerurbano.*,rotas_trajetointerurbano.rotas_trajetointerurbano_cidade_origem, rotas_trajetointerurbano.rotas_trajetointerurbano_cidade_destino, rotas_trajetointerurbano.rotas_trajetointerurbano_tempo, rotas_trajetointerurbano.rotas_trajetointerurbano_distancia')


        $result = $this->db->select('alocacaointermunicipal_id,alocacaointermunicipal_data_hora_inicio,alocacaointermunicipal_trajetointerurbano, categoriaonibus_nome, rotas_trajetointerurbano_tempo,  rotas_trajetointerurbano_tempo_origem, trajetointerurbano_nome, count(ocupacaocadeira.ocupacaocadeira_id) as count_cadeiras_livres, (rotas_trajetointerurbano_distancia*categoriaonibus_precokm) as precocadeira')
            ->distinct()
            ->from('alocacaointermunicipal')
            ->join('trajetointerurbano', 'alocacaointermunicipal_trajetointerurbano=trajetointerurbano_id')
            ->join('onibus', 'alocacaointermunicipal_onibus=onibus_id')
            ->join('categoriaonibus', 'categoriaonibus_id=onibus_categoria_intermunicipal')
            ->join('ocupacaocadeira', 'ocupacaocadeira_alocacaointermunicipal=alocacaointermunicipal_id')
            ->join('rotas_trajetointerurbano', 'trajetointerurbano_id=rotas_trajetointerurbano_trajeto_id')
            ->where("(rotas_trajetointerurbano_cidade_origem=$origem_id and rotas_trajetointerurbano_cidade_destino=$destino_id )", null, false)
            ->where("(alocacaointermunicipal_data_hora_inicio >='" . $data_id->format("Y-m-d") . "' and alocacaointermunicipal_data_hora_inicio<'" . $data_id->modify('+1 day')->format("Y-m-d") . "' )", null, false)
            ->where("ocupacaocadeira_isOcupado", "false")
            ->get();

        // ->get();

        // if ($result->num_rows() > 0) {
        //     $retorno['success'] = true;
        //     $retorno['result'] = $result->result_array();
        //     return $retorno;
        // } else {
        //     $retorno['success'] = false;
        //     return $retorno;
        // }
        if ($result==false) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        } if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            for ($i = 0; $i < sizeof($retorno['result']); $i++) {
                $start = $retorno['result'][$i]['alocacaointermunicipal_data_hora_inicio'];
                $horasaida = $retorno['result'][$i]['alocacaointermunicipal_hora_saida'] = date('Y-m-d H:i:s', strtotime('+' . $retorno['result'][$i]['rotas_trajetointerurbano_tempo_origem'] . ' minutes', strtotime($start)));
                $retorno['result'][$i]['alocacaointermunicipal_hora_chegada'] = date('Y-m-d H:i:s', strtotime('+' . $retorno['result'][$i]['rotas_trajetointerurbano_tempo'] . ' minutes', strtotime($horasaida)));
                
            }
        } else {
            $retorno['success'] = false;
        }
        // echo_r($retorno);
        return $retorno;



        //
        //        $this->db->select('alocacaointermunicipal.*, cidade_trajetointerurbano.cidade_trajetointerurbano_distancia_ponto_inicial, cidade_trajetointerurbano.cidade_trajetointerurbano_chegadaNoDestino,
        //        categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, trajetointerurbano.trajetointerurbano_distanciaTotal');
        //        $this->db->join('onibus', 'alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id');
        //        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id');
        //        $this->db->join('trajetointerurbano', 'trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano');
        //        $this->db->join('cidade_trajetointerurbano', 'cidade_trajetointerurbano.cidade_trajetointerurbano_trajeto = trajetointerurbano.trajetointerurbano_id');
        //        $this->db->join('cidade', 'cidade_trajetointerurbano.cidade_trajetointerurbano_cidade = cidade_id');
        //        $this->db->from('alocacaointermunicipal');
        //        $this->db->where($data);

        // $result = $this->db->get();
        // if (!$result) {
        //     $retorno['success'] = false;
        //     $retorno['error'] = $this->db->error();
        //     return $retorno;
        // }
        // if ($result->num_rows() > 0) {
        //     $retorno['success'] = true;
        //     $retorno['result'] = $result->result_array();
        //     return $retorno;
        // } else {
        //     $retorno['success'] = false;
        //     return $retorno;
        // }



    }

    public function getAlocacao()
    { }


    public function insertAlocacao()
    { }


    public function updateAlocacao()
    { }
}
