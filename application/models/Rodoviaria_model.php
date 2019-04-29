<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Rodoviaria_model extends CI_Model
{
    public function getRodoviarias()
    {
        $this->db->select('rodoviaria.*, cidade.cidade_nome as rodoviaria_cidade, estado.estado_uf as rodoviaria_uf');
        $this->db->join('cidade', 'rodoviaria.rodoviaria_cidade_id = cidade.cidade_id');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id');
        $this->db->from('rodoviaria');
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

    public function insertRodoviaria(
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
        $result['sucess'] = $this->db->insert('rodoviaria', $data);
        if (!$result['sucess'])
            $result['error']  = $this->db->error();


        return $result;
    }
}
