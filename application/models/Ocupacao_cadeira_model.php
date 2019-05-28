<?php


class Ocupacao_cadeira_model extends CI_Model
{
    public function getOcupacoesCadeiras()
    {

        $result = $this->db->get('ocupacaocadeira');
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


    public function getNumeroDeCadeirasDisponiveis($id_alocacao)
    {
        foreach ($id_alocacao as $id) {
            $data = array(
                'ocupacaocadeira_alocacaointermunicipal' => $id,
                'ocupacaocadeira_isOcupado' => false
            );
            $this->db->select('*');
            $this->db->from('ocupacaocadeira');
            $this->db->where($data);
            $result[] = $this->db->count_all_results();
        }
        return $result;

    }











    public function insertOcupacaoCadeira(
        $quantidadeCadeiras,
        $ocupacaocadeira_alocacaointermunicipal

    )
    {
        $acumulador = 0;
        for ($i = 0; $i < $quantidadeCadeiras; $i++) {
            $data = array(
                'ocupacaocadeira_numero' => ++$acumulador,
                'ocupacaocadeira_isOcupado' => false,
                'ocupacaocadeira_alocacaointermunicipal' => $ocupacaocadeira_alocacaointermunicipal
            );
            $this->db->insert('ocupacaocadeira', $data);

        }


    }

    public function venderCadeira($id)
    {
        $data = array(
            'ocupacaocadeira_isOcupado' => true,
        );
        $result['success'] = $this->db->update('ocupacaocadeira', $data, array('ocupacaocadeira_id' => $id));
        if ($result['success'] !== true)
            $result['error'] = $this->db->error();
        return $result;


    }


}