<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

    <div class="card col-md-5">
        <div class="modal-header">
            <h4 class="mb-0">Informações do Trajeto</h4>
        </div>
        <div class="card-body">
            <?= form_open('gerenciar_categoria_onibus_controller/atualizarCatOnibus', array('id' => 'catOnibus_form')) ?>

            <?= form_hidden('id', $cat_onibus[0]['catOnibus_id']) ?>
            <div class = "col-md-7 ml-0 mb-2 pl-0">
                <label for="id_nome" class="mb-1">Tipo de Ônibus:</label>
                <input id="id_nome" name="name_nome" type=text class="form-control" value="<?=$cat_onibus[0]['catOnibus_nome']?>">
                <label for="id_precokm" class="mb-1">Rua/Avenida:</label>
                <input id="id_precokm" name="name_precokm" type="text" class="form-control" value="<?=$cat_onibus[0]['catOnibus_precokm']?>">
            </div>
            <?= form_close() ?>

            <div class="modal-footer d-flex justify-content-end pr-0">
                <button type="button" class="btn btn-secondary mr-2">
                    Fechar
                </button>
                <button type="submit" form="catOnibus_form" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>


<?php
$this->load->view("footer2.php")
?>