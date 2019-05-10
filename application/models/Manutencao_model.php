<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/9/2019
 * Time: 7:37 PM
 */

class Manutencao_model extends CI_Model
{
    public function getManutencoes()
    {
        $this->db->select('manutencao.*, onibus.onibus_placa, onibus.onibus_cidade, cidade.cidade_nome');
        $this->db->join('onibus', 'onibus.onibus_id = manutencao.manutencao_onibus_id');
        $this->db->join('cidade', ' cidade.cidade_id = onibus.onibus_cidade');
        $this->db->join('estado', 'estado.estado_id = cidade.cidade_estado');
        $this->db->from('manutencao');
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

    public function getManutencao($id)
    {
        $this->db->select('manutencao.*, onibus.onibus_placa, onibus.onibus_cidade, cidade.cidade_nome');
        $this->db->join('onibus', 'onibus.onibus_id = manutencao.manutencao_onibus_id');
        $this->db->join('cidade', ' cidade.cidade_id = onibus.onibus_cidade');
        $this->db->join('estado', 'estado.estado_id = cidade.cidade_estado');
        $this->db->from('manutencao');
        $this->db->where('manutencao_id', $id);
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

    public function insertManutencao(
        $manutencao_valor,
        $manutencao_descricao,
        $manutencao_is_finalizada,
        $manutencao_dataInicio,
        $manutencao_dataFim,
        $manutencao_onibus_id
    )
    {
        $data = array(
            'manutencao_valor' => $manutencao_valor,
            'manutencao_descricao' => $manutencao_descricao,
            'manutencao_is_finalizada' => $manutencao_is_finalizada,
            'manutencao_dataInicio' => $manutencao_dataInicio,
            'manutencao_dataFim' => $manutencao_dataFim,
            'manutencao_onibus_id' => $manutencao_onibus_id
        );
        $result['result'] = $this->db->insert('onibus', $data);
        if (!$result['result'])
            $result['error'] = $this->db->error();
        return $result;
    }


    public function updateManutencao(
        $manutencao_id,
        $manutencao_valor,
        $manutencao_descricao,
        $manutencao_is_finalizada,
        $manutencao_dataInicio,
        $manutencao_dataFim,
        $manutencao_onibus_id

    )
    {
        $data = array(
            'manutencao_valor' => $manutencao_valor,
            'manutencao_descricao' => $manutencao_descricao,
            'manutencao_is_finalizada' => $manutencao_is_finalizada,
            'manutencao_dataInicio' => $manutencao_dataInicio,
            'manutencao_dataFim' => $manutencao_dataFim,
            'manutencao_onibus_id' => $manutencao_onibus_id
        );
        $result['result'] = $this->db->update('onibus', $data, array('manutencao_id' => $manutencao_id));
        if (!$result['result'])
            $result['error'] = $this->db->error();
        return $result;
    }


}