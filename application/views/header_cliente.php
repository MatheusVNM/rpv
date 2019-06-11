<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');

// if ($this->session->userdata('logged_in') !== true || $this->session->userdata('level') === 'cliente')
//     redirect('')
 

if ($this->session->userdata('logged_in') !== true)
    redirect('');
if ($this->session->userdata('level') !== 'cliente')
    redirect('dashboard');
 
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

       

        <!-- Page Content -->
        <div id="page-content-wrapper" class="d-flex flex-column" style=" height: 100vh">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark top-header border-bottom">
               
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
            <div class="container-fluid pt-3 overflow-auto h-100 flex-shrink-1 px-md-5">