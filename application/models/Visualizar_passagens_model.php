<?php

class Visualizar_passagens_model extends CI_Model
{

    public function getPassagensTotal()
    {
        $sql = "SELECT alocacaointermunicipal.alocacaointermunicipal_id, onibus.onibus_placa, onibus.onibus_id, cidade.cidade_nome, 
        COUNT(comprapassagem.comprapassagem_id), alocacaointermunicipal.alocacaointermunicipal_horaInicio FROM onibus JOIN 
        alocacaointermunicipal on alocacaointermunicipal.alocacaointermunicipal_onibus = 
        onibus.onibus_id JOIN trajetointerurbano on trajetointerurbano.trajetointerurbano_id = 
        alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano JOIN cidade on 
        cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeInicio JOIN 
        ocupacaocadeira on ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = 
        alocacaointermunicipal.alocacaointermunicipal_id JOIN comprapassagem on 
        comprapassagem.comprapassagem_ocupacaocadeira_id = 
        ocupacaocadeira.ocupacaocadeira_id GROUP by alocacaointermunicipal.alocacaointermunicipal_id";
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
    public function pegarTrajetoFimDeTodas()
    {
        $sql = "SELECT DISTINCT cidade.cidade_nome FROM onibus JOIN alocacaointermunicipal on 
        alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id JOIN trajetointerurbano on 
        trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano JOIN 
        cidade on cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeFim JOIN ocupacaocadeira on 
        ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = alocacaointermunicipal.alocacaointermunicipal_id JOIN 
        comprapassagem on comprapassagem.comprapassagem_ocupacaocadeira_id = ocupacaocadeira.ocupacaocadeira_id";
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
    public function getPassagensEspecificas($alocacaointermunicipal_id, $idOnibus)
    {
        $sql = "SELECT tipo_passagem.tipo_passagem_nome_tipo, COUNT(comprapassagem.comprapassagem_tipo_passagem_id), 
        comprapassagem.comprapassagem_valor_compra, alocacaointermunicipal.alocacaointermunicipal_horaInicio FROM 
        onibus JOIN alocacaointermunicipal on alocacaointermunicipal.alocacaointermunicipal_onibus = onibus.onibus_id JOIN 
        trajetointerurbano on trajetointerurbano.trajetointerurbano_id = alocacaointermunicipal.alocacaointermunicipal_trajetointerurbano 
        JOIN cidade on cidade.cidade_id = trajetointerurbano.trajetointerubano_cidadeInicio JOIN ocupacaocadeira on 
        ocupacaocadeira.ocupacaocadeira_alocacaointermunicipal = alocacaointermunicipal.alocacaointermunicipal_id JOIN 
        comprapassagem on comprapassagem.comprapassagem_ocupacaocadeira_id = ocupacaocadeira.ocupacaocadeira_id JOIN 
        tipo_passagem on tipo_passagem.tipo_passagem_id = comprapassagem.comprapassagem_tipo_passagem_id WHERE 
        (tipo_passagem.tipo_passagem_id = 1 or tipo_passagem.tipo_passagem_id = 2 or tipo_passagem.tipo_passagem_id = 3) and 
        alocacaointermunicipal.alocacaointermunicipal_id = $alocacaointermunicipal_id and 
        alocacaointermunicipal.alocacaointermunicipal_onibus = $idOnibus GROUP BY tipo_passagem.tipo_passagem_nome_tipo";
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
