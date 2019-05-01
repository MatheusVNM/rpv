<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Rodoviárias</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div id="page_message"></div>
<button type="button" class="btn btn-success float-right mr-2 my-2" data-toggle="modal" data-target="#modal_create_rodoviaria" title="Adicione uma nova rodoviaria.">
    <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"> </i> Adicionar rodoviária
</button>

<!-- Table init (Ao abrir a tela) -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Cidade</th>
            <th scope="col">UF</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <!--Body concessões-->
    <tbody id="rodoviaria_tabela">

        <?php if ($rodoviarias) : ?>
            <?php foreach ($rodoviarias as $row) : ?>
                <tr>
                    <th scope="row"><?= $row['rodoviaria_codigo'] ?></th>
                    <td><?= $row['rodoviaria_nome'] ?></td>
                    <td><?= $row['rodoviaria_cidade'] ?></td>
                    <td><?= $row['rodoviaria_uf'] ?></td>
                    <td><?= $row['rodoviaria_email'] ?></td>
                    <td><?= $row['rodoviaria_telefone'] ?></td>
                    <td>
                        <button type="button" onclick="editar(<?= $row['rodoviaria_id'] ?>)" class="btn my-1 btn-default btn-sm" id="opcoesConcessaoEditar" data-toggle="tooltip" data-placement="top" title="Editar rodoviaria" data-target="#editRodoviariaModal">
                            <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                        </button>
                        <button type="submit" class="btn my-1 btn-default btn-sm" title="Oculta da lista." id="opcoesConcessaoExcluir" data-toggle="tooltip" data-placement="top">
                            <span class="hvr-icon fa fa-trash mr-1"></span>Ocultar
                        </button>
                        <button type="submit" onclick="info(<?= $row['rodoviaria_id'] ?>)" class="btn my-1 btn-primary btn-sm" title="Informacao Adicional." data-toggle="tooltip" data-placement="top" data-target="#infoRodoviariaModal">
                            <span class="hvr-icon fa fa-eye mr-1"></span>Info
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan=100 class="text-bold text-center"> Nenhuma Rodoviaria Encontrada</td>
            </tr>
        <?php endif; ?>


    </tbody>
    <!--Body concessões excluidas-->

</table>
<!-- Table end (Ao abrir a tela) -->

<!-- Modal create rodoviaria init-->
<div class="modal fade" id="modal_create_rodoviaria" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>Inserir Dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_create_form" class="needs-validation container" novalidate>
                <div class="modal-body">
                    <div id="modal_create_warning">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="rodoviaria_rua">Nome</label>
                            <!-- here -->
                            <input name="rodoviaria_nome" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_create_end" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="rodoviaria_rua">Rua</label>
                            <!-- here -->
                            <input name="rodoviaria_rua" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_create_end" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidadeRodoviaria">Número</label>
                            <!-- here -->
                            <input name="rodoviaria_numero" type="number" class="form-control numbers-only" id="modal_create_numero " required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefoneRodoviaria" type="">Telefone</label>
                            <!-- here -->
                            <input name="rodoviaria_telefone" type="text" maxlength="11" min="0" max="999999999" class="form-control numbers-only" id="modal_create_telefone" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailRodoviaria" type="email">Email</label>
                            <!-- here -->
                            <input name="rodoviaria_email" type="text" class="form-control email-only" id="modal_create_email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cepRodoviaria">CEP</label>
                            <!-- here -->
                            <input name="rodoviaria_cep" type="text" mask="00000-000" maxlength="8" min="0" max="99999999" class="form-control numbers-only" id="modal_create_cep" required>
                            <div class="invalid-feedback"></div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bairroRodoviaria">Bairro</label>
                            <!-- here -->
                            <input name="rodoviaria_bairro" type="text" class="form-control alphanumeric-only" id="modal_create_bairro" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="boxRodoviaria">Box</label>
                            <!-- here -->
                            <input name="rodoviaria_qntdbox" type="number" maxlength="3" min="0" max="999" class="form-control numbers-only" id="modal_add_qntdBox" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="estado_nome" id="modal_create_estado" required>
                                <option disabled selected value>Seleciona um Estado</option>
                                <?php foreach ($estados as $row) : ?>
                                    <option value=<?= $row['estado_id'] ?>><?= $row['estado_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="rodoviaria_cidade_id" id="modal_create_cidade" required>

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning d-none" role="alert" id="rodoviaria_existente">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="modal_create_salvar" data-toggle="modal" data-target="#modal_confirmacao">Salvar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<!--  Modal create concessão end -->


<!-- Modal edit rodoviaria Init -->
<div class="modal fade" id="modal_edit_rodoviaria" tabindex="-3" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>Editar Dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_edit_form" class="needs-validation container" novalidate>
                <input type="hidden" name="rodoviaria_id" id="modal_edit_id" value="" />
                <div class="modal-body">
                    <div id="modal_edit_warning">

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="rodoviaria_rua">Nome</label>
                            <!-- here -->
                            <input name="rodoviaria_nome" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_edit_end" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="rodoviaria_rua">Rua</label>
                            <!-- here -->
                            <input name="rodoviaria_rua" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_edit_end" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cidadeRodoviaria">Número</label>
                            <!-- here -->
                            <input name="rodoviaria_numero" type="number" class="form-control  numbers-only" id="modal_edit_numero" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="telefoneRodoviaria" type="">Telefone</label>
                            <!-- here -->
                            <input name="rodoviaria_telefone" type="text" maxlength="11" min="0" max="999999999" class="form-control numbers-only" id="modal_edit_telefone" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailRodoviaria" type="email">Email</label>
                            <!-- here -->
                            <input name="rodoviaria_email" type="text" class="form-control email-only" id="modal_edit_email" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cepRodoviaria">CEP</label>
                            <!-- here -->
                            <input name="rodoviaria_cep" type="text" mask="00000-000" maxlength="8" min="0" max="99999999" class="form-control numbers-only" id="modal_edit_cep" required>
                            <div class="invalid-feedback"></div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="bairroRodoviaria">Bairro</label>
                            <!-- here -->
                            <input name="rodoviaria_bairro" type="text" class="form-control alphanumeric-only" id="modal_edit_bairro" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="boxRodoviaria">Box</label>
                            <!-- here -->
                            <input name="rodoviaria_qntdbox" type="number" maxlength="3" min="0" max="999" class="form-control numbers-only" id="modal_edit_qntdBox" required>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="estado_nome" id="modal_edit_estado" required>
                                <option disabled selected value>Seleciona um Estado</option>
                                <?php foreach ($estados as $row) : ?>
                                    <option value=<?= $row['estado_id'] ?>><?= $row['estado_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-md-6">
                            <select class="form-control" name="rodoviaria_cidade_id" id="modal_edit_cidade" required>

                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-warning d-none" role="alert" id="rodoviaria_existente">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="modal_edit_salvar" data-toggle="modal" data-target="#modal_confirmacao">Atualizar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- Modal edit rodoviaria end -->


<!-- Modal info rodoviaria init-->
<div class="modal fade" id="modal_info_rodoviaria" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>InseVerrir Dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal_info_warning">

                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="rodoviaria_rua">Nome</label>
                        <!-- here -->
                        <input name="rodoviaria_nome" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_info_end" required>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="rodoviaria_rua">Rua</label>
                        <!-- here -->
                        <input name="rodoviaria_rua" value="" type="text" maxlength="400" min="0" class="form-control alphanumeric-only" id="modal_info_end" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cidadeRodoviaria">Número</label>
                        <!-- here -->
                        <input name="rodoviaria_numero" type="number" class="form-control numbers-only" id="modal_info_numero " required>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefoneRodoviaria" type="">Telefone</label>
                        <!-- here -->
                        <input name="rodoviaria_telefone" type="text" maxlength="11" min="0" max="999999999" class="form-control numbers-only" id="modal_info_telefone" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="emailRodoviaria" type="email">Email</label>
                        <!-- here -->
                        <input name="rodoviaria_email" type="text" class="form-control email-only" id="modal_info_email" required>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cepRodoviaria">CEP</label>
                        <!-- here -->
                        <input name="rodoviaria_cep" type="text" mask="00000-000" maxlength="8" min="0" max="99999999" class="form-control numbers-only" id="modal_info_cep" required>
                        <div class="invalid-feedback"></div>
                    </div>


                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bairroRodoviaria">Bairro</label>
                        <!-- here -->
                        <input name="rodoviaria_bairro" type="text" class="form-control alphanumeric-only" id="modal_info_bairro" required>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="boxRodoviaria">Box</label>
                        <!-- here -->
                        <input name="rodoviaria_qntdbox" type="number" maxlength="3" min="0" max="999" class="form-control numbers-only" id="modal_add_qntdBox" required>
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input class="form-control" name="estado_nome" id="modal_info_estado" />


                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group col-md-6">
                        <input class="form-control" name="rodoviaria_cidade_id" id="modal_info_cidade" />

                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="alert alert-warning d-none" role="alert" id="rodoviaria_existente">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </button>
            </div>

        </div>
    </div>
</div>
<!-- Modal info rodoviaria end -->
<!-- Body end -->


<?php
$this->load->view("footer2.php")
?>
<script>
    function editar(id) {
        $.ajax({
            data: "rodoviaria_id=" + id,
            method: "post",
            dataType: "json",
            url: "<?= base_url('ajax/rodoviarias/getSingle') ?>",
            beforeSend: function() {
                showLoadingModal('Buscando Dados Completos Rodoviarias');
            },
            success: function(result) {
                if (result['success']) {
                    console.log(result['data']['rodoviaria_nome'])
                    $("#modal_edit_id").val(result['data']['rodoviaria_id'])
                    $("#modal_edit_nome").val(result['data']['rodoviaria_nome'])
                    $("#modal_edit_end").val(result['data']['rodoviaria_rua'])
                    $("#modal_edit_numero").val(result['data']['rodoviaria_numero'])
                    $("#modal_edit_telefone").val(result['data']['rodoviaria_telefone'])
                    $("#modal_edit_email").val(result['data']['rodoviaria_email'])
                    $("#modal_edit_cep").val(result['data']['rodoviaria_cep'])
                    $("#modal_edit_bairro").val(result['data']['rodoviaria_bairro'])
                    $("#modal_edit_qntdBox").val(result['data']['rodoviaria_qntdbox'])
                    $("#modal_edit_estado").val(result['data']['estado_id'])
                    $("#modal_edit_estado").trigger('change');
                    setTimeout(function() {

                        $("#modal_edit_cidade").val(result['data']['rodoviaria_cidade_id'])
                    }, 600);

                    $("#modal_edit_rodoviaria").modal('show');
                } else {
                    alert('Rodoviaria não encontrada');
                    console.log(result);
                }
            },
            error: function(error) {
                console.log(error);
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
    }
</script>

<script>
    function info(rodoviaria_id) {
        $.ajax({
            data: "rodoviaria_id=" + rodoviaria_id,
            method: "post",
            dataType: "json",
            url: "<?= base_url('ajax/rodoviarias/getSingle') ?>",
            beforeSend: function() {
                showLoadingModal('Buscando Dados Completos Rodoviarias');
            },
            success: function(result) {
                if (result['success']) {
                    console.log(result['data']['rodoviaria_nome'])
                    $("#modal_info_nome").val(result['data']['rodoviaria_nome'])
                    $("#modal_info_end").val(result['data']['rodoviaria_rua'])
                    $("#modal_info_numero").val(result['data']['rodoviaria_numero'])
                    $("#modal_info_telefone").val(result['data']['rodoviaria_telefone'])
                    $("#modal_info_email").val(result['data']['rodoviaria_email'])
                    $("#modal_info_cep").val(result['data']['rodoviaria_cep'])
                    $("#modal_info_bairro").val(result['data']['rodoviaria_bairro'])
                    $("#modal_info_qntdBox").val(result['data']['rodoviaria_qntdbox'])
                    $("#modal_info_estado").val(result['data']['rodoviaria_uf'])
                    $("#modal_info_cidade").val(result['data']['rodoviaria_cidade'])
                    $("#modal_info_rodoviaria").modal('show');
                } else {
                    alert('Rodoviaria não encontrada');
                    console.log(result);
                }
            },
            error: function(error) {
                console.log(error);
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
    }
</script>

<script>
    function atualizarTabela() {

        $.ajax({
            dataType: "json",
            url: "<?= base_url('ajax/rodoviarias/get') ?>",
            beforeSend: function() {
                showLoadingModal('Atualizando Rodoviarias');
            },
            success: function(data) {
                console.log(data);
                $("#rodoviaria_tabela").empty();
                $.each(data, function(key, value) {
                    console.log(value);
                    $('#rodoviaria_tabela').append(createRodoviariaTr(
                        value['rodoviaria_id'],
                        value['rodoviaria_codigo'],
                        value['rodoviaria_nome'],
                        value['rodoviaria_cidade'],
                        value['rodoviaria_uf'],
                        value['rodoviaria_email'],
                        value['rodoviaria_telefone'],
                    ))
                })
            },
            error: function(error) {
                console.log(error);
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });
    }
</script>
<script>
    function createRodoviariaTr(id, codigo, nome, cidade, uf, email, telefone) {
        return '<tr>' +
            '                    <th scope="row">' + codigo + '</th>' +
            '                    <td>' + nome + '</td>' +
            '                    <td>' + cidade + '</td>' +
            '                    <td>' + uf + '</td>' +
            '                    <td>' + email + '</td>' +
            '                    <td>' + telefone + '</td>' +
            '                    <td>' +
            '                        <button type="button" onclick="editar(' + id + ')" class="btn my-1 btn-default btn-sm" id="opcoesConcessaoEditar" data-toggle="tooltip" data-placement="top" title="Editar rodoviaria" data-target="#editRodoviariaModal">' +
            '                            <span class="hvr-icon fa fa-edit mr-1"></span> Editar' +
            '                        </button>' +
            '                        <button type="submit" class="btn my-1 btn-default btn-sm" title="Oculta da lista." id="opcoesConcessaoExcluir" data-toggle="tooltip" data-placement="top">' +
            '                            <span class="hvr-icon fa fa-trash mr-1"></span>Ocultar' +
            '                        </button>' +
            '                        <button type="submit" onclick="info(' + id + ')" class="btn my-1 btn-primary btn-sm" title="Informacao Adicional." data-toggle="tooltip" data-placement="top" data-target="#infoRodoviariaModal">' +
            '                            <span class="hvr-icon fa fa-eye mr-1"></span>Info' +
            '                        </button>' +
            '                    </td>' +
            '                </tr>'


    }
</script>
<!-- Ajax form submit -->
<!-- Metodo em ajax para fazer o submit do modal create (id="modal_create_form") -->
<script>
    $("#modal_create_form").submit(function() {
        console.log($(this).serialize())
        $.ajax({
            data: $(this).serialize(),
            type: "POST",
            url: "<?= base_url('ajax/rodoviarias/create') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal('Enviando Dados')
            },
            success: function(result) {
                console.log(result['message']);
                if (result['success']) {
                    $("#page_message").html(result['message']);
                    $("#modal_create_rodoviaria").modal('hide');
                    atualizarTabela()
                } else {
                    $('#modal_create_warning').html(result['message']);
                }
            },
            error: function(error) {
                console.log(error)
            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)

            };
        });
        return false;
    });
</script>
<!-- Metodo em ajax para fazer o submit do modal edit (id="modal_edit_form") -->
<script>
    $("#modal_edit_form").submit(function() {
        console.log($(this).serialize())
        $.ajax({
            data: $(this).serialize(),
            type: "POST",
            url: "<?= base_url('ajax/rodoviarias/edit') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal('Enviando Dados')
            },
            success: function(result) {
                console.log(result['message']);
                if (result['success']) {
                    $("#page_message").html(result['message']);
                    $("#modal_edit_rodoviaria").modal('hide');
                    atualizarTabela()
                } else {
                    $('#modal_edit_warning').html(result['message']);
                }
            },
            error: function(error) {
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
</script>



<!-- verificar_rodoviaria_na_cidade -->
<script>
    $("#modal_create_cidade").change(function() {
        var str = $(this).children("option:selected").val();
        $.ajax({
            url: '<?= base_url("ajax/rodoviarias/existe_na_cidade") ?>',
            type: 'POST',
            data: 'cidade_id=' + str,
            dataType: 'json',
            beforeSend: function() {
                showLoadingModal("Verificando existencia de rodoviarias na cidade selecionada")
            },
            success: function(result) {
                console.log(result);
                if (result['success']) {
                    if (result['existe']) {
                        if ($("#rodoviaria_existente").hasClass("d-none")) {
                            $("#rodoviaria_existente").removeClass("d-none");
                        }
                        $("#rodoviaria_existente").html("Já existe uma rodoviaria nesta cidade");
                    } else {
                        if (!$("#rodoviaria_existente").hasClass("d-none")) {
                            $("#rodoviaria_existente").addClass("d-none");
                        }
                        $("#rodoviaria_existente").html("");
                    }
                } else {}
            },
            error: function(error) {
                console.log(error);
                alert('Houve algum erro. Se o erro persistir, contate o administrador dos sistema')

            },
            complete: function() {
                setTimeout(closeLoadingModal, 500)
            }
        });

    });
</script>
<script>
    $("#modal_create_estado").change(function() {
        var str = $(this).children("option:selected").val();
        $.ajax({
            url: '<?= base_url("ajax/cidades/por_estado") ?>',
            type: 'POST',
            data: 'estado_id=' + str,
            dataType: 'json',
            beforeSend: function() {
                showLoadingModal("Carregando Cidades")
            },
            success: function(result) {
                if (result['success']) {
                    $('#modal_create_cidade').empty()
                    $.each(result["data"], function(key, value) {
                        $('#modal_create_cidade').append($('<option>').text(value['cidade_nome']).attr('value', value['cidade_id']));
                    });
                } else {}
            },
            error: function(error) {
                alert('deu erro: veja o console')
                console.log(error)
            },
            complete: function() {
                $("#modal_create_cidade").trigger("change");
                setTimeout(closeLoadingModal, 500)
            }
        });

    });
</script>

<script>
    $("#modal_edit_estado").change(function() {
        var str = $(this).children("option:selected").val();

        // alert('estado selected');
        $.ajax({
            url: '<?= base_url("ajax/cidades/por_estado") ?>',
            type: 'POST',
            data: 'estado_id=' + str,
            dataType: 'json',
            beforeSend: function() {
                showLoadingModal("Carregando Cidades")
            },
            success: function(result) {
                if (result['success']) {
                    $('#modal_edit_cidade').empty()
                    $.each(result["data"], function(key, value) {
                        $('#modal_edit_cidade').append($('<option>').text(value['cidade_nome']).attr('value', value['cidade_id']));
                    });
                } else {}
            },
            error: function(error) {
                alert('deu erro: veja o console')
                console.log(error)
            },
            complete: function() {
                $("#modal_edit_cidade").trigger("change");
                setTimeout(closeLoadingModal, 500)
            }
        });

    });
</script>