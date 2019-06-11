<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Passagens Geradas Mensalmente</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<!-- Table init (Ao abrir a tela) -->
<div class="table-responsive w-100">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa do Veículo</th>
                <th scope="col">Trajeto</th>
                <th scope="col">Total Vendidas</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_alocacao">
            <?php foreach ($passagens_vendidas_total as $passagens) : ?>
                <?php if ($passagens) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $passagens['onibus_placa'] ?></td>
                        <td><?= $passagens['cidade_nome'] ?></td>
                        <td><?= $passagens['COUNT(comprapassagem.comprapassagem_id)'] ?></td>
                        <td>02/05/2019</td>
                        <td>
                            <button onclick="info(<?= $passagens['alocacaointermunicipal_id'] ?>)" type="button" class="btn btn-primary btn-sm" title="Mais informações sobre a alocação." data-toggle="modal" id="id_opcao_visualizar" data-placement="top" data-target="#id_modal_info">
                                <span class="hvr-icon fa fa-eye mr-1"></span>Visualizar Passagens
                            </button>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- Modal Info -->
<div class="modal fade" id="id_modal_info" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado"><b>Informações</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" id="id_form_info_passagens" novalidate>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom01">Inteiras:</label>
                            <input type="text" class="form-control" id="id_inteiras_quantidade" placeholder="First name" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02">Meias:</label>
                            <input type="text" class="form-control" id="id_meias_quantidade" placeholder="Last name" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02">Isentas:</label>
                            <input type="text" class="form-control" id="id_isentas_quantidade" placeholder="Last name" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom03">Mês:</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="Jan/2019" required disabled>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Total Geradas:</label>
                            <input type="text" class="form-control" id="id_total" required disabled>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>


                    </div>


                </form>

            </div>
        </div>
    </div>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php", array('js' => 'visualizar_passagens'))
?>