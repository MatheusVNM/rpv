<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
    <!-- Body init -->
    <div class="row">
    <div class="trajetos_exist col-md-12">
        <div class="card">
            <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0 justify-content-center">Categorias Onibus Intermunicipais</h3>
            </div>
            <div class="card-body">
                <input id="id_form" name="name_form" type="text" class="form-control" placeholder="Filtrar"/>
                <div class="overflow-auto mt-2" style="max-height: 75vh">
                    <table id="tableParadas"
                           class="table table-striped table-bordered table-hover align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de Ônibus</th>
                            <th>Preço por KM</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cat_onibus as $row) : ?>
                            <td><?= $row['catOnibus_codigo'] ?></td>
                            <td><?= $row['catOnibus_nome'] ?></td>
                            <td><?= "R$ ".$row['catOnibus_precokm']  ?></td>
                            <td><?php if ($row['catOnibus_status'] == 1): echo "Ativa" ?>
                            <?php elseif ($row['catOnibus_status'] == 0): echo "Inativa" ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?= form_open('gerenciar_categoria_onibus_controller\editarTipoOnibus', 'class="d-none" id = "form_edit' . $row['catOnibus_id'] . '"') ?>
                                <?= form_hidden('id', $row['catOnibus_id']) ?>
                                <?= form_close(); ?>

                                <button form="form_edit<?= $row['catOnibus_id'] ?>" class="text-dark btn btn-hover">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <?= form_open('gerenciar_categoria_onibus_controller\alterarStatusTipoOnibus', 'class="d-none" id = "form_active' . $row['catOnibus_id'] . '"') ?>
                                <?= form_hidden('id', $row['catOnibus_id']) ?>
                                <?= form_close(); ?>
                                <button form="form_active<?= $row['catOnibus_id'] ?>" class="text-dark btn btn-hover">
                                    <i class="fa fa-adjust"></i>
                                </button>

                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class='d-flex justify-content-end mt-2'>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#ModalTipoOnibus">
                        Nova categoria de ônibus
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ModalTipoOnibus" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informações do Tipo do Ônibus</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('gerenciar_categoria_onibus_controller/criarTipoOnibus', array('id' => 'tipoOnibus_form')) ?>
                        <div class="col-md-6 ml-3 mb-2">
                            <label for="id_nome" class="mb-1">Tipo de Ônibus:</label>
                                <input id="id_nome" name="name_nome" type=text class="form-control">
                            <label for="id_precokm" class="mb-1">Preco por KM:</label>
                                <input id="id_precokm" name="name_precokm" type="text" class="form-control">
                            <?= form_close() ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Fechar
                            </button>
                            <button type="submit" form="tipoOnibus_form" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Body end -->
<?php
$this->load->view("footer2.php")
?>