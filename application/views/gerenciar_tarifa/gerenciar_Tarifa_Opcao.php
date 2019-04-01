<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<div class="container-fluid flex-shrink-1 d-flex h-100 justify-content-center">
    <div class="col-sm-2 my-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="<?= site_url('dashboard/tarifas/cadastrar')?>" class="btn btn-primary">Cadastrar Nova tarifa</a>
            </div>
        </div>
    </div>
    <div class="col-sm-2 my-auto mx-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="<?= site_url('dashboard/tarifas/listar')?>" class="btn btn-primary">Editar Tarifa</a>
            </div>
        </div>
    </div>
    <div class="col-sm-2 my-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <a href="#" class="btn btn-primary">Cancelar Tarifa</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>