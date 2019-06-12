<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GICABUS</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-select.min.css"); ?>" />

    <!-- Camera Slider -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/camera.css"); ?>">

    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>" media="all">

    <!-- Icon CSS-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">

    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/style.css"); ?>" media="all" />
    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <style>

    </style>
</head>

<body>
    <div id="loading" class="top-header position-fixed h-100 w-100 d-flex align-center justify-content-center" style="z-index:10000; height: 100px">
        <div class=" my-auto mx-auto d-flex flex-column align-center justify-content-center text-light font-weight-bold">

            <div class="loading_screen_main">
                <div class="loading_screen_cup ">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" class="loading_screen_img" />

                    <div class="loading_screen_shadow1"></div>
                    <div class="loading_screen_shadow2"></div>
                </div>
            </div>
            <div class="loading_screen_text mt-5 mx-auto h4">
            </div>
            <center>
                <img src="<?php echo base_url("assets/images/title-text.svg"); ?>" width=100% />
                <br>Carregando...
            </center>

        </div>
    </div>
    <script>
        $(window).on("load", function() {
                    $("#loading").toggle("slow", function() {
                        $("#loading").toggleClass("d-flex")

                    })
                    console.log("done");
                });
    </script>



    <!--
    <div class="top-header position-fixed h-100 w-100 d-flex align-center justify-content-center" style="z-index:10000; height: 100px">
<div class=" my-auto mx-auto d-flex flex-column align-center justify-content-center text-light font-weight-bold">
    <center>
        <img src="<?php echo base_url('assets/images/logo.png'); ?>" style="max-width: 300px" />
    </center>
<center>

      <div class="my-3 loading-spinner">
          </div>
        </center>
        <center class="h1">

            Carregando
        </center>
    </div>
</div> -->


    <!-- Inicio do cabeçado superior -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark top-header">
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-lg-auto" href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" style="max-width: 150px" />
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 order-1 dual-collapse">
            <ul class="ml-auto navbar-nav ">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Sobre Nós</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Nossa Frota</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Area de Atuação</a>
                </li>
            </ul>
            <?php if ($this->session->userdata('logged_in') !== true) : ?>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cadastrar-se</a>
                    </li>
                </ul>
            <?php else : ?>

                <ul class="navbar-nav">
                    <li class="dropdown shownav-item text-light d-flex align-center ml-3">
                        <a href="#" class="nav-link d-flex row  mr-2" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle fa-2x my-auto"></i>
                            <div class="px-2 py-1">
                                <?= $this->session->userdata('username') ?>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
                            <?php if ($this->session->userdata('level') !== 'cliente') : ?>
                                <a class="dropdown-item" href="<?= site_url('dashboard'); ?>">Dashboard</a>
                            <?php endif; ?>
                            <?php if ($this->session->userdata('level') === 'cliente') : ?>
                                <a class="dropdown-item" href="<?= site_url('clientes'); ?>">Pagina do Cliente</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="#" onClick="alert('Indisponivel')">Meus Dados</a>
                            <a class="dropdown-item" href="<?= site_url('logout'); ?>">Sair</a>
                        </div>
                    </li>
                </ul>

            <?php endif; ?>


        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- Fim do cabeçalho superior-->



    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Efetuar Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('login/auth', 'id="loginForm"'); ?>
                <div class="modal-body">
                    <?= $this->session->flashdata('loginerror') ?> </p>
                    <label for="tipoUsuario">Tipo de Usuário:</label>

                    <select class="form-control mb-2" id="tipoUsuario" name="tipoUsuario">
                        <option value="cliente">Cliente</option>
                        <option value="adm">Administrador</option>
                        <option value="admlocal">Administrador Local</option>
                        <option value="secretario">Secretário</option>
                        <option value="contador">Contador</option>
                        <option value="rh">Gerente de RH</option>
                        <option value="funcionario">Funcionario Rodoviaria</option>
                    </select>

                    <label for="email">Email:</label>
                    <input class="form-control mb-2" type="text" name="email" id="email" />
                    <label for="password">Senha:</label>
                    <input class="form-control mb-2" type="password" name="password" id="password" />
                    <a href="#" class="btn btn-link">Não possui cadastro? Cadastrar-se</a>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <!-- <button type="button" form="loginForm" class="btn btn-primary" type="submit">Entrar</button> -->
                    <?= form_submit('mysubmit', 'Entrar', 'class="btn btn-primary"'); ?>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>