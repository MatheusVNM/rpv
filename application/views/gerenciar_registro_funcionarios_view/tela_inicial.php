<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<div class="d-block">
    <a href="<?= base_url('dashboard') ?>" class="btn btn-hover text-light btn-primary position-absolute">
        <i class="fa fa-arrow-circle-left"></i>
    </a>
    <h2 class="text-center ">Gerenciar registro de funcionários</h2>
</div>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>

