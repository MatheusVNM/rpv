<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<h2 class="text-center">Lista de Concessões de Trajetos</h2>
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
                <button type="button" class="btn btn-default btn-sm" title="Atulizar arquivo"
                    id="opcoesConcessaoEditar">
                    <span class="hvr-icon fa fa-refresh mr-1"></span> Atualizar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir arquivo"
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
                <button type="button" class="btn btn-default btn-sm" title="Atulizar arquivo"
                    id="opcoesConcessaoEditar" disabled>
                    <span class="hvr-icon fa fa-refresh mr-1"></span> Atualizar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir arquivo"
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
                <button type="button" class="btn btn-default btn-sm" title="Atulizar arquivo"
                    id="opcoesConcessaoEditar" disabled>
                    <span class="hvr-icon fa fa-refresh mr-1"></span> Atualizar
                </button>
                <label>/</label>
                <button type="button" class="btn btn-default btn-sm" title="Excluir arquivo"
                    id="opcoesConcessaoExcluir">
                    <span class="hvr-icon fa fa-trash mr-1"></span> Excluir
                </button>
            </td>
        </tr>
    </tbody>
</table>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>