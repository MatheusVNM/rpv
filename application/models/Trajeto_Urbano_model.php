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


    public function getTrajetos()
    {

        $values = $this->db->get('trajetourbano')->result_array();
        return $values;
    }

    public function getTrajetoEspecifico($id)
    {

        $this->db->limit(1);
        $where = array('trajetourbano_id' => $id);
        $values = $this->db->get_where('trajetourbano', $where)->row_array();
        return $values;
    }

    function getParadasVinculadasAoTrajeto($id)
    {
        $this->db->select('*');
        $this->db->join('paradas', 'par_traj_parada = parada_id');
        $where = array('par_traj_trajeto' => $id);
        $values = $this->db->get_where('paradatrajeto', $where)->result_array();
        return $values;
    }
    function getParadasNaoVinculadasAoTrajeto($id)
    {
        // SELECT DISTINCT t1.*
        // FROM paradas t1
        // LEFT OUTER JOIN paradatrajeto t2 ON t2.par_traj_parada = t1.parada_id
        // WHERe parada_id NOT IN (select DISTINCT par_traj_parada from paradatrajeto where par_traj_trajeto = 7)

        $notInSqlResul  = $this->db->select('par_traj_parada')->distinct()->get_where('paradatrajeto', array('par_traj_trajeto' => $id))->result_array();
        $notInSqlReal = array();

        foreach ($notInSqlResul as $r) {
            array_push($notInSqlReal, $r['par_traj_parada']);
        }

       $values =  $this->db->select('paradas.*')
            ->distinct()
            ->from('paradas')
            ->join('paradatrajeto', 'par_traj_parada=parada_id', 'left outer' )
            ->where_not_in('parada_id', $notInSqlReal)
            ->get()->result_array();

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

    public function changeStatusTrajeto($id){
        $this->db->set('trajetourbano_isativo', 'NOT trajetourbano_isativo', FALSE);
        $this->db->where('trajetourbano_id', $id);
        $this->db->update('trajetourbano');
    }
}
