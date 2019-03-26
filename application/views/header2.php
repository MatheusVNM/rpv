<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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

</head>

<body>

    <div class="d-flex position-fixed" id="wrapper">

        <!-- Sidebar -->
        <div class="navbar-dark border-right sidebar shown" id="sidebar-wrapper">
            <div class="sidebar-heading font-weight-bold d-flex justify-content-center align-center">
                <div class="align-self-center">
                    <img src="<?php echo base_url("assets/images/title-text.svg"); ?>" width=150 />
                </div>
            </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-home mr-1"></i> Home</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-money mr-1"></i> Gerenciar Tarifas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-road mr-1"></i> Gerenciar Trajetos Urbanos</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-hand-paper-o mr-1"></i> Gerenciar Paradas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-bus mr-1"></i> Gerenciar Registro de Frotas</a>
                <a href="#" class="list-group-item list-group-item-action bg-light hvr-underline-reveal hvr-icon-grow"><i class="hvr-icon fa fa-group mr-1"></i> Gerenciar Categorias de Passageiros</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="d-flex flex-column h-100" style="max-height: 100vh">
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
                        <li class="nav-item text-light d-flex align-center ml-3">
                            <a href="#" class="nav-link d-flex row"><i class="fa fa-user-circle fa-2x my-auto"></i>
                                <div class="px-2 py-1">José Alencar</div>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse">
                    <i id="navbar-collapse-icon" class="fa fa-arrow-circle-down" id="navbar-toggler-btn"></i>
                </button>
            </nav>

            <div class="container-fluid pt-3 overflow-auto position-static flex-shrink-1" > 