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
            <?php if ($alocacaomunicipal) : ?>
                <?php foreach ($alocacaomunicipal as $row) : ?>
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
        </form>
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
            <div class="modal-body">
                <ul class="list-group">
                    <?php if ($motoristas) : ?>
                        <?php foreach ($motoristas as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['funcionarios_nome'] ?>
                                <div class="form-check">
                                    <input onclick="addCampoMotorista('<?= $row['funcionarios_nome'] ?>')" class="form-check-input" type="checkbox" id="id_motorista_nome" name="motorista_nome">
                                    <label class="form-check-label" for="defaultCheck1">
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_funcionario" disabled>Selecionar</button>
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
            <div class="modal-body">
                <ul class="list-group">
                    <?php if ($onibus) : ?>
                        <?php foreach ($onibus as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['onibus_placa'] ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="id_onibus_selecionado" name="onibus_placa">
                                    <label class="form-check-label" for="defaultCheck1">
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </li>
                    <?php else : ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_onibus" disabled>Selecionar</button>
            </div>
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
            <div class="modal-body">
                <ul class="list-group">
                    <?php if ($trajetourbano) : ?>
                        <?php foreach ($trajetourbano as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['trajetourbano_nome'] ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" onclick="validarQuantidadeMotorista('<?= $row['trajetourbano_tempomedio'] ?>')" id="id_trajetourbano_nome" name="trajetourbano_nome">
                                    <label class="form-check-label" for="defaultCheck1">
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </li>
                    <?php else : ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_trajeto">Selecionar</button>
            </div>
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
            <div class="modal-body">
                <ul class="list-group">
                    <?php if ($cobradores) : ?>
                        <?php foreach ($cobradores as $row) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $row['funcionarios_nome'] ?>
                                <div class="form-check">
                                    <input onclick="addCampoCobrador('<?= $row['funcionarios_nome'] ?>')" class="form-check-input" type="checkbox" value="" id="id_cobrador_nome" name="funcionarios_nome">
                                    <label class="form-check-label" for="defaultCheck1">
                                    </label>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_cobrador" disabled>Selecionar</button>
            </div>
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
                            <input type="text" class="form-control" id="modal_info_data_alocacao" placeholder="23/05/2019" disabled>
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
    function addCampoMotorista(nomeFuncionario) {
        var lastInsert = 0;
        ++lastInsert
        $('#id_mais_motorista').append(
            '<div id="mot' + lastInsert +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" name="nome_funcionario" class="form-control" id="exampleFormControlInput1">' +
            '<button onclick="deletarCampo(\'mot' + lastInsert + '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Inicio:</label>' +
            '<input type="time" id="mot' + lastInsert + '" name="appt" min="9:00" max="18:00" required>' +
            '<span class="note"></span>'
        );
    }

    function deletarCampo(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
    }

    function addCampoMotorista(nomeFuncionario) {
        var lastInsert = 0;
        ++lastInsert
        $('#id_mais_motorista').append(
            '<div id="mot' + lastInsert +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" name="nome_funcionario" class="form-control" id="exampleFormControlInput1">' +
            '<button onclick="deletarCampo(\'mot' + lastInsert + '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Inicio:</label>' +
            '<input type="time" id="mot' + lastInsert + '" name="appt" min="9:00" max="18:00" required>' +
            '<span class="note"></span>'
        );
    }

    function deletarCampo(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
    }

    function validarQuantidadeMotorista(trajetourbano_tempo) {
        this.tempotrajeto = trajetourbano_tempo;
        console.log("TEMPO TRAJETO: " + tempotrajeto);
        $("input[type=checkbox]").change(function() {
            var checados = $('#id_motorista_nome:checked').length;
            var valorHoraAtingida = checados * 6;
            console.log(checados);
            console.log("VALOR HORA ATINGIDA: " + valorHoraAtingida);
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
        });
    }
</script>



<script>
    var onibus_placa = "";

    function addCampoCobrador(nomeFuncionario) {
        var lastInsert = 0;
        ++lastInsert
        $('#id_mais_cobrador').append(
            '<div id="mot' + lastInsert +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" name="nome_funcionario" class="form-control" id="exampleFormControlInput1">' +
            '<button onclick="deletarCampo(\'mot' + lastInsert + '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Inicio:</label>' +
            '<input type="time" id="mot' + lastInsert + '" name="appt" min="9:00" max="18:00" required>' +
            '<span class="note"></span>'
        );
    }

    function deletarCampo(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
    }

    function addCampoCobrador(nomeFuncionario) {
        var lastInsert = 0;
        ++lastInsert
        $('#id_mais_cobrador').append(
            '<div id="mot' + lastInsert +
            '"class="d-flex flex-row align-center my-1 justify-content-center">' +
            '<input required maxlength="255" value="' + nomeFuncionario + '" type="text" name="nome_funcionario" class="form-control" id="exampleFormControlInput1">' +
            '<button onclick="deletarCampo(\'mot' + lastInsert + '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
            '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
            '</button>' +
            '</div>' +
            '<label for="appt" id="mot' + lastInsert + '">Horário Inicio:</label>' +
            '<input type="time" id="mot' + lastInsert + '" name="appt" min="9:00" max="18:00" required>' +
            '<span class="note"></span>'
        );
    }

    function deletarCampo(campo) {
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
        $('#' + campo + '').remove();
    }

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
                console.log(result);
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
                showWarningModal(JSON.stringify(error));
                console.log(error)
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
                    console.log(result['data'][0]['funcionarios_nome'])
                    console.log(result['data'].length);
                    $("#modal_info_nome_motorista").val(result['data'][0]['funcionarios_nome'])
                    $("#modal_info_nome_cobrador").val(result['data'][1]['funcionarios_nome'])
                    $("#modal_info_horaInicio_motorista").val(result['data'][0]['alocacaomunicipal_horaInicio_motorista'])
                    $("#modal_info_horaFinal_motorista").val(result['data'][0]['alocacaomunicipal_horaFim_motorista'])
                    $("#modal_info_horaInicio_cobrador").val(result['data'][1]['alocacaomunicipal_horaInicio_cobrador'])
                    $("#modal_info_horaFinal_cobrador").val(result['data'][1]['alocacaomunicipal_horaFim_cobrador'])
                    $("#modal_info_data_alocacao").val(result['data'][0]['alocacaomunicipal_hora_inicio'])
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