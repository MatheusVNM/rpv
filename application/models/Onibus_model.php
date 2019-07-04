<?php

/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 5/2/2019
 * Time: 12:14 PM
 */

class Onibus_model extends CI_Model
{
    public function getOnibus()
    {
        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, cidade.cidade_nome, estado.estado_uf');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id', 'left');
        $this->db->join('cidade', 'onibus.onibus_cidade = cidade.cidade_id', 'left');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id', 'left');
        $this->db->from('onibus');
        // echo $this->db->get_compiled_select();
        $result = $this->db->get();
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

    public function getTodosOsOnibusSemContrato()
    {
        $sql = "select * FROM onibus JOIN cidade on 
        cidade.cidade_id = onibus.onibus_cidade_id WHERE onibus.onibus_contrato_seguro is null";
        $result = $this->db->query($sql);
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
    public function getTodosOsOnibusComContrato()
    {
        $sql = "select * FROM onibus JOIN cidade on 
        cidade.cidade_id = onibus.onibus_cidade_id WHERE onibus.onibus_contrato_seguro is not null";
        $result = $this->db->query($sql);
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
    public function updateContratoOnibus($onibus_id)
    {
        $resultUpload =   $this->uploadFile('onibus_contrato_seguro');
        if ($resultUpload['success']) {
            $uploadedDownloadDir = $resultUpload['path'];
        }
        $data = array(
            'onibus_contrato_seguro' => $uploadedDownloadDir
        );
        $result['success'] = $this->db->update('onibus', $data, array('onibus_id' => $onibus_id));
        if ($result['success'] === false)
            $result['error'] = $this->db->error();
    }

    public function uploadFile($file)
    {
        // set path to store uploaded files
        $config['upload_path'] = realpath(FCPATH . 'files');

        $new_name = str_replace('.pdf', '', $_FILES["onibus_contrato_seguro"]['name']) . md5(time()) . '.pdf';
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

    public function getOnibusEspecifico($id)
    {
        $this->db->select('onibus.*, categoriaonibus.categoriaonibus_nome, categoriaonibus.categoriaonibus_precokm, cidade.cidade_nome, estado.estado_uf, estado.estado_id');
        $this->db->join('categoriaonibus', 'onibus.onibus_categoria_intermunicipal = categoriaonibus.categoriaonibus_id', 'left');
        $this->db->join('cidade', 'onibus.onibus_cidade = cidade.cidade_id', 'left');
        $this->db->join('estado', 'cidade.cidade_estado = estado.estado_id', 'left');
        $this->db->from('onibus');
        $this->db->where('onibus_id', $id);
        $result = $this->db->get();

        if (!$result) {
            $retorno['success'] = false;
            $retorno['error'] = $this->db->error();
            return $retorno;
        }
        if ($result->num_rows() > 0) {
            $retorno['success'] = true;
            $retorno['result'] = $result->row_array();
            return $retorno;
        } else {
            $retorno['success'] = false;
            return $retorno;
        }
    }


    public function insertOnibusIntermunicipal(
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_ano_fab,
        $onibus_quilometragem,
        $onibus_categoria_intermunicipal,
        $onibus_ar_condicionado,
        $onibus_adaptado_deficiente
    ) {

        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_categoria_intermunicipal' => $onibus_categoria_intermunicipal,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_adaptado_deficiente' => $onibus_adaptado_deficiente,
            'onibus_is_municipal' => 0
        );
        $this->db->select("count(onibus_placa) as count");
        $jatemplaca = $this->db->get_where("onibus", array('onibus_placa' => $onibus_placa))->row_array();
        if (
            $jatemplaca['count'] > 0
        ) {
            $result['success'] = false;
            $result['error'] = "Um onibus com essa placa ja está cadastrado.";
        } else {
            $result['success'] = $this->db->insert('onibus', $data);
            if (!$result['success'])
                $result['error'] = $this->db->error();
        }
        return $result;
    }

    public function insertOnibusMunicipal(
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_ano_fab,
        $onibus_quilometragem,
        $onibus_cidade,
        $onibus_ar_condicionado,
        $onibus_adaptado_deficiente
    ) {
        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_cidade' => $onibus_cidade,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_adaptado_deficiente' => $onibus_adaptado_deficiente,
            'onibus_is_municipal' => 1
        );

        $result['success'] = $this->db->insert('onibus', $data);
        if (!$result['success'])
            $result['error'] = $this->db->error();
        return $result;
    }


    public function updateOnibus(
        $onibus_id,
        $onibus_placa,
        $onibus_numero,
        $onibus_numero_antt,
        $onibus_num_chassis,
        $onibus_num_lugares,
        $onibus_marca,
        $onibus_potencial_motor,
        $onibus_propriedade_veiculo,
        $onibus_ano_fab,
        $onibus_quilometragem,
        $onibus_is_municipal,
        $onibus_cidade,
        $onibus_categoria_intermunicipal,
        $onibus_ar_condicionado,
        $onibus_adaptado_deficiente
    ) {
        $data = array(
            'onibus_placa' => $onibus_placa,
            'onibus_numero' => $onibus_numero,
            'onibus_numero_antt' => $onibus_numero_antt,
            'onibus_num_chassis' => $onibus_num_chassis,
            'onibus_num_lugares' => $onibus_num_lugares,
            'onibus_marca' => $onibus_marca,
            'onibus_potencial_motor' => $onibus_potencial_motor,
            'onibus_propriedade_veiculo' => $onibus_propriedade_veiculo,
            'onibus_ano_fab' => $onibus_ano_fab,
            'onibus_quilometragem' => $onibus_quilometragem,
            'onibus_is_municipal' => $onibus_is_municipal,
            'onibus_ar_condicionado' => $onibus_ar_condicionado,
            'onibus_adaptado_deficiente' => $onibus_adaptado_deficiente
        );
        if ($onibus_is_municipal === true) {
            $data['onibus_cidade'] = $onibus_cidade;
            $this->db->set('onibus_categoria_intermunicipal', 'NULL', false);
        } else {
            $data['onibus_categoria_intermunicipal'] = $onibus_categoria_intermunicipal;
            $this->db->set('onibus_cidade', 'NULL', false);
        }


        $this->db->select("count(onibus_placa) as count");
        $this->db->where('onibus_id !=', $onibus_id);
        $jatemplaca = $this->db->get_where("onibus", array('onibus_placa' => $onibus_placa))->row_array();
        if (
            $jatemplaca['count'] > 0
        ) {
            $result['success'] = false;
            $result['error'] = "Um onibus com essa placa ja está cadastrado.";
        } else {
            $result['success'] = $this->db->update('onibus', $data, array('onibus_id' => $onibus_id));
            if (!$result['success'])
                $result['error'] = $this->db->error();
        }
        return $result;
    }
}
