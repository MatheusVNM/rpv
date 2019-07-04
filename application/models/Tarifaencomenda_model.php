<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Tarifaencomenda_model extends CI_Model
{
    public function getTarifasEncomendas()
    {
        $this->db->from('tarifaencomenda');
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

    public function getTarifaEncomendaEspecifica($id)
    {
        $this->db->from('tarifaencomenda');
        $this->db->where('tarifaencomenda_id', $id);
        $result = $this->db->get();
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->row_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }

    public function insertTarifaEncomenda(
        $tarifaencomenda_preco_peso,
        $tarifaencomenda_preco_volume,
        $tarifaencomenda_nome,
        $tarifaencomenda_tipocalculo
    ) {
        $data = array(
            'tarifaencomenda_preco_peso' => $tarifaencomenda_preco_peso,
            'tarifaencomenda_preco_volume' => $tarifaencomenda_preco_volume,
            'tarifaencomenda_nome' => $tarifaencomenda_nome,
            'tarifaencomenda_tipocalculo' => $tarifaencomenda_tipocalculo,
        );
        $result['success'] = $this->db->insert('tarifaencomenda', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();


        return $result;
    }

    public function updateTarifaEncomenda(
        $tarifaencomenda_id,
        $tarifaencomenda_preco_peso,
        $tarifaencomenda_preco_volume,
        $tarifaencomenda_nome,
        $tarifaencomenda_tipocalculo
    ) {
        $data = array(
            'tarifaencomenda_preco_peso' => $tarifaencomenda_preco_peso,
            'tarifaencomenda_preco_volume' => $tarifaencomenda_preco_volume,
            'tarifaencomenda_nome' => $tarifaencomenda_nome,
            'tarifaencomenda_tipocalculo' => $tarifaencomenda_tipocalculo,
        );
        $result['success'] = $this->db->update('tarifaencomenda', $data, array('tarifaencomenda_id' => $tarifaencomenda_id));
        if (!$result['success'])
            $result['error'] = $this->db->error();


        return $result;
    }
}
