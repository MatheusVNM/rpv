<?php
class Login_model extends CI_Model
{

  function validate($email, $password, $type)
  {



    $dataCliente = array(
      0 => array(
        "user_name" => 'José Cliente',
        "user_email" => 'jose@teste.com',
        "user_level" => 'cliente'
      ),
      1 => array(
        "user_name" => 'Maria Cliente',
        "user_email" => 'maria@teste.com',
        "user_level" => 'cliente'
      ),

    );
    $dataAdministrador = array(
      0 => array(
        "user_name" => 'José ADM',
        "user_email" => 'jose@teste.com',
        "user_level" => 'adm'
      ),
      1 => array(
        "user_name" => 'Maria ADM',
        "user_email" => 'maria@teste.com',
        "user_level" => 'adm'
      ),
    );
    $dataAdministradorLocal = array(
      0 => array(
        "user_name" => 'José ADM Local',
        "user_email" => 'jose@teste.com',
        "user_level" => 'admlocal'
      ),
      1 => array(
        "user_name" => 'Maria ADM Local',
        "user_email" => 'maria@teste.com',
        "user_level" => 'admlocal'
      ),
    );
    $dataSecretario = array(
      0 => array(
        "user_name" => 'José Secretário',
        "user_email" => 'jose@teste.com',
        "user_level" => 'secretario'
      ),
      1 => array(
        "user_name" => 'Maria Secretária',
        "user_email" => 'maria@teste.com',
        "user_level" => 'secretario'
      ),
    );
    $dataContador = array(
      0 => array(
        "user_name" => 'José Contador',
        "user_email" => 'jose@teste.com',
        "user_level" => 'contador'
      ),
      1 => array(
        "user_name" => 'Maria Contador',
        "user_email" => 'maria@teste.com',
        "user_level" => 'contador'
      ),
    );
    $dataGerenteRH = array(
      0 => array(
        "user_name" => 'José RH',
        "user_email" => 'jose@teste.com',
        "user_level" => 'rh'
      ),
      1 => array(
        "user_name" => 'Maria RH',
        "user_email" => 'maria@teste.com',
        "user_level" => 'rh'
      ),
    );


    $database = array();
    if ($type === "cliente") {
      $database = $dataCliente;
    }
    if ($type === "adm") {
      $database = $dataAdministrador;
    }
    if ($type === "admLocal") {
      $database = $dataAdministradorLocal;
    }
    if ($type === "secretario") {
      $database = $dataSecretario;
    }
    if ($type === "contador") {
      $database = $dataContador;
    }
    if ($type === "rh") {
      $database = $dataGerenteRH;
    }



    $fakePassword = md5('123456');

    $result = array();
    if ($password === $fakePassword) {
      if ($email === $database[0]['user_email']) {
        $result = $database[0];
        } else if ($email === $database[1]['user_email']) {
          $result = $database[1];
        // } else if ($email === $database[2]['user_email']) {
        //   $result = $database[2];
      }
    }

    // $data  = $validate->row_array();
    // $name  = $data['user_name'];
    // $email = $data['user_email'];
    // $level = $data['user_level'];


    if (false) {
      $this->db->where('user_email', $email);
      $this->db->where('user_password', $password);
      $result = $this->db->get('tbl_users', 1);
    }
    return $result;
  }
}
