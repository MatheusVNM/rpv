<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 

class Gerenciar_Concessoes_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('concessao_model');
    }

    public function index($data = array()){
        $data['concessoes'] = $this->concessao_model->getConcessoes();
        $data['concessoesExcluidas'] = $this->concessao_model->getConcessoesExcluidas();
        $this->load->view('gerenciar_concessoes_view/tela_inicial', $data);
    }

    public function createConcessao(){
        $this->form_validation->set_rules('name_nroProtocolo', 'Protocolo', 'required');
        if($this->form_validation->run() !== false){
            $nroProtocolo = $this->input->post('name_nroProtocolo', true);
            $status = $this->input->post('name_opcoesstatus', true);
            $date  = date('Y-m-d');
            $result = $this->concessao_model->save($nroProtocolo, $status, $date);
            if($result['success']){
                $this->session->set_flashdata('success' , '<div class="alert alert-success m-2">Concessão cadastrada com sucesso</div>');
                 redirect('dashboard/concessoes');
             }else{
                 $this->session->set_flashdata('error' ,  '<div class="alert alert-success mt-3 mx-auto">Erro ao cadastrar a concessão</div>');            
                 redirect('dashboard/concessoes');
                }
        }else{
            $this->session->set_flashdata('error' ,  '<div class="alert alert-success mt-3 mx-auto">Erro ao cadastrar a concessão </div>');            
            redirect('dashboard/concessoes');
           }
    }
    public function updateConcessao(){
        $this->form_validation->set_rules('name_nroProtocoloEdit', 'Protocolo', 'required');
        if($this->form_validation->run() !== false){
            //$this->output->enable_profiler(true);
            $nroProtocolo = $this->input->post('name_nroProtocoloEdit', true);
            $status = $this->input->post('concessao_status', true);
            $id = $this->input->post('concessao_id');
            $this->concessao_model->update($id, $nroProtocolo, $status);
            redirect('dashboard/concessoes');
        }
    }
    public function updateStatusConcessao(){
        $status = '2';
        $id = $this->input->post('concessao_id');
        $this->output->enable_profiler(true);
        $this->concessao_model->updateStatus($id, $status);
        redirect('dashboard/concessoes');
    }
    public function getExcluidas(){
        $this->concessao_model->getConcessoesExcluidas();
    }
    public function restaurarConcessao(){
        $status='0';
        $id = $this->input->post('concessao_id');
        $this->concessao_model->updateStatus($id, $status);
        redirect('dashboard/concessoes');
    }
}