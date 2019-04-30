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
                        <div class="form-check column my-4 mx-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Ônibus Ativo
                            </label><br>
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Ônibus Inativo
                            </label>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Motivo Inatividade</label>
                            <textarea class="form-control" id="" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mt-auto mb-2" id="id_form_input">
                            <label for="id_input_file" id="id_label_input" class="rounded">
                                <i class="fa fa-upload" id="id_icon_input"></i>
                                Upload file</label>
                            <input type="file" class="custom-file-input" id="id_input_file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
<!-- Script end -->


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>