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
        <h4 class="text-center"><b>Editar Categoria</b></h4>
    </div>
    <div class="col-sm-6 mx-auto justify-content-center ">
        <?= $this->session->flashdata('error') ?>
        <div class="card">
            <!-- form aqui -->
            <?= form_open('categorias/passageiros/edit') ?>
            <?= form_hidden('categoriapassageiro_id', $categoria['categoriapassageiro_id'])?>
            <div class="card-body">
                <div class="form-group">
                    <div class="col-auto">
                        <label for="exampleFormControlInput1">Nome Categoria:</label>
                        <input required maxlength="100" name="nome" type="text" class="form-control" id="exampleFormControlInput1"
                            value="<?php echo $categoria['categoriapassageiro_nome'] ?>">
                    </div>
                </div>
                <div class="col-auto">
                    <label for="exampleFormControlInput1">Valor Desconto:</label>
                    <input required name="desconto" type="number" min="0" max="100" step="1" class="form-control" id="desconto"
                        value="<?php echo $categoria['categoriapassageiro_valordesconto'] ?>">
                </div>

                <div class="col-auto">
                    <div class="form-group" id="camposCriterios">
                        <?php $lastInsert=0 ?>
                        <?php foreach($criterios as $umCriterio) :?>
                        <?php if($lastInsert===0) : ?>
                        <div class="my-2 justify-content-between d-flex   ">
                            <label for="exampleFormControlInput1 mb-5">Critérios:</label>

                            <button id="add" type="button" class="btn text-dark mb-2">
                                <i class="fa fa-plus-square my-auto ml-2 fa-2x input-group-icon"></i>
                            </button>
                        </div>
                        <div class="d-flex flex-row align-center my-1 justify-content-center">
                            <input maxlength="255" required type="text" name="criterios[]" class="form-control" id="exampleFormControlInput1" value="<?= $umCriterio['criterios_descricao'] ?>">
                            <a href="" id="add" class="btn text-dark invisible">
                                <i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>
                            </a>
                        </div>
                        <?php else: ?>
                        <div id="crit<?=$lastInsert?>" class="d-flex flex-row align-center my-1 justify-content-center">
                            <input maxlength="255" required type="text" name="criterios[]" class="form-control" id="exampleFormControlInput1"  value="<?= $umCriterio['criterios_descricao'] ?>">
                            <button onclick="deletarCampo('crit<?=$lastInsert ?>')" type="button" id="add"
                                class=" btn btn-hover text-dark">
                                <i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>
                            </button>
                        </div>
                        <?php endif; ?>
                        <?php $lastInsert++?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
            <div class="card-footer text-center">

                <button type="submit" class="btn btn-success h-100-left">Salvar
                </button>
                <a href="<?= site_url('gerenciar_categoria_passageiros_controller') ?>"
                    class="btn btn-danger h-100-right">Cancelar
                </a>

            </div>
            </form>
            <!-- fim do form aqui -->

        </div>
    </div>

</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
var lastInsert = <?= $lastInsert ?> ;
$('#add').click(function() {
    ++lastInsert
    $('#camposCriterios').append(
        '<div id="crit' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input type="text" name="criterios[]" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'crit' + lastInsert +
        '\')"type="button" id="add" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');

});

$("#desconto").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
            if($(this).val()>100){
                $(this).val(100)
            }
            if($(this).val()<0){
                $(this).val(0)
            }
        });
function deletarCampo(campo) {
    $('#' + campo + '').remove();
}
</script>