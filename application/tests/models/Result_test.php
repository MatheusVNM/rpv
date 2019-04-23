<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PHPUnit\Framework\TestCase;



class Result_test extends TestCase
{

    public function setUp(){
        echo "setup";
    }

    public function testAssert(){
        $output = '';
        $required = '';
        $this->assertEquals($required, $output);
    }


}