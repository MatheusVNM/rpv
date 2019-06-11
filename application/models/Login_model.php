<?php
class Login_model extends CI_Model
{

  function validate($email, $password, $type)
  {
    $this->load->model('usuario_model', 'usuarios');
    return $this->usuarios->getUsuarioPorEmail($email, $password, $type);
  }
}
