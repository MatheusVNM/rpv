<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header_cliente");
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

<div class="d-block">
    <a href="<?= base_url('clientes') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center ">Compra de Passagem</h2>
</div>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row col-md-12 pr-0 mr-0">
    <form id="form_pesquisa" class="row col-md-12 border-secondary rounded mx-auto alert alert-secondary">
        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group"> Origem
            <select required class="selectpicker form-control enableButton" data-live-search="true" id="origem_id" name="origem_id">
                <option disabled selected>Selecione uma cidade</option>
                <? foreach ($cidades as $row) : ?>
                    <option value="<?= $row['cidade_id'] ?>"><?= $row['cidade_nome'] ?> - <?= $row['estado_uf'] ?></option>
                <? endforeach; ?>
            </select>
        </div>
        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group"> Destino
            <select required class="selectpicker form-control enableButton" data-live-search="true" id="destino_id" name="destino_id">
                <option disabled selected>Selecione uma cidade</option>

                <? foreach ($cidades as $row) : ?>

                    <option value="<?= $row['cidade_id'] ?>"><?= $row['cidade_nome'] ?> - <?= $row['estado_uf'] ?></option>
                <? endforeach; ?>
            </select>
            </select>
        </div>

        <div class="form-group col-md  px-1 d-flex flex-column align-center form-group">
            Saída <input required style="min-width: 100%" class="py-2 form-control datepickerinit enableButton" type="date" id="data" name="data" />
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
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
    </table>
</div>

<?php
$this->load->view("footer_cliente.php", array('js' => 'gerenciar_manutencao'))
?>

<script>
    $("#procurarPassagemBtn").click(function() {
        $.ajax({
            data: $("#form_pesquisa").serialize(),
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('ajax/comprar_passagem/onibus') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal("Buscando")
                $("#tableBody").hide();
                $("#tableBody").empty();
            },
            success: function(result) {
                if (result['success'] == true) {
                    let linha = 1;
                    $.each(result['alocacoes'], function(key, alocacao) {
                        createLinhaAlocacao(key + 1, alocacao['alocacaointermunicipal_hora_saida'], alocacao['alocacaointermunicipal_hora_chegada'], alocacao['categoriaonibus_nome'], alocacao['count_cadeiras_livres'], alocacao['precocadeira'], alocacao['alocacaointermunicipal_id'])
                        // console.log("alocacao", alocacao)
                        linha++
                    });
                } else {
                    // showErrorModal("Não Encontrado", "Nenhuma viagem marcada entre essas cidades nesta data");
                    $("#tableBody").append("<td colspan='100' class='text-center'>Nenhuma viagem encontrada</td>");

                }
                // alert('success')
                // showSuccessModal("success", "success")
                // console.log(result)
            },
            error: function(error) {
                // alert('error')
                showErrorModal("Ops!", "Algum erro aconteceu. Tente novamente mais tarde. Se o erro persistir, contate o técnico do sistema");

                console.log(error)
            },
            complete: function() {
                (setTimeout(function() {
                    closeLoadingModal()
                    $("#tableBody").show();
                }, 500))
            }
        });
    });


    function createLinhaAlocacao(numLinha, horaSaida, horaChegada, tipo, c_restantes, precocadeira, idAlocacao) {
        let tr = document.createElement("tr")
        let th = document.createElement("th")
        let td1 = document.createElement("td")
        let td2 = document.createElement("td")
        let td3 = document.createElement("td")
        let td4 = document.createElement("td")
        let td5 = document.createElement("td")
        let td6 = document.createElement("td")
        let a = document.createElement("button")
        let i = document.createElement("i")
        th.append(numLinha);
        let dateSaida = new Date(horaSaida)
        td1.append(("0" + dateSaida.getHours()).slice(-2) + ":" + ("0" + dateSaida.getMinutes()).slice(-2))
        let dateChegada = new Date(horaChegada)
        td2.append(("0" + dateChegada.getHours()).slice(-2) + ":" + ("0" + dateChegada.getMinutes()).slice(-2))
        td3.append(tipo)
        td4.append(c_restantes)
        td5.append(("R$" + parseFloat(precocadeira).toFixed(2)).replace(".", ","))

        //todo append a invisible form with hidden field to *td6*
        $("<form method='POST' action='<?= base_url('clientes/compra_passagem/selecao_acento')?>'id='form_aloc"+idAlocacao+"' class='d-none'><input type='hidden' name='alocacaointermunicipal_id' value='"+idAlocacao+"' /></form>").appendTo(td6)
        
        $(a).addClass("btn btn-primary")
        $(a).attr("form","form_aloc"+idAlocacao)
        $(i).addClass("fa fa-rebel")

        a.append(i)
        a.append(" Ver Cadeiras")


        td6.append(a)

        tr.append(th, td1, td2, td3, td4, td5, td6)
        $("#tableBody").append(tr);
    }
</script>

<script>
    var today = new Date().toISOString().split('T')[0];
    $("#searchDate").prop('min', today);

    $(".enableButton").change(function() {
        if ($("#origem_id").val() != "" && $("#destino_id").val() != "" && $("#data").val() != "")
            $("#procurarPassagemBtn").prop('disabled', false);

    })
    $("#form_pesquisa").submit(function(event) {

        $("#procurarPassagemBtn").prop('disabled', true);
        showLoadingModal("Buscando Passagens");

        event.preventDefault()
        return false;

    });
</script>