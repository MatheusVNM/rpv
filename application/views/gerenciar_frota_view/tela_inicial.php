<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Veículos</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<button type="button" class="btn btn-success float-right mr-2 my-2" data-toggle="modal"
    data-target="#id_modal_create_veiculo" title="Adicione um novo veículo.">
    <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"> </i> Adicionar veículo
</button>

<!-- Table init (Ao abrir a tela) -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Placa do Veículo</th>
            <th scope="col">Ano</th>
            <th scope="col">Status</th>
            <th scope="col">Manutenção</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <!--Body Frota-->
    <tbody id="id_lista_frota">
        <tr>
            <th scope="row">1</th>
            <td>IQU1240</td>
            <td>2010</td>
            <td>Rodando</td>
            <td>Não</td>
            <td>
                <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal"
                    data-placement="top" title="Editar veículo" data-target="#id_modal_edit_veiculo">
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <button type="button" class="btn btn-danger btn-sm" title="Ocultar da lista" id="id_opcao_ocultar"
                    data-toggle="tooltip" data-placement="top" target="_blank">
                    <span class="hvr-icon fa fa-trash mr-1"></span>Ocultar
                </button>
                <button type="button" class="btn btn-primary btn-sm" title="Mais informações sobre o veíuclo."
                    id="id_opcao_visualizar" data-toggle="tooltip" data-placement="top">
                    <span class="hvr-icon fa fa-info mr-1"></span>Info
                </button>
            </td>
        </tr>
    </tbody>
</table>


<!-- Modal create veículo -->
<div class="modal fade" id="id_modal_create_veiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Novo Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_create_placa">Placa</label>
                            <input name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only"
                                id="modal_create_placa" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_create_nro_onibus">Nro Ônibus</label>
                            <input name="onibus_numero" type="number" class="form-control numbers-only"
                                id="modal_create_nro_onibus" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_create_nro_antt">Nro ANTT</label>
                            <input name="onibus_numero_antt" type="number" class="form-control numbers-only"
                                id="modal_create_nro_antt" maxlength="12" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_create_ano_fabricacao">Ano Fabricação</label>
                            <input name="onibus_ano_fab" type="number" class="form-control numbers-only"
                                id="modal_create_ano_fabricacao" maxlength="4" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_create_nro_chassi">Nro Chassi</label>
                            <input name="onibus_num_chassis" type="text" class="form-control alphanumeric-only"
                                id="modal_create_nro_chassi" maxlength="17" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_create_nro_lugares">Nro Lugares</label>
                            <input name="onibus_num_lugares" type="number" class="form-control numbers-only"
                                id="modal_create_nro_lugares" maxlength="3" max="99" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_create_marca_carroceira">Marca da Carroceria</label>
                            <input name="onibus_marcacarroceria" type="text" class="form-control letters-only"
                                id="modal_create_marca_carroceira" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_create_tacografo">Tacógrafo</label>
                            <input name="onibus_tacografo" type="number" class="form-control numbers-only"
                                id="modal_create_tacografo" maxlength="15" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_create_marca_chassi">Marca do Chassi</label>
                            <input name="onibus_marca_chassis" type="text" class="form-control letters-only"
                                id="modal_create_marca_chassi" maxlength="15" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_create_potencia_motor">Potência do Motor</label>
                            <input name="onibus_potencial_motor" type="number" class="form-control numbers-only"
                                id="modal_create_potencia_motor" maxlength="4" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_create_propriedade_veiculo">Propriedade do Veículo</label>
                            <input name="onibus_propriedade_veiculo" type="text" class="form-control letters-only"
                                id="modal_create_propriedade_veiculo" maxlength="30" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="model_create_quilometragem">Quilometragem</label>
                            <input name="onibus_quilometragem" type="number" class="form-control numbers-only"
                                id="model_create_quilometragem" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Situação</label>
                        <div class="form-check column my-4">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="id_create_ativo"
                                value="onibus_ativo" checked required>
                            <label class="form-check-label" for="id_create_ativo">
                                Ônibus Ativo
                            </label><br>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="id_create_inativo"
                                value="onibus_inativo" required>
                            <label class="form-check-label" for="id_create_inativo">
                                Ônibus Inativo
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Motivo Inatividade</label>
                            <textarea name="onibus_motivo_inatividade" class="form-control alphanumeric-only"
                                id="modal_create_motivo_inatividade" rows="3" disabled maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Ar Condicionado:</label>
                        <div class="form-check column">
                            <input name="onibus_ar_condicionado" class="form-check-input" type="radio"
                                id="id_create_ar_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_create_ar_sim">
                                Sim
                            </label>
                            <input name="onibus_ar_condicionado" class="form-check-input mx-2" type="radio"
                                id="id_create_ar_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_create_ar_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Em Manutenção:</label>
                        <div class="form-check column">
                            <input name="onibus_em_manutencao" class="form-check-input" type="radio"
                                id="id_create_manun_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_create_manun_sim">
                                Sim
                            </label>
                            <input name="onibus_em_manutencao" class="form-check-input mx-2" type="radio"
                                id="id_create_manun_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_create_manun_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Adaptado para Deficientes:</label>
                        <div class="form-check column">
                            <input name="onibus_adaptado_deficiente" class="form-check-input" type="radio"
                                id="id_create_defic_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_create_defic_sim">
                                Sim
                            </label>
                            <input name="onibus_adaptado_deficiente" class="form-check-input mx-2" type="radio"
                                id="id_create_defic_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_create_defic_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1 my-3">Documento de Propriedade:</label>
                        <div class="form-group" id="id_form_input">
                            <label for="id_input_file" id="id_label_input" class="rounded">
                                <i class="fa fa-upload" id="id_icon_input"></i>
                                <span id="id_span_file">Upload file</span>
                            </label>
                            <input name="onibus_documento_veiculo" type="file" class="custom-file-input"
                                id="id_create_input_file" required>
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


<!-- Modal edit veículo -->
<div class="modal fade" id="id_modal_edit_veiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Novo Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_edit_placa">Placa</label>
                            <input name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only"
                                id="modal_edit_placa" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_edit_nro_onibus">Nro Ônibus</label>
                            <input name="onibus_numero" type="number" class="form-control numbers-only"
                                id="modal_edit_nro_onibus" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_nro_antt">Nro ANTT</label>
                            <input name="onibus_numero_antt" type="number" class="form-control numbers-only"
                                id="modal_edit_nro_antt" maxlength="12" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_edit_ano_fabricacao">Ano Fabricação</label>
                            <input name="onibus_ano_fab" type="number" class="form-control numbers-only"
                                id="modal_edit_ano_fabricacao" maxlength="4" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_edit_nro_chassi">Nro Chassi</label>
                            <input name="onibus_num_chassis" type="text" class="form-control alphanumeric-only"
                                id="modal_edit_nro_chassi" maxlength="17" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_edit_nro_lugares">Nro Lugares</label>
                            <input name="onibus_num_lugares" type="number" class="form-control numbers-only"
                                id="modal_edit_nro_lugares" maxlength="3" max="99" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_marca_carroceira">Marca da Carroceria</label>
                            <input name="onibus_marcacarroceria" type="text" class="form-control letters-only"
                                id="modal_edit_marca_carroceira" maxlength="50" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_edit_tacografo">Tacógrafo</label>
                            <input name="onibus_tacografo" type="number" class="form-control numbers-only"
                                id="modal_edit_tacografo" maxlength="15" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_edit_marca_chassi">Marca do Chassi</label>
                            <input name="onibus_marca_chassis" type="text" class="form-control letters-only"
                                id="modal_edit_marca_chassi" maxlength="15" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_edit_potencia_motor">Potência do Motor</label>
                            <input name="onibus_potencial_motor" type="number" class="form-control numbers-only"
                                id="modal_edit_potencia_motor" maxlength="4" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_propriedade_veiculo">Propriedade do Veículo</label>
                            <input name="onibus_propriedade_veiculo" type="text" class="form-control letters-only"
                                id="modal_edit_propriedade_veiculo" maxlength="30" required>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="model_edit_quilometragem">Quilometragem</label>
                            <input name="onibus_quilometragem" type="number" class="form-control numbers-only"
                                id="model_edit_quilometragem" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Situação</label>
                        <div class="form-check column my-4">
                            <input class="form-check-input" type="radio" name="onibus_is_ativo" id="id_edit_ativo"
                                value="onibus_ativo" checked required>
                            <label class="form-check-label" for="id_edit_ativo">
                                Ônibus Ativo
                            </label><br>
                            <input class="form-check-input" type="radio" name="onibus_is_ativo" id="id_edit_inativo"
                                value="onibus_inativo" required>
                            <label class="form-check-label" for="id_edit_inativo">
                                Ônibus Inativo
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Motivo Inatividade</label>
                            <textarea name="onibus_motivo_inatividade" class="form-control alphanumeric-only"
                                id="modal_edit_motivo_inatividade" rows="3" disabled maxlength="255"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Ar Condicionado:</label>
                        <div class="form-check column">
                            <input name="onibus_ar_condicionado" class="form-check-input" type="radio"
                                id="id_edit_ar_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_edit_ar_sim">
                                Sim
                            </label>
                            <input name="onibus_ar_condicionado" class="form-check-input mx-2" type="radio"
                                id="id_edit_ar_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_edit_ar_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Em Manutenção:</label>
                        <div class="form-check column">
                            <input name="onibus_em_manutencao" class="form-check-input" type="radio"
                                id="id_edit_manun_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_edit_manun_sim">
                                Sim
                            </label>
                            <input name="onibus_em_manutencao" class="form-check-input mx-2" type="radio"
                                id="id_edit_manun_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_edit_manun_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Adaptado para Deficientes:</label>
                        <div class="form-check column">
                            <input name="onibus_adaptado_deficiente" class="form-check-input" type="radio"
                                id="id_edit_defic_sim" value="sim" checked required>
                            <label class="form-check-label" for="id_edit_defic_sim">
                                Sim
                            </label>
                            <input name="onibus_adaptado_deficiente" class="form-check-input mx-2" type="radio"
                                id="id_edit_defic_nao" value="nao" required>
                            <label class="form-check-label mx-4" for="id_edit_defic_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1 my-3">Documento de Propriedade:</label>
                        <div class="form-group" id="id_form_input">
                            <label for="id_edit_input_file" id="id_label_input" class="rounded">
                                <i class="fa fa-upload" id="id_icon_input"></i>
                                <span id="id_span_file">Upload file</span>
                            </label>
                            <input name="onibus_documento_veiculo" type="file" class="custom-file-input"
                                id="id_edit_input_file" required>
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
<!-- Script init -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
    $('.alert').alert();
});
</script>

<script>
$("#id_input_file").on("change", function() {
    var fullPath = $(this).val();
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath
            .lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }
    $("#id_span_file").html(filename);
});
</script>
<script>
$("#id_create_ativo").change(function() {
    $("#modal_create_motivo_inatividade").prop("disabled", true);
});
$("#id_create_inativo").change(function() {
    $("#modal_create_motivo_inatividade").prop("disabled", false);
});
$("#id_edit_ativo").change(function() {
    $("#modal_create_motivo_inatividade").prop("disabled", true);
});
$("#id_edit_inativo").change(function() {
    $("#modal_create_motivo_inatividade").prop("disabled", false);
});
</script>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>