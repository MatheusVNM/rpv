<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
    <!-- Body init -->
    <div class="row">
    <div class="trajetos_exist col-md-12">
        <div class="card">
            <div class="card-header border-0 d-flex justify-content-between">
                <h3 class="mb-0 justify-content-center">Categoria Urbanas</h3>
            </div>
            <div class="card-body">
                <input id="id_form" name="name_form" type="text" class="form-control" placeholder="Filtrar"/>
                <div class="overflow-auto mt-2" style="max-height: 75vh">
                    <table id="tableParadas"
                           class="table table-striped table-bordered table-hover align-items-center table-flush">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo de Veículo</th>
                            <th>Preço por KM</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($onibus as $row) : ?>
                            <td><?= $row['catOnibus_codigo'] ?></td>
                            <td><?= $row['catOnibus_bairro'] ?></td>
                            <td><?= $row['catOnibus_rua'] ?></td>
                            <td><?php if ($row['catOnibus_status'] == 1): echo "Ativa" ?>
                            <?php elseif ($row['catOnibus_status'] == 0): echo "Inativa" ?>
                                </td>
                            <?php endif; ?>
                            <td>
                                <?= form_open('paradas_controller\editarParada', 'class="d-none" id = "form_edit' . $row['parada_id'] . '"') ?>
                                <?= form_hidden('id', $row['parada_id']) ?>
                                <?= form_close(); ?>

                                <button form="form_edit<?= $row['parada_id'] ?>" class="text-dark btn btn-hover">
                                    <i class="fa fa-edit"></i>
                                </button>

                                <?= form_open('paradas_controller\statusParada', 'class="d-none" id = "form_active' . $row['parada_id'] . '"') ?>
                                <?= form_hidden('id', $row['parada_id']) ?>
                                <?= form_close(); ?>
                                <button form="form_active<?= $row['parada_id'] ?>" class="text-dark btn btn-hover">
                                    <i class="fa fa-adjust"></i>
                                </button>

                            </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class='d-flex justify-content-end'>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#ModalParada">
                            Criar Parada
                        </button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="ModalParada" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Informações da Parada</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('paradas_controller/criarParada', array('id' => 'paradas_form')) ?>
                        <div class="ml-3 mb-2">
                            <label for="bairro">Bairro:
                                <input id="id_bairro" name="name_bairro" type=text class="form-control"></label><br>
                            <label for="rua">Rua/Avenida:
                                <input id="id_rua" name="name_rua" type="text" class="form-control"></label><br>
                            <label for="numero">Número:
                                <input id="id_nmr" name="name_nmr" type="text" class="form-control"></label><br>
                            <?= form_close() ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                Fechar
                            </button>
                            <button type="submit" form="paradas_form" class="btn btn-primary">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row col-md-12 d-flex justify-content-end mt-3 mb-4">
            <div>
                <button type="button" class="btn btn-success ">Salvar</button>
                <button type="button" class="btn btn-danger ">Cancelar</button>
            </div>
        </div>
    </div>

    <!-- Body end -->
<?php
$this->load->view("footer2.php")
?>