<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view('header')
?>

<!-- Inicio do cabeçalho inferior -->

<nav class="navbar navbar-expand-md navbar-dark bg-dark bottom-header bottom-header">
    <div class="navbar-collapse collapse order-3 order-md-0 dual-collapse2 col-md-10 row ">
        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group"> Origem
            <select class="selectpicker form-control" data-live-search="true" id="origem">
            </select>
        </div>

        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group"> Destino
            <select class="selectpicker form-control" data-live-search="true" id="destino">
            </select>
        </div>

        <div class="form-group col-md-2  px-1 d-flex flex-column align-center form-group">
            Saída <input style="min-width: 100%" class="py-2 form-control datepickerinit" type="date" />
        </div>

        <div class="form-group col-md-2 px-1 d-flex flex-column align-center form-group">
            Retorno <input style="min-width: 100%" class=" py-2 form-control datepickerinit" type="date" />
        </div>
        <div class=" col-md-2 col-sm-12 my-auto">
            <button class="btn btn-warning mt-2 col-md-12">Pesquisar</button>
        </div>

    </div>
    <div class="mx-auto order-0 d-sm-block d-md-none">
        <a class="navbar-brand mx-lg-auto" href="#">
            Comprar Passagem ->
        </a>
        <button class="navbar-toggler ml-5" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-md-5 navbar-collapse collapse w-100 order-4 dual-collapse2 justify-content-end">

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


<div class="container-fluid pt-3 overflow-auto position-static flex-shrink-1 bg-light">
    <div id="carousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner" style="height: 70vh">
            <div class="carousel-item active">
                <center>

                    <img class="carousel-image mx-auto" src="<?php echo base_url('assets/images/temps/la.jpg'); ?>" />
                </center>
            </div>
            <div class="carousel-item">
                <center>

                    <img class="carousel-image mx-auto" src="<?php echo base_url('assets/images/temps/chicago.jpg'); ?>" />
                </center>
            </div>
            <div class="carousel-item">
                <center>

                    <img class="carousel-image " src="<?php echo base_url('assets/images/temps/ny.jpg'); ?>" />
                </center>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev" style="color: #000">

            <span class="p-3 carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="p-3 carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Proximo</span>
        </a>
    </div>

    <div class="jumbotron p-5 mt-3 row " id="sobreNos">
        <div class="col-md-6 order-2 order-md-0 mt-4">
            <img src="<?php echo base_url('assets/images/logo-text.svg'); ?>" style="max-width: 100%" />
        </div>
        <div class="col-md-6">
            <h1 class="font-weight-bold">Sobre Nós</h1>
            Aqui vai algo falando da empresa, tipo

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet ligula maximus nisi mollis, ut ultricies orci maximus. Quisque a tortor a urna suscipit cursus ac a est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In aliquam lacinia quam id fringilla. Suspendisse vehicula ut felis at sagittis. Suspendisse laoreet elit et nulla efficitur, id commodo purus sollicitudin. Ut porta eget metus eu dapibus. Ut et efficitur arcu, a vestibulum ipsum. Morbi luctus ac neque cursus elementum. Quisque vitae volutpat sapien. Quisque consectetur neque ut tristique molestie. Cras dignissim est tellus.
        </div>
    </div>

    <div class="container-fluid my-3 p-5 row">
        <div class="col-md-6">
        <h1 class="font-weight-bold">Nossa Frota</h1>
            Aqui vai algo falando da empresa, tipo

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet ligula maximus nisi mollis, ut ultricies orci maximus. Quisque a tortor a urna suscipit cursus ac a est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In aliquam lacinia quam id fringilla. Suspendisse vehicula ut felis at sagittis. Suspendisse laoreet elit et nulla efficitur, id commodo purus sollicitudin. Ut porta eget metus eu dapibus. Ut et efficitur arcu, a vestibulum ipsum. Morbi luctus ac neque cursus elementum. Quisque vitae volutpat sapien. Quisque consectetur neque ut tristique molestie. Cras dignissim est tellus.
        </div>
        <div class="col-md-6 order-2 order-md-2 mt-4">
            <img src="<?php echo base_url('assets/images/onibus.svg'); ?>" style="max-width: 100%" />
        </div>
    </div>

    <div class="jumbotron p-5 mt-3 row">
        <div class="col-md-6 order-2 order-md-0 mt-4">
            <img src="<?php echo base_url('assets/images/br.svg'); ?>" style="max-width: 100%" />
        </div>
        <div class="col-md-6 ">
        <h1 class="font-weight-bold">Area de Atuação</h1>

            Aqui vai algo falando da empresa, tipo

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet ligula maximus nisi mollis, ut ultricies orci maximus. Quisque a tortor a urna suscipit cursus ac a est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In aliquam lacinia quam id fringilla. Suspendisse vehicula ut felis at sagittis. Suspendisse laoreet elit et nulla efficitur, id commodo purus sollicitudin. Ut porta eget metus eu dapibus. Ut et efficitur arcu, a vestibulum ipsum. Morbi luctus ac neque cursus elementum. Quisque vitae volutpat sapien. Quisque consectetur neque ut tristique molestie. Cras dignissim est tellus.
        </div>
    </div>

    <div class="container-fluid my-3 p-5 row">
        <div class="col-md-6">
        <h1 class="font-weight-bold">Faça parte dessa familida</h1>

            Aqui vai algo falando da empresa, tipo

            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam aliquet ligula maximus nisi mollis, ut ultricies orci maximus. Quisque a tortor a urna suscipit cursus ac a est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In aliquam lacinia quam id fringilla. Suspendisse vehicula ut felis at sagittis. Suspendisse laoreet elit et nulla efficitur, id commodo purus sollicitudin. Ut porta eget metus eu dapibus. Ut et efficitur arcu, a vestibulum ipsum. Morbi luctus ac neque cursus elementum. Quisque vitae volutpat sapien. Quisque consectetur neque ut tristique molestie. Cras dignissim est tellus.
        </div>
        <div class="col-md-6 pr-5 order-2 order-md-2 mt-4">
            <img class = "ml-5" src="<?php echo base_url('assets/images/family.svg'); ?>" style="max-height: 400px" />
        </div>
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

<!-- Button trigger modal -->


<?php 
$this->load->view('footer');
?>

<script>
    function normalizeSlideHeights() {
        $('.carousel').each(function() {
            var items = $('.carousel-image', this);
            var container = $('.carousel-inner', this);

            items.css('min-height', container.height());
            items.css('max-height', container.height());
        })
    }

    $(window).on(
        'load resize orientationchange',
        normalizeSlideHeights);
</script> 