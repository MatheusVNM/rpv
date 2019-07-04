<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<h2 class="text-center">Gerenciar Tarifas de Encomendas</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>


<!-- Table init (Ao abrir a tela) -->
<button type="button" class="btn btn-success float-right mr-2 mb-2" data-toggle="modal" data-target="#modal_create" title="Adicione um novo veículo.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"> </i> Criar Tarifa
        </button>

<div class="table-responsive w-100">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Preço por KG</th>
                <th scope="col">Preço por m³</th>
                <th scope="col">Tipo de calculo</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_tarifa">
            <?php if (!is_null($tarifas)) : ?>
                <?php foreach ($tarifas as $tarifa) : ?>
                    <tr>
                        <th>TFE <?= $tarifa['tarifaencomenda_id'] ?></th>
                        <td><?= $tarifa['tarifaencomenda_nome'] ?></td>
                        <td><?= $tarifa['tarifaencomenda_preco_peso'] ?></td>
                        <td><?= $tarifa['tarifaencomenda_preco_volume'] ?></td>
                        <td>


                            <?php
                            switch ($tarifa['tarifaencomenda_tipocalculo']) {
                                case "multiplicacao":
                                    echo "Multiplicação";
                                    break;
                                case "soma":
                                    echo "Soma";
                                    break;
                                default:
                                    echo "error";
                            }
                            ?>
                        </td>
                        <td>
                            <button onclick="editar(<?= $tarifa['tarifaencomenda_id'] ?>)" type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal" data-placement="top" title="Editar veículo" data-target="#id_modal_edit_veiculo">
                                <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                            </button>
                            <button onclick="info(<?= $tarifa['tarifaencomenda_id'] ?>)" type="button" class="btn btn-primary btn-sm" title="Mais informações sobre o veíuclo." id="id_opcao_visualizar" data-placement="top">
                                <span class="hvr-icon fa fa-info mr-1"></span>Info
                            </button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            <? else : ?>
                <tr>
                    <td colspan="1000" class="text-center">Nenhuma tarifa cadastrada</td>
                </tr>
            <? endif; ?>

        </tbody>
    </table>

</div>

<!-- Modal create veículo -->
<?php $this->load->view("gerenciar_tarifa_encomendas_view/modal_create") ?>

<!-- Modal info veículo -->
<?php $this->load->view("gerenciar_tarifa_encomendas_view/modal_info") ?>


<!-- Modal edit veículo -->
<?php $this->load->view("gerenciar_tarifa_encomendas_view/modal_edit") ?>




<!-- Body end -->
<?php
$this->load->view("footer2.php", array('js' => 'gerenciar_tarifa_encomenda'))
?>
<!-- Script init -->