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


        <?php foreach($categoriaPassageiros as $categoria) :?>
        <li class="list-group-item font-weight-bold">
            <?php 
        $props = array('id'=> 'formCat'.$categoria['categoriapassageiro_id'], 'class'=>'d-none');
        echo form_open('dashboard/categorias/passageiros/ver-categoria', $props);
        echo form_hidden('categoriapassageiro_id', $categoria['categoriapassageiro_id']);
        echo form_close();
        ?>
            <button class="btn btn-hover" type="submit" form="formCat<?= $categoria['categoriapassageiro_id'] ?>">
                <i
                    class="hrv-icon  "></i><?= $categoria['categoriapassageiro_nome'] ?>
            </button>

            <?php 
        $props = array('id'=> 'formEdit'.$categoria['categoriapassageiro_id'], 'class'=>'d-none');
        echo form_open('dashboard/categorias/passageiros/editar', $props);
        echo form_hidden('categoriapassageiro_id', $categoria['categoriapassageiro_id']);
        echo form_close();
        ?>
            <button class="btn btn-hover  float-right mr-1" type="submit" form="formEdit<?= $categoria['categoriapassageiro_id']?>">
                <i class="fa fa-edit fa-2x"></i>
            </button>

        </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="mx-auto row pt-3 justify-content-end">
    <a href="<?= site_url('dashboard/categorias/passageiros/cadastrar')?>" class="btn btn-success h-100-left"><span
            class="fa fa-plus-circle mr-2 h-100"></span><span class="h-100 text-wrap">
            Adicionar Categoria
        </span>
    </a>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>