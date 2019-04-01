<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<h2 class="text-center">Lista de Tarifas</h2>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Número do Contrato</th>
            <th scope="col">Ano</th>
            <th scope="col">Vigente Até</th>
            <th scope="col">Trajeto</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="table-primary">
            <th scope="row">1</th>
            <td>542518</td>
            <td>2008</td>
            <td>2015</td>
            <td>Alegrete-Quaraí</td>
            <td>Vigente</td>
        </tr>
        <tr class="table-danger">
            <th scope="row">2</th>
            <td>545215</td>
            <td>2010</td>
            <td>2016</td>
            <td>Alegrete-Uruguaiana</td>
            <td>Cancelado</td>
        </tr>
        <tr class="table-danger">
            <th scope="row">3</th>
            <td>585263</td>
            <td>2001</td>
            <td>2004</td>
            <td>Alegrete-Manoel Viana</td>
            <td>Cancelado</td>
        </tr>
    </tbody>
</table>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>