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
        $this->CI->load->model('estado_model');
        $this->estado = $this->CI->estado_model;
    }

    public function testGetEstadoError()
    {
        $data = $this->estado->getEstado(30);
        $this->assertFalse($data['sucess']);
    }

    public function testGetEstadoSucess()
    {
        $data = $this->estado->getEstado(2);
        $this->assertNotFalse($data['estado_nome']);
    }

    public function testGetUFSucess()
    {
        $data = $this->estado->getEstado(2);
        $this->assertNotFalse($data['estado_uf']);
    }

    public function testGetEstadoEspecifico()
    {
        $data = $this->estado->getEstado(2);
        $this->assertEquals("Alagoas", $data['estado_nome']);
    }
    public function testGetUFEspecifico()
    {
        $data = $this->estado->getEstado(2);
        $this->assertEquals("AL", $data['estado_uf']);

    }

    public function testGetTodosEstados()
    {
        $data = $this->estado->getEstados();
        $this->assertEquals(27, sizeof($data));

    }

}