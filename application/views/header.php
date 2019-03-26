<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

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
    <style>

    </style>
</head>

<body >
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
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Entrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Cadastrar-se</a>
                </li>
            </ul>
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
                <div class="modal-body">
                    <label for="tipoUsuario">Tipo de Usuário:</label>

                    <select class="form-control mb-2" id="tipoUsuario" name="tipoUsuario">
                        <option>Cliente</option>
                        <option>Administrador</option>
                        <option>Administrador Local</option>
                        <option>Secretário</option>
                        <option>Contador</option>
                        <option>Gerente de RH</option>
                    </select>

                    <label for="email">Email:</label>
                    <input class="form-control mb-2" type="text" name="email" id="email" />
                    <label for="password">Senha:</label>
                    <input class="form-control mb-2" type="password" name="password" id="password" />
                    <a href="#" class="btn btn-link">Não possui cadastro? Cadastrar-se</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Entrar</button>
                </div>
            </div>
        </div>
    </div> 