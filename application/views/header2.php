<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');

if ($this->session->userdata('logged_in') !== true || $this->session->userdata('level') === 'cliente')
    redirect('')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GICABUS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet">

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-select.min.css"); ?>" />

    <!-- Camera Slider -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/camera.css"); ?>">

    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/owl.carousel.css"); ?>" media="all">

    <!-- Icon CSS-->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>">

    <!-- Hoover CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/hover-min.css"); ?>" media="all" />

    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/style.css"); ?>" media="all" />

    <script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>

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



    <div class="d-flex w-100" id="wrapper">

        <!-- Sidebar -->
        <div class="navbar-dark border-right sidebar shown" id="sidebar-wrapper">
            <div class="sidebar-heading font-weight-bold d-flex justify-content-center align-center">
                <div class="align-self-center">
                <img src="<?php echo base_url("assets/images/title-text.svg"); ?>" width=150 />
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a href="<?= site_url('dashboard') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-home mr-1"></i> Home</a>

                <?php if ($this->session->userdata('level') === 'adm') : ?>
                <a href="<?= site_url('dashboard/categorias/passageiros') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-group mr-1"></i> Gerenciar Categorias de Passageiros</a>
                <a href="<?= site_url('dashboard/categorias/onibus') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-bus mr-1"></i> Gerenciar Categorias de Onibus Intermunicipais</a>
                <a href="<?= site_url('dashboard/rodoviarias') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-location-arrow mr-1"></i> Gerenciar Rodoviarias</a>
                <a href="<?= site_url('dashboard/') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-wrench mr-1"></i> Gerenciar Manutenções</a>
                <?php elseif ($this->session->userdata('level') === 'admlocal') : ?>

                <a href="<?= site_url('dashboard/tarifas') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-money mr-1"></i> Gerenciar Tarifas</a>
                <a href="<?= site_url('dashboard/trajetos/urbanos') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-road mr-1"></i> Gerenciar Trajetos Urbanos</a>
                <a href="<?= site_url('dashboard/paradas') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-hand-paper-o mr-1"></i> Gerenciar Paradas</a>
                <a href="<?= site_url('dashboard/concessoes') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-paper-plane-o mr-1"></i> Gerenciar Concessões de Trajetos</a>

                <?php elseif ($this->session->userdata('level') === 'secretario') : ?>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-bus mr-1"></i> Gerenciar Registro de Frotas</a>

                <?php endif; ?>

                <!-- <a href="<?= site_url('tarifas') ?>" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-money mr-1"></i> Gerenciar Tarifas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-road mr-1"></i> Gerenciar Trajetos Urbanos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-hand-paper-o mr-1"></i> Gerenciar Paradas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-bus mr-1"></i> Gerenciar Registro de Frotas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-group mr-1"></i> Gerenciar Categorias de Passageiros</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-sweep-to-right hvr-icon-grow"><i class="hvr-icon fa fa-file mr-1"></i> Gerenciar Concessões de Trajetos</a>
           -->


            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="d-flex flex-column" style=" height: 100vh">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark top-header border-bottom">
                <div class=" order-0">
                    <button class="mr-md-3 m-sm-0 btn " id="menu-toggle" alt="Toggle Menu" title="Abrir Menu">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="mx-auto order-0">
                    <a class="navbar-brand mx-lg-auto" href="#">
                        <img src="<?php echo base_url('assets/images/logo.png'); ?>" style="max-width: 150px" />
                    </a>
                </div>
                <div class="navbar-collapse collapse w-100 order-1 dual-collapse mt-lg-0 mt-sm-3 ">
                    <ul class="navbar-nav ml-auto">
                        <li class="dropdown shownav-item text-light d-flex align-center ml-3">
                            <a href="#" class="nav-link d-flex row  " role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle fa-2x my-auto"></i>
                                <div class="px-2 py-1">
                                    <?= $this->session->userdata('username') ?>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?= site_url('logout'); ?>">Sair</a>
                            </div>


                            <!-- <a href="#" class="nav-link d-flex row">
                                <i class="fa fa-user-circle fa-2x my-auto"></i>
                                <div class="px-2 py-1">
                                    <?= $this->session->userdata('username') ?>
                                </div>
                            </a> -->
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse">
                    <i id="navbar-collapse-icon" class="fa fa-arrow-circle-down" id="navbar-toggler-btn"></i>
                </button>
            </nav>
            <div class="container-fluid pt-3 overflow-auto h-100 flex-shrink-1">
