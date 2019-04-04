<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

<h2 class="text-center">Tarifas</h2>

<div class="text-right my-2"><a href="<?= site_url('dashboard/tarifas/cadastrar') ?>" class="btn btn-info"><i class="fa fa-plus-circle mr-1"></i>Nova Tarifa</a></div>


<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome da tarifa</th>
            <th scope="col">Ultima Atualização</th>
            <th scope="col">Status</th>
            <th scope="col">Opções</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($tarifas as $tarifa) : ?>

        <tr class="">
            <th scope="row"><?= $tarifa['tarifa_codigo'] ?></th>
            <td><?= $tarifa['tarifa_nome'] ?></td>
            <td><?= $tarifa['tarifa_ultimaatt'] ?></td>
            <td><?php if ($tarifa['tarifa_vigente'])
            echo "Vigente";
            else echo "Não Vigente"; ?></td>
            <td>
                <?php $hidden = array('tarifa_id' => $tarifa['tarifa_id']);
                echo form_open('dashboard/tarifas/editar', 'id="formEdit' . $tarifa['tarifa_id'] . '" class="d-none"', $hidden);
                ?>
                <?= form_close() ?>
                <button href="#" form="formEdit<?= $tarifa['tarifa_id'] ?>" type="submit" name="submit" class="btn btn-mini p-1 text-dark"><i class="fa fa-edit fa-2x"></i></button>

                <?php $hidden = array('tarifa_id' => $tarifa['tarifa_id']);
                echo form_open('dashboard/tarifas/trancar', 'id="formTrancar' . $tarifa['tarifa_id'] . '" class="d-none"', $hidden);
                ?>
                <?= form_close() ?>

                <button href="#" form="formTrancar<?= $tarifa['tarifa_id'] ?>" type="submit" name="submit" class="btn btn-mini p-1 text-dark"><i class="fa fa-xing fa-2x"></i></button>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?> 