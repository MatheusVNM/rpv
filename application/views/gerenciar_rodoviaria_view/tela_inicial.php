<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Rodoviárias</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<button type="button" class="btn btn-success float-right mr-2 my-2" data-toggle="modal"
    data-target="#addRodoviariaModal" title="Adicione uma nova rodoviaria.">
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
    <tbody>
        <!-- 
    <?php foreach ($rodoviarias as $row) : ?>
        <tr>
            <th scope="row"><?= $row['rodoviaria_codigo'] ?></th>
            <td><?= $row['rodoviaria_nome'] ?></td>
            <td><?= $row['nome'] ?></td>
            <td><?= $row['uf'] ?></td>
            <td><?= $row['rodoviaria_email'] ?></td>
            <td><?= $row['rodoviaria_telefone'] ?></td>
            <td>
                <button type="button" onclick="editar()" class="btn btn-default btn-sm" id="opcoesConcessaoEditar"
                        data-toggle="tooltip" data-placement="top" title="Editar rodoviaria"
                        data-target="#editRodoviariaModal">
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <button type="submit" class="btn btn-default btn-sm" title="Oculta da lista."
                        id="opcoesConcessaoExcluir" data-toggle="tooltip" data-placement="top">
                    <span class="hvr-icon fa fa-trash mr-1"></span>Ocultar
                </button>
                <button type="submit" onclick="info()" class="btn btn-primary btn-sm"
                        title="Informacao Adicional." data-toggle="tooltip"
                        data-placement="top" data-target="#infoRodoviariaModal">
                    <span class="hvr-icon fa fa-eye mr-1"></span>Info
                </button>
            </td>
        </tr>
    <?php endforeach; ?>
-->

    </tbody>
    <!--Body concessões excluidas-->

</table>
<!-- Table end (Ao abrir a tela) -->

<!-- Modal create rodoviaria init-->
<div class="modal fade" id="addRodoviariaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <label for="enderecoRodoviaria">Endereço</label>
                        <!-- here -->
                        <input name="rodoviaria_rua" type="text" maxlength="400" min="0" class="form-control"
                            id="modal_campo_end">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="cidadeRodoviaria">Número</label>
                        <!-- here -->
                        <input name="rodoviaria_numero" type="number" class="form-control" id="modal_edit_Cidade">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefoneRodoviaria" type="">Telefone</label>
                        <!-- here -->
                        <input name="rodoviaria_telefone" type="text" maxlength="11" min="0" max="999999999"
                            class="form-control" id="modal_campo_telefone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="emailRodoviaria" type="email">Email</label>
                        <!-- here -->
                        <input name="rodoviaria_email" type="text" class="form-control" id="modal_add_Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cepRodoviaria">CEP</label>
                        <!-- here -->
                        <input name="rodoviaria_cep" type="text" maxlength="8" min="0" max="99999999"
                            class="form-control" id="modal_campo_cep">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="cidadeRodoviaria">Cidade</label>
                        <!-- here -->
                        <input name="rodoviaria_cidade_id" type="text" class="form-control" id="modal_campo_cidade">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bairroRodoviaria">Bairro</label>
                        <!-- here -->
                        <input name="rodoviaria_bairro" type="text" class="form-control" id="modal_campo_bairro">
                    </div>
                    <div class="form-group col-md-2">
                        <label for="boxRodoviaria">Box</label>
                        <!-- here -->
                        <input name="rodoviaria_qntdbox" type="number" maxlength="3" min="0" max="999"
                            class="form-control" id="modal_add_qntdBox">
                    </div>
                </div>
                <select class="form-control col-md-2">
                    <option>UF</option>
                </select>
            </div>
            <div class="alert alert-info" role="alert">
                This is a info alert with <a href="#" class="alert-link">an example link</a>. Give it a click if you
                like.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" onclick="enviando()" class="btn btn-success" id="idSalvarConcessao"
                    data-toggle="modal" data-target="#modal_confirmacao">Salvar
                </button>
            </div>
        </div>
    </div>
</div>
</div>
<!--  Modal create concessão end -->


<!-- Modal edit rodoviaria Init -->
<div class="modal fade" id="editRodoviariaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group">
                    <label for="enderecoRodoviaria">Endereço</label>
                    <!-- here -->
                    <input name="name_enderecoRodoviaria" type="text" class="form-control" id="modal_edit_Endereco">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bairroRodoviaria">Bairro</label>
                        <!-- here -->
                        <input name="name_bairroRodoviaria" type="text" class="form-control" id="modal_edit_Bairro">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cidadeRodoviaria">Cidade</label>
                        <!-- here -->
                        <input name="name_cidadeRodoviaria" type="text" class="form-control" id="modal_edit_Cidade">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefoneRodoviaria">Telefone</label>
                        <!-- here -->
                        <input name="name_telefoneRodoviaria" type="text" class="form-control" id="modal_edit_Telefone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="emailRodoviaria">Email</label>
                        <!-- here -->
                        <input name="name_emailRodoviaria" type="text" class="form-control" id="modal_edit_Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cepRodoviaria">CEP</label>
                        <!-- here -->
                        <input name="name_cepRodoviaria" type="number" class="form-control" id="modal_edit_cep">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="boxRodoviaria">Quantidade de box</label>
                        <!-- here -->
                        <input name="name_qntdboxRodoviaria" type="number" class="form-control" id="modal_edit_qntdBox">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" form="modal_edit_form" class="btn btn-primary" id="idSalvarConcessao">Salvar
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit concessão end -->

<!-- Modal info rodoviaria Init -->
<div class="modal fade" id="infoRodoviariaModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar dados da Rodoviária.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="form-group">
                    <label for="enderecoRodoviaria">Endereço</label>
                    <!-- here -->
                    <input name="name_enderecoRodoviaria" type="text" class="form-control" id="modal_info_Endereco">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="bairroRodoviaria">Bairro</label>
                        <!-- here -->
                        <input name="name_bairroRodoviaria" type="text" class="form-control" id="modal_info_Bairro">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="cidadeRodoviaria">Cidade</label>
                        <!-- here -->
                        <input name="name_cidadeRodoviaria" type="text" class="form-control" id="modal_info_Cidade">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="telefoneRodoviaria">Telefone</label>
                        <!-- here -->
                        <input name="name_telefoneRodoviaria" type="text" class="form-control" id="modal_info_Telefone">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="emailRodoviaria">Email</label>
                        <!-- here -->
                        <input name="name_emailRodoviaria" type="text" class="form-control" id="modal_info_Email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cepRodoviaria">CEP</label>
                        <!-- here -->
                        <input name="name_cepRodoviaria" type="number" class="form-control" id="modal_info_cep">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="boxRodoviaria">Quantidade de box</label>
                        <!-- here -->
                        <input name="name_qntdboxRodoviaria" type="number" class="form-control" id="modal_info_qntdBox">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal info concessão end -->
<!-- Script init -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('.alert').alert();
});
</script>
<!-- Script end -->


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>

<script>
function editar(id, status, numero) {
    $('#editRodoviariaModal').modal('show')
}
</script>

<script>
function info() {
    $('#infoRodoviariaModal').modal('show')
}
</script>

<script>
$("#idInputStatus").change(function() {
    var value = $(this).val().toLowerCase();
    if (value === '-1') {
        $('#idListaConcessao').show();
        $('#idListaConcessoesExcluidas').hide();
        $("#idListaConcessao tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf('') > -1)
        });
    } else if (value === '2') {
        $('#idListaConcessao').hide();
        $('#idListaConcessoesExcluidas').show();
        $("#idListaConcessoesExcluidas tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    } else {
        $('#idListaConcessao').show();
        $('#idListaConcessoesExcluidas').hide();
        $("#idListaConcessao tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }

});
</script>

<script>
function enviando() {
    var item = '<span class="sr-only">Loading...</span>';
    $("#idSalvarConcessao").attr("disabled", true);
    $("#idSalvarConcessao").html(item);
    $("#idSalvarConcessao").addClass("text-primary");
    $("#idSalvarConcessao").addClass("spinner-grow");
    $("#idSalvarConcessao").removeClass("btn-success");
    $("#concessao_form").submit();
    $(selector).submit();
}
</script>

<script>
$("#customFile").change(function() {
    var fullPath = $(this).val();
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }
    $("#fileLabel").html(filename);
});


// modal_edit_numero
// id_ProtocoloConcessao

$("#modal_campo_telefone").on("keypress keyup blur", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }


});
$("#modal_add_cep").on("keypress keyup blur", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
$("#modal_add_qntdBox").on("keypress keyup blur", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
$('#modal_campo_end').keypress(function(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
});
$('#modal_campo_bairro').keypress(function(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
});
$("#modal_campo_cep").on("keypress keyup blur", function(event) {
    $(this).val($(this).val().replace(/[^\d].+/, ""));
    if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
    }
});
$('#modal_campo_cidade').keypress(function(e) {
    var keyCode = (e.keyCode ? e.keyCode : e.which);
    if (keyCode > 47 && keyCode < 58) {
        e.preventDefault();
    }
});
</script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous">
</script>
<script type="text/javascript">
$('#modal_campo_cep').blur(function() {
    if (rodoviaria_cep != "") {
        $.getJSON("https://viacep.com.br/ws/" + rodoviaria_cep + "/json/?callback=?", function(dados) {
            if (!("erro" in dados)) {
                //Atualiza os campos com os valores da consulta.
                $("#modal_campo_cidade").val(dados.localidade);
            } else {
                //CEP pesquisado não foi encontrado.
                limpa_formulário_cep();
                alert("CEP não encontrado.");
            }
        });
    }
});
</script>