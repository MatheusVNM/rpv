<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<!--<script>-->
<!--    function getRandomInt(min, max) {-->
<!--        return Math.floor(Math.random() * (max - min + 1) + min);-->
<!--    }-->
<!---->
<!--    function getRandomHour() {-->
<!--        return ("0" + getRandomInt(0, 23)).slice(-2) + ":" + ("0" + getRandomInt(0, 59)).slice(-2);-->
<!--    }-->
<!---->
<!--    var teste = ["Comum", "Leito", "Semi Leito"]-->
<!---->
<!--    function getRandomCat() {-->
<!--        return teste[Math.floor(Math.random() * teste.length)];-->
<!--    }-->
<!--</script>-->


<h2 class="text-center">Compra de Passagem</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row col-md-12 pr-0 mr-0">
    <form id="form_pesquisa" class="row col-md-12 border-secondary rounded mx-auto alert alert-secondary">
        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group"> Origem
            <select required class="selectpicker form-control enableButton" data-live-search="true" id="origem_id">
                <option>Alegrete</option>
                <option>Uruguaiana</option>
                <option>Manoel Viana</option>
                <option>São Chico de Assis</option>
                <option>São Vicente do Sul</option>
                <option>São Pedro do Sul</option>
                <option>Santa Maria</option>
                <option>Julho de Castilhos</option>
                <option>Tupanciretã</option>
                <option>Cruz Alta</option>
                <option>Ijuí</option>
                <option>Santo Angelo</option>
                <option>Giruá</option>
                <option>Santa Rosa</option>
            </select>
        </div>
        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group"> Destino
            <select required class="selectpicker form-control enableButton" data-live-search="true" id="destino_id">
                <option>Alegrete</option>
                <option>Uruguaiana</option>
                <option>Manoel Viana</option>
                <option>São Chico de Assis</option>
                <option>São Vicente do Sul</option>
                <option>São Pedro do Sul</option>
                <option>Santa Maria</option>
                <option>Julho de Castilhos</option>
                <option>Tupanciretã</option>
                <option>Cruz Alta</option>
                <option>Ijuí</option>
                <option>Santo Angelo</option>
                <option>Giruá</option>
                <option>Santa Rosa</option>
            </select>
        </div>

        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group">
            Saída <input id="data_id" required style="min-width: 100%" class="py-2 form-control datepickerinit enableButton" type="date" />
        </div>

        <div class=" col-md-2 col-sm-12 my-auto ml-auto">
            <button disabled type="submit" id="procurarPassagemBtn" class="btn btn-warning mt-2 ">Pesquisar</button>
        </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Hora de Saída</th>
                <th scope="col">Hora de Chegada</th>
                <th scope="col">Tipo de Onibus</th>
                <th scope="col">Cadeiras Disponíveis</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody id="tableBody">
            
            <?php $counter = 1; foreach ($alocacoes as $row) : ?>
                <tr>
                    <th><?=$counter ?></th>
                    <td>
                    <?= $row['alocacaointermunicipal_hora_saida'] ?>
                    </td>
                    <td>
                    <?= $row['alocacaointermunicipal_hora_chegada'] ?>
                    </td>
                    <td>
                    <?= $row['categoriaonibus_nome'] ?>
                    </td>
                    <td>
                    <?= $row['count_cadeiras_livres'] ?>
                    </td>
                    <td><a class="btn btn-primary"><i class="fa fa-rebel"></i> Ver Cadeiras</a></td>
                </tr>
            <?php $counter++; endforeach; ?>
        </tbody>
    </table>
</div>

<?php
$this->load->view("footer2.php", array('js' => 'gerenciar_manutencao'))
?>
<script>
    $(".btn-primary").prop('href', "<?= site_url('view/compra_passagem_online_view/selecao_acento') ?>")
    $(".rndHour").each(function() {
        $(this).html(getRandomHour())
    })
    //                         document.write(getRandomHour())
    $(".rndCat").each(function() {
        $(this).html(getRandomCat())
    })
    // rndCat
    // document.write(getRandomCat())
    $(".rndQntd").each(function() {
        $(this).html(getRandomInt(3, 48))
    })
    // rndQntd
    // document.write(getRandomInt(3, 48))

    var today = new Date().toISOString().split('T')[0];
    $("#searchDate").prop('min', today);

    $(".enableButton").change(function() {
        $("#procurarPassagemBtn").prop('disabled', false);

    })
    $("#form_pesquisa").submit(function(event) {

        $("#procurarPassagemBtn").prop('disabled', true);
        showLoadingModal("Buscando Passanges");
        $("#tableBody").hide();
        setTimeout(function() {
            $(".rndHour").each(function() {
                $(this).html(getRandomHour())
            })
            //                         document.write(getRandomHour())
            $(".rndCat").each(function() {
                $(this).html(getRandomCat())
            })
            // rndCat
            // document.write(getRandomCat())
            $(".rndQntd").each(function() {
                $(this).html(getRandomInt(3, 48))
            })
            closeLoadingModal();
            $("#tableBody").show();
        }, 1200)

        event.preventDefault()
        return false;

    });
</script>