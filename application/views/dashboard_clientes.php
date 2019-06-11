<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header_cliente");
?>

<!-- Body init -->
<!-- <?= primaryAlert('<h4>Dashboard do cliente </h4><hr>Aqui é pagina inicial do Dashboard do cliente, por enquanto, não tem nada de importante para ser exibido aqui') ?> -->
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col col-md-3 mb-3" style="min-height: 70px">
            <a href="<?= base_url('clientes/compra_passagem') ?>" class="text-decoration-none">
                <div class="card hoverable text-dark hoverable text-dark h-100">
                    <div class="card-body">
                        <h5 class="card-title">Comprar passagem</h5>
                        <hr>
                        <p class="card-text text-center ">
                            <i class="fa fa-5x fa-ticket mx-auto"></i>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col col-md-3 mb-3" style="min-height: 70px">
            <a href="<?= base_url('clientes/meus_pontos') ?>" class="text-decoration-none">

            <div class="card hoverable text-dark h-100">
                <div class="card-body">
                    <h5 class="card-title">Ver pontos</h5>
                    <hr>

                    <p class="card-text text-center"><i class="fa fa-5x fa-align-center"></i></p>
                </div>
            </div>
            </a>
        </div>
        <div class="w-100"></div>
        <div class="col col-md-3 mb-3" style="min-height: 70px">
            <div class="card hoverable text-dark h-100">
                <div class="card-body">
                    <h5 class="card-title">Meus dados</h5>
                    <hr>

                    <p class="card-text text-center"><i class="fa fa-5x fa-database"></i></p>
                </div>
            </div>
        </div>
        <div class="col col-md-3 mb-3" style="min-height: 70px">
            <!-- <a href="#" class="text-decoration-none"> -->
                <a href="<?= base_url('clientes/minhas_passagens') ?>" class="text-decoration-none">
                <div class="card hoverable text-dark h-100">
                    <div class="card-body">
                        <h5 class="card-title">Minhas Passagens</h5>
                        <hr>
                        <p class="card-text text-center"><i class="fa fa-5x fa-ticket"></i><i class="fa fa-5x fa-user"></i></p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

</div>
<!-- Body end -->
<?php
$this->load->view("footer_cliente")
?>

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