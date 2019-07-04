<?php
class Gerenciar_funcionarios_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Funcionarios_model', 'funcionarios');
    }
    public function index()
    {
        $data['funcionario_sem_contrato'] = $this->funcionarios->getFuncionarios()['result'] ?? null;
        $data['funcionario_com_contrato'] = $this->funcionarios->getFuncionariosComContrato()['result'] ?? null;
        $this->load->view('gerenciar_seguro_funcionario_view/tela_inicial', $data);
        //$this->output->enable_profiler(true);
        //echo_r($data);
    }
    public function ajax_db_updateContratoSeguroFuncionario()
    {
        $this->form_validation->set_rules('funcionario_id', '', 'required|trim');
        if ($this->form_validation->run() !== false) {
            $funcionario_id = $this->input->post('funcionario_id');
            $result = $this->funcionarios->updateContratoFuncionario(
                $funcionario_id
            );
            if ($result['success']) {
                $result['message'] = successAlert('Documento de seguro adicionado com sucesso.');
            } else {
                $result['message'] = errorAlert('Erro ao adicionar documento de seguro.');
            }
        }
    }
}
