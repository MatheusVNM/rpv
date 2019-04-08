<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/2/2019
 * Time: 7:47 PM
 */

class Trajeto_Urbano_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    public function getTrajetos(){

        $values = $this->db->get('trajetourbano')->result_array();
        return $values;
    }


    public function create($paradas, $nome, $tempomedio, $status, $tarifa)
    {
        echo "aa";
        print_r($paradas);

        $data = array(
            'trajetourbano_nome' => $nome,
            'trajetourbano_tarifa' => $tarifa,
            'trajetourbano_isativo' => $status,
            'trajetourbano_tempomedio' => $tempomedio,
        );
        $this->db->insert('trajetourbano', $data);
        $trajeto_id = $this->db->insert_id();



        $paradastrajeto = array();
        for ($i = 0; $i < sizeof($paradas); $i++) {
            if ($i < sizeof($paradas) - 1)
                array_push(
                    $paradastrajeto,
                    array(
                        'par_traj_trajeto' => $trajeto_id,
                        'par_traj_parada' => $paradas[$i],
                        'par_traj_prox_parada' => $paradas[$i + 1]
                    )
                );
            else {
                array_push(
                    $paradastrajeto,
                    array(
                        'par_traj_trajeto' => $trajeto_id,
                        'par_traj_parada' => $paradas[$i],
                        'par_traj_prox_parada' => $paradas[0]
                    )
                );
            }
        }
        $this->db->insert_batch('paradatrajeto', $paradastrajeto);


        echo "<hr/>done";
    }
}
