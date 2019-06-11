<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header_cliente");
?>
<div class="d-block">
    <a href="<?= base_url('clientes') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center ">Meus Pontos</h2>
</div>
<div class="mt-5 pt-5 w-100 d-flex flex-column justify-content-center align-items-center">
    <div class="card shadow-sm">
        <div class="card-body">
<center>

    <h2>Você possui:</h2>
    <h1> <?= $pontos ?> pontos</h1>
</center>
        </div>
    </div>
</div>


<script>
    $(".card").hover(
        function() {
            $(this).addClass('shadow card-info-hover').css('cursor', 'pointer');
        },
        function() {
            $(this).removeClass('shadow card-info-hover');
        }
    );
</script>