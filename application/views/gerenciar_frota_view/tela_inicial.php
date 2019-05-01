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
                <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="tooltip"
                    data-placement="top" title="Editar veículo">
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
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputAddress">Placa</label>
                            <input type="text" class="form-control" id="inputAddress">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputAddress2">Nro Ônibus</label>
                            <input type="number" class="form-control" id="inputAddress2">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCity">Nro ANTT</label>
                            <input type="number" class="form-control" id="inputCity">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputAddress2">Ano Fabricação</label>
                            <input type="number" class="form-control" id="inputAddress2">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputZip">Nro Chassi</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip">Nro Lugares</label>
                            <input type="number" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Marca da Carroceria</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Tacógrafo</label>
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputZip">Marca do Chassi</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip">Potência do Motor</label>
                            <input type="number" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputZip">Propriedade do Veículo</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="">Quilometragem</label>
                            <input type="number" class="form-control" id="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputZip">Propriedade do Veículo</label>
                            <input type="text" class="form-control" id="inputZip">
                        </div>
                        <label class="mx-1">Situação</label>
                        <div class="form-check column my-4">
                            <input class="form-check-input" type="radio" name="exampleRadios"
                                id="id_isAtivo_radio_ativo" value="option1" checked>
                            <label class="form-check-label" for="id_isAtivo_radio_ativo">
                                Ônibus Ativo
                            </label><br>
                            <input class="form-check-input" type="radio" name="exampleRadios"
                                id="id_isAtivo_radio_inativo" value="option2">
                            <label class="form-check-label" for="id_isAtivo_radio_inativo">
                                Ônibus Inativo
                            </label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Motivo Inatividade</label>
                            <textarea class="form-control" id="id_onibus_motivo_inatividade" rows="3"
                                disabled></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Ar Condicionado:</label>
                        <div class="form-check column">
                            <input class="form-check-input" type="radio" name="ar_radio" id="id_ar_radio_sim"
                                value="option1" checked>
                            <label class="form-check-label" for="id_ar_radio_sim">
                                Sim
                            </label>
                            <input class="form-check-input mx-2" type="radio" name="ar_radio" id="id_ar_radio_nao"
                                value="option2">
                            <label class="form-check-label mx-4" for="id_ar_radio_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Em Manutenção:</label>
                        <div class="form-check column">
                            <input class="form-check-input" type="radio" name="manun_radio" id="id_manun_radio_sim"
                                value="option1" checked>
                            <label class="form-check-label" for="id_manun_radio_sim">
                                Sim
                            </label>
                            <input class="form-check-input mx-2" type="radio" name="manun_radio" id="id_manun_radio_nao"
                                value="option2">
                            <label class="form-check-label mx-4" for="id_manun_radio_nao">
                                Não
                            </label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="mx-1">Adaptado para Deficientes:</label>
                        <div class="form-check column">
                            <input class="form-check-input" type="radio" name="defic_radio" id="id_defic_radio_sim"
                                value="option1" checked>
                            <label class="form-check-label" for="id_defic_radio_sim">
                                Sim
                            </label>
                            <input class="form-check-input mx-2" type="radio" name="defic_radio" id="id_defic_radio_nao"
                                value="option2">
                            <label class="form-check-label mx-4" for="id_defic_radio_nao">
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
                            <input type="file" class="custom-file-input" id="id_input_file">
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
$("#id_isAtivo_radio_ativo").change(function() {
    $("#id_onibus_motivo_inatividade").prop("disabled", true);
});
$("#id_isAtivo_radio_inativo").change(function() {
    $("#id_onibus_motivo_inatividade").prop("disabled", false);
});
</script>


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>