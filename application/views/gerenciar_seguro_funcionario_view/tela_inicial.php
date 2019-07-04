<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Contratos de Seguros de Funcionários</h2>
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
                <th scope="col">Funcionário</th>
                <th scope="col">Nº Contrato</th>
                <th scope="col">Documento</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_onibus">

            <tr>
                <th scope="row">1</th>
                <td>Motorista</td>
                <td>25</td>
                <td>...</td>
                <td>20/04/2018</td>


                <td>
                    <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal" data-placement="top" title="Editar Seguro" data-target="#id_modal_edit_seguro">
                        <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" title="Mais informações sobre o contrato." data-toggle="modal" id="id_opcao_visualizar" data-placement="top" data-target="#id_modal_info">
                        <span class="hvr-icon fa fa-info mr-1"></span>Info
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>
<!-- Modal create alocação -->
<div class="modal fade" id="id_modal_cadastro_seguro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Contrato</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="id_form_adicionar_documento" enctype="multipart/form-data">
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Selecione o Funcionário:</label>
                            <div class="input-group mb-3" id="id_funcionario_selecionado">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#id_modal_com_listas_funcionario">Funcionários</button>
                                </div>
                                <input id="funcionario_selecionado" type="text" class="form-control" placeholder="Nenhum funcionário selecionado" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Contrato</label>
                            <input type="file" name="onibus_contrato_seguro" class="form-control-file" id="exampleFormControlFile1" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>



<!-- Modal Editar -->
<div class="modal fade" id="id_modal_edit_seguro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <label for="modal_create_onibus">Selecione o Funcionário:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#id_modal_com_listas_funcionario">Funcionários</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum funcionário selecionado" aria-label="" aria-describedby="basic-addon1" disabled>
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
                                    <input type="number" maxlenght="6" min="0" max="9999" class="form-control" id="exampleFormControlInput1" placeholder="25">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Data:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="20/04/2018">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="exampleFormControlInput1">Termino:</label>
                                    <input type="Date" class="form-control" id="exampleFormControlInput1" placeholder="06/05/2021">
                                </div>

                            </div>

                        </div>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal lista de Onibus-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_funcionario">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Funcionários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_funcionario_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($funcionario_sem_contrato) : ?>
                            <?php foreach ($funcionario_sem_contrato as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="id_lista_funcionario_nome">
                                    <label for="id_funcionario_nome<?= $row['funcionario_id'] ?>" class="float-left m-0 r-0 mr-auto">
                                        <?= $row['funcionario_nome'] ?>
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input float-right" type="radio" data-name="<?= $row['funcionario_nome'] ?>" id="id_funcionario_nome<?= $row['funcionario_id'] ?>" name="funcionario_nome" value="<?= $row['funcionario_id'] ?>">
                                        <label></label>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="id_botao_selecionar_funcionario">Selecionar</button>
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
                            <input type="Date" class="form-control" id="validationCustom01" placeholder="First name" disabled>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Término:</label>
                            <input type="Date" class="form-control" id="validationCustom02" placeholder="Last name" disabled>
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
    $("#form_funcionario_select").submit(function(event) {
        var nome_funcionario = $('input[name=funcionario_nome]:checked', '#form_funcionario_select').attr("data-name")
        var id_funcionario = $('input[name=onibus_placa]:checked', '#form_funcionario_select').attr("value")
        $("#funcionario_selecionado").val(nome_funcionario)
        addInputInvisivelFuncionario(id_funcionario);
        $("#id_modal_com_listas_funcionario").modal('hide')
        console.log("aqui");
        event.preventDefault();
        return false;
    })

    function addInputInvisivelFuncionario(id_desse_funcionario) {
        $("#id_funcionario_selecionado").append(
            '<input type="hidden" id="funcionario_selecionado" value="' + id_desse_funcionario + '" name="funcionario_id" class="form-control" placeholder="Nenhum funcionário selecionado" aria-describedby="basic-addon1" required>'
        );
    }
</script>
<script>
    $("#id_form_adicionar_documento").submit(function() {
        var form = $('#id_form_adicionar_documento')[0];
        var data = new FormData(form);

        console.log(data);
        $.ajax({
            data: data,
            type: "POST",
            enctype: 'multipart/form-data',
            processData: false, // Important!
            contentType: false,
            cache: false,
            url: "<?= base_url('ajax/onibus/updateContratoSeguro') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal('Enviando Dados')
            },
            success: function(result) {
                console.log(result['error_fields'])
                console.log("result:success:", result);
                if (result['success']) {
                    $("#page_message").html(result['message']);
                    $("#id_modal_cadastro_seguro").modal('hide');
                    $("#id_form_adicionar_documento").trigger("reset");
                    window.location.reload();
                } else {
                    $('#modal_create_warning').html(result['message']);

                    $("#id_form_adicionar_documento").find("input").removeClass("is-valid");

                    $("#id_form_adicionar_documento").find("input").removeClass("is-invalid");

                    $("#id_form_adicionar_documento").find("input").addClass("is-valid");

                    $("#id_form_adicionar_documento").find("input").addClass("is-invalid");
                    $.each(result['error_fields'], function(key, value) {
                        $("#id_form_adicionar_documento [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
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