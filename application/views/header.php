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

<body>
    <!-- Inicio do cabeçado superior -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark top-header">
        <div class="navbar-collapse collapse w-100 order-3 order-md-0 dual-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a href="#" class="nav-link"><i class="fa fa-phone"></i> (55) 9xxxx-xxxx</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-envelope"></i> grupobom@gmail.com</a>
                </li>
                <li class="nav-item">
                    <div class="nav-link d-flex align-items-center">
                        <i class="fa fa-clock-o"></i>
                        <div class="ml-1" id="clock">Sun o</div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-lg-auto" href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" style="max-width: 150px" />
            </a>
        </div>
        <div class="navbar-collapse collapse w-100 order-1 dual-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-light d-flex align-center ml-3">
                    <a href="#" class="nav-link d-flex row"><i class="fa fa-user-circle fa-2x my-auto"></i>
                        <div class="px-2 py-1">José Alencar</div>
                    </a>
                </li>
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- Fim do cabeçalho superior-->
