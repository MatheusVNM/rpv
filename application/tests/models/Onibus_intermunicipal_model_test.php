<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/2/2019
 * Time: 5:53 PM
 */

class Onibus_intermunicipal_model_test extends TestCase
{
    public function setUp(): void

    {
        $this->resetInstance();
        $this->CI->load->model('onibus_intermunicipal_model');
        $this->onibus = $this->CI->onibus_intermunicipal_model;
    }

    /**
     * Recebe o UF de uma rodoviaria. Compara o tamanho da uf com o valor esperado de 2.
     */
    public function testGetPlacaOnibusTest()
    {
        $data = $this->onibus->getOnibus();
        if ($data) {
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertRegExp('/[a-zA-Z]{3}\-\d{4}/', $data['result'][$i]['onibus_placa']);
            }
        } else {
            $this->assertFalse($data);
        }
    }

    public function testGetChassiOnibusTest()
    {
        $data = $this->onibus->getOnibus();

        if ($data) {
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertEquals(17, strlen($data['result'][$i]['onibus_num_chassis']));
            }

        } else {
            $this->assertFalse($data);
        }
    }

}
