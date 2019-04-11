<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Concessões de Trajetos</h2>
<?= $this->session->flashdata('error');?>
<?= $this->session->flashdata('success');?>
<div class="form-group col-md-3">
    <label for="inputStatus">Filtrar</label>
    <select id="idInputStatus" class="form-control" name="opcoesFiltros">
        <option value="-1">Todos</option>
        <option value="  Vigente">Vigente</option>
        <option value="Não vigente">Não vigente</option>
        <option value="2">Concessões excluidas</option>
    </select>
</div>
<button type="button" class="btn btn-success btn-circle mx-4" data-toggle="modal" data-target="#addConcessaoModal">
    <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom" title="Adicione uma nova concessão."></i>
</button>

<!-- Table init (Ao abrir a tela) -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Protocolo do Contrato</th>
            <th scope="col">Data</th>
            <th scope="col">Município</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <!--Body concessões-->
    <tbody id="idListaConcessao">
        <?php foreach($concessoes as $concessao):?>
        <tr>
            <th scope="row">1</th>
            <td><?= $concessao['protocolo_Contrato']?></td>
            <td><?= $concessao['ano']?></td>
            <td>Alegrete</td>
            <td class="status">
                <?php if($concessao['statusConcessao']) : ?>
                Vigente
                <?php else: ?>
                Não Vigente
                <?php endif; ?>

            </td>
            <td>
                <button type="button"
                    onclick="editar(<?= $concessao['id_Concessao'] ?>, <?= $concessao['statusConcessao'] ?>, <?= $concessao['protocolo_Contrato'] ?> )"
                    class="btn btn-default btn-sm" id="opcoesConcessaoEditar" data-toggle="tooltip" data-placement="top"
                    title="Editar concessão">
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <label>/</label>
                <a type="button" class="btn btn-default btn-sm" title="Documento de concessão"
                    id="opcoesConcessaoDownload" data-toggle="tooltip" data-placement="top"
                    href="<?= $concessao['anexo_Concessao']?>" target="_blank">
                    <span class="hvr-icon fa fa-file-pdf-o mr-1"></span>PDF
                </a>
                <?php if(!$concessao['statusConcessao']) : ?>
                <label>/</label>
                <?php $hidden = array('concessao_id' => $concessao['id_Concessao']);
                    echo form_open('gerenciar_concessoes_Controller/updateStatusConcessao', 'id="formDelete' . $concessao['id_Concessao'].'"class="d-none"', $hidden);
                    ?>
                <?= form_close() ?>
                <button type="submit" class="btn btn-default btn-sm" form="formDelete<?=$concessao['id_Concessao']?>"
                    onclick="editar(<?= $concessao['id_Concessao'] ?>, <?= $concessao['statusConcessao'] ?>)"
                    title="Exclui concessão apenas da lista e não permanentemente." id="opcoesConcessaoExcluir"
                    data-toggle="tooltip" data-placement="top">
                    <span class="hvr-icon fa fa-trash mr-1"></span>Excluir
                </button>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach;?>

    </tbody>
    <!--Body concessões excluidas-->
    <tbody id="idListaConcessoesExcluidas" style="display: none;">
        <?php foreach($concessoesExcluidas as $concessaoExcluida):?>
        <tr>
            <th scope="row">1</th>
            <td><?= $concessaoExcluida['protocolo_Contrato']?></td>
            <td><?= $concessaoExcluida['ano']?></td>
            <td>Alegrete</td>
            <td>Não Vigente</td>
            <td>
                <?php $hidden = array('concessao_id' => $concessaoExcluida['id_Concessao']);
                    echo form_open('gerenciar_concessoes_Controller/updateStatusConcessao', 'id="formDelete' . $concessaoExcluida['id_Concessao'].'"class="d-none"', $hidden);
                    ?>
                <?= form_close() ?>
                <button type="button" class="btn btn-default btn-sm"
                    form="formDelete<?=$concessaoExcluida['id_Concessao']?>"
                    onclick="editar(<?= $concessaoExcluida['id_Concessao'] ?>, <?= $concessaoExcluida['statusConcessao'] ?>)"
                    title="Restaura para a lista novamente." id="opcoesConcessaoRestaurar" data-toggle="tooltip"
                    data-placement="top">
                    <span class="hvr-icon fa fa-refresh mr-1"></span>Restaurar
                </button>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<!-- Table end (Ao abrir a tela) -->

<!-- Modal create concessão init-->
<div class="modal fade" id="addConcessaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar uma nova concessão.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <?= form_open_multipart('gerenciar_concessoes_Controller/createConcessao', array('id' => 'concessao_form'))?>
                <div class="form-group col-md-6">
                    <label for="protocoloConcessao">Protocolo da Concessão</label>
                    <input name="name_nroProtocolo" type="text" class="form-control" id="id_ProtocoloConcessao"
                        data-error="Bruh, that email address is invalid" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-md-5" id="formCadastroConcessao">
                    <label for="opcoesStatus">Status</label>
                    <select id="id_opcoesStatus" class="form-control" name="name_opcoesstatus">
                        <option value="1" selected>Vigente</option>
                        <option value="0">Não Vigente</option>
                    </select>
                </div>
                <div class="custom-file col-md-8 mx-3" id="formCadastroConcessao">
                    <input type="file" class="custom-file-input" name="docconcessao" id="customFile">
                    <label class="custom-file-label" for="customFile">Documento de Concessão</label>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" onclick="enviando()" class="btn btn-success"
                    id="idSalvarConcessao">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!--  Modal create concessão end -->


<!-- Modal edit concessão Init -->
<div class="modal fade" id="editConcessaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar uma nova concessão.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <?= form_open_multipart('gerenciar_concessoes_Controller/updateConcessao', array('id' => 'modal_edit_form'))?>
                <?= form_input(array('name'=> 'concessao_id', 'type'=>'hidden', 'id'=>"modal_edit_hidden")) ?>
                <div class="form-group col-md-6">
                    <label for="protocoloConcessao">Protocolo da Concessão</label>
                    <!-- here -->
                    <input name="name_nroProtocoloEdit" type="text" class="form-control" id="modal_edit_numero">
                </div>
                <div class="form-group col-md-5">
                    <label for="opcoesStatus">Status</label>
                    <!-- -->
                    <select id="modal_edit_status" class="form-control" name="concessao_status">
                        <option value="1">Vigente</option>
                        <option value="0">Não Vigente</option>
                    </select>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="submit" form="modal_edit_form" class="btn btn-primary"
                    id="idSalvarConcessao">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal edit concessão end -->

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
    $('#modal_edit_hidden').val(id)
    $('#modal_edit_status').val(status);
    $('#modal_edit_numero').val(numero);
    $('#editConcessaoModal').modal('show')

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