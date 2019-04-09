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

    public function getCatOnibusEspecifica($id)
    {
        $query = $this->db->get_where('categoriaonibus', array('catOnibus_id' => $id));
        return $query->result_array();
    }

    public function save($nome, $precokm)
    {
        $this->db->select('IFNULL(MAX(`catOnibus_id`), 0) AS `maxid`', false);
        $catOnibus_codigo = sprintf('CO%03d', $this->db->get('categoriaonibus', 1)->result_array()[0]['maxid']);
        $data = array(
            'catOnibus_status' => true,
            'catOnibus_nome' => $nome,
            'catOnibus_precokm' => $precokm,
            'catOnibus_codigo' => $catOnibus_codigo
        );
        $this->db->insert('categoriaonibus', $data);

    }

    public function updateStatus($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $this->db->where('catOnibus_id', $id);
        $this->db->update('categoriaonibus', array('catOnibus_status' => $status));
    }

    public function update($id, $nome, $precokm)
    {
        $data = array(
            'catOnibus_nome' => $nome,
            'catOnibus_precokm' => $precokm,
        );
        $this->db->where('catOnibus_id', $id);
        $this->db->update('categoriaonibus', $data);
    }

}