<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<h2 class="text-center">Lista de Veículos</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row pb-1">
    <div class="col-md-9 row">
        <div class="col-md-3">
            <label for="filter_estados">Frota:</label>
            <select id="filter_municipal" class="form-control custom-select ">
                <option selected value=""> Todos</option>
                <option value="Municipal"> Municipal</option>
                <option value="Intermunicipal"> Intermunicipal </option>
            </select>
        </div>
        <div class="col-md-3 flex-column" id="container_filter_estados" style="display: none">
            <label for="filter_estados">Estado:</label>
            <select id="filter_estados" class="form-control custom-select">
                <option disabled selected value>Seleciona um Estado</option>
                <?php foreach ($estados as $row) : ?>
                    <option value=<?= $row['estado_id'] ?>><?= $row['estado_nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3 flex-column" id="container_filter_cidades" style="display: none">
            <label for="filter_cidades">Cidade:</label>
            <select id="filter_cidades" class="form-control custom-select">
                <option disabled selected value>Seleciona um estado para listar as cidades</option>

            </select>
        </div>

        <div class="col-md-3 flex-column" id="container_filter_tipo" style="display: none">
            <label for="filter_estados">Tipo:</label>
            <select id="filter_tipo" class="form-control custom-select">
                <option disabled selected value>Seleciona uma categoria</option>
                <?php foreach ($categoriaonibus as $row) : ?>
                    <option value=<?= $row['categoriaonibus_nome'] ?>><?= $row['categoriaonibus_nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-3 mt-auto">
            <button disabled id="filter_filter" type="button" class=" btn btn-secondary">Filtrar</button>
        </div>

    </div>
    <div class="col-md-3 mt-auto">
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal" data-target="#id_modal_create_veiculo" title="Adicione um novo veículo.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"> </i> Adicionar veículo
        </button>
    </div>
</div>

<!-- Table init (Ao abrir a tela) -->
<div class="table-responsive w-100">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa do Veículo</th>
                <th scope="col">Ano</th>
                <th scope="col">Status</th>
                <th scope="col">Cidade</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_frota">
            <?php foreach ($frota as $onibus) : ?>
                <tr>
                <th><?= $onibus['onibus_numero'] ?></th>
                    <td><?= $onibus['onibus_placa'] ?></td>
                    <td><?= $onibus['onibus_ano_fab'] ?></td>
                    <td>
                        <?php if (!$onibus['onibus_is_ativo']) {
                            echo "Inativo";
                        } else {
                            if ($onibus['onibus_em_manutencao']) {
                                echo "Em manutenção";
                            } else {
                                echo "Ativo";
                            }
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($onibus['onibus_cidade']) {
                            echo $onibus['cidade_nome'];
                        } else {
                            echo "Intermunicipal";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($onibus['onibus_categoria_intermunicipal']) {
                            echo $onibus['categoriaonibus_nome'];
                        } else {
                            echo "---";
                        }
                        ?>
                    </td>
                    <td>
                        <button onclick="editar()" type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal" data-placement="top" title="Editar veículo" data-target="#id_modal_edit_veiculo">
                            <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                        </button>
                        <button onclick="ocultar()" type="button" class="btn btn-danger btn-sm" title="Ocultar da lista" id="id_opcao_ocultar" data-toggle="tooltip" data-placement="top" target="_blank">
                            <span class="hvr-icon fa fa-trash mr-1"></span>Ocultar
                        </button>
                        <button onclick="info()" type="button" class="btn btn-primary btn-sm" title="Mais informações sobre o veíuclo." id="id_opcao_visualizar" data-toggle="tooltip" data-placement="top">
                            <span class="hvr-icon fa fa-info mr-1"></span>Info
                        </button>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>

<!-- Modal create veículo -->
<?php $this->load->view("gerenciar_frota_view/modal_create") ?>

<!-- Modal info veículo -->
<?php $this->load->view("gerenciar_frota_view/modal_info") ?>


<!-- Modal edit veículo -->
<?php $this->load->view("gerenciar_frota_view/modal_edit") ?>




<!-- Body end -->
<?php
$this->load->view("footer2.php", array('js' => 'gerenciar_frota'))
?>
<!-- Script init -->