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
        <h1 class="text-center">Gerenciar Categorias<Br>de Passageiros</h1>
    </div>
    <div class="mx-auto">
    <button class="btn btn-primary h-100">Categorias</button>
    <button class="btn btn-primary h-100"><span class="fa fa-plus-circle mr-2 h-100"></span><span class="h-100 text-wrap">

        Adicionar Categoria
    </span>
</button>
        </div>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?> 