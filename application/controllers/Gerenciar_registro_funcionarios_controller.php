<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Gerenciar_registro_funcionarios_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('funcionarios_model', 'funcionarios');
        $this->load->model('tipo_funcionario_model', 'tipofuncionario');
        $this->output->enable_profiler(false);
    }

    public function index()
    {
        $data['funcionarios'] = $this->funcionarios->getFuncionarios()['result'];
        $data['tipofuncionario']= $this->tipofuncionario->getTiposFuncionario()['result'];
        $this->load->view('gerenciar_registro_funcionarios_view/tela_inicial', $data);

    }

    public function criarFuncionario(){
        $this->form_validation->set_rules('nome_funcionario', 'Nome', 'required');
        $this->form_validation->set_rules('cpf_funcionario', 'CPF', 'required');
        $this->form_validation->set_rules('telefone_funcionario', 'Telefone', 'required');
        $this->form_validation->set_rules('email_funcionario', 'Email', 'required');
        $this->form_validation->set_rules('nome_mae_funcionario', 'Nome da Mãe', 'required');



        if ($this->form_validation->run() !== false) {

            $nome = $this->input->post('nome_funcionario', true);
            $cpf = $this->input->post('cpf_funcionario', true);
            $telefone = $this->input->post('telefone_funcionario', true);
            $email = $this->input->post('email_funcionario', true);
            $nomeMae = $this->input->post('nome_mae_funcionario', true);
            $funcao = $this->input->post('funcao_funcionario', true);


            $this->funcionarios->insertFuncionario($nome, $cpf, $telefone, $email, $nomeMae, $funcao);
            $this->session->set_flashdata('success', '<div class="alert alert-success mt-3 mx-auto">Criação feita com sucesso</div>');
            redirect('gerenciar_registro_funcionarios_controller');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger mt-3 mx-auto">Preencha o formulario corretamente</div>');
            redirect('gerenciar_registro_funcionarios_controller');
        }




    }



}


