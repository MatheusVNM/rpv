<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
    <div class="card col-md-5">
        <div class="modal-header">
            <h4 class="mb-0">Informações do Trajeto</h4>
        </div>
        <div class="card-body">
            <?= form_open('gerenciar_paradas_controller/atualizarParada', array('id' => 'paradas_form')) ?>

            <?= form_hidden('id', $parada[0]['parada_id']) ?>
            <div class = "col-md-7 ml-0 mb-2 pl-0">
            <label for="id_bairro" class="mb-1">Bairro:</label>
                <input id="id_bairro" name="name_bairro" type=text class="form-control" value="<?=$parada[0]['parada_bairro']?>">
            <label for="id_rua" class="mb-1">Rua/Avenida:</label>
                <input id="id_rua" name="name_rua" type="text" class="form-control" value="<?=$parada[0]['parada_rua']?>">
            <label for="id_nmr" class="mb-1">Número:</label>
                <input id="id_nmr" name="name_nmr" type="text" class="form-control" value="<?=$parada[0]['parada_numero']?>">
            </div>
                <?= form_close() ?>

            <div class="modal-footer d-flex justify-content-end pr-0">
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