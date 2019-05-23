<?php


class Trajeto_interurbano_model extends CI_Model
{

    public function getTrajetosInterurbanos(){


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


    public function getTrajetoInterurbanoEspecifico(){


    }


    public function insertTrajetoInterurbano(){


    }


    public function updateTrajetoInterurbano(){


    }


}