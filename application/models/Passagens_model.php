<?php


class Passagens_model extends CI_Model
{




    public function criarPassagemComUsuario($idCadeira, $precocadeira)
    {

        $this->db->select('IFNULL(MAX(`comprapassagem_id`), 0) AS `maxid`', false);
        $codigo = sprintf('TKT%07d', ($this->db->get('comprapassagem', 1)->result_array()[0]['maxid'] + 1));

        $insertArray = array(
            'comprapassagem_usuario' => $this->session->userdata('id'),
            'comprapassagem_valor_compra' => $precocadeira,
            'comprapassagem_data' => date("Y-m-d H:i:s"),
            'comprapassagem_cadeira' => $idCadeira,
            'comprapassagem_pontos_gerados' => $precocadeira * 10,
            'comprapassagem_num_ticket' => $codigo,
            'comprapassagem_tipo_passagem' => $this->session->userdata('dados')['tipo_passagem_id'],
        );
        // echo_r($insertArray);
        $this->db->insert('comprapassagem', $insertArray);

        $this->load->model('usuario_model');
        $this->usuario_model->somarPontosUsuarioLogado($precocadeira*10);
        return $codigo;
    }
}
