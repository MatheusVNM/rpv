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

        <h4 class="text-center text-logo-color"><b><br>Deficientes</b></h4>
    </div>

    <ul class="list-group">
        <li class="list-group-item text-center bg-logo-color"><h5><b>Critérios</b></h5></li>
        <li class="list-group-item text-center">Obtenção de Passe Livre no Ministério dos Transportes.</li>
      

    </ul>
</div>


<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>