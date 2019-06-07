<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
<style>
    /*Column Highlighting*/
</style>
<!-- Body init -->
<!--<script>-->
<!--    function getRandomInt(min, max) {-->
<!--        return Math.floor(Math.random() * (max - min + 1) + min);-->
<!--    }-->
<!---->
<!--    function getRandomHour() {-->
<!--        return ("0" + getRandomInt(0, 23)).slice(-2) + ":" + ("0" + getRandomInt(0, 59)).slice(-2);-->
<!--    }-->
<!---->
<!--    var teste = ["Comum", "Leito", "Semi Leito"]-->
<!---->
<!--    function getRandomCat() {-->
<!--        return teste[Math.floor(Math.random() * teste.length)];-->
<!--    }-->
<!--</script>-->

<div class="d-block">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center ">Gerenciar metodos de pagamento</h2>
</div>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>


<form id="form_pagamentos" method="POST" action="<?= base_url('formas_pagamentos/save') ?>">

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-6">Tipo de compra</th>
                    <th scope="col" class="col-2">Municipal</th>
                    <th scope="col" class="col-2">Intermunicipal (Rodoviaria)</th>
                    <th scope="col" class="col-2">Intermunicipal (Site)</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <? foreach ($formasPagamento as $row) : ?>
                    <tr>
                        <td><?= $row['formapagamento_nome'] ?></td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input value="true" class="custom-control-input" id="pagamentoMunicipal[<?= $row['formapagamento_id'] ?>]" name="method[<?= $row['formapagamento_id'] ?>][pagamentoMunicipal]" type="checkbox" <? if ($row['formapagamento_municipal']) : ?>
                                    checked
                                <? endif; ?>
                                />
                                <label class="custom-control-label" for="pagamentoMunicipal[<?= $row['formapagamento_id'] ?>]"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input value="true" class="custom-control-input" id="pagamentoRodoviaria[<?= $row['formapagamento_id'] ?>]" name="method[<?= $row['formapagamento_id'] ?>][pagamentoRodoviaria]" type="checkbox" <? if ($row['formapagamento_inter_rodoviaria']) : ?>
                                    checked
                                <? endif; ?>
                                />
                                <label class="custom-control-label" for="pagamentoRodoviaria[<?= $row['formapagamento_id'] ?>]"></label>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <input value="true" class="custom-control-input" id="pagamentoSite[<?= $row['formapagamento_id'] ?>]" name="method[<?= $row['formapagamento_id'] ?>][pagamentoSite]" type="checkbox" <? if ($row['formapagamento_inter_site']) : ?>
                                    checked
                                <? endif; ?>
                                />
                                <label class="custom-control-label" for="pagamentoSite[<?= $row['formapagamento_id'] ?>]"></label>
                            </div>
                        </td>
                    </tr>
                <? endforeach; ?>
            </tbody>
            <tfoot>
                <td colspan="10000">
                    <div class="w-100 d-flex justify-content-end align-center">
                        <a href="<?= base_url('dashboard') ?>" class="btn btn-danger"> Cancelar </a>
                        <button type="submit" class="btn ml-3 btn-success"> Salvar </button>
                    </div>
                </td>
            </tfoot>
        </table>
    </div>
</form>


<?php
$this->load->view("footer_cliente.php")
?>

<script>
    // $("#form_pagamentos").submit(function(event){
    //     console.log($(this).serializeArray())

    //     event.preventDefault();
    //     return false
    // })
</script>