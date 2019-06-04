<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Alocações</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row pb-1">
    <div class="col-md-9 row">
        <div class="col-md-3">
            <label for=""> </label>
            <select id="" class="form-control custom-select ">
            </select>
        </div>
        <div class="col-md-3 mt-auto">
            <button disabled id="filter_filter" type="button" class=" btn btn-secondary">Filtrar</button>
        </div>

    </div>
    <div class="col-md-3 mt-auto">
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#id_modal_create_alocacao" title="Adicionar Alocação.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom" id="id_button_add"> </i>
            Adicionar Alocação
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
                <th scope="col">Trajeto</th>
                <th scope="col">Tempo Trajeto</th>
                <th scope="col">Cidade</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_alocacao">
            <tr>
                <?php if ($alocacaomunicipal) : ?>
                    <?php foreach ($alocacaomunicipal as $row) : ?>
                        <th scope="row">1</th>
                        <td><?= $row['onibus_placa'] ?></td>
                        <td><?= $row['trajetourbano_nome'] ?></td>
                        <td><?= $row['trajetourbano_tempomedio'] ?></td>
                        <td><?= $row['cidade_nome'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal" data-placement="top" title="Editar Alocação" data-target="#id_modal_edit_alocacao">
                                <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                            </button>
                            <button onclick="info(<?= $row['alocacaomunicipal_id'] ?>)" type="button" class="btn btn-primary btn-sm" title="Mais informações sobre a alocação." data-toggle="modal" id="id_opcao_visualizar" data-placement="top" data-target="#id_modal_info">
                                <span class="hvr-icon fa fa-info mr-1"></span>Info
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan=100 class="text-bold text-center"> Nenhuma Manutenção Encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

<!-- Modal create alocação -->
<div class="modal fade" id="id_modal_create_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Nova Alocação Municipal</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_create_alocacao_form" class="needs-validation container" novalidate>
                <div class="modal-body">
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Selecione o ônibus:</label>
                            <div class="input-group mb-3" id="id_onibus_selecionado">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input id="onibus_selecionado" type="text" name="onibus_id" class="form-control" placeholder="Nenhum ônibus selecionado" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_create_trajeto fa ">Selecione o trajeto:</label>
                            <div class="input-group mb-3" id="id_trajeto_selecionado">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_trajeto" data-toggle="modal">Trajetos</button>
                                </div>
                                <input id="trajeto_selecionado" type="text" name="trajetourbano_id" class="form-control" placeholder="Nenhum trajeto selecionado" aria-describedby="basic-addon1" required>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                O trajeto tem duração maior que 8 horas. Por favor, selecione mais de
                                um motorista e cobrador.
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="modal_create_motorista">Seleciona o Motorista:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_motoristas" data-toggle="modal">Motoristas</button>
                                        </div>
                                        <input id="motoristas_selecionados" type="text" value="" class="form-control" placeholder="Nenhum motorista selecionado" aria-label="" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_create_cobrador fa ">Cobrador:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_cobrador" data-toggle="modal">Cobrador</button>
                                        </div>
                                        <input id="cobradores_selecionados" type="text" class="form-control" placeholder="Nenhum cobrador selecionado" aria-label="" aria-describedby="basic-addon1" required>
                                    </div>
                                </div>
                            </div>
                            <div id="id_dados_alocacao">
                                <div class="col-auto">
                                    <div class="my-2 justify-content-between d-flex">
                                        <label for="exampleFormControlInput1"><b>Motorista Alocado:</b></label>
                                    </div>
                                    <div class="form-group" id="id_mais_motorista">

                                    </div>

                                </div>
                                <div class="col-auto">
                                    <div class="my-2 justify-content-between d-flex">
                                        <label for="exampleFormControlInput1"><b>Cobrador Alocado:</b></label>

                                    </div>
                                    <div class="form-group" id="id_mais_cobrador">

                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
</div>
</div>
</div>



<!-- Modal Editar -->
<div class="modal fade" id="id_modal_edit_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabe2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabe2"><b>Editar Alocação</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Selecione o ônibus:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum ônibus selecionado" aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_create_trajeto fa ">Selecione o trajeto:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_trajeto" data-toggle="modal">Trajetos</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum trajeto selecionado" aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert">
                                O trajeto tem duração maior que 8 horas. Por favor, selecione mais de
                                um motorista e cobrador.
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="modal_create_motorista">Seleciona o Motorista:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_motoristas" data-toggle="modal">Motoristas</button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nenhum motorista selecionado" aria-label="" aria-describedby="basic-addon1" disabled>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="modal_create_cobrador fa ">Cobrador:</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="button" data-target="#id_modal_com_listas_cobrador" data-toggle="modal">Cobrador</button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Nenhum cobrador selecionado" aria-label="" aria-describedby="basic-addon1" disabled>
                                    </div>
                                </div>
                            </div>
                            <div id="id_dados_alocacao">
                                <div class="col-auto">
                                    <div class="form-group" id="id_mais_motorista">
                                        <div class="my-2 justify-content-between d-flex">
                                            <label for="exampleFormControlInput1"><b>Motorista Alocado:</b></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="form-group" id="id_mais_cobrador">
                                        <div class="my-2 justify-content-between d-flex">
                                            <label for="exampleFormControlInput1"><b>Cobrador Alocado:</b></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
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
                        <?php if ($onibus) : ?>
                            <?php foreach ($onibus as $row) : ?>
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
                        <?php else : ?>
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

<!-- Modal lista de Trajetos-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_trajeto">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Trajetos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_trajeto_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($trajetourbano) : ?>
                            <?php foreach ($trajetourbano as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="id_lista_nome_trajeto">
                                    <label for="id_trajetourbano_nome<?= $row['trajetourbano_id'] ?>" class="float-left m-0 r-0 mr-auto">
                                        <?= $row['trajetourbano_nome'] ?>
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input float-right" type="radio" data-name="<?= $row['trajetourbano_nome'] ?>" onclick="validarQuantidadeMotorista('<?= $row['trajetourbano_tempomedio'] ?>')" id="id_trajetourbano_nome<?= $row['trajetourbano_id'] ?>" name="trajetourbano_nome" value="<?= $row['trajetourbano_id'] ?>">
                                        <label></label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else : ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="id_botao_selecionar_trajeto">Selecionar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal lista de motorista-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_motoristas">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Motoristas Disponíveis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_motorista_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($motoristas) : ?>
                            <?php foreach ($motoristas as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $row['funcionarios_nome'] ?>
                                    <div class="form-check">
                                        <input data-name="<?= $row['funcionarios_nome'] ?>" class="form-check-input" type="checkbox" id="id_motorista_nome" name="motorista_nome" value="<?= $row['funcionarios_id'] ?>">
                                        <label class="form-check-label" for="defaultCheck1">
                                        </label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="id_botao_selecionar_funcionario" disabled>Selecionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal lista de Cobradores-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_cobrador">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Cobradores Disponíveis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_cobrador_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($cobradores) : ?>
                            <?php foreach ($cobradores as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= $row['funcionarios_nome'] ?>
                                    <div class="form-check">
                                        <input data-name="<?= $row['funcionarios_nome'] ?>" class="form-check-input" type="checkbox" id="id_cobrador_nome" name="cobrador_nome" value="<?= $row['funcionarios_id'] ?>">
                                        <label class="form-check-label" for="defaultCheck1">
                                        </label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="id_botao_selecionar_cobrador">Selecionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Info -->
<div class="modal fade" id="id_modal_info" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado">Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Motorista:</label>
                            <input type="text" name="funcionarios_nome" class="form-control" id="modal_info_nome_motorista" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02">Hora Inicio:</label>
                            <input type="text" class="form-control" name="alocacaomunicipal_horaInicio_motorista" id="modal_info_horaInicio_motorista" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom02">Hora Fim:</label>
                            <input type="text" class="form-control" id="modal_info_horaFinal_motorista" placeholder="Last name" value="16:00 PM" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom03">Cobrador:</label>
                            <input type="text" class="form-control" id="modal_info_nome_cobrador" disabled>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom04">Hora Inicio:</label>
                            <input type="text" class="form-control" id="modal_info_horaInicio_cobrador" disabled>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationCustom05">Hora Fim:</label>
                            <input type="text" class="form-control" id="modal_info_horaFinal_cobrador" disabled>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom05">Data Alocação:</label>
                            <input type="text" class="form-control" id="modal_info_data_alocacao" disabled>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
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
$this->load->view("footer2.php")
?>
<script>
    $("#form_motorista_select").submit(function(event) {
        $('#id_mais_motorista').html("");
        var lastInsert = 0;
        var quantidadeSelecionados = $("input[name=motorista_nome]:checked").length;
        $('#motoristas_selecionados').val(quantidadeSelecionados + " selecionados");
        $("input[name=motorista_nome]:checked").each(function() {
            var id = $(this).val();
            ++lastInsert
            addCampoMotorista($(this).attr("data-name"), id, lastInsert)
            $("#id_modal_com_listas_motoristas").modal('hide')
        });
        event.preventDefault();
        return false;
    });
</script>
<script>
    $("#form_cobrador_select").submit(function(event) {
        $('#id_mais_cobrador').html("");
        var ultimoCobrador = 0;
        var quantidadeSelecionados = $("input[name=cobrador_nome]:checked").length;
        $('#cobradores_selecionados').val(quantidadeSelecionados + " selecionados");
        $("input[name=cobrador_nome]:checked").each(function() {
            var id = $(this).val();
            ++ultimoCobrador
            addCampoCobrador($(this).attr("data-name"), id, ultimoCobrador)
            $("#id_modal_com_listas_cobrador").modal('hide')
        });
        event.preventDefault();
        return false;
    });
</script>,

<script>
    function addCampoMotorista(nomeFuncionario, id, lastInsert) {
        $('#id_mais_motorista').append(
            '<div id="mot' + lastInsert +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" class="form-control">' +
            '<input type="hidden" disabled required maxlength="255" value="' + id + '" name="motorista_id[]" class="form-control">' +
            '<button onclick="deletarCampoMotorista(\'mot' + lastInsert + '\')"type="button" name="motorista_appt[]" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<div class="form-row" id="mot' + lastInsert + '">' +
            '<div class="form-group col-md-4">' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Inicio:</label>' +
            '<input type="hidden" id="mot' + lastInsert + '" name="motorista_id[]" value="' + id + '" class="form-control" required>' +
            '<input type="time" id="mot' + lastInsert + '" name="motorista_appt[]" min="00:00" max="23:59" class="form-control" required>' +
            '<span class="note"></span>' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Final:</label>' +
            '<input type="hidden" id="mot' + lastInsert + '" value="' + id + '" class="form-control" required>' +
            '<input type="time" id="mot' + lastInsert + '" name="motorista_appt[]" min="00:00" max="23:59" class="form-control" required>' +
            '<span class="note"></span>' +
            '</div>' +
            '</div>'
        );
    }

    function deletarCampoMotorista(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        limparChecks("motorista_nome");
        $('#motoristas_selecionados').val("");
    }

    function limparChecks(nomeListaChecked) {
        $("input[name=" + nomeListaChecked + "]:checked").each(function() {
            if ($(this).prop("checked")) {
                $(this).prop("checked", false);
            } else {
                $(this).prop("checked", true);
            }
        });
    }

    function addCampoCobrador(nomeFuncionario, id, ultimoCobrador) {
        $('#id_mais_cobrador').append(
            '<div id="cob' + ultimoCobrador +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" class="form-control" id="exampleFormControlInput1">' +
            '<input type="hidden" disabled required maxlength="255" value="' + id + '" name="cobrador_id[]" class="form-control">' +
            '<button onclick="deletarCampoCobrador(\'cob' + ultimoCobrador + '\')"type="button" name="cobrador_appt[]" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<div class="form-row" id="cob' + ultimoCobrador + '">' +
            '<div class="form-group col-md-4">' +
            '<label for="appt" id="cob' + ultimoCobrador + '">Horário Inicio:</label>' +
            '<input type="hidden" id="cob' + ultimoCobrador + '" name="cobrador_id[]" value="' + id + '" class="form-control" required>' +
            '<input type="time" id="cob' + ultimoCobrador + '" name="cobrador_appt[]" min="00:00" max="23:59" class="form-control" required>' +
            '<span class="note"></span>' +
            '</div>' +
            '<div class="form-group col-md-4">' +
            '<label for="appt" id="cob' + ultimoCobrador + '">Horário Inicio:</label>' +
            '<input type="hidden" id="cob' + ultimoCobrador + '" value="' + id + '" class="form-control" required>' +
            '<input type="time" id="cob' + ultimoCobrador + '" name="cobrador_appt[]" min="00:00" max="23:59" class="form-control" required>' +
            '<span class="note"></span>' +
            '</div>'
        );
    }

    function deletarCampoCobrador(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        limparChecks("cobrador_nome");
        $('#cobradores_selecionados').val("");
    }

    function validarQuantidadeMotorista(trajetourbano_tempo) {
        this.tempotrajeto = trajetourbano_tempo;
        $("input[type=checkbox]").change(function() {
            var checados = $('#id_motorista_nome:checked').length;
            var cobradorChegado = $('#id_cobrador_nome:checked').length;
            if (checados > 0) {
                var valorHoraAtingida = checados * 6;
                if (valorHoraAtingida >= tempotrajeto) {
                    $("#id_botao_selecionar_funcionario").prop("disabled", false);
                } else {
                    $("#id_botao_selecionar_funcionario").prop("disabled", true);
                }
                if (tempotrajeto > 6) {
                    $(".alert").alert('show');
                } else {
                    $(".alert").alert('close');
                }
            } else if (cobradorChegado > 0) {
                var valorHoraAtingida = cobradorChegado * 6;
                if (valorHoraAtingida >= tempotrajeto) {
                    $("#id_botao_selecionar_cobrador").prop("disabled", false);
                } else {
                    $("#id_botao_selecionar_cobrador").prop("disabled", true);
                }
            }
        });
    }
</script>

<script>
    function validarQuantidadeCobrador(trajetourbano_tempo) {
        this.tempotrajeto = trajetourbano_tempo;
        console.log("TEMPO TRAJETO: " + tempotrajeto);
        $("input[type=checkbox]").change(function() {
            var checados = $('#id_cobrador_nome:checked').length;
            var valorHoraAtingida = checados * 6;
            console.log(checados);
            console.log("VALOR HORA ATINGIDA: " + valorHoraAtingida);
            if (valorHoraAtingida >= tempotrajeto) {
                $("#id_botao_selecionar_cobrador").prop("disabled", false);
            } else {
                $("#id_botao_selecionar_cobrador").prop("disabled", true);
            }
        });
    }
</script>

<script>
    $("#form_trajeto_select").submit(function(event) {
        var nomeTrajeto = $('input[name=trajetourbano_nome]:checked', '#form_trajeto_select').attr("data-name")
        var id = $('input[name=trajetourbano_nome]:checked', '#form_trajeto_select').attr("value")
        $("#trajeto_selecionado").val(nomeTrajeto)
        addInputInvisivelTrajeto(id);
        $("#id_modal_com_listas_trajeto").modal('hide')
        event.preventDefault();
        return false;
    })

    function addInputInvisivelTrajeto(id) {
        $("#id_trajeto_selecionado").append(
            '<input type="hidden" id="trajeto_selecionado" value="' + id + '" name="trajetourbano_id" class="form-control" placeholder="Nenhum trajeto selecionado" aria-describedby="basic-addon1" required>'
        );
    }
</script>
<script>
    $("#form_onibus_select").submit(function(event) {
        var placa_onibus = $('input[name=onibus_placa]:checked', '#form_onibus_select').attr("data-name")
        var id_onibus = $('input[name=onibus_placa]:checked', '#form_onibus_select').attr("value")
        $("#onibus_selecionado").val(placa_onibus)
        addInputInvisivelOnibus(id_onibus);
        $("#id_modal_com_listas_onibus").modal('hide')
        event.preventDefault();
        return false;
    })

    function addInputInvisivelOnibus(id_desse_onibus) {
        $("#id_onibus_selecionado").append(
            '<input type="hidden" id="onibus_selecionado" value="' + id_desse_onibus + '" name="onibus_id" class="form-control" placeholder="Nenhum ônibus selecionado" aria-describedby="basic-addon1" required>'
        );
    }
</script>

<script>
    //cadastra alocação no banco
    $("#modal_create_alocacao_form").submit(function() {
        console.log($(this).serialize())
        $.ajax({
            data: $(this).serialize(),
            type: "POST",
            url: "<?= base_url('ajax/alocacoesmunicipais/create') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal('Enviando Dados')
            },
            success: function(result) {
                console.log(result['error_fields'])
                console.log("result:success:", result);
                if (result['success']) {
                    $("#page_message").html(result['message']);
                    $("#id_modal_create_alocacao").modal('hide');
                    $("#modal_create_alocacao_form").trigger("reset");
                    atualizarTabela()
                } else {
                    $('#modal_create_warning').html(result['message']);

                    $("#modal_create_alocacao_form").find("input").removeClass("is-valid");
                    $("#modal_create_alocacao_form").find("select").removeClass("is-valid");

                    $("#modal_create_alocacao_form").find("input").removeClass("is-invalid");
                    $("#modal_create_alocacao_form").find("select").removeClass("is-invalid");

                    $("#modal_create_alocacao_form").find("input").addClass("is-valid");
                    $("#modal_create_alocacao_form").find("select").addClass("is-valid");

                    $("#modal_create_alocacao_form").find("input").addClass("is-invalid");
                    $("#modal_create_alocacao_form").find("select").addClass("is-invalid");
                    $.each(result['error_fields'], function(key, value) {
                        $("#modal_create_alocacao_form [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
                    })
                }
            },
            error: function(error) {
                // showWarningModal(JSON.stringify(error));
                console.log("ressult:error:", error)
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
        return false;
    });
</script>

<script>
    function info(id) {
        console.log("ID DA ALOCAÇÃO:" + id);
        $.ajax({
            data: "alocacaomunicipal_id=" + id,
            method: "post",
            dataType: "json",
            url: "<?= base_url('ajax/alocacoesmunicipais/getSingle') ?>",
            beforeSend: function() {
                showLoadingModal('Buscando Dados Completos da Alocação');
            },
            success: function(result) {
                if (result['success']) {
                    console.log('success', result);
                    console.log(result['data'].length);
                    for (var i = 0; i < result['data'].length; ++i) {
                        $("#modal_info_nome_motorista").val(result['data'][i]['funcionarios_nome'])
                        $("#modal_info_horaInicio_motorista").val(result['data'][i]['alocacaomunicipal_motorista_expediente_hora_inicio'])
                        $("#modal_info_horaFinal_motorista").val(result['data'][i]['alocacaomunicipal_motorista_expediente_hora_final'])
                            ++i
                        $("#modal_info_nome_cobrador").val(result['data'][i]['funcionarios_nome'])
                        $("#modal_info_horaInicio_cobrador").val(result['data'][i]['alocacaomunicipal_cobrador_expediente_hora_inicio'])
                        $("#modal_info_horaFinal_cobrador").val(result['data'][i]['alocacaomunicipal_cobrador_expediente_hora_final'])
                    }
                    $("#modal_info_data_alocacao").val(result['data'][0]['alocacaomunicipal_data_inicio'])

                    $("#id_modal_info").modal('show');
                } else {
                    alert('Alocação não encontrada');
                    console.log('false success', result);
                }
            },
            error: function(error) {
                // showWarningModal(JSON.stringify(error))
                console.log(error);
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
    }
</script>

<script>
    // <!-- Metodo em ajax para fazer o submit do modal edit (id="id_modal_edit_alocacao") -->
    $("#id_modal_edit_alocacao").submit(function() {
        console.log($(this).serialize())
        $.ajax({
            data: $(this).serialize(),
            type: "POST",
            url: "<?= base_url('ajax/alocacoesmunicipais/update') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal('Enviando Dados')
            },
            success: function(result) {
                console.log(result['message']);
                if (result['success']) {
                    $("#page_message").html(result['message']);
                    $("#id_modal_edit_alocacao").modal('hide');
                    $(".modal-backdrop").removeClass('show');
                    atualizarTabela()
                    //closemodal
                } else {
                    $('#modal_edit_warning').html(result['message']);
                }
            },
            error: function(error) {
                alert("Ocorreu algum erro, veja o console")
                // showWarningModal(JSON.stringify(error))
                console.log(error)
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
                setTimeout(function() {
                    $(".modal-backdrop").removeClass('show');
                }, 1200)
            }
        });
        return false;
    });
</script>

<script>
    function editar(id) {
        $.ajax({
            data: "alocacaomunicipal_id=" + id,
            method: "post",
            dataType: "json",
            url: "<?= base_url('ajax/alocacoesmunicipais/getSingle') ?>",
            beforeSend: function() {
                showLoadingModal('Buscando Dados Completos da Alocação');
            },
            success: function(result) {
                if (result['success']) {
                    console.log('success', result)
                    $("#form_edit_manutencao_id").val(result['data']['manutencao_id'])
                    $("#modal_edit_placa").val(result['data']['onibus_id'])
                    $("#modal_edit_valor").val(result['data']['manutencao_valor'])
                    $("#modal_edit_dataInicio").val(result['data']['manutencao_dataInicio'])
                    $("#modal_edit_dataFim").val(result['data']['manutencao_dataFim'])
                    $("#modal_edit_descricao").val(result['data']['manutencao_descricao'])
                    $("#modal_edit_estado").trigger('change');
                    $("#modal_edit_manutencao").modal('show');
                } else {
                    alert('Manutenção não encontrada');
                    console.log('false success', result);
                }
            },
            error: function(error) {
                // showWarningModal(JSON.stringify(error))
                console.log(error);
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
    }
</script>
<script>
    $(".alert").alert('close');
</script>