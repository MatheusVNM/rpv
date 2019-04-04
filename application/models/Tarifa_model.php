<?php
class Tarifa_model extends CI_Model
{
    var $tarifas = array(
        0 => array(
            'tarifa_id' => 0,
            'tarifa_codigo' => 'TF001',
            'tarifa_nome' => 'Tarifa Simples',
            'tarifa_ultimaatt' => '21/07/2017',
            'tarifa_status' => 'Vigente',
            'tarifas'
        ),
        1 => array(
            'tarifa_id' => 1,
            'tarifa_codigo' => 'TF002',
            'tarifa_nome' => 'Tarifa Interior',
            'tarifa_ultimaatt' => '14/09/2018',
            'tarifa_status' => 'Vingente',
        ),
        2 => array(
            'tarifa_id' => 2,
            'tarifa_codigo' => 'TF003',
            'tarifa_nome' => 'Tarifa BR',
            'tarifa_ultimaatt' => '17/01/2012',
            'tarifa_status' => 'Não Vigente',
        )
    );

    var $valores = array(
        0 => array(
            'valores_id_tarifa' => 0,
            'valores_data_homolgacao' => '27/11/2012',
            'valores_is_vigente' => false,
            'valores_valor' => 1.5,
            'anexo' => 'dir'
        ),
        2 => array(
            'valores_id_tarifa' => 0,
            'valores_data_homolgacao' => '27/11/2013',
            'valores_is_vigente' => false,
            'valores_valor' => 2.1,
            'anexo' => 'dir'
        ),
        3 => array(
            'valores_id_tarifa' => 0,
            'valores_data_homolgacao' => '27/11/2014',
            'valores_is_vigente' => false,
            'valores_valor' => 2.5,
            'anexo' => 'dir'
        ),


        4 => array(
            'valores_id_tarifa' => 0,
            'valores_data_homolgacao' => '21/07/2017',
            'valores_is_vigente' => true,
            'valores_valor' => 2.7,
            'anexo' => 'dir'
        ),
        5 => array(
            'valores_id_tarifa' => 1,
            'valores_data_homolgacao' => '14/09/2018',
            'valores_is_vigente' => true,
            'valores_valor' => 4,
            'anexo' => 'dir'
        ),
        6 => array(
            'valores_id_tarifa' => 2,
            'valores_data_homolgacao' => '17/01/2012',
            'valores_is_vigente' => false,
            'valores_valor' => 5,
            'anexo' => 'dir'
        )
    );

    function getTarifas()
    {
        $this->db->select('tarifa_id, tarifa_nome, tarifa_codigo, tarifa_vigente, max(valores_data_homologacao) as tarifa_ultimaatt');
        $this->db->from('tarifa');
        $this->db->join('valorestarifa', 'valorestarifa.valores_id_tarifa = tarifa.tarifa_id');
        $this->db->group_by('tarifa_id');
        // echo $this->db->get_compiled_select();
        $result = $this->db->get()->result_array();
        return $result;
    }


    function getValoresTarifa($id = -1)
    {
        $where = array('valores_id_tarifa' => $id);

        $values = $this->db->get_where('valorestarifa', $where)->result_array();
        return $values;
    }

    function getValorTarifaVigente($id = -1)
    {
        $where = array('valores_id_tarifa' => $id, 'valores_is_vigente' => true);
        $values = $this->db->get_where('valorestarifa', $where)->result_array();
        if (sizeof($values) === 0) {
            $this->db->where('valores_id_tarifa', $id);
            $this->db->select('*');
            $where = array('valores_id_tarifa' => $id);
            $this->db->limit(1);
            $this->db->order_by('valores_data_homologacao', 'desc');
            $values = $this->db->get_where('valorestarifa', $where)->result_array();
            // $this->db->from('valorestarifa');
            
        }
        return $values[0];
    }

    function updateTarifa(){
        echo 'ok';
    }
}
