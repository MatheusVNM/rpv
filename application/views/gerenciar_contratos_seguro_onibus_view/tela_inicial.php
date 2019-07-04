<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Contratos de Seguros</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row pb-1">
    <div class="col-md-9 row">
    </div>
    <div class="col-md-3 mt-auto">
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#id_modal_cadastro_seguro" title="Adicionar um Seguro.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom" id="id_button_add"> </i>
            Adicionar
        </button>
    </div>
</div>

<!-- Table init (Ao abrir a tela) -->
<div class="table-responsive w-100">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa do Veículo</th>
                <th scope="col">Marca do Veículo</th>
                <th scope="col">Ano de Fabricação</th>
                <th scope="col">Cidade de Funcionamento</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_onibus">
            <?php if ($onibus_com_contrato) : ?>
                <?php foreach ($onibus_com_contrato as $onibus) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $onibus['onibus_placa'] ?></td>
                        <td><?= $onibus['onibus_marca'] ?></td>
                        <td><?= $onibus['onibus_ano_fab'] ?></td>
                        <td><?= $onibus['cidade_nome'] ?></td>
                        <td>
                            <button type="button" onclick="editar(<?= $onibus['onibus_id'] ?>)" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal" data-placement="top" title="Editar Contrato" data-target="#id_modal_edit_contrato">
                                <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                            </button>
                            <a type="button" class="btn btn-primary btn-sm" href="<?= $onibus['onibus_contrato_seguro'] ?>" title="Mais informações sobre a alocação." id="id_opcao_visualizar" data-placement="top" target="_blank">
                                <span class="hvr-icon fa fa-file-pdf-o mr-1"></span>Visualizar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif ?>
            
        </tbody>
    </table>

</div>
<!-- Modal create contrato -->
<div class="modal fade" id="id_modal_cadastro_seguro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Contrato do Ônibus</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Gerenciar_contrato_seguro_controller/ajax_db_updateContratoSeguro', array('id' => 'id_form_adicionar_documento')) ?>
                <div class="form-row mx-2">
                    <div class="form-group col-md-6">
                        <label for="modal_create_onibus">Selecione o ônibus:</label>
                        <div class="input-group mb-3" id="id_onibus_selecionado">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#id_modal_com_listas_onibus">Ônibus</button>
                            </div>
                            <input id="onibus_selecionado" type="text" class="form-control" placeholder="Nenhum ônibus selecionado" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Contrato</label>
                        <input type="file" name="onibus_contrato_seguro" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button onclick="enviando()" type="button" class="btn btn-primary" id="id_button_salvar">Salvar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Editar -->
<div class="modal fade" id="id_modal_edit_contrato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Editar Contrato do Ônibus</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('Gerenciar_contrato_seguro_controller/ajax_db_updateContratoSeguro', array('id' => 'id_edit_form_adicionar_documento')) ?>
                <div class="form-row mx-2" id="id_contrato_onibus">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Contrato</label>
                        <input type="file" name="onibus_contrato_seguro" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button onclick="salvarEdicao()" type="button" class="btn btn-primary" id="id_button_salvar">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal lista de Onibus-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_onibus">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Onibus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_onibus_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($onibus_sem_contrato) : ?>
                            <?php foreach ($onibus_sem_contrato as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="id_lista_onibus_placa">
                                    <label for="id_onibus_placa<?= $row['onibus_id'] ?>" class="float-left m-0 r-0 mr-auto">
                                        <?= $row['onibus_placa'] ?>
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input float-right" type="radio" data-name="<?= $row['onibus_placa'] ?>" id="id_onibus_placa<?= $row['onibus_id'] ?>" name="onibus_placa" value="<?= $row['onibus_id'] ?>">
                                        <label></label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="id_botao_selecionar_onibus">Selecionar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
    $("#form_onibus_select").submit(function(event) {
        var placa_onibus = $('input[name=onibus_placa]:checked', '#form_onibus_select').attr("data-name")
        var id_onibus = $('input[name=onibus_placa]:checked', '#form_onibus_select').attr("value")
        console.log("ID DO ONIBUS: " + id_onibus);
        $("#onibus_selecionado").val(placa_onibus)
        addInputInvisivelOnibus(id_onibus);
        $("#id_modal_com_listas_onibus").modal('hide');
        console.log("aqui");
        event.preventDefault();
        return false;
    })

    function addInputInvisivelOnibus(id_desse_onibus) {
        $("#id_onibus_selecionado").append(
            '<input type="hidden" id="onibus_selecionado" value="' + id_desse_onibus + '" name="onibus_id" class="form-control" placeholder="Nenhum ônibus selecionado" aria-describedby="basic-addon1" required>'
        );
    }

    function addInputInvisivelOnibusEdit(id_desse_onibus) {
        $("#id_contrato_onibus").append(
            '<input type="hidden" id="onibus_selecionado" value="' + id_desse_onibus + '" name="onibus_id" class="form-control" placeholder="Nenhum ônibus selecionado" aria-describedby="basic-addon1" required>'
        );
    }
</script>

<script>
    function enviando() {
        var item = '<span class="sr-only">Loading...</span>';
        $("#id_form_adicionar_documento").attr("disabled", true);
        $("#id_button_salvar").html(item);
        $("#id_button_salvar").addClass("text-primary");
        $("#id_button_salvar").addClass("spinner-grow");
        $("#id_button_salvar").removeClass("btn-success");
        $("#id_form_adicionar_documento").submit();
        $(selector).submit();
    }

    function salvarEdicao() {
        var item = '<span class="sr-only">Loading...</span>';
        $("#id_edit_form_adicionar_documento").attr("disabled", true);
        $("#id_button_salvar").html(item);
        $("#id_button_salvar").addClass("text-primary");
        $("#id_button_salvar").addClass("spinner-grow");
        $("#id_button_salvar").removeClass("btn-success");
        $("#id_edit_form_adicionar_documento").submit();
        $(selector).submit();
    }

    function editar(idOnibus) {
        addInputInvisivelOnibusEdit(idOnibus);
    }
</script>