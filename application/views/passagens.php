<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header_cliente");
?>


  
<div class="d-block">
    <a href="<?= base_url('clientes') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center ">Minhas Passagens</h2>
</div>

<div class="d-flex justify-content-center flex-column align-items-center pt-3" >





    <?php foreach ($passagens as $passagem) : ?>

        <div class="card shadow-sm p-2 mb-2" style="width:100%; max-width: 400px">
            <p class="mb-0">
                Nº Ticket: <?= $passagem['comprapassagem_num_ticket'] ?>
            </p>
            <p class="mb-0">
                Nº Cadeira: <?= $passagem['ocupacaocadeira_numero'] ?>
            </p>
            <p class="mb-0">
                Rota: <?= $passagem['cidade_origem'] ?> <i class="fa fa-arrow-right"></i> <?= $passagem['cidade_destino'] ?>
            </p>
            <p class="mb-0">
                Preço: R$<?= $passagem['comprapassagem_valor_compra'] ?>
            </p>
            <p class="mb-0">
                Data compra: <?= date("d/m-/Y", strtotime($passagem['comprapassagem_data'])) ?>
            </p>

            <p class="mb-0">
                Data saída: <?= date("d/m-/Y", strtotime($passagem['alocacaointermunicipal_data_hora_inicio'])) ?>
            </p>

            
        </div>

    <?php endforeach; ?>
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