<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
    <div class="card col-md-5">
        <div class="card-header">
            <h4 class="mb-0">Informações do Trajeto</h4>
        </div>
        <div class="card-body">
            <?= form_open('paradas_controller/atualizarParada', array('id' => 'paradas_form')) ?>

            <?= form_hidden('id', $parada[0]['parada_id']) ?>
            <label for="bairro">Bairro:
                <input id="id_bairro" name="name_bairro" type=text class="form-control" value="<?=$parada[0]['parada_bairro']?>"></label><br>
            <label for="rua">Rua/Avenida:
                <input id="id_rua" name="name_rua" type="text" class="form-control" value="<?=$parada[0]['parada_rua']?>"></label><br>
            <label for="numero">Número:
                <input id="id_nmr" name="name_nmr" type="text" class="form-control" value="<?=$parada[0]['parada_numero']?>"></label><br>
            <?= form_close() ?>
            <div class="card-footer d-flex justify-content-end">
                <button type="button" class="btn btn-secondary mr-2">
                    Fechar
                </button>
                <button type="submit" form="paradas_form" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>


<?php
$this->load->view("footer2.php")
?>