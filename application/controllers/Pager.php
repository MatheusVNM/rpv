<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pager extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('logged_in') !== true) {
      redirect('login');
    }
  }

  function cliente()
  {
    //Allowing akses to admin only
    if ($this->session->userdata('level') === 'cliente') {
        redirect('');
    } else {
      echo "Access Denied";
    }
  }
  function dashboardAdm()
  {
    //Allowing akses to staff only
    if ($this->session->userdata('level') === 'adm') {
      redirect('dashboard');
    } else {
      echo "Access Denied";
    }
  }
  function dashboardAdmLocal()
  {
    //Allowing akses to staff only
    if ($this->session->userdata('level') === 'admlocal') {
      redirect('dashboard');
    } else {
      echo "Access Denied";
    }
  }

  function dashboardSecretario()
  {
    //Allowing akses to staff only
    if ($this->session->userdata('level') === 'secretario') {
      redirect('dashboard');
    } else {
      echo "Access Denied";
    }
  }

  function dashboardContador()
  {
    //Allowing akses to staff only
    if ($this->session->userdata('level') === 'contador') {
      redirect('dashboard');
    } else {
      echo "Access Denied";
    }
  }

  function dashboardrh()
  {
    //Allowing akses to staff only
    if ($this->session->userdata('level') === 'rh') {
      redirect('dashboard');
    } else {
      echo "Access Denied";
    }
  }







  //todo: this is just a template
  // function staff(){
  //   echo "level: 2";
  //   //Allowing akses to staff only
  //   if($this->session->userdata('level')==='2'){
  //     $this->load->view('dashboard');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }

  // function author(){
  //   echo "level: 3";

  //   //Allowing akses to author only
  //   if($this->session->userdata('level')==='3'){
  //     $this->load->view('dashboard');
  //   }else{
  //       echo "Access Denied";
  //   }
  // }
}
