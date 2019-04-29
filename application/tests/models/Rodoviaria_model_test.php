<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 7:21 PM
 */

class Rodoviaria_model_test extends TestCase
{

    public function setUp() : void
    {
        $this->resetInstance();
        $this->CI->load->model('rodoviaria_model');
        $this->rodoviaria = $this->CI->rodoviaria_model;
    }

    /**
     * Recebe o UF de uma rodoviaria. Compara o tamanho da uf com o valor esperado de 2.
     */
    public function testGetRodoviariasCidadeTest()
    {
        $data = $this->rodoviaria->getRodoviarias();
        if ($data) {
            foreach ($data as $dt) {
                $this->assertEquals(2, strlen($dt['uf']));
            }
        } else{
            $this->assertFalse($data);
        }
    }

    /**
     * Inserção correta de valores. Deve retornar true
     */
    public function testInsertionRodoviariaCidadeCorreta()
    {
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', "97543-410"
            , 'teste@teste.com', "(55)997328105", 4,
            1);
        $this->assertTrue($data);

    }

    public function testInsertionRodoviariaCidadeIncorreta()
    {
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', "97543-410"
            , 'teste@teste.com', "(55)997328105", 4,
            13000000);
        $this->assertNotFalse($data['error']['code']);

    }

    /**
     * Passagem de argumento com valor acima do valor esperado. O banco deve emitir emitir um erro (1).
     */
    public function testOverflowInsertionRodoviaria(){
        $nome = "dsfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddd";
        $data = $this->rodoviaria->insertRodoviaria($nome, 'Maximinio', 120, 'Segabinazzi', "97543-410", 'teste@teste.com'
            , "(55)997328105", 4,
            1);
        $this->assertNotFalse($data['error']['code']);

    }
    /**
     * Passagem de argumento com tipo diferente do esperado. O banco deve emitir erro (1).
     *
     */
    public function testUnexpectedTypeInsertionRodoviaria(){
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Rio Grande', 'Maximinio', "AQUI DEVERIA HAVER UM NÚME
        RO", 'Segabinazzi', "97543-410", 'teste@teste.com', "(55)997328105", 4,
            1);
        $this->assertNotFalse($data['error']['code']);

    }
} 