<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Forma_pagamento extends CI_Model
{
    public function getFormasPagamento()
    {

        $result = $this->db->get('formapagamento');
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

    public function updateFormasPagamento($array)
    {

        $cleanData = array(
            'formapagamento_municipal' => false,
            'formapagamento_inter_rodoviaria' => false,
            'formapagamento_inter_site' => false
        );
        $this->db->update('formapagamento', $cleanData, "formapagamento_id > 0 ");


        foreach ($array as $key => $value) {

            // =="true" ? true : false

            $updateData = array(
                'formapagamento_municipal' => isset($value['pagamentoMunicipal']) && $value['pagamentoMunicipal'] =="true" ? true : false,
                'formapagamento_inter_rodoviaria' => isset($value['pagamentoRodoviaria']) &&  $value['pagamentoRodoviaria'] =="true" ? true : false,
                'formapagamento_inter_site' => isset($value['pagamentoSite']) && $value['pagamentoSite'] =="true" ? true : false
            );
            echo "$key---<br>";
            echo "<hr style='width: 10px'>";
            echo_r($updateData);
            // $this->session->set_flashdata(successAlert('Formas atualizadas com sucesso'));
            $this->db->set($updateData);
            $this->db->where('formapagamento_id', $key);
            $result=$this->db->update('formapagamento');
            echo "||$result||";
            // $this->db->get_compiled_update();
            echo "<br>bbb";            
            echo_r($this->db->error());
            echo "<hr>";
        }
    }
}
