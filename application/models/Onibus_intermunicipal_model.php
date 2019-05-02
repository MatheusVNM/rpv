<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/2/2019
 * Time: 12:14 PM
 */

class Onibus_intermunicipal_model extends CI_Model
{

    public function getOnibus()
    {

        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, categoriaonibus.categoriaonibus_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria = categoriaonibus.categoriaonibus_id');
        $this->db->from('onibus');
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

    public function getOnibusEspecifico($id)
    {
        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm categoriaonibus.categoriaonibus_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria = categoriaonibus.categoriaonibus_id');
        $this->db->from('onibus');
        $this->db->where('onibus_id', $id);
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

    public function insertOnibus(
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_ano_fab,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca_cacarroceria,
        $onibus_marca_chassis,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_documento_veiculo,
        $onibus_ar_condicionado,
        $onibus_quilometragem,
        $onibus_is_aviso,
        $onibus_motivo_inatividade,
        $onibus_em_manuntencao,
        $onibus_id_categoria
    )
    {
        $this->db->select('IFNULL(MAX(`onibus_id`), 0) AS `maxid`', false);
        $onibus_codigo = sprintf('ON%03d', $this->db->get('onibus', 1)->row_array()['maxid'] + 1);

        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca_cacarroceria' => $onibus_marca_cacarroceria,
            'onibus_marca_chassis' => $onibus_marca_chassis,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_documento_veiculo' => $onibus_documento_veiculo,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_aviso' => $onibus_is_aviso,
            'onibus_motivo_inatividade' => $onibus_motivo_inatividade,
            'onibus_em_manuntencao'=> $onibus_em_manuntencao,
            'onibus_id_categoria' => $onibus_id_categoria,
        );

        $result['success'] = $this->db->insert('onibus', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;



    }

    public function updateOnibus()
    {
    }


}