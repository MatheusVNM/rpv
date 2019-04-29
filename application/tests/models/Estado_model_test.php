<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/29/2019
 * Time: 4:06 PM
 */

class Estado_model_test extends TestCase
{
    public function setUp(): void

    {
        $this->resetInstance();
        $this->CI->load->model('rodoviaria_model');
        $this->rodoviaria = $this->CI->rodoviaria_model;
    }

    public function testGetEstados(){

    }

}