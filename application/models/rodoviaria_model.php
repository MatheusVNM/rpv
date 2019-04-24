<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class rodoviaria_model extends CI_Model
{
    public function getRodoviarias()
    {
        $this->db->select('rodoviaria.*, cidade.nome, estado.uf ');
        $this->db->join('cidade', 'rodoviaria.rodoviaria_cidade_id = cidade.id');
        $this->db->join('estado', 'cidade.estado = estado.id');
        $this->db->from('rodoviaria');

        return $this->db->get()->result_array();
    }

    public function insertRodoviaria($rodoviaria_nome, $rodoviaria_rua, $rodoviaria_numero, $rodoviaria_bairro,
                                     $rodoviaria_cep, $rodoviaria_email, $rodoviaria_telefone, $rodoviaria_qntdbox,
                                     $rodoviaria_cidade)
    {
        $data = array(
            'rodoviaria_nome' => $rodoviaria_nome,
            'rodoviaria_rua' => $rodoviaria_rua,
            'rodoviaria_numero' => $rodoviaria_numero,
            'rodoviaria_bairro' => $rodoviaria_bairro,
            'rodoviaria_cep' => $rodoviaria_cep,
            'rodoviaria_email' => $rodoviaria_email,
            'rodoviaria_telefone' => $rodoviaria_telefone,
            'rodoviaria_qntdbox' => $rodoviaria_qntdbox,
            'rodoviaria_cidade_id' => $rodoviaria_cidade
        );
        $result['sucess'] = $this->db->insert('rodoviaria', $data);
        $result['error'] = $this->db->error();
        return $result;
    }

}


