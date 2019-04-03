<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<h2 class="text-center">Lista de Concessões de Trajetos</h2>
<button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#addConcessaoModal">
    <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom" title="Adicione uma nova concessão."></i>
</button>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Protocolo do Contrato</th>
            <th scope="col">Ano</th>
            <th scope="col">Município</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>542518</td>
            <td>2008</td>
            <td>Alegrete</td>
            <td>Vigente</td>
            <td>
                <button type="button" class="btn btn-default btn-sm" title="Editar concessão"
                    id="opcoesConcessaoEditar">
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Download do documento de concessão"
                    id="opcoesConcessaoDownload">
                    <span class="hvr-icon fa fa-download mr-1"></span>Download
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir concessão"
                    id="opcoesConcessaoExcluir">
                    <span class="hvr-icon fa fa-trash mr-1"></span>Excluir
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>545215</td>
            <td>2010</td>
            <td>Alegrete</td>
            <td>Cancelado</td>
            <td>
                <button type="button" class="btn btn-default btn-sm" title="Editar concessão" id="opcoesConcessaoEditar"
                    disabled>
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Download do documento de concessão"
                    id="opcoesConcessaoDownload">
                    <span class="hvr-icon fa fa-download mr-1"></span>Download
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir concessão"
                    id="opcoesConcessaoExcluir">
                    <span class="hvr-icon fa fa-trash mr-1"></span> Excluir
                </button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>585263</td>
            <td>2001</td>
            <td>Alegrete</td>
            <td>Cancelado</td>
            <td>
                <button type="button" class="btn btn-default btn-sm" title="Editar concessão" id="opcoesConcessaoEditar"
                    disabled>
                    <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Download do documento de concessão"
                    id="opcoesConcessaoDownload">
                    <span class="hvr-icon fa fa-download mr-1"></span>Download
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir concessão"
                    id="opcoesConcessaoExcluir">
                    <span class="hvr-icon fa fa-trash mr-1"></span> Excluir
                </button>
            </td>
        </tr>
    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="addConcessaoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar uma nova concessão.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-row align-items-center">
                    <div class="form-group col-md-6">
                        <label for="exampleFormControlInput1">Protocolo da Concessão</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control">
                            <option selected>Vigente</option>
                            <option>Cancelado</option>
                        </select>
                    </div>
                    <div class="custom-file col-md-8 mx-1">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Documento de Concessão</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<!--Script area -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>