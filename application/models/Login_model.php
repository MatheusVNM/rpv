<?php
class Login_model extends CI_Model
{

  function validate($email, $password, $type)
  {
      $this->db->where('user_email', $email);
      $this->db->where('user_password', $password);
      $this->db->where('user_level', $type);
      $this->db->select('user_id, user_nome, user_email, user_level');
      $result = $this->db->get('usuarios', 1);
    return $result;
  }
}

