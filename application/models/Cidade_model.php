<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 4:00 PM
 */

class Cidade_model extends CI_Model
{
    public function getCidades()
    {
        $result = $this->db->get('cidade');
        if (!$result) {
            return false;
        }

        return $result->result_array();
    }
    public function getCidade($id){
        $result = $this->db->get_where('cidade', array('cidade_id'=> $id));
        if (!$result) {
            return false;
        }
        return $result->row_array();
    }
}
