<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<div class="container-fluid d-flex justify-content-center flex-column">


    <div class="mx-auto">
        <i class="fa fa-group fa-5x mt-3 text-logo-color"></i>
    </div>
    <div class="mx-auto my-3">
        <h4 class="text-center"><b>Gerenciar Categorias</b><Br><b>de Passageiros</b></h4>
    </div>

    <ul class="list-group">
        <li class="list-group-item font-weight-bold"><i class="hrv-icon fa fa-2x fa-book mr-2 "></i>Estudantes<i
                class="fa fa-edit float-right mr-1 fa-2x"></i></li>
        <li class="list-group-item font-weight-bold"><i class='fa-male fa fa-2x mr-2'></i>Idosos<i class="fa fa-edit float-right mr-1 fa-2x"></i></li>
        <li class="list-group-item font-weight-bold"><i class="hrv-icon fa fa-2x fa-child mr-2 "></i>Crianças<i
                class="fa fa-edit float-right mr-1 fa-2x"></i></li>
        <li class="list-group-item font-weight-bold"><i class="hrv-icon fa fa-2x fa-wheelchair mr-1 "></i>Deficientes<i
                class="fa fa-edit float-right mr-1 fa-2x"></i></li>

    </ul>
</div>
<div class="mx-auto row pt-3 justify-content-end">
    <button class="btn btn-success h-100-left"><span class="fa fa-plus-circle mr-2 h-100"></span><span
            class="h-100 text-wrap">
            Adicionar Categoria
        </span>
    </button>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>