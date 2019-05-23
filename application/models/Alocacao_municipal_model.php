<?php

class Alocacao_municipal_model extends CI_Model
{
    public function getAlocacoes()
    {
        $this->db->select('*');
        $this->db->join('onibus', 'alocacaomunicipal.alocacaomunicipal_onibus_id = onibus.onibus_id');
        $this->db->join('trajetourbano', 'trajetourbano.trajetourbano_id = alocacaomunicipal.alocacaomunicipal_trajetourbano_id');
        $this->db->join('cidade', 'cidade.cidade_id = onibus.onibus_cidade_id');
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
    public function getAlocacao($id)
    {
        $this->db->select('*');
        $this->db->join('onibus', 'alocacaomunicipal.alocacaomunicipal_onibus_id = onibus.onibus_id');
        $this->db->join('trajetourbano', 'trajetourbano.trajetourbano_id = alocacaomunicipal.alocacaomunicipal_trajetourbano_id');
        $this->db->join('cidade', 'cidade.cidade_id = onibus.onibus_cidade_id');
        $this->db->join('funcionarios', ' funcionarios.funcionarios_id = alocacaomunicipal.alocacaomunicipal_motorista_id or 
        funcionarios.funcionarios_id = alocacaomunicipal.alocacaomunicipal_cobrador_id');
        $this->db->from('alocacaomunicipal');
        $this->db->where('alocacaomunicipal_id', $id);
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
    public function insertAlocacao(
        $alocacaomunicipal_cobrador_id,
        $alocacaomunicipal_dataFinal,
        $alocacaomunicipal_dataInicio,
        $alocacaomunicipal_motorista_id,
        $alocacaomunicipal_onibus_id,
        $alocacaomunicipal_trajetoUrbano_id
    ) {
        $this->db->select('IFNULL(MAX(`alocacaomunicipal_id`), 0) AS `maxid`', false);
        $data = array(
            'alocacaomunicipal_cobrador_id' => $alocacaomunicipal_cobrador_id,
            'alocacaomunicipal_dataFinal' => $alocacaomunicipal_dataFinal,
            'alocacaomunicipal_dataInicio' => $alocacaomunicipal_dataInicio,
            'alocacaomunicipal_motorista_id' => $alocacaomunicipal_motorista_id,
            'alocacaomunicipal_onibus_id' => $alocacaomunicipal_onibus_id,
            'alocacaomunicipal_trajetoUrbano_id' => $alocacaomunicipal_trajetoUrbano_id
        );
        $result['success'] = $this->db->insert('alocacaomunicipal', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;
    }
    public function updateAlocacao(
        $alocacaomunicipal_id,
        $alocacaomunicipal_cobrador_id,
        $alocacaomunicipal_dataFinal,
        $alocacaomunicipal_dataInicio,
        $alocacaomunicipal_motorista_id,
        $alocacaomunicipal_onibus_id,
        $alocacaomunicipal_trajetoUrbano_id
    ) {
        $data = array(
            'alocacaomunicipal_cobrador_id' => $alocacaomunicipal_cobrador_id,
            'alocacaomunicipal_dataFinal' => $alocacaomunicipal_dataFinal,
            'alocacaomunicipal_dataInicio' => $alocacaomunicipal_dataInicio,
            'alocacaomunicipal_motorista_id' => $alocacaomunicipal_motorista_id,
            'alocacaomunicipal_onibus_id' => $alocacaomunicipal_onibus_id,
            'alocacaomunicipal_trajetoUrbano_id' => $alocacaomunicipal_trajetoUrbano_id
        );
        $result['success'] = $this->db->update('alocacaomunicipal', $data, array('alocacaomunicipal_id' => $alocacaomunicipal_id));
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;
    }
}
