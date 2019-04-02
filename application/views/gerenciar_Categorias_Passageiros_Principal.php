<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<div class="container-fluid d-flex justify-content-center flex-column">


    <div class="mx-auto">
        <i class="fa fa-group fa-5x mt-3 text-primary"></i>
    </div>
    <div class="mx-auto my-3">
        <h4 class="text-center"><b>Gerenciar Categorias</b><Br><b>de Passageiros</b></h4>
    </div>

    <ul class="list-group">
        <li class="list-group-item "><i class="hrv-icon fa fa-book mr-1 "></i>Estudantes<i class="hrv-icon fa fa-edit mr-1 d-flex justify-content-end align-items-center"></i></li>
        <li class="list-group-item">Idosos</li>
        <li class="list-group-item"><i class="hrv-icon fa fa-child mr-1 "></i>Crianças</li>
        <li class="list-group-item"><i class="hrv-icon fa fa-wheelchair mr-1 "></i>Deficientes</li>

    </ul>
</div>
<div class="mx-auto row pt-3 justify-content-end">
    <button class="btn btn-primary h-100-left"><span class="fa fa-plus-circle mr-2 h-100"></span><span
            class="h-100 text-wrap">

            Adicionar Categoria
        </span>
    </button>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>