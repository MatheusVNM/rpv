<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Frota_model extends CI_Model
{

    public function metodo(
        $rodoviaria_nome,
        $rodoviaria_rua,
        $rodoviaria_numero,
        $rodoviaria_bairro,
        $rodoviaria_cep,
        $rodoviaria_email,
        $rodoviaria_telefone,
        $rodoviaria_qntdbox,
        $rodoviaria_cidade
    ) {
        $this->db->select('IFNULL(MAX(`rodoviaria_id`), 0) AS `maxid`', false);
        $rodoviaria_codigo = sprintf('RD%03d', $this->db->get('rodoviaria', 1)->row_array()['maxid'] + 1);

        $data = array(
            'rodoviaria_nome'      => $rodoviaria_nome,
            'rodoviaria_rua'       => $rodoviaria_rua,
            'rodoviaria_numero'    => $rodoviaria_numero,
            'rodoviaria_bairro'    => $rodoviaria_bairro,
            'rodoviaria_cep'       => $rodoviaria_cep,
            'rodoviaria_email'     => $rodoviaria_email,
            'rodoviaria_telefone'  => $rodoviaria_telefone,
            'rodoviaria_qntdbox'   => $rodoviaria_qntdbox,
            'rodoviaria_cidade_id' => $rodoviaria_cidade,
            'rodoviaria_codigo'    => $rodoviaria_codigo,
        );
        $result['success'] = $this->db->insert('rodoviaria', $data);
        $result['error']  = $this->db->error();


        return $result;
    }
    public function getFrotas()
    {
        $this->db->from('frota');
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
    public function getFrota($id)
    {
        $this->db->select('frota.*, cidade.cidade_nome as frota_cidade, estado.estado_uf as frota_uf, estado.estado_id, cidade.cidade_id ');
        $this->db->join('cidade', 'frota_cidade_id = cidade.cidade_id');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id');
        $this->db->from('frota');
        $this->db->where('frota_id', $id);
        
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

 
    public function insertFrota(
        $frota_nome,
        $frota_rua,
        $frota_numero,
        $frota_bairro,
        $frota_cep,
        $frota_email,
        $frota_telefone,
        $frota_qntdbox,
        $frota_cidade
    ) {
        $this->db->select('IFNULL(MAX(`frota_id`), 0) AS `maxid`', false);
        $frota_codigo = sprintf('RD%03d', $this->db->get('frota', 1)->row_array()['maxid'] + 1);

        $data = array(
            'frota_nome'      => $frota_nome,
            'frota_rua'       => $frota_rua,
            'frota_numero'    => $frota_numero,
            'frota_bairro'    => $frota_bairro,
            'frota_cep'       => $frota_cep,
            'frota_email'     => $frota_email,
            'frota_telefone'  => $frota_telefone,
            'frota_qntdbox'   => $frota_qntdbox,
            'frota_cidade_id' => $frota_cidade,
            'frota_codigo'    => $frota_codigo,
        );
        $result['success'] = $this->db->insert('frota', $data);
        if (!$result['success'])
            $result['error']  = $this->db->error();


        return $result;
    }

    public function updatefrota(
        $frota_id,
        $frota_nome,
        $frota_rua,
        $frota_numero,
        $frota_bairro,
        $frota_cep,
        $frota_email,
        $frota_telefone,
        $frota_qntdbox,
        $frota_cidade
    ) {
        $this->db->select('frota_codigo');
        $frota_codigo = $this->db->get('frota', 1)->row_array()['frota_codigo'];

        $data = array(
            'frota_nome'      => $frota_nome,
            'frota_rua'       => $frota_rua,
            'frota_numero'    => $frota_numero,
            'frota_bairro'    => $frota_bairro,
            'frota_cep'       => $frota_cep,
            'frota_email'     => $frota_email,
            'frota_telefone'  => $frota_telefone,
            'frota_qntdbox'   => $frota_qntdbox,
            'frota_cidade_id' => $frota_cidade,
            'frota_codigo'    => $frota_codigo,
        );
        $result['success'] = $this->db->update('frota', $data, array('frota_id'=>$frota_id));
        if (!$result['success'])
            $result['error']  = $this->db->error();


        return $result;
    }


    

    
}
