<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/29/2019
 * Time: 4:12 PM
 */

class Cidade_model_test extends TestCase
{
    public function setUp(): void

    {
        $this->resetInstance();
        $this->CI->load->model('cidade_model');
        $this->cidade = $this->CI->cidade_model;
    }

    public function testGetCidade()
    {


    }

}