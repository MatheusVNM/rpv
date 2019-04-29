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
        $result = $this->db->get('estado');
        if (!$result) {
            return false;
        }

        return $result->result_array();
    }

    public function getEstado($id){
        $result = $this->db->get_where('estado', array('estado_id'=> $id));
        if (!$result) {
            return false;
        }
        return $result->row_array();
    }
}

