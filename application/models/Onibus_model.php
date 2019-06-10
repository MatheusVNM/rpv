<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/2/2019
 * Time: 12:14 PM
 */

class Onibus_model extends CI_Model
{

    public function getOnibusIntermunicipal()
    {

        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, cidade.cidade_nome, estado.estado_uf');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id');
        $this->db->join('cidade', 'rodoviaria.rodoviaria_cidade_id = cidade.cidade_id');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id');
        $this->db->from('onibus');
        $this->db->where('onibus.onibus_is_municipal', 0);
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

    // $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm categoriaonibus.categoriaonibus_id');
    // $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal= categoriaonibus.categoriaonibus_id');
    // $this->db->from('onibus');
    public function getOnibusIntermunicipalEspecifico($id)
    {
        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm categoriaonibus.categoriaonibus_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal= categoriaonibus.categoriaonibus_id');
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

    public function insertOnibusIntermunicipal(
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_ano_fab,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_documento_veiculo,
        $onibus_ar_condicionado,
        $onibus_quilometragem,
        $onibus_is_ativo,
        $onibus_motivo_inatividade,
        $onibus_em_manuntencao,
        $onibus_categoria_intermunicipal,
        $onibus_cidade
    ) {

        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_documento_veiculo' => $onibus_documento_veiculo,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_ativo' => $onibus_is_ativo,
            'onibus_motivo_inatividade' => $onibus_motivo_inatividade,
            'onibus_em_manuntencao' => $onibus_em_manuntencao,
            'onibus_is_municipal' => 0,
            'onibus_categoria_intermunicipal' => $onibus_categoria_intermunicipal,
            'onibus_cidade' => $onibus_cidade,
        );

        $result['success'] = $this->db->insert('onibus', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;
    }

    public function updateOnibusIntermunicipal(
        $onibus_id,
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_ano_fab,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_documento_veiculo,
        $onibus_ar_condicionado,
        $onibus_quilometragem,
        $onibus_is_ativo,
        $onibus_motivo_inatividade,
        $onibus_em_manuntencao,
        $onibus_categoria_intermunicipal,
        $onibus_cidade
    ) {
        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_documento_veiculo' => $onibus_documento_veiculo,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_ativo' => $onibus_is_ativo,
            'onibus_motivo_inatividade' => $onibus_motivo_inatividade,
            'onibus_em_manuntencao' => $onibus_em_manuntencao,
            'onibus_is_municipal' => 0,
            'onibus_categoria_intermunicipal' => $onibus_categoria_intermunicipal,
            'onibus_cidade' => $onibus_cidade,
        );
        $result['success'] = $this->db->update('onibus', $data, array('onibus_id' => $onibus_id));
        if (!$result['success'])
            $result['error'] = $this->db->error();


        return $result;
    }

    public function getOnibusMunicipal()
    {
        $this->db->select('onibus.*, cidade.cidade_nome, estado.estado_uf');
        $this->db->join('cidade', 'rodoviaria.rodoviaria_cidade_id = cidade.cidade_id');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id');
        $this->db->from('onibus');
        $this->db->where('onibus.onibus_is_municipal', 1);
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

    public function getOnibusMunicipalNaoAlocado()
    {
        $sql = "SELECT DISTINCT onibus.onibus_id, onibus.onibus_placa from 
        onibus WHERE onibus.onibus_id NOT IN(SELECT onibus.onibus_id from 
        onibus JOIN alocacaomunicipal on 
        alocacaomunicipal.alocacaomunicipal_onibus_id = onibus.onibus_id) AND 
        onibus.onibus_id NOT IN(SELECT onibus.onibus_id FROM onibus JOIN manutencao on 
        manutencao.manutencao_onibus_id = onibus.onibus_id WHERE 
        manutencao.manutencao_dataFim IS NULL);";
        $result = $this->db->query($sql);
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
    public function getOnibusMunicipalEspecifico($id)
    {
        $this->db->select('onibus.*, cidade.cidade_nome, estado.estado_uf');
        $this->db->join('cidade', 'rodoviaria.rodoviaria_cidade_id = cidade.cidade_id');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id');
        $this->db->from('onibus');
        $this->db->where('onibus.onibus_is_municipal', 1);
        $this->db->where('onibus.onibus_is_municipal', $id);
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


    public function insertOnibusMunicipal(
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_ano_fab,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_documento_veiculo,
        $onibus_ar_condicionado,
        $onibus_quilometragem,
        $onibus_is_ativo,
        $onibus_motivo_inatividade,
        $onibus_em_manuntencao,
        $onibus_cidade
    ) {
        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_documento_veiculo' => $onibus_documento_veiculo,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_ativo' => $onibus_is_ativo,
            'onibus_motivo_inatividade' => $onibus_motivo_inatividade,
            'onibus_em_manuntencao' => $onibus_em_manuntencao,
            'onibus_is_municipal' => 0,
            'onibus_cidade' => $onibus_cidade,
        );

        $result['success'] = $this->db->insert('onibus', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;
    }

    public function updateOnibusMunicipal(
        $onibus_id,
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_ano_fab,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_documento_veiculo,
        $onibus_ar_condicionado,
        $onibus_quilometragem,
        $onibus_is_ativo,
        $onibus_motivo_inatividade,
        $onibus_em_manuntencao,
        $onibus_cidade
    ) {
        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_documento_veiculo' => $onibus_documento_veiculo,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_ativo' => $onibus_is_ativo,
            'onibus_motivo_inatividade' => $onibus_motivo_inatividade,
            'onibus_em_manuntencao' => $onibus_em_manuntencao,
            'onibus_is_municipal' => 0,
            'onibus_cidade' => $onibus_cidade,
        );
        $result['success'] = $this->db->update('onibus', $data, array('onibus_id' => $onibus_id));
        if (!$result['success'])
            $result['error'] = $this->db->error();


        return $result;
    }
}
