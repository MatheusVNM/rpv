<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/10/2019
 * Time: 8:26 PM
 */

class Alocacao_municipal_model extends CI_Model
{
    public function getAlocacoes()
    {
        $this->db->select('alocacaomunicipal.alocacaomunicipal_dataInicial, alocacaomunicipal.alocacaomunicipal_dataFinal, onibus.onibus_placa, trajetourbano.trajetourbano_nome');
        $this->db->join('onibus', 'onibus.onibus_id = alocacaomunicipal.alocacaomunicipal_onibus_id');
        $this->db->join('trajetourbano', 'trajetourbano.trajetourbano_id = alocacaomunicipal.alocacaomunicipal_trajetourbano_id');
        $this->db->from('alocacaomunicipal');
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

    public function getAlocacao()
    {

    }

    public function insertAlocacao()
    {


    }

    public function updateAlocacao()
    {

    }
}