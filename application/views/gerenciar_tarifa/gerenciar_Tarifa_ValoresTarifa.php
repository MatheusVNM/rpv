<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<h2 class="text-center">Histórico de tarifas</h2>

<div class="col-md-10 my-4 mx-auto">
    <div class="card">
        <div class="card-header">
            Novo valor da Tarifa
        </div>
        <?= form_open_multipart('tarifas/update') ?>

        <?= form_hidden('tarifa_id', $tarifaAtual['valores_id_tarifa']); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="valor">Valor da Tarifa</label>
                <input name="valor" id="valor" class=" form-control" type="number" step="0.01" value="<?= $tarifaAtual['valores_valor'] ?>">
            </div>
            <div class="form-group ">
                <label for="date">Data</label>
                <input name="date" type='date' id="date" class="form-control" type="text" disabled value="<?= date('Y-m-d') ?>" />
            </div>
            <div class="form-group">
                <label for="consessao">Consessão</label>
                <div class=" custom-file">
                    <input type="file" class="custom-file-input" id="consessao" name="concessao" required>
                    <label class="custom-file-label" for="consessao">Escolha um arquivo</label>
                    <div class="invalid-feedback">Example invalid custom file feedback</div>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <div class="text-right">
                <button class="btn btn-success">Confirmar</button>
            </div>
        </div>
        </form>
    </div>

</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Valor</th>
            <th scope="col">Data Homologação</th>
            <th scope="col">Status</th>
            <th scope="col">Anexo</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($valores as $valor) : ?>
                                                                                                                <tr class="">
                                                                                                                    <td><?= $valor['valores_valor'] ?></td>
                                                                                                                <td><?= $valor['valores_data_homologacao'] ?></td>
                                                                                                                <td><?php if ($valor['valores_is_vigente'] == true)
                                                                                                                    echo "Vigente";
                                                                                                                else echo "Não Vigente";
                                                                                                                ?>
                                                                                                                </td>
                                                                                                                <td><a target="_blank" class="btn btn-link text-dark btn-hover" href="<?= $valor['valores_anexo'] ?>"><i class="fa fa-download"></i></a></td>
                                                                                                                </tr>
                                                                                                                                                                                                                    <?php endforeach; ?>
    </tbody>
</table>
<!-- Body end -->
<?php
                                                                                                            $this->load->view("footer2.php")
                                                                                                            ?>