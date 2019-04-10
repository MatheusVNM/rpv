<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gerenciar_Categoria_Passageiros_Controller extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('CategoriaPassageiros_model','categorias');
    }

    public function  index($data = array())
    {
        $data['categoriaPassageiros'] = $this->categorias->getCatPassageiros();
        
        $this->load->view('gerenciar_Categorias_Passageiros_Principal', $data);
    }

    public function createCategoria(){
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('valordesconto', 'Desconto', 'required' );
        $this->form_validation->set_rules('criterios[]', 'Criterios', 'required');

        echo "<pre>";
        print_r($this->input->post());
        echo "</pre>";
        if($this->form_validation->run()!==false){

        $nome = $this->input->post('nome');
        $valorDesconto= $this->input->post('desconto');
        $criterios= $this->input->post('criterios');
        
        //$this->session->set_flashdata('sucess', '<div class="alert alert-sucess">Categoria salva com sucesso!</div>');
        //$this->categorias->createCategoria($nome, $valorDesconto, $criterios);
        }else{
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Por favor, preencha corretamente o formulário</div>');
           
        }
    }    

    public function editCategoria(){
        
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('valordesconto', 'Desconto', 'required' );
        $this->form_validation->set_rules('criterios[]', 'Criterios', 'required');

        echo "<pre>";
        print_r($this->input->post());
        echo "</pre>";
        if($this->form_validation->run()!==false){

        $nome = $this->input->post('nome');
        $valorDesconto= $this->input->post('desconto');
        $criterios= $this->input->post('criterios');
        
        //$this->session->set_flashdata('sucess', '<div class="alert alert-sucess">Categoria salva com sucesso!</div>');
        //$this->categorias->createCategoria($nome, $valorDesconto, $criterios);
        }else{
            $this->session->set_flashdata('error', '<div class="alert alert-danger">Por favor, preencha corretamente o formulário</div>');
           
            
    }
}

 public function cadastrarTela(){
    $this->load->view('gerenciar_Nova_Categoria');
}
 
    


 
 public function verCategoria(){

    $id = $this->input->post('categoriapassageiro_id');
    $categoriaDoDB = $this->categorias->getCategoriaEspecifica($id);
    $data['categoria']= $categoriaDoDB; 

    $criteriosDoDB = $this->categorias->getCriterios($id);
    $data['criterios'] = $criteriosDoDB;



    $this->load->view( 'gerenciar_Categorias_Passageiros_informacoes', $data);
 }

    public function editarCategoriaPassageiro(){

        $id = $this->input->post('categoriapassageiro_id');
        $categoriaDoDB = $this->categorias->getCategoriaEspecifica($id);
        $data['categoria']= $categoriaDoDB; 
    
        $criteriosDoDB = $this->categorias->getCriterios($id);
        $data['criterios'] = $criteriosDoDB;

        $this->load->view( 'gerenciar_Editar_Categoria', $data);
    
    }



    //em vez de carregar as informacoes, carrega a de editar
    //dai em vez de botar os echos nos <h2></h2> da vida, bota no value dos inputs
    


}