<?php


class Funcionarios_model extends CI_Model
{

    public function getFuncionarios()
    {
        //$this->db->where('funcionarios_contrato_seguro is not null');
        $sql = "select * FROM funcionarios WHERE funcionarios.funcionarios_contrato_seguro is null";
        $result  = $this->db->query($sql);
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }
    public function getFuncionariosComContrato()
    {
        $sql = "select * FROM funcionarios WHERE funcionarios.funcionarios_contrato_seguro is not null";
        $result  = $this->db->query($sql);
        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->result_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }
    public function updateContratoFuncionario(
        $funcionario_id
    ) {
        $resultUpload =   $this->uploadFile('funcionario_contrato_seguro');
        if ($resultUpload['success']) {
            $uploadedDownloadDir = $resultUpload['path'];
        }
        $data = array(
            'funcionarios_contrato_seguro' => $uploadedDownloadDir
        );
        $result['success'] = $this->db->update('funcionarios', $data, array('funcionarios_id' => $funcionario_id));
        if ($result['success'] === false)
            $result['error'] = $this->db->error();
    }

    public function uploadFile($file)
    {
        // set path to store uploaded files
        $config['upload_path'] = realpath(FCPATH . 'files');

        $new_name = str_replace('.pdf', '', $_FILES["funcionario_contrato_seguro"]['name']) . md5(time()) . '.pdf';
        $config['file_name'] = $new_name;
        // set allowed file types
        $config['allowed_types'] = 'pdf';
        // set upload limit, set 0 for no limit
        $config['max_size']    = 0;

        // load upload library with custom config settings
        $this->load->library('upload', $config);

        // if upload failed , display errors
        if (!$this->upload->do_upload($file)) {
            $data['success'] = false;
            $data['error'] = $this->upload->display_errors();
            return $data;
        } else {
            $data['success'] = true;
            $path = str_replace($this->upload->data()['file_path'], base_url('/files/'), $this->upload->data()['full_path']);
            $data['path'] = $path;
        }
        return $data;
    }
    public function getConcessoesExcluidas()
    {
        $this->db->where('concessao_status', 2);
        $query = $this->db->get('concessao');
        return $query->result_array();
    }
}
