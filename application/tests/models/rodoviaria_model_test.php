<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 7:21 PM
 */

class rodoviaria_model_test extends TestCase
{

    public function setUp()
    {
        $this->resetInstance();
        $this->CI->load->model('rodoviaria_model');
        $this->rodoviaria = $this->CI->rodoviaria_model;
    }

    public function testGetRodoviariasIsNotEmpty()
    {
        $data['rodoviaria'] = $this->rodoviaria->getRodoviarias();
        $this->assertNotEmpty($data['rodoviaria']);

    }
//    public function testGetRodoviariasTest(){
//        $data['rodoviaria'] = $this->rodoviaria->getRodoviarias();
//        foreach ($data['rodoviaria'] as $rodoviarias){
//            $this->assertCo
//
//        }
//
//    }

    public function testInsertionRodoviaria(){

    }

    public function testOverflowInsertionRodoviaria(){

    }
} 