<?php


class Alocacao_intermunicipal_model extends CI_Model
{

    public function getAlocacoes()
    {

        $this->db->select('*');
        $this->db->join('onibus', 'alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id');
        $this->db->join('trajetointerurbano', 'trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano');
        $this->db->join('funcionarios', 'funcionarios.funcionarios_id = alocacaointermunicipal.alocacaointermunicipal_motorista');
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

    public function getAlocacoesPorCidades($id_cidade)
    {

//
//        $this->db->select('alocacaointermunicipal.*');
//        $this->db->from('alocacacaointermunicipal');
//        //$this->db->where()
//        $result = $this->db->get();
//        if (!$result) {
//            $retorno['success'] = false;
//            $retorno['error'] = $this->db->error();
//            return $retorno;
//        }
//        if ($result->num_rows() > 0) {
//            $retorno['success'] = true;
//            $retorno['result'] = $result->result_array();
//            return $retorno;
//        } else {
//            $retorno['success'] = false;
//            return $retorno;
//        }


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