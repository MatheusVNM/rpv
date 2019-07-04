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
                <th scope="col">CPF</th>
                <th scope="col">Data de Admissão</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_onibus">
            <?php if ($funcionario_com_contrato) : ?>
                <?php foreach ($funcionario_com_contrato as $funcionarios) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td><?= $funcionarios['funcionarios_nome'] ?></td>
                        <td><?= $funcionarios['funcionarios_cpf'] ?></td>
                        <td><?= $funcionarios['funcionarios_dataDeAdmissao'] ?></td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" onclick="editar(<?= $funcionarios['funcionarios_id'] ?>)" data-toggle="modal" data-placement="top" title="Editar Seguro" data-target="#id_modal_edit_seguro">
                                <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                            </button>
                            <a type="button" class="btn btn-primary btn-sm" href="<?= $funcionarios['funcionarios_contrato_seguro'] ?>" target="_blank" title="Mais informações sobre o contrato." id="id_opcao_visualizar" data-placement="top">
                                <span class="hvr-icon fa fa-file-pdf-o mr-1"></span>Visualizar
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
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
                <?= form_open_multipart('Gerenciar_funcionarios_controller/ajax_db_updateContratoSeguroFuncionario', array('id' => 'seguro_form')) ?>
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
                            <input type="file" name="funcionario_contrato_seguro" class="form-control-file" id="exampleFormControlFile1" required>
                        </div>
                    </div>
                    <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="id_salvar_seguro" onclick="enviando()" class="btn btn-primary">Salvar</button>
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
                <?= form_open_multipart('Gerenciar_funcionarios_controller/ajax_db_updateContratoSeguroFuncionario', array('id' => 'edit_seguro_form')) ?>
                <form class="needs-validation container" novalidate>
                    <div class="form-row mx-2" id="id_funcionario_edicao_selecionado">
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Contrato</label>
                            <input type="file" name="funcionario_contrato_seguro" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </div>
                    <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="salvarEdicao()" id="id_salvar_edicao_seguro" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal lista de Funcionarios-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_funcionario">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Funcionários - Cobradores e Motoristas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_funcionario_select">
                <div class="modal-body">
                    <ul class="list-group">
                        <?php if ($funcionario_sem_contrato) : ?>
                            <?php foreach ($funcionario_sem_contrato as $row) : ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center" id="id_lista_funcionarios_nome">
                                    <label for="id_funcionarios_nome<?= $row['funcionarios_id'] ?>" class="float-left m-0 r-0 mr-auto">
                                        <?= $row['funcionarios_nome'] ?>
                                    </label>
                                    <div class="form-check">
                                        <input class="form-check-input float-right" type="radio" data-name="<?= $row['funcionarios_nome'] ?>" id="id_funcionario_nome<?= $row['funcionarios_id'] ?>" name="funcionarios_nome" value="<?= $row['funcionarios_id'] ?>">
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

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
    $("#form_funcionario_select").submit(function(event) {
        var nome_funcionario = $('input[name=funcionarios_nome]:checked', '#form_funcionario_select').attr("data-name")
        var id_funcionario = $('input[name=funcionarios_nome]:checked', '#form_funcionario_select').attr("value")
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

    function addInputInvisivelFuncionarioEdit(id_desse_funcionario) {
        $("#id_funcionario_edicao_selecionado").append(
            '<input type="hidden" id="funcionario_selecionado" value="' + id_desse_funcionario + '" name="funcionario_id" class="form-control" placeholder="Nenhum funcionário selecionado" aria-describedby="basic-addon1" required>'
        );
    }
</script>
<script>
    function enviando() {
        var item = '<span class="sr-only">Loading...</span>';
        $("#id_salvar_seguro").attr("disabled", true);
        $("#id_salvar_seguro").html(item);
        $("#id_salvar_seguro").addClass("text-primary");
        $("#id_salvar_seguro").addClass("spinner-grow");
        $("#id_salvar_seguro").removeClass("btn-success");
        $("#seguro_form").submit();
        $(selector).submit();
    }

    function editar(id_funcionario) {
        addInputInvisivelFuncionarioEdit(id_funcionario);
    }

    function salvarEdicao() {
        var item = '<span class="sr-only">Loading...</span>';
        $("#id_salvar_edicao_seguro").attr("disabled", true);
        $("#id_salvar_edicao_seguro").html(item);
        $("#id_salvar_edicao_seguro").addClass("text-primary");
        $("#id_salvar_edicao_seguro").addClass("spinner-grow");
        $("#id_salvar_edicao_seguro").removeClass("btn-success");
        $("#edit_seguro_form").submit();
        $(selector).submit();
    }
</script>