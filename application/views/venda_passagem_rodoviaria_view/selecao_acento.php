<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<head>

</head>

<style>
    ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .seats {
        display: flex;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: flex-start;
    }

    .seat {
        display: flex;
        flex: 0 0 25%;
        padding: 5px;
        position: relative;
    }

    .seat input[type=checkbox] {
        position: absolute;
        opacity: 0;
    }

    .seat input[type=checkbox]:checked+label {
        background: #55aaff;
        /* poltrona_selecionada */

        color: white;
        font-weight: bold;
        background: url(<?= base_url('assets/images/poltrona_selecionada_2.gif') ?>);
        background-size: 100% 100%;
        background-repeat: no-repeat;


        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat input[type=checkbox]:disabled+label {
        /* background: #ff5555; */
        color: white;
        font-weight: bold;
        background: url(<?= base_url('assets/images/poltrona_ocupada.gif') ?>);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        text-indent: -9999px;
        overflow: hidden;
    }

    .seat input[type=checkbox]:disabled+label:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
    }

    .seat input[type=checkbox]:disabled+label:hover {
        box-shadow: none;
        cursor: not-allowed;
    }

    .seat label {
        display: block;
        position: relative;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.5rem;
        padding: 4px 0;
        color: white;
        font-weight: bold;
        background: url(<?= base_url('assets/images/poltrona.gif') ?>);
        background-size: 100% 100%;
        background-repeat: no-repeat;
        border-radius: 5px;
    }

    .seat label:hover {
        cursor: pointer;
        box-shadow: 0 0 0px 2px #5C6AFF;
    }
</style>


<?php
// echo_r($cadeirasOcupadas);
// echo_r($alocacao);
$numColunas = $alocacao['onibus_quantidade_fileiras'];
$numPoltronas = $alocacao['onibus_num_lugares'];
?>
<?= "
<style>
.seat{
    flex: 0 0 " . 100 / $numColunas . "%;
}
</style>
"; ?>

<div class="d-block">
    <a href="<?= base_url('dashboard/venda/passagens') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center">Venda de Passagem</h2>
</div>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<?php
function isCadeiraOcupada($nCadeira, $cadeirasOcupadas)
{
    foreach ($cadeirasOcupadas as $cadeiraOcupada) {
        if ($cadeiraOcupada['ocupacaocadeira_numero'] == $nCadeira) {
            // echo 'c'.$nCadeira.'true';
            var_dump("c$nCadeira:true");
            return true;
        } else {
            var_dump("c$nCadeira:false");
        }
    }
    return false;
}
?>
<form id="form_Venda" class="row col-md-12 centered justify-content-center">
    <input type="hidden" name="alocacaointermunicipal_id" value="<?= $alocacao['alocacaointermunicipal_id'] ?>" />
    <input type="hidden" name="rotas_trajetointerurbano_id" value="<?= $alocacao['rotas_trajetointerurbano_id'] ?>" />
    <div class="col-md-6 overflow-auto mr-md-3" style="max-width: 400px">

        <ol class="cabin fuselage">
            <li class="col bg-secondary p-2 rounded-top text-light">
                <center>Frente do Onibus</center>
            </li>
            <?php for ($i = 0; $i < $numPoltronas; $i++) :
                ?>
                <script>
                    console.log("mod", <?= $i % $numColunas ?>)
                </script>
                <? if ($i % $numColunas === 0) echo '<li class="row col seats">' ?>

                <? if ($i % $numColunas == ceil($numColunas / 2) - 1) : ?>
                    <div class="col seat mr-4">
                        <input name='cadeiras[]' value='<?= $i + 1 ?>' <? if (isCadeiraOcupada($i + 1, $cadeirasOcupadas)) : ?>
                            disabled
                        <? endif; ?>
                        type="checkbox" id="Cadeira<?= $i + 1 ?>" />
                        <label for="Cadeira<?= $i + 1 ?>">
                            <p style="z-index:2; position: relative"><?= $i + 1 ?></p>
                        </label>
                    </div>
                <? else : ?>
                    <div class="col seat">
                        <input name='cadeiras[]' value='<?= $i + 1 ?>' <? if (isCadeiraOcupada($i + 1, $cadeirasOcupadas)) : ?>
                            disabled
                        <? endif; ?>
                        type="checkbox" id="Cadeira<?= $i + 1 ?>" />
                        <label for="Cadeira<?= $i + 1 ?>"><?= $i + 1 ?></label>
                    </div>
                <? endif; ?>
                <? if ($i % $numColunas === $numColunas - 1) echo '</li>' ?>


            <?php endfor; ?>

        </ol>
    </div>
    <div class="col-md-5 card">
        <div class="card-body">

            <center>
                <p class="mb-0"><?= $alocacao['cidade_origem'] ?></p>
                <i class="fa fa-arrow-down"></i>
                <p class=""><?= $alocacao['cidade_destino'] ?></p>
            </center>

            <div class="form-row">

                <label>
                    Quantidade Selecionada:
                </label>
                <input type="text" id="countSelected" class="form-control" disabled />
            </div>

            <div class="form-row">

                <label> Preço total:
                </label> <input type="text" id="totalValue" class="form-control" disabled />
                <!-- </div>
            <div class="form-row"> -->

                <label> Preço por cadeira:
                </label> <input type="text" id="valorCadeira" class="form-control" disabled value=" R$<?= $alocacao['precocadeira'] ?>" />


                <label>Forma de Pagamento: </label>
                <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
                    <label class="btn btn-primary active">
                        <input required type="radio" name="fp" value="fp_dinheiro" autocomplete="off" checked> Dinheiro
                    </label>
                    <label class="btn btn-primary">
                        <input required type="radio" name="fp" value="fp_debito" autocomplete="off"> Débito
                    </label>
                    <label class="btn btn-primary">
                        <input required type="radio" name="fp" value="fp_credito" autocomplete="off"> Crédito
                    </label>
                </div>


                <label>Desconto: </label>
                <div class="btn-group btn-group-toggle col-12" data-toggle="buttons">
                    <label class="btn btn-info active">
                        <input required type="radio" name="tipopassagem" value="3" id="desc_total" autocomplete="off" checked> Inteira
                    </label>
                    <label class="btn btn-info">
                        <input required type="radio" name="tipopassagem" value="1" id="desc_meio" autocomplete="off"> Meia
                    </label>
                    <label class="btn btn-info">
                        <input required type="radio" name="tipopassagem" value="2" id="desc_isento" autocomplete="off"> Isenta
                    </label>
                </div>

            </div>

            <div class="form-row mt-2 float-right">
                <button type="submit" class="btn btn-success" id="finishVenda"> Finalizar Venda</button>
            </div>
        </div>
    </div>

</form>

<?php
$this->load->view("footer_cliente.php", array('js' => 'gerenciar_manutencao'))
?>
<!-- <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> -->

<script>
    $(document).ready(function() {})
    var valorCadeiraOriginal = <?= $alocacao['precocadeira'] ?>;
    var valorCadeiraDesconto = <?= $alocacao['precocadeira'] ?>;


    $("input[name='tipopassagem']").change(function() {
        // alert($(this).val())
        switch (parseInt($(this).val())) {
            case 1:
                valorCadeiraDesconto = valorCadeiraOriginal / 2
                break;
            case 2:
                valorCadeiraDesconto = 0
                break;
            case 3:
                valorCadeiraDesconto = valorCadeiraOriginal
                break;
            default:
        }
        $("#valorCadeira").val("R$" + valorCadeiraDesconto);
        $(".seat input[type=checkbox]").trigger('change');
    })
    $("#finishVenda").click(function() {

        console.log(

            $("#form_Venda input.required").filter(function() {
                return !this.value;
            })
        )
    })

    $(".seat input[type=checkbox]").change(function() {
        var countCheckedCheckboxes = $(".seat input[type=checkbox]").filter(':checked').length;
        $('#countSelected').val(countCheckedCheckboxes);
        $('#totalValue').val("R$" + (countCheckedCheckboxes * valorCadeiraDesconto).toFixed(2));

    });
    $("#form_Venda").submit(function(event) {
        // console.log("foi")
        $.ajax({
            data: $("#form_Venda").serialize(),
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('ajax/venda/passagem/vender') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal("Efetuando Venda")
            },
            success: function(result) {
                // console.log($("input[name='fp']").val())
                console.log(result);
                if (result['success'] == true) {
                    var s = "Venda Completa.<br>";
                    s += "Estes são os tickets:"
                    $.each(result['tickets'], function(key, value) {
                        s += "<div class='card shadow p-2 my-3'>" + value + "</div>"
                    })



                    setTimeout(function() {
                        closeLoadingModal()
                        showSuccessModal("Sucesso", s, function() {
                            document.location.href = "/rpv/dashboard/venda/passagens";
                        })
                    }, 1500)
                } else {
                    setTimeout(function() {
                        closeLoadingModal()
                        showErrorModal("Ops", "Verifique se preencheu tudo corretamente")
                    }, 500)
                }



                // alert('success')
                // showSuccessModal("success", "success")
                // console.log(result)
            },
            error: function(error) {
                // alert('error')
                (setTimeout(function() {
                    closeLoadingModal()
                    // showErrorModal("Ops!", "Algum erro aconteceu. Tente novamente mais tarde. Se o erro persistir, contate o técnico do sistema");
                    showErrorModal("Ops!", "<p class='text-left'>" +
                        error.responseText +
                        "</p>");
                }, 500))
                console.log(error)
            },
            complete: function() {

            }
        });


        event.preventDefault();
        return false;
    })
</script>