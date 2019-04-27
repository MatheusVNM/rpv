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
        $this->assertNotEquals(false, $data['rodoviaria']);

    }

    public function testGetRodoviariasCidadeTest()
    {
        $data = $this->rodoviaria->getRodoviarias();
        for ($i = 0; $i < count($data); $i++) {
            $conta = count($data[$i]['uf']);
            $this->assertCount(1, [$conta]);
        }
    }

    public function testInsertionRodoviariaCidadeCorreta()
    {
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', 97543-410
            , 'teste@teste.com', "(55)997328105", 4,
            1);
        $this->assertEquals(true, $data);

    }

//    public function testInsertionRodoviariaCidadeIncorreta()
//    {
//        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', 97543-410
//            , 'teste@teste.com', "(55)997328105", 4,
//            13000000);
//        $this->assertNotEquals(true, $data['sucess']);
//
//    }
//
//    /**
//     * Passagem de argumento com valor acima do valor esperado. O banco deve emitir emitir um erro (1).
//     */
//    public function testOverflowInsertionRodoviaria(){
//        $nome = "dsfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
//        dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
//        dddddddddddddddddddddddddddddddddddddddddd";
//        $data = $this->rodoviaria->insertRodoviaria($nome, 'Maximinio', 120, 'Segabinazzi', 97543-410, 'teste@teste.com'
//            , "(55)997328105", 4,
//            1);
//        $this->assertNotEquals(true, $data['sucess']);
//
//    }
//    /**
//     * Passagem de argumento com tipo diferente do esperado. O banco deve emitir erro (1).
//     *
//     */
//    public function testUnexpectedTypeInsertionRodoviaria(){
//        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Rio Grande', 'Maximinio', "AQUI DEVERIA HAVER UM NÚME
//        RO", 'Segabinazzi', 97543-410, 'teste@teste.com', "(55)997328105", 4,
//            1);
//        $this->assertNotEquals(true, $data['sucess']);
//
//    }
} 