<?php

class Tipo_funcionario_model extends CI_Model
{
    public function getTiposFuncionario()
    {
        $this->db->select('tipofuncionario.*');
        $this->db->from('tipofuncionario');
        
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
}
