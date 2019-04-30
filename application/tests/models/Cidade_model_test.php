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


    public function testGetCidadeError()
    {
        $data = $this->cidade->getCidade(50000000000);
        $this->assertFalse($data['success']);
    }

    public function testGetCidadeSucess()
    {
        $data = $this->cidade->getCidade(2);
        $this->assertNotFalse($data['cidade_nome']);
    }

    public function testGetCidadeEspecifica()
    {
        $data = $this->cidade->getCidade(2);
        $this->assertEquals("Água Doce do Norte", $data['result']['cidade_nome']);
    }

    public function testGetTodasCidades()
    {
        $data = $this->cidade->getCidades();
        $this->assertEquals(5564, sizeof($data['result']));

    }

}