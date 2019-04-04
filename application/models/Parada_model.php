<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/2/2019
 * Time: 8:01 PM
 */

class Parada_model extends CI_Model
{
    var $paradas = array(
        0 => array(
            'parada_id' => 1,
            'parada_rua' => 'Cruz',
            'parada_numero' => '3200',
            'parada_bairro' => 'Macedo',
        ),
        1 => array(
            'parada_id' => 2,
            'parada_rua' => 'Maximiliano',
            'parada_numero' => '302',
            'parada_bairro' => 'Vera Cruz',
        )
    );

    /**
     * @return array
     */
    public function getParadas()
    {
        return $this->paradas;
    }

}