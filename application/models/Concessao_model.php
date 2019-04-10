<?php
class Concessao_model extends CI_model{
    
    public function getConcessoes(){
        $this->db->where('statusConcessao !=' , 2);
        $query = $this->db->get('concessao');
        return $query->result_array();
    }

    public function save($nroProtocolo, $status, $date){
        $resultUpload =   $this->uploadFile('docconcessao');
        if($resultUpload['success']){
            $this->db->select('IFNULL(MAX(`id_Concessao`), 0) AS `maxid`', false);
            $uploadedDownloadDir = $resultUpload['path'];
            $data = array(
                'protocolo_Contrato' => $nroProtocolo,
                'statusConcessao' => $status,
                'anexo_Concessao' => $uploadedDownloadDir,
                'ano' =>  $date
            );
            $this->db->insert('concessao', $data);
            return array('success' => true);
        }else{
            return array('success' => false, 'error' => $resultUpload['error']);
        }
    }
    public function update($id ,$nroProtocolo, $status){
        $data = array(
            'protocolo_Contrato' => $nroProtocolo,
            'statusConcessao' => $status,
        );
            $this->db->where('id_Concessao', $id);
            $this->db->update('concessao', $data);
        }

    public function updateStatus($id, $status){
        $data=array(
            'statusConcessao' => $status
        );
        $this->db->where('id_Concessao', $id);
        $this->db->update('concessao', $data);
    }
    
    public function uploadFile($file){
         // set path to store uploaded files
         $config['upload_path'] = realpath(FCPATH . 'files');

         $new_name = str_replace('.pdf', '', $_FILES["docconcessao"]['name']) . md5(time()) . '.pdf';
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
        public function getConcessoesExcluidas(){
            $this->db->where('statusConcessao', 2);
            $query = $this->db->get('concessao');
            return $query->result_array();
        }
}