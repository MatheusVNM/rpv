<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
<!-- Body init -->
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<div class="col-md-12">
    <div class="card">
        <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0 justify-content-center">Trajetos Urbanos</h3>
            <div>
                <a href="<?= site_url('dashboard/trajetos/urbanos/cadastrar') ?>" class="btn text-dark btn-icon-only text-dark d-flex align-center">
                    <i class="fa fa-plus-circle fa-2x mr-2"> </i>
                    <h3>Criar Rota</h3>
                </a>
            </div>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Filtrar" />
            <div class="overflow-auto mt-2" style="max-height: 75vh">
                <table class="table table-striped table-bordered table-hover align-items-center table-flush">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tarifa</th>
                            <th>Tempo Médio</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    
                    <tbody>

                        <?php foreach ($trajetos as $trajeto) : ?>

                            <tr>
                                <td><?= $trajeto['trajetourbano_id'] ?></td>
                                <td><?= $trajeto['trajetourbano_nome'] ?></td>
                                <td><?= $trajeto['trajetourbano_nome_tarifa'] ?></td>
                                <td><?= $trajeto['trajetourbano_tempomedio'] ?></td>
                                
                                <td><?php
                                    if ($trajeto['trajetourbano_isativo'])
                                        echo 'Ativo';
                                    else
                                        echo 'Inativo';

                                    ?>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#">Desativar</a>
                                        <a class="dropdown-item" href="#">Ativar</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- <tr>
                                    <td>00001</td>
                                    <td>Terminal 1</td>
                                    <td>Centro</td>
                                    <td>1h</td>
                                    <td>Ativo</td>
                                    <td>
                                        <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Editar</a>
                                            <a class="dropdown-item" href="#">Excluir</a>
                                            <a class="dropdown-item" href="#">Desativar</a>
                                            <a class="dropdown-item" href="#">Ativar</a>
                                        </div>
                                    </td>
                                </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>








<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>