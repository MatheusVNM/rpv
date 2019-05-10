<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Manuntenções</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row col-md-12 pr-0">

    <div class="form-group col-md-3 ">
        <label for="inputStatus">Filtrar</label>
        <select id="idInputStatus" class="form-control" name="opcoesFiltros">
            <option value="-1">Todos</option>
            <option value="Em Manutenção">Em Manutenção</option>
            <option value="Finalizado">Finalizado</option>
            <option value="2">Ocultados</option>
        </select>
    </div>

    <button type="button" class="btn btn-success ml-auto  mt-auto mb-2 h-50" data-toggle="modal"
            data-target="#addManutencaoModal" title="Adicione uma nova manutenção.">
        <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"></i> Nova Manutenção
    </button>

</div>


<!-- Table init (Ao abrir a tela) -->
<table class="table table-hover">
    <thead>
    <tr>

        <th scope="col">Onibus</th>
        <th scope="col">Data Inicio</th>
        <th scope="col">Data Fim</th>
        <th scope="col">Status</th>
        <th scope="col">Opções</th>
    </tr>
    </thead>
    <!--Body Manutenções-->
    <tbody id="">
    <?php foreach ($manutencoes['result'] as $row) : ?>
        <tr>
            <td><?= $row['onibus_placa'] ?></td>
            <td><?= $row['manutencao_dataInicio'] ?></td>
            <td><?= $row['manutencao_dataFim'] ?></td>
            <td><?php if ($row['manutencao_is_finalizada'] == 0): echo "Em progresso" ?>
                <?php elseif ($row['manutencao_is_finalizada'] == 1): echo "Finalizada" ?>
            </td>
            <?php endif; ?>
            <td>


                <button type="button"  class="btn btn-warning btn-sm" id="id_edit_manutencao" data-placement="top"
                        title="Editar Manutenção" data-target="#editManutencaoModal" data-toggle="modal">
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>

                <a type="button" class="btn btn-primary btn-sm" title="Informação da Manutenção" id="id_info_manutencao"
                   data-toggle="modal" data-placement="top" target="_blank" data-target="#infoManutencaoModal">
                    <span class="hvr-icon fa fa-info mr-1"></span>Info
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>


    <!--Body manutenções ocultadas-->
    <tbody id="idListaManutencaoExcluidas" style="display: none;">

    <tr>
        <th scope="row">1</th>
        <td>OQD2085</td>
        <td>24/03</td>
        <td>25/03</td>
        <td>Finalizado</td>

        <button type="submit" class="btn btn-default btn-sm" title="Restaura para a lista novamente."
                id="opcoesManutencaoRestaurar" data-toggle="tooltip" data-placement="top">
            <span class="hvr-icon fa fa-refresh mr-1"></span>Restaurar
        </button>
        </td>
    </tr>

    </tbody>
</table>
<!-- Table end (Ao abrir a tela) -->

<!-- Modal create manutencao init-->
<div class="modal fade" id="addManutencaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Manutenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body ">
                <form class="needs-validation container" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <select class="form-control" name="estado_nome" id="modal_create_estado" required>
                                <option disabled selected value>Seleciona uma Placa de Ônibus</option>

                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <input name="manutencao_valor" type="number" maxlength="6" min="0" max="9999"
                                   class="form-control numbers-only" id="id_create_valor" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="datainiciomanutencao">Data Inicio</label>
                            <input name="manutencao_dataInicio" type="date" maxlength="6" min="0" max="99999"
                                   class="form-control numbers-only" id="id_create_dataInicio" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datafimmanutencao">Data Finalização</label>
                            <input name="manutencao_dataFim" type="date" maxlength="6" min="0" max="99999"
                                   class="form-control numbers-only" id="id_create_dataFim" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <input name="manutencao_descricao" type="text" maxlength="6" min="0" max="9999"
                                   class="form-control alphanumeric-only" id="id_create_descricao" required>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="opcoesStatus">Status</label>
                            <select id="id_create_opcoesStatus" class="form-control" name="manutencao_status">
                                <option value="1" selected>Em manutenção</option>
                                <option value="0">Finalizado</option>
                            </select>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-success" id="id_create_SalvarManutencao">Salvar</button>
            </div>
        </div>
    </div>
</div>
<!--  Modal create manutenção end -->


<!-- Modal edit Manutenção Init -->
<div class="modal fade" id="editManutencaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Manutenção.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form class="needs-validation container" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="placadoonibus">Placa</label>
                            <!-- here -->
                            <input name="manutencao_placa" type="text" maxlength="6" min="0" max="999999"
                                   class="form-control alphanumeric-only" id="modal_edit_text" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <!-- here -->
                            <input name="manutencao_valor" type="text" maxlength="6" min="0" max="999999"
                                   class="form-control numbers-only" id="modal_edit_text" required>

                        </div>

                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="datainiciomanutencao">Data Inicio</label>
                            <!-- here -->
                            <input name="manutencao_dataInicio" type="date" maxlength="6" min="0" max="999999"
                                   class="form-control numbers-only" id="modal_edit_text" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datafimmanutencao">Data Finalização</label>
                            <!-- here -->
                            <input name="manutencao_dataFim" type="date" maxlength="6" min="0" max="999999"
                                   class="form-control numbers-only" id="modal_edit_text" required>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <!-- here -->
                            <input name="manutencao_descricao" type="text" maxlength="6" min="0" max="999999"
                                   class="form-control alphanumeric-only" id="modal_edit_text" required>
                        </div>

                        <div class="form-group col-md-5">
                            <label for="opcoesStatus">Status</label>
                            <!-- -->
                            <select id="modal_edit_status" class="form-control" name="manutencao_status">
                                <option value="1">Em manutenção</option>
                                <option value="0">Finalizado</option>
                            </select>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" form="modal_edit_form" class="btn btn-primary"
                            id="idSalvarManutencao">Salvar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal edit manutenção end -->
</div>
<!-- Modal info Manutenção Init -->
<div class="modal fade" id="infoManutencaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informações</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <!-- here -->
                            <input name="manutencao_valor" type="text" maxlength="6" min="0" max="999999"
                                   class="form-control" id="modal_edit_text" disabled>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <!-- here -->
                            <input name="manutencao_descricao" type="text" maxlength="6" min="0" max="999999"
                                   class="form-control" id="modal_edit_text" disabled>
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal info concessão end -->
<!-- Script init -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

<script>
    $(function () {
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
    $("#idInputStatus").change(function () {
        var value = $(this).val().toLowerCase();
        if (value === '-1') {
            $('#idListaConcessao').show();
            $('#idListaConcessoesExcluidas').hide();
            $("#idListaConcessao tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf('') > -1)
            });
        } else if (value === '2') {
            $('#idListaConcessao').hide();
            $('#idListaConcessoesExcluidas').show();
            $("#idListaConcessoesExcluidas tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        } else {
            $('#idListaConcessao').show();
            $('#idListaConcessoesExcluidas').hide();
            $("#idListaConcessao tr").filter(function () {
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
    $("#customFile").change(function () {
        var fullPath = $(this).val();
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf(
                '/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }
        $("#fileLabel").html(filename);
    });


    // modal_edit_numero
    // id_ProtocoloConcessao

    $("#id_ProtocoloConcessao").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }


    });
    $("#modal_edit_numero").on("keypress keyup blur", function (event) {
        $(this).val($(this).val().replace(/[^\d].+/, ""));
        if ((event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
    });
</script>