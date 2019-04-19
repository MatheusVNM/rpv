<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 3/26/2019
 * Time: 12:35 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
$js_array = json_encode($possiveisParadas);
?>


<script type='text/javascript'>
    <?php

    echo "var possiveisparadas = " . $js_array . ";\n";
    ?>
</script>

<!-- Body init -->
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row">

    <div class="col-md-5">
        <div class="infoTrajUrb card">
            <div class="card-header">
                <h4 class="mb-0">Informações do Trajeto</h4>
            </div>
            <div class="card-body">
                <?php $form_open_data = array('id' => 'formTrajetoUrbano', 'onsubmit' => "send_data()"); ?>
                <?= form_open_multipart('trajetos/urbanos/create', $form_open_data) ?>
                <?= form_input(array('name' => 'paradas', 'type' => 'hidden', 'id' => 'hidden')); ?>
                <label for="TempoMédioPerc">Nome do Percurso: </label>
                <input required name="nome" type="text" class="form-control" id="nome">

                <label for="TempoMédioPerc">Tempo médio de percurso (em minutos): </label>
                <input required name="tempomedio" type="number" pattern="\d*" step="1" class="form-control" id="tempomedio">

                <label for="status">Status: </label>
                <select name="status" class="form-control" id="status">
                    <option value="1">Ativo</option>
                    <option value="0">Desativado</option>
                </select>

                <label for="tarifas"> Tarifa: </label>
                <select name="tarifa" class="form-control" id="tarifa">
                    <?php foreach ($tarifas as $tarifa) : ?>
                        <option value="<?= $tarifa['tarifa_id'] ?>"> <?= $tarifa['tarifa_nome'] ?></option>
                    <?php endforeach; ?>
                </select>

                <!-- TODO -->
                <!-- <div class="custom-file my-3">
                    <input type="file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile">Selecione a Concessão</label>
                </div> -->
                <?= form_close() ?>
            </div>
            <div class="card-footer"></div>
        </div>

    </div>

    <div class="possParadas col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Possiveis Paradas</h4>
            </div>
            <div class="card-body">
                <input type="text" class="form-control" id="filter1" placeholder="Filtrar" />
                <div class="overflow-auto mt-2" style="max-height: 75vh">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome</th>
                            </tr>
                        </thead>

                        <tbody id="maintable">
                            <?php
                            $count = 0;
                            foreach ($possiveisParadas as $possivelParada) : ?>
                                <tr id="parada<?= $count ?>">
                                    <td><?= $possivelParada['parada_codigo'] ?></td>
                                    <td><?= $possivelParada['parada_rua'] ?>
                                        ,
                                        <?= $possivelParada['parada_numero'] ?>,
                                        <?= $possivelParada['parada_bairro'] ?>
                                    </td>

                                    <td><button class="btn btn-info" onclick="teste(<?= $count ?>)"> Selecionar </button></td>

                                    <!-- <td>
                                                                                                            <label class="btn btn-secondary">
                                                                                                                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                                                                                                Selecionar Parada
                                                                                                            </label>
                                                                                                        </td>
                                                                                                        <td>
                                                                                                            <button class="btn btn-info">Selecionar como proxima parada</button>
                                                                                                        </td> -->
                                </tr>
                                <?php
                                $count++;
                            endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
</div>

<div class="col-md-12 my-lg-3" style="padding-left: 0">
    <div class="card">
        <div class="card-header">
            <h4 class="mb-0">Paradas Selecionadas</h4>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Filtrar" id="filter2" />
            <div class="overflow-auto" style="height: 30vh">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody id="paradasfeitas">

                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>


<div class="row col-md-12 d-flex justify-content-end mt-3 mb-4">
    <div>
        <button type="submit" form="formTrajetoUrbano" type="button" class="btn btn-success ">Salvar</button>
        <button type="button" class="btn btn-danger ">Cancelar</button>

    </div>
</div>
<div id='teste'></div>





<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
    var paradasSelecionadas = new Array();

    function teste(id) {
        var p = possiveisparadas[id];
        paradasSelecionadas.push(p['parada_id']);
        ids = paradasSelecionadas.length - 1;
        $('#paradasfeitas').append(
            addParada(id, p['parada_codigo'], p['parada_rua'], p['parada_numero'], p['parada_bairro'], p['parada_id'], ids));
        $('#parada' + id + '').remove();

        console.log(paradasSelecionadas)

    };

    function send_data() {
        $('#hidden').val(paradasSelecionadas.toString());
    }

    function removeParada(id, ids) {
        var possivelParada = possiveisparadas[id];
        $('#par' + id + '').remove();
        paradasSelecionadas.splice(paradasSelecionadas.indexOf(id), 1);

        console.log(paradasSelecionadas)
        $('#maintable').append('<tr id="parada' + id + '">' +
            '                <td>' + possivelParada['parada_codigo'] + '</td>' +
            '                <td>' + possivelParada['parada_rua'] +
            ',' + possivelParada['parada_numero'] + ',' +
            '' + possivelParada['parada_bairro'] +
            '                </td>' +

            '                <td><button class="btn btn-info" onclick="teste(' + id + ')"> Selecionar </button></td>' +
            '                </tr>');

    }

    function addParada(n, codigo, rua, numero, bairro, id, ids) {
        return '<tr id="par' + n + '">' +
            '           <td>' + codigo + '</td>' +
            '           <td>' + rua + '</td>' +
            '           <td>' + numero + '</td>' +
            '           <td>' + bairro + '</td>' +
            '           <td class="text-right">' +
            '               <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#" onclick="removeParada(' + n + ',' + ids + ')">' +
            '                   <!-- <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->' +
            '                   <i class="fa fa-2x fa-trash"></i>' +
            '               </a>' +
            '               <!-- <div class="dropdown-menu dropdown-menu-arrow">' +
            '                   <a class="dropdown-item" href="#">Excluir</a>' +
            '               </div> -->' +
            '           </td>' +
            '       </tr>'
    }



    // possiveisparadas.forEach(function(element) {

    // });
</script>
<!-- filters -->
<script>
    $(document).ready(function() {
        $("#filter1").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#maintable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $("#filter2").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#paradasfeitas tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

    });

    $("#tempomedio").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
</script>