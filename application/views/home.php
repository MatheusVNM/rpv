<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view('header')
?>

<!-- Inicio do cabeçalho inferior -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark bottom-header bottom-header">
    <div class="navbar-collapse collapse order-3 order-md-0 dual-collapse2 col-md-7 row ">
        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group"> Origem
            <select class="selectpicker form-control" data-live-search="true" id="origem">
            </select>
        </div>

        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group"> Destino
            <select class="selectpicker form-control" data-live-search="true" id="destino">
            </select>
        </div>

        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group">
            Saída <input style="min-width: 100%" class="form-control datepickerinit" type="date" />
        </div>

        <div class="form-group col-md-2 px-1 d-flex flex-column align-center form-group">
            Retorno <input style="min-width: 100%" class="form-control datepickerinit" type="date" />
        </div>

        <button class="btn btn-warning col-md-2 my-auto">Pesquisar</button>

    </div>
    <div class="mx-auto order-0 d-sm-block d-md-none">
        <a class="navbar-brand mx-lg-auto" href="#">
            Comprar Passagem ->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-md-5 navbar-collapse collapse w-100 order-4 dual-collapse2 justify-content-end">
        <ul class="navbar-nav ">
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
        <!-- <div class="col-md-4">
                <a href="#" class="nav-link">Home</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="nav-link">Sobre Nós</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="nav-link">Nossa Frota</a>
            </div> -->
    </div>

</nav>

<!-- Body real init -->
<div class="container bg-dark">
    <div id="carouselExampleIndicators" class="carousel slide h-100" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="<?php echo base_url("assets/images/logo.png "); ?>" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

</div>



<!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark top-header"> -->

<!-- <div class="navbar  collapse bottom-header pb-0">
    <div class="row navbar-collapse collapse">
        <div class="col-md-7">
            <div class="form-group col-md-3 col-sm-6 px-1 d-flex flex-column align-center form-group"> Origem
                <select class="selectpicker form-control" data-live-search="true" id="origem">
                </select>
            </div>
            <div class="form-group col-md-3 col-sm-6 px-1 d-flex flex-column align-center form-group"> Destino
                <select class="selectpicker form-control" data-live-search="true" id="destino">
                </select>
            </div>
            <div class="form-group col-md-2  col-sm-6 px-1 d-flex flex-column align-center form-group">Data de Saída <input style="min-width: 100%" class="form-control datepickerinit" type="date" />
            </div>
            <div class="form-group col-md-2 col-sm-6 px-1 d-flex flex-column align-center form-group">Data de Retorno <input style="min-width: 100%" class="form-control datepickerinit" type="date" />
            </div>
            <button class="btn btn-warning col-md-2 my-auto">Pesquisar</button>
        </div>
        <div class="col-md-5">
            <div class="col-md-4">
                <a href="#" class="nav-link">Home</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="nav-link">Sobre Nós</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="nav-link">Nossa Frota</a>
            </div>
            <div class="col-md-4">
                <a href="#" class="nav-link">Area de Atuação</a>
            </div>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".bottom-header">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    </div> -->


<?php 
$this->load->view('footer');
?> 



