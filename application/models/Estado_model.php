<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Estado_model extends CI_Model
{
    public function getEstados()
    {
        $this->db->order_by('estado_nome');
        $result = $this->db->get('estado');
        if(!$result){
            $retorno['success']= false;
            $retorno['error']= $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0){
            $retorno['success']= true;
            $retorno['result']=$result->result_array();
            return $retorno;
        }
        else{
            $retorno['success']= false;
            return $retorno;       
         }
    }

    public function getEstado($id){
        $result = $this->db->get_where('estado', array('estado_id'=> $id));
        if(!$result){
            $retorno['success']= false;
            $retorno['error']= $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0){
            $retorno['success']= true;
            $retorno['result']=$result->row_array();
            return $retorno;
        }
        else{
            $retorno['success']= false;
            return $retorno;       
         }
    }
}

