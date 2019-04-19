<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/2/2019
 * Time: 8:01 PM
 */

class Parada_model extends CI_Model
{


    /** Retorna a paradas do banco de dados
     * @return array
     */
    public function getParadas()
    {
        $query = $this->db->get('paradas');
        return $query->result_array();
    }

    /** Retorna uma parada especifica de acordo com o id
     * @param $id
     * @return array
     */
    public function getParadaEspecifica($id)
    {
        $query = $this->db->get_where('paradas', array('parada_id' => $id));
        return $query->result_array();
    }

    /** Salva informações de uma nova parada
     * @param $bairro
     * @param $rua
     * @param $nmr
     * @return void
     */

    public function save($bairro, $rua, $nmr)
    {
        $this->db->select('IFNULL(MAX(`parada_id`), 0) AS `maxid`', false);
        $parada_codigo = sprintf('PR%03d', $this->db->get('paradas', 1)->result_array()[0]['maxid']+1);
        $data = array(
            'parada_status' => true,
            'parada_bairro' => $bairro,
            'parada_rua' => $rua,
            'parada_numero' => $nmr,
            'parada_codigo' => $parada_codigo
        );
        $this->db->insert('paradas', $data);

    }

    /** Atualiza parada que contem o id passado
     * @param $id
     * @param $bairro
     * @param $rua
     * @param $nmr
     * @return void
     */
    public function update($id, $bairro, $rua, $nmr)
    {
        $data = array(
            'parada_bairro' => $bairro,
            'parada_rua' => $rua,
            'parada_numero' => $nmr
        );
        $this->db->where('parada_id', $id);
        $this->db->update('paradas', $data);
    }

    /** Atualiza status para ativo ou inativo da parada com id passado.
     * @param $id
     * @param $status
     * @return void
     */
    public function updateStatus($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $this->db->where('parada_id', $id);
        $this->db->update('paradas', array('parada_status' => $status));
    }

}