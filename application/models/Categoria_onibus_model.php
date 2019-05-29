<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/6/2019
 * Time: 10:49 AM
 */

class Categoria_onibus_model extends CI_Model
{

    public function getCategoriaOnibus()
    {
        $query = $this->db->get('categoriaonibus');
        return $query->result_array();
    }

    public function getCategoriaOnibusEspecifica($id)
    {
        $query = $this->db->get_where('categoriaonibus', array('categoriaonibus_id' => $id));
        return $query->result_array();
    }

    public function insertCategoriaOnibus($nome, $precokm)
    {
        $this->db->select('IFNULL(MAX(`categoriaonibus_id`), 0) AS `maxid`', false);
        $categoriaonibus_codigo = sprintf('CO%03d', $this->db->get('categoriaonibus', 1)->result_array()[0]['maxid']+1);
        $data = array(
            'categoriaonibus_status' => true,
            'categoriaonibus_nome' => $nome,
            'categoriaonibus_precokm' => $precokm,
            'categoriaonibus_codigo' => $categoriaonibus_codigo
        );
        $this->db->insert('categoriaonibus', $data);

    }

    public function updateStatus($id)
    {
        $this->db->set('categoriaonibus_status', 'NOT categoriaonibus_status', FALSE);
        $this->db->where('categoriaonibus_id', $id);
        $this->db->update('categoriaonibus');
    }

    public function updateCategoriaOnibus($id, $nome, $precokm)
    {
        $data = array(
            'categoriaonibus_nome' => $nome,
            'categoriaonibus_precokm' => $precokm,
        );
        $this->db->where('categoriaonibus_id', $id);
        $this->db->update('categoriaonibus', $data);
    }

}