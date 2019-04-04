<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/2/2019
 * Time: 8:01 PM
 */

class Parada_model extends CI_Model
{
    private $paradas;

    /**
     * @return array
     */
    public function getParadas()
    {
        $query = $this->db->get('paradas');
        return $query->result_array();
    }

    public function salvar($bairro, $rua, $nmr)
    {
        $data = array(
            'parada_bairro' => $bairro,
            'parada_rua' => $rua,
            'parada_numero' => $nmr
        );
        $this->db->insert('paradas', $data);
    }

    public function delete($id)
    {
        $this->db->delete('paradas', array('id' => $id));
    }
}