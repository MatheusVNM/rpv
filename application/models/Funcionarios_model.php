<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/11/2019
 * Time: 4:53 PM
 */

class Funcionarios_model extends CI_Model
{
    public function getFuncionarios()
    {
        $this->db->select('funcionarios.*, tipofuncionario.tipofuncionario_nome');
        $this->db->join('tipofuncionario', 'funcionarios.funcionarios_tipofuncionario_id = tipofuncionario.tipofuncionario_id');
        $this->db->from('funcionarios');
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
    public function getTipoFuncionario($tipoFuncionario)
    {
        $this->db->select('funcionarios.*, tipofuncionario.tipofuncionario_nome');
        $this->db->join('tipofuncionario', 'funcionarios.funcionarios_id = tipofuncionario.tipofuncionario_id');
        $this->db->from('funcionarios');
        $this->db->where('tipofuncionario.tipofuncionario_nome', $tipoFuncionario);
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
    public function getMotoristasNaoAlocados()
    {
        $this->db->distinct('funcionarios.funcionarios_id, funcionarios.funcionarios_nome');
        $this->db->join('alocacaomunicipal_motorista','alocacaomunicipal_motorista.alocacaomunicipal_motorista_funcionario_id != funcionarios.funcionarios_id');
        $this->db->from('funcionarios');
        $this->db->where('funcionarios.funcionarios_tipofuncionario_id', 1);
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

    public function getCobradoresNaoAlocados()
    {
        $this->db->distinct('funcionarios.funcionarios_id, funcionarios.funcionarios_nome');
        $this->db->join('alocacaomunicipal_cobrador','alocacaomunicipal_cobrador.alocacaomunicipal_cobrador_funcionario_id != funcionarios.funcionarios_id');
        $this->db->from('funcionarios');
        $this->db->where('funcionarios.funcionarios_tipofuncionario_id', 2);
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
