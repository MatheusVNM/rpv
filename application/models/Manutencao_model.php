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
        $this->db->join('onibus', 'onibus.onibus_id = manutencao.manutencao_onibus_id', 'LEFT OUTER');
        $this->db->join('cidade', ' cidade.cidade_id = onibus.onibus_cidade', 'LEFT OUTER');
        $this->db->join('estado', 'estado.estado_id = cidade.cidade_estado', 'LEFT OUTER');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id', 'left');
        $this->db->from('manutencao');
        // echo $this->db->get_compiled_select();
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
        $this->db->select('manutencao.*, onibus.onibus_placa, onibus.onibus_id, onibus.onibus_cidade, cidade.cidade_nome');
        $this->db->join('onibus', 'onibus.onibus_id = manutencao.manutencao_onibus_id', 'LEFT OUTER');
        $this->db->join('cidade', ' cidade.cidade_id = onibus.onibus_cidade', 'LEFT OUTER');
        $this->db->join('estado', 'estado.estado_id = cidade.cidade_estado', 'LEFT OUTER');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id', 'left');
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
            $retorno['result'] = $result->row_array();
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
    ) {
        $data = array(
            'manutencao_valor' => $manutencao_valor,
            'manutencao_descricao' => $manutencao_descricao,
            'manutencao_is_finalizada' => 0,
            'manutencao_dataInicio' => $manutencao_dataInicio,
            'manutencao_dataFim' => $manutencao_dataFim,
            'manutencao_onibus_id' => $manutencao_onibus_id
        );
        $result['success'] = $this->db->insert('manutencao', $data);
        if ($result['success'] === false)
            $result['error'] = $this->db->error();
        return $result;
    }


    public function updateManutencao(
        $manutencao_id,
        $manutencao_valor,
        $manutencao_descricao,
        $manutecao_is_finalizado,
        $manutencao_dataFim
    ) {
        $data = array(
            'manutencao_valor' => $manutencao_valor,
            'manutencao_descricao' => $manutencao_descricao,
            'manutencao_dataFim' => $manutencao_dataFim,
            'manutencao_is_finalizada'=>$manutecao_is_finalizado
        );
        $result['success'] = $this->db->update('manutencao', $data, array('manutencao_id' => $manutencao_id));
        if ($result['success']!==true)
            $result['error'] = $this->db->error();
        return $result;
    }
}
