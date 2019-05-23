<?php


class Alocacao_intermunicipal_model extends CI_Model
{

    public function getAlocacoesVendaOnline()
    {

//        $this->db->select('alocacaointermunicipal.*, onibus.onibus_adaptado_deficiente, onibus.onibus_is_intermunicipal, onibus.onibus_categoria_intermunicipal, categoriaonibus.categoriaonibus_nome,
//        categoriaonibus.categoriaonibus_precokm, funcionarios.funcionarios_nome,
//        trajetointerurbano.trajetointerubano_cidadeInicio, trajetointerurbano.trajetointerubano_cidadeFim, trajetointerurbano.trajetointerubano_distanciaTotal,
//        cidade.cidade_nome.');
//        $this->db->join('onibus', 'alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id');
//        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id');
//        $this->db->join('trajetointerurbano', 'trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.trajetointerurbano');
//        $this->db->join('cidade', 'cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeInicio');
//        $this->db->join('cidade', 'cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeFim');
//        $this->db->from('alocacaointermunicipal');
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