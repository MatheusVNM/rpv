<?php


class Trajeto_interurbano_model extends CI_Model
{

    public function getTrajetosInterurbanos()
    {


        $result = $this->db->get('trajetointerurbano');
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


    public function getTrajetoInterurbanoEspecifico()
    {


    }


    public function insertTrajetoInterurbano(
        $cidades,
        $nome,
        $distanciaTotal,
        $distanciaProximaCidade,
        $tempoMedio,
        $saidaDaCidade

    )
    {


        $data = array(
            'trajetointerurbano_nome' => $nome,
            'trajetointerurbano_distanciaTotal' => $distanciaTotal,
            'trajetointerurbano_tempomedio' => $tempoMedio,
        );
        $this->db->insert('trajetointerurbano', $data);
        $trajeto_id = $this->db->insert_id();
        $cidade_trajetointerurbano = array();

        for ($i = 0; $i < sizeof($cidades); $i++) {
            if ($i < sizeof($cidades) - 1)
                array_push(
                    $cidade_trajetointerurbano,
                    array(
                        'cidade_trajetointerurbano_cidade' => $cidades[$i],
                        'cidade_trajetointerurbano_trajeto' => $trajeto_id,
                        'cidade_trajetointerurbano_proxima_cidade' => $cidades[$i + 1],
                        'cidade_trajetointerurbano_distancia_prox_cidade' => $distanciaProximaCidade[$i],
                        'cidade_trajetointerurbano_saidaDaCidade' => $saidaDaCidade[$i]
                    )
                );
            else {
                array_push(
                    $cidade_trajetointerurbano,
                    array(
                        'cidade_trajetointerurbano_cidade' => $cidades[$i],
                        'cidade_trajetointerurbano_trajeto' => $trajeto_id,
                        'cidade_trajetointerurbano_proxima_cidade' => $cidades[0],
                        'cidade_trajetointerurbano_distancia_prox_cidade' => $distanciaProximaCidade[0],
                        'cidade_trajetointerurbano_saidaDaCidade' => $saidaDaCidade[$i]
                    )
                );
            }
        }
        $this->db->insert_batch('cidade_trajetointerurbano', $cidade_trajetointerurbano);


    }


    public function updateTrajetoInterurbano()
    {


    }


}