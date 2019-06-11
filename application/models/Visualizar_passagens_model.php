<?php

class Visualizar_passagens_model extends CI_Model
{

    public function getPassagensTotal()
    {
        $sql = "SELECT onibus.onibus_placa, cidade.cidade_nome, 
        COUNT(comprapassagem.comprapassagem_id) FROM onibus JOIN 
        alocacaointermunicipal on alocacaointermunicipal.alocacaointermunicipal_onibus = 
        onibus.onibus_id JOIN trajetointerurbano on trajetointerurbano.trajetointerurbano_id = 
        alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano JOIN cidade on 
        cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeInicio JOIN 
        ocupacaocadeira on ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = 
        alocacaointermunicipal.alocacaointermunicipal_id JOIN comprapassagem on 
        comprapassagem.comprapassagem_ocupacaocadeira_id = 
        ocupacaocadeira.ocupacaocadeira_id";
        $result = $this->db->query($sql);
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
    public function getPassagensTipo($id)
    {
        $sql = "SELECT COUNT(comprapassagem.comprapassagem_tipo_passagem_id) FROM 
        onibus JOIN alocacaointermunicipal on alocacaointermunicipal.alocacaointermunicipal_onibus
         = onibus.onibus_id JOIN trajetointerurbano on trajetointerurbano.trajetointerurbano_id = 
         alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano JOIN cidade on 
         cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeInicio JOIN ocupacaocadeira
          on ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = 
          alocacaointermunicipal.alocacaointermunicipal_id JOIN comprapassagem on 
          comprapassagem.comprapassagem_ocupacaocadeira_id = ocupacaocadeira.ocupacaocadeira_id
           JOIN tipo_passagem on tipo_passagem.tipo_passagem_id = 
           comprapassagem.comprapassagem_tipo_passagem_id WHERE tipo_passagem.tipo_passagem_id = +$id";
        $result = $this->db->query($sql);
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
}
