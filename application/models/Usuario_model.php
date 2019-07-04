<?php


class Usuario_model extends CI_Model
{
    public function getUsuarioPorEmail($email, $password, $type)
    {
        $this->db->where('user_email', $email);
        $this->db->where('user_password', $password);
        $this->db->where('user_level', $type);
        $this->db->select('usuarios.*, categoriapassageiro.*, tipo_passagem.*');
        $this->db->join('categoriapassageiro', 'user_categoriapassageiro=categoriapassageiro_id', 'left outer');
        $this->db->join('tipo_passagem', ' categoriapassageiro_tipodesconto=tipo_passagem_id', 'left outer');
        // $this->db->from('usuarios');
        // echo_r($this->db->error());
        // echo $this->db->get_compiled_select();

        $result = $this->db->get('usuarios', 1);
        return $result;
    }
    public function comprarItem()
    { }

    public function getUsuarioPorId($id)
    {
        $this->db->where('user_id', $id);
        $this->db->select('usuarios.*, categoriapassageiro.*, tipo_passagem.*');
        $this->db->join('categoriapassageiro', 'user_categoriapassageiro=categoriapassageiro_id', 'left outer');
        $this->db->join('tipo_passagem', ' categoriapassageiro_tipodesconto=tipo_passagem_id', 'left outer');
        $result = $this->db->get('usuarios', 1);
        return $result;
    }

    public function somarPontos($userid, $pontos)
    {
        $retorno =  $this->db->set('user_pontosTotais', "user_pontosTotais+$pontos", false)
            ->where('user_id', $userid)
            ->update('usuarios');
            $this->atualizarPontosNaSessao();
            return $retorno;
        }
    public function diminuirPontos($userid, $pontos)
    {
        $retorno =  $this->db->set('user_pontosTotais', "user_pontosTotais-$pontos", false)
            ->where('user_id', $userid)
            ->update('usuarios');
            $this->atualizarPontosNaSessao();
            return $retorno;
        }

    public function somarPontosUsuarioLogado($pontos)
    {
        $retorno =  $this->db->set('user_pontosTotais', "user_pontosTotais+$pontos", false)
            ->where('user_id', $this->session->userdata('id'))
            ->update('usuarios');
            $this->atualizarPontosNaSessao();
            return $retorno;
        }
    public function diminuirPontoUsuarioLogados($pontos)
    {
        $retorno =  $this->db->set('user_pontosTotais', "user_pontosTotais-$pontos", false)
            ->where('user_id', $this->session->userdata('id'))
            ->update('usuarios');
            $this->atualizarPontosNaSessao();
            return $retorno;
        }

    public function getPontos($userid)
    {
        return $this->db->select('user_pontosTotais')
            ->where('user_id', $userid)
            ->get('usuarios')->row_array()['user_pontosTotais'];
    }
    public function getPontosUsuarioLogado()
    {
       return  $this->db->select('user_pontosTotais')
            ->where('user_id', $this->session->userdata('id'))
            ->get('usuarios')->row_array()['user_pontosTotais'];
    }

    public function atualizarPontosNaSessao()
    {
        $dados = $this->session->userdata('dados');
        $dados['user_pontosTotais'] = $this->getPontosUsuarioLogado();
        $this->session->set_userdata('dados', $dados);
    }
}
