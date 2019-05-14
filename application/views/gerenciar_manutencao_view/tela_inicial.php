<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Manuntenções</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row col-md-12 pr-0">

    <div class="form-group col-md-3 ">
        <label for="inputStatus">Filtrar</label>
        <select id="idInputStatus" class="form-control" name="opcoesFiltros">
            <option value="-1">Todos</option>
            <option value="Em Manutenção">Em Manutenção</option>
            <option value="Finalizado">Finalizado</option>
            <option value="2">Ocultados</option>
        </select>
    </div>

    <button type="button" class="btn btn-success ml-auto  mt-auto mb-2 h-50" data-toggle="modal" data-target="#modal_create_manutencao" title="Adicione uma nova manutenção.">
        <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom"></i> Nova Manutenção
    </button>

</div>
<!-- Table init (Ao abrir a tela) -->
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Onibus</th>
            <th scope="col">Data Inicio</th>
            <th scope="col">Data Fim</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <!--Body Manutenções-->
    <tbody id="id_lista_manutencoes">
        <?php if ($manutencao) : ?>
            <?php foreach ($manutencao as $row) : ?>
                <tr>
                    <td><?= $row['onibus_placa'] ?></td>
                    <td><?= $row['manutencao_dataInicio'] ?></td>
                    <td><?= $row['manutencao_dataFim'] ?></td>
                    <td><?php if ($row['manutencao_is_finalizada'] == 0) : echo "Em progresso" ?>
                        <?php elseif ($row['manutencao_is_finalizada'] == 1) : echo "Finalizada" ?>
                        </td>
                    <?php endif; ?>
                    <td>
                        <button onclick="editar(<?= $row['manutencao_id'] ?>)" type="button" class="btn btn-warning btn-sm" id="id_edit_manutencao" data-placement="top" title="Editar Manutenção">
                            <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                        </button>

                        <button onclick="info(<?= $row['manutencao_id'] ?>)" type="button" class="btn btn-primary btn-sm" title="Informação da Manutenção" id="id_info_manutencao" data-toggle="modal" data-placement="top" target="_blank" data-target="#modal_info_manutencao">
                            <span class="hvr-icon fa fa-info mr-1"></span>Info
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan=100 class="text-bold text-center"> Nenhuma Manutenção Encontrada</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Table end (Ao abrir a tela) -->

<!-- Modal create manutencao init-->
<div class="modal fade" id="modal_create_manutencao" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Manutenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_create_manutencao_form" class="needs-validation container" novalidate>
                <div class="modal-body ">
                    <div id="modal_create_warning">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Placa</label>
                            <select class="form-control" name="onibus_id" id="modal_create_placa" required>
                                <option disabled selected value>Selecione a Placa do Ônibus</option>
                                <?php foreach ($onibus as $row) : ?>
                                    <option value=<?= $row['onibus_id'] ?>><?= $row['onibus_placa'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <input name="manutencao_valor" type="text" maxlength="6" min="0" max="9999" class="form-control numbers-only" id="id_create_valor" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datainiciomanutencao">Data Inicio</label>
                            <input name="manutencao_dataInicio" type="date" id="id_create_dataInicio" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="datafimmanutencao">Data Finalização</label>
                            <input name="manutencao_dataFim" type="date" id="id_create_dataFim" class="form-control" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <textarea name="manutencao_descricao" type="text" maxlength="255" min="0" max="9999" class="form-control alphanumeric-only" id="id_create_descricao" required></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="id_create_SalvarManutencao">Salvar</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!--  Modal create manutenção end -->


<!-- Modal edit Manutenção Init -->
<div class="modal fade" id="modal_edit_manutencao" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Manutenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="modal_edit_manutencao_form" class="needs-validation container" novalidate>
                <input type="hidden" name="manutencao_id" id="form_edit_manutencao_id" value="" />
                <div class="modal-body ">
                    <div id="modal_create_warning">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Placa</label>
                            <select disabled class="form-control" id="modal_edit_placa">
                                <option disabled selected value>Selecione a Placa do Ônibus</option>
                                <?php foreach ($onibus as $row) : ?>
                                    <option value=<?= $row['onibus_id'] ?>><?= $row['onibus_placa'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <input name="manutencao_valor" type="text" maxlength="6" min="0" max="9999" class="form-control numbers-only" id="modal_edit_valor" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datainiciomanutencao">Data Inicio</label>
                            <input type="date" id="modal_edit_dataInicio" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="datafimmanutencao">Data Finalização</label>
                            <input name="manutencao_dataFim" type="date" id="modal_edit_dataFim" class="form-control" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <textarea name="manutencao_descricao" type="text" maxlength="255" min="0" max="9999" class="form-control alphanumeric-only" id="modal_edit_descricao" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="manutencao_is_finalizado" class="form-control">
                                <option value="0">Em Processo</option>
                                <option value="1">Finalizado</option>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" id="id_edit_SalvarManutencao">Salvar</button>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- Modal edit manutenção end -->


<!-- Modal info Manutenção Init -->
<div class="modal fade" id="modal_info_manutencao" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Informações da Manutenção</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body ">
                    <div id="modal_create_warning">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Placa</label>
                            <select disabled class="form-control" id="modal_info_placa">
                                <option disabled selected value>Selecione a Placa do Ônibus</option>
                                <?php foreach ($onibus as $row) : ?>
                                    <option value=<?= $row['onibus_id'] ?>><?= $row['onibus_placa'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="valordamanutencao">Valor da Manutenção</label>
                            <input name="manutencao_valor" type="text" maxlength="6" min="0" max="9999" class="form-control numbers-only" id="modal_info_valor" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="datainiciomanutencao">Data Inicio</label>
                            <input type="date" id="modal_info_dataInicio" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="datafimmanutencao">Data Finalização</label>
                            <input name="manutencao_dataFim" type="date" id="modal_info_dataFim" class="form-control" disabled>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="descricaodamanutencao">Descrição do Problema</label>
                            <textarea disabled name="manutencao_descricao" type="text" maxlength="255" min="0" max="9999" class="form-control alphanumeric-only" id="modal_info_descricao" required></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select disabled name="manutencao_is_finalizado" class="form-control">
                                <option value="0">Em Processo</option>
                                <option value="1">Finalizado</option>
                            </select>
                        </div>
                    </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
        </div>
    </div>
</div>
<!-- Modal info manutenção end -->

<!-- Script init -->
<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>

<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $('.alert').alert();
    });
</script>
<!-- Script end -->


<!-- Body end -->
<?php
$this->load->view("footer2.php", array('js' => 'gerenciar_manutencao'))
?>