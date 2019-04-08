<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/6/2019
 * Time: 10:49 AM
 */

class CategoriaOnibus_model extends CI_Model
{

    public function getCatOnibus()
    {
        $query = $this->db->get('categoriaonibus');
        return $query->result_array();
    }
    public function getEspecificaCatOnibus($id)
    {
        $query = $this->db->get_where('categoriaonibus', array('catOni_id' => $id));
        return $query->result_array();
    }

    public function save($nome, $precokm)
    {
        $this->db->select('IFNULL(MAX(`parada_id`), 0) AS `maxid`', false);
        $catOnibus_codigo = sprintf('TF%03d', $this->db->get('paradas', 1)->result_array()[0]['maxid']);
        $data = array(
            'catOnibus_status' => true,
            'catOnibus_nome' => $nome,
            'catOnibus_precokm' => $precokm,
            'catOnibus_codigo' => $catOnibus_codigo
        );
        $this->db->insert('categoriaonibus', $data);

    }

}