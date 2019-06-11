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
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal"
            data-target="#id_modal_create_alocacao" title="Adicionar Alocação.">
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
                <th scope="col">Nº Contrato</th>
                <th scope="col">Documento</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_alocacao">
            <tr>
                <th scope="row">1</th>
                <td>IQU1240</td>
                <td>25</td>
                <td>...</td>
                <td>20/04/2018</td>


                <td>
                    <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal"
                        data-placement="top" title="Editar Alocação" data-target="#id_modal_edit_alocacao">
                        <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" title="Mais informações sobre a alocação."
                        data-toggle="modal" id="id_opcao_visualizar" data-placement="top" data-target="#id_modal_info">
                        <span class="hvr-icon fa fa-info mr-1"></span>Info
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<!-- Modal create alocação -->
<div class="modal fade" id="id_modal_create_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Passagens Geradas</b></h5>
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
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                        data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum ônibus selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Contrato</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Número Contrato:</label>
                                    <input type="number" maxlenght="6" min="0" max="9999" class="form-control"
                                        id="exampleFormControlInput1">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Data:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Termino:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1">
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
</div>



<!-- Modal Editar -->
<div class="modal fade" id="id_modal_edit_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Editar</b></h5>
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
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                        data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum ônibus selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Contrato</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Número Contrato:</label>
                                    <input type="number" maxlenght="6" min="0" max="9999" class="form-control"
                                        id="exampleFormControlInput1" placeholder="25">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Data:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1"
                                        placeholder="20/04/2018">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Termino:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1"
                                        placeholder="06/05/2021">
                                </div>

                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
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
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        OQD6328
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="id_onibus_placa"
                                name="onibus_placa">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center" name="onibus_placa">
                        ICU7845
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_onibus"
                    disabled>Selecionar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Info -->
<div class="modal fade" id="id_modal_info" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TituloModalCentralizado"><b>Informações</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Data:</label>
                            <input type="Date" class="form-control" id="validationCustom01" placeholder="First name"
                                value="20/04/2019" required disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Término:</label>
                            <input type="Date" class="form-control" id="validationCustom02" placeholder="Last name"
                                value="06/05/2021" required disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                    </div>
                    <div class="form-row">




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
var lastInsert = 0;
$("input[type='checkbox']").change(function() {
    ++lastInsert
    $('#id_mais_motorista').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="teste_merda" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');

    var quantidadeDeCampos = $('input[name=teste_merda]').length;
    var funcionariosSelecionados = $('input[type=checkbox]:checked').length;
    console.log("Funcionarios Selecionados: " + funcionariosSelecionados);
    console.log("Quantidade de Campos: " + quantidadeDeCampos);
    console.log("Last Insert: " + lastInsert);
    if (lastInsert > funcionariosSelecionados) {
        deletarCampo('mot' + lastInsert);
    }

});

$('#id_add_cobrador').click(function() {
    ++lastInsert
    $('#id_mais_cobrador').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');
});

function deletarCampo(campo) {
    $('#' + campo + '').remove();
}
</script>
<script>
var quantidadeHorasTrajeto = 2;
$("input[type='checkbox']").change(function() {
    var checados = $('input[type=checkbox]:checked').length;
    console.log(checados);
    if (checados == quantidadeHorasTrajeto) {
        $("#id_botao_selecionar_funcionario").prop("disabled", false);
    } else {
        $("#id_botao_selecionar_funcionario").prop("disabled", true);
    }
});
</script>