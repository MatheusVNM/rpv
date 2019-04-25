<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/25/2019
 * Time: 7:32 PM
 */

class gerenciar_rodoviaria_controller_test extends TestCase
{


    public function testIndex()
    {
        $output = $this->request('GET', ['gerenciar_rodoviaria_controller', 'index']);
        $this->assertContains('<title></title>', $output);
    }

}