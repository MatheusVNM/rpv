<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 4/23/2019
 * Time: 7:21 PM
 */

class Rodoviaria_model_test extends TestCase
{

    public function setUp(): void
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
            for ($i = 0; $i < sizeof($data['result']); $i++) {
                $this->assertEquals(2, strlen($data['result'][$i]['rodoviaria_uf']));
            }
        } else {
            $this->assertFalse($data);
        }
    }

    public function testGetRodoviariaeEspecifica()
    {
        $data = $this->rodoviaria->getRodoviaria(55);
        $this->assertEquals("Rodoviaria de Alegrete", $data['result']['rodoviaria_nome'] );
    }

    /**
     * Inserção correta de valores. Deve retornar true
     */
    public function testInsertionRodoviariaCidadeCorreta()
    {
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', "97543-410"
            , 'teste@teste.com', "(55)997328105", 4,
            1);
        $this->assertTrue($data['success']);

    }

    public function testInsertionRodoviariaCidadeIncorreta()
    {
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Alegrete', 'Maximinio', 120, 'Segabinazzi', "97543-410"
            , 'teste@teste.com', "(55)997328105", 4,
            13000000);
        $this->assertEquals(1452, $data['error']['code']);

    }

    /**
     * Passagem de argumento com valor acima do valor esperado. O banco deve emitir emitir um erro (1).
     */
    public function testOverflowInsertionRodoviaria()
    {
        $this->markTestSkipped('Necessita de validações na controller');
        $nome = "dsfddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd
        dddddddddddddddddddddddddddddddddddddddddd";
        $data = $this->rodoviaria->insertRodoviaria($nome, 'Maximinio', 120, 'Segabinazzi', "97543-410", 'teste@teste.com'
            , "(55)997328105", 4,
            1);
        $this->assertTrue($data['error']);

    }

    /**
     * Passagem de argumento com tipo diferente do esperado. O banco deve emitir erro (1).
     *
     */
    public function testUnexpectedTypeInsertionRodoviaria()
    {
        $this->markTestSkipped('Necessita de validações na controller');
        $data = $this->rodoviaria->insertRodoviaria('Rodoviaria de Rio Grande', 'Maximinio', "AQUI DEVERIA HAVER UM NÚME
        RO", 'Segabinazzi', "97543-410", 'teste@teste.com', "(55)997328105", 4,
            1);
        $this->assertFalse($data['success']);

    }

    public function testGetQuantRodoviariaPorCidade()
    {
        $data = $this->rodoviaria->getQuantidadeRodoviariaCidades(1);
        $this->assertGreaterThan(0, $data);


    }

    public function testUpdateRodoviariaSuccess()
    {
        $data = $this->rodoviaria->updateRodoviaria(56, 'Nome Teste de Update', 'Rua Teste de Update', 666, 'Bairro Teste de Update', "97541-410", "kidodoido@hotmail.com", "997328105", "30", 1);
        $this->assertTrue($data['success']);
    }

    public function testUpdateRodoviariaError()
    {

        $data = $this->rodoviaria->updateRodoviaria(80, 'Nome Teste de Update', 'Rua Teste de Update', 666, 'Bairro Teste de Update', "97541-410", "kidodoido@hotmail.com", "997328105", "30", 5000000);
        $this->assertEquals(1452, $data['error']['code']);

    }


}