<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header_cliente");
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
echo_r($alocacao);
echo_r($this->session->userdata('dados'));
$numColunas = $alocacao['onibus_quantidade_fileiras'];
$numPoltronas = $alocacao['onibus_num_lugares'];
if ($this->session->userdata('dados')['tipo_passagem_id'] == 1) {
    $precocadeira = $alocacao['precocadeira'] / 2;
} elseif ($this->session->userdata('dados')['tipo_passagem_id'] == 2) {
    $precocadeira = 0;
} else
    $precocadeira = $alocacao['precocadeira'];
?>
<?= "
<style>
.seat{
    flex: 0 0 " . 100 / $numColunas . "%;
}
</style>
"; ?>

<h2 class="text-center">Compra de Passagem</h2>
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
<form id="form_compra" class="row col-md-12 centered justify-content-center">
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

            <!--                     
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira2" />
                            <label for="Cadeira2">2</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira3" />
                            <label for="Cadeira3">3</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira4" />
                            <label for="Cadeira4">4</label>
                        </div>

                        </li>

                    <li class="row col seats">
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira5" />
                            <label for="Cadeira">5</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira6" />
                            <label for="Cadeira6">6</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="Cadeira7" />
                            <label for="Cadeira7">2C</label>
                        </div>
                        <div class="col seat">
                            <input type="checkbox" id="2D" />
                            <label for="2D">2D</label>
                        </div>
                    </li> -->
        </ol>
    </div>
    <div class="col-md-5 card">
        <div class="card-body">

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
                </label> <input type="text" id="valorCadeira" class="form-control" disabled value=" R$<?= $precocadeira ?>" />
                <label>Forma de Pagamento: </label>
                <select class="form-control" id="metodos_pagamentos">
                    <option value="credit">
                        Cartão de crédito
                    </option>
                    <option value="debit">
                        Cartão de debito
                    </option>
                    <option value="points">
                        Pontos
                    </option>
                </select>

                <div class="credit-card-input no-js col-12" id="pontos">
                    <label>Pontos Necessários</label>
                    <input disabled class="form-control" type="text" value="<?= $precocadeira * 1000 ?>">

                    <label>
                        Seus pontos
                    </label>
                    <input disabled class="form-control" type="text" value="<?= $pontos ?>">
                    <div class="alert alert-danger">
                        Você não possui pontos suficientes
                    </div>
                </div>
                <div class="credit-card-input no-js   col-12" id="debit_card">
                    <label for="cc_type">Banco</label>
                    <select class="form-control" name="cc_type">
                        <option value="visa">Banco do Brasil</option>
                        <option value="discover">Bradesco</option>
                        <option value="mastercard">Santander</option>
                        <option value="maestro">Caixa</option>
                        <option value="jcb">Itau</option>
                        <option value="unionpay">Banrisul</option>
                        <option value="amex">Sicredi</option>
                        <option value="dinersclubintl">Nubank</option>
                        <option value="dinersclubintl">Intermedium</option>
                        <option value="dinersclubintl">Next</option>
                        <option value="dinersclubintl">Neon</option>
                        <option value="dinersclubintl">Agibank</option>
                        <option value="dinersclubintl">Banco Modal</option>
                    </select>
                    <label>Agencia</label>
                    <input class="form-control numbers-only" id="dc_agen" type="text" placeholder="0001" minlength="4" maxlength="4" size="4">
                    <label>Conta</label>
                    <input class="form-control numbers-only" id="dc_conta" type="text" placeholder="XXXX XXXX XXXX XXXX" minlength="4" maxlength="10" size="10">
                    <label>Digito</label>
                    <input class="form-control numbers-only" id="dc_digit" type="text" placeholder="1" maxlength="1" size="1">
                </div>
                <div class="credit-card-input no-js col-12" id="credit_card">
                    <label for="cc_type">Bandeira</label>
                    <select class="form-control" name="cc_type">
                        <option value="visa">Visa</option>
                        <option value="discover">Discover</option>
                        <option value="mastercard">MasterCard</option>
                        <option value="maestro">Maestro</option>
                        <option value="jcb">JCB</option>
                        <option value="unionpay">China UnionPay</option>
                        <option value="amex">American Express</option>
                        <option value="dinersclubintl">Diners Club</option>
                    </select>
                    <label for="cc_number">Numero do Cartao</label>
                    <input class="form-control numbers-only" type="text" name="cc_number" id="cc_number" placeholder="XXXX XXXX XXXX XXXX" maxlength="19" size="19">
                    <label for="cc_exp_month">Mes Expiracao</label>
                    <input class="form-control numbers-only" type="text" name="cc_exp_month" id="cc_expmonth" placeholder="00" size="2" maxlength="2">
                    <label for="cc_exp_year">Ano Expiracao</label>
                    <input class="form-control numbers-only" type="text" name="cc_exp_year" id="cc_expyear" placeholder="00" size="4" maxlength="4">
                    <label for="cc_name">Nome no Cartao</label>
                    <input class="form-control letters-only" type="text" name="cc_name" id="cc_name" placeholder="John Doe">
                    <label for="cc_cvc">CVC</label>
                    <input class="form-control numbers-only" type="text" name="cc_cvc" id="cc_cvc" placeholder="***" maxlength="3" size="3">
                </div>
            </div>

            <div class="form-row mt-2 float-right">
                <button type="submit" class="btn btn-success" id="finishCompra"> Finalizar Compra</button>
            </div>
        </div>
    </div>

</form>

<?php
$this->load->view("footer_cliente.php", array('js' => 'gerenciar_manutencao'))
?>
<!-- <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> -->

<script>
    $(document).ready(function() {
        $("#metodos_pagamentos").val("credit")
        $("#metodos_pagamentos").change()
        $("#cc_exp_month").mask(00)
        $("#cc_exp_year").mask(0000)
    })
    $("#metodos_pagamentos").change(function() {
        switch ($(this).val()) {
            case "credit":
                $("#credit_card").show()
                $("#debit_card").hide()
                $("#pontos").hide()
                $("#finishCompra").prop("disabled", false)


                $("#dc_agen").removeAttr("required");
                $("#dc_conta").removeAttr("required");
                $("#dc_digit").removeAttr("required");

                $("#cc_number").attr("required", true)
                $("#cc_expmonth").attr("required", true)
                $("#cc_expyear").attr("required", true)
                $("#cc_name").attr("required", true)
                $("#cc_cvc").attr("required", true)




                break;
            case "debit":
                $("#credit_card").hide()
                $("#debit_card").show()
                $("#pontos").hide()
                $("#finishCompra").prop("disabled", false)

                $("#dc_agen").prop("required", true);
                $("#dc_conta").prop("required", true);
                $("#dc_digit").prop("required", true);

                $("#cc_number").removeAttr("required")
                $("#cc_expmonth").removeAttr("required")
                $("#cc_expyear").removeAttr("required")
                $("#cc_name").removeAttr("required")
                $("#cc_cvc").removeAttr("required")



                break;
            case "points":
                $("#credit_card").hide()
                $("#debit_card").hide()
                $("#pontos").show()
                $("#finishCompra").prop("disabled", true)

                break;
            default:
                $("#credit_card").show()
                $("#debit_card").hide()
                $("#pontos").hide()
                $("#finishCompra").prop("disabled", false)
                break;
        }
    })
    $("#finishCompra").click(function() {



        console.log(

            $("#form_compra input.required").filter(function() {
                return !this.value;
            })
        )
    })

    $(".seat input[type=checkbox]").change(function() {
        var countCheckedCheckboxes = $(".seat input[type=checkbox]").filter(':checked').length;

        $('#countSelected').val(countCheckedCheckboxes);
        $('#totalValue').val("R$" + (countCheckedCheckboxes * <?= $precocadeira ?>).toFixed(2));
    });
    $("#form_compra").submit(function(event) {
        console.log("foi")
        $.ajax({
            data: $("#form_compra").serialize(),
            type: "POST",
            enctype: 'multipart/form-data',
            url: "<?= base_url('ajax/comprar_passagem/comprar') ?>",
            dataType: "json",
            beforeSend: function() {
                showLoadingModal("Efetuando Compra")
            },
            success: function(result) {
                console.log(result);
                if (result['success'] == true) {
                    var s = "Você comprou suas passagens.<br>";
                    s += "Salve os numeros dos tickets e leve até a rodoviaria para efetuar a impressão:"
                    $.each(result['tickets'], function(key, value) {
                        s += "<div class='card shadow p-2 my-3'>" + value + "</div>"
                    })

                    setTimeout(function() {
                        closeLoadingModal()
                        showSuccessModal("Sucesso", s, function() {
                            document.location.href = "/rpv/clientes";
                        })
                    }, 1500)
                } else {
                    setTimeout(function() {
                        closeLoadingModal()
                        showErrorModal("Ops", "Algo de errado n deu certo")
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
                    showErrorModal("Ops!", "Algum erro aconteceu. Tente novamente mais tarde. Se o erro persistir, contate o técnico do sistema");
                }, 500))
                // showErrorModal("Ops!", "<p class='text-left'>" +
                //     error.responseText +
                //     "</p>");
                console.log(error)
            },
            complete: function() {

            }
        });


        event.preventDefault();
        return false;
    })
</script>