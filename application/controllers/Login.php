<?php
defined('BASEPATH') or exit('No direct script access allowed');


class login extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('login_model');
  }


  function auth()
  {

    $email    = $this->input->post('email', true);
    $password = hash('sha512', $this->input->post('password', true));
    $tipo = $this->input->post('tipoUsuario', true);
    $validate = $this->login_model->validate($email, $password, $tipo);
    if ($validate->num_rows() > 0) {
      // if (sizeof($validate) > 0) {

      $data  = $validate->row_array();
      // $data = $validate;
      $id  = $data['user_id'];
      $name  = $data['user_nome'];
      $email = $data['user_email'];
      $level = $data['user_level'];
      $dados = $data;
      $sesdata = array(
        'id' => $id,
        'username'  => $name,
        'email'     => $email,
        'level'     => $level,
        'logged_in' => true,
        'dados'=>$dados
      );
      $this->session->set_userdata($sesdata);

      // cliente
      // adm
      // admLocal
      // secretario
      // contador
      // rh
      if ($level === 'cliente') {
        echo '<br><br><div style="font-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: cliente. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        // echo_r($this->session->userdata('dados'));
        redirect('pager/cliente');
      } elseif ($level === 'adm') {
        echo '<br><br><div style="fo  nt-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: adm. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        redirect('pager/dashboardAdm');
      } elseif ($level === 'admlocal') {
        echo '<br><br><div style="font-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: admLocal. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        redirect('pager/dashboardAdmLocal');
        // echo_r($this->session->userdata('dados'));

      } elseif ($level === 'secretario') {
        echo '<br><br><div style="font-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: secretario. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        redirect('pager/dashboardSecretario');
      } elseif ($level === 'contador') {
        echo '<br><br><div style="font-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: contador. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        redirect('pager/dashboardContador');
      } elseif ($level === 'rh') {
        echo '<br><br><div style="font-size: 16pt; background: #f55; padding: 10px; border-radius: 16px;" >Logged as role: rh. Hello, ' . $name . '. Your email is: ' . $email . '</div>';
        redirect('pager/dashboardrh');
      } else {
        echo $level;
        echo "HACKER";
      }
    } else {
      $this->session->set_flashdata('loginerror', '<div class="alert alert-danger">Usuário ou senha incorretos</div>');
      // redirect('');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect('');
  }
}
