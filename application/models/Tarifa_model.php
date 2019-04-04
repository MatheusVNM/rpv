<?php
class Tarifa_model extends CI_Model
{
    

    function getTarifas()
    {
        $this->db->select('tarifa_id, tarifa_nome, tarifa_codigo, tarifa_vigente, max(valores_data_homologacao) as tarifa_ultimaatt');
        $this->db->from('tarifa');
        $this->db->join('valorestarifa', 'valorestarifa.valores_id_tarifa = tarifa.tarifa_id');
        $this->db->group_by('tarifa_id');
        // echo $this->db->get_compiled_select();
        $result = $this->db->get()->result_array();
        return $result;
    }


    function getValoresTarifa($id = -1)
    {
        $where = array('valores_id_tarifa' => $id);

        $values = $this->db->get_where('valorestarifa', $where)->result_array();
        return $values;
    }

    function getValorTarifaVigente($id = -1)
    {
        $where = array('valores_id_tarifa' => $id, 'valores_is_vigente' => true);
        $values = $this->db->get_where('valorestarifa', $where)->result_array();
        if (sizeof($values) === 0) {
            // $this->db->where('valores_id_tarifa', $id);
            $this->db->select('*');
            $where = array('valores_id_tarifa' => $id);
            $this->db->limit(1);
            $this->db->order_by('valores_data_homologacao', 'desc');
            $values = $this->db->get_where('valorestarifa', $where)->result_array();
            // $this->db->from('valorestarifa');
            
        }
        return $values[0];
    }

    function updateTarifa($id, $valor, $dataHomologacao){
        $data = array(
            'valores_is_vigente'=>false,
        );
    
    $this->db->where('valores_id_tarifa', $id);
    $this->db->update('valorestarifa', $data);
    
    $resultUpload=   $this->uploadFile();
    if($resultUpload['success']){

        $uploadedDownloadDir =$resultUpload['path'];
        
        $data = array(
            'valores_id_tarifa' => $id,
            'valores_data_homologacao' => $dataHomologacao,
            'valores_is_vigente' => true,
            'valores_valor' => $valor,
            'valores_anexo' => $uploadedDownloadDir
        );
        
        $this->db->insert('valorestarifa', $data);

        return true  ;
    }else{
        return false;
    }
    }

    
    private function uploadFile(){

    // set path to store uploaded files
    $config['upload_path'] = realpath(FCPATH.'files');

    $new_name = str_replace('.pdf','',$_FILES["concessao"]['name']).md5(time()).'.pdf';
    $config['file_name'] = $new_name;
    // set allowed file types
    $config['allowed_types'] = 'pdf';
    // set upload limit, set 0 for no limit
    $config['max_size']    = 0;

    // load upload library with custom config settings
    $this->load->library('upload', $config);

     // if upload failed , display errors
    if (!$this->upload->do_upload('concessao'))
    {
        $data['success'] = false;
        $this->session->set_flashdata('error', $this->upload->display_errors());
        return $data;
     }
    else
    {
        $data['success'] = true;
            $path = str_replace($this->upload->data()['file_path'],base_url('/files/'), $this->upload->data()['full_path']);
         $data['path']=$path;
    }
return $data;
        

    }   

}
