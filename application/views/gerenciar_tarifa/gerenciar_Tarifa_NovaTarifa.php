<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<?= form_open('tarifas/create') ?>
<div class="container-fluid flex-shrink-1 d-flex justify-content-left">
    <div class="col-sm-5 ml-md-auto">
        <div class="card">
            <div class="card-header">
                Dados do Administrador Local
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="col-auto">
                            <label for="exampleFormControlInput1">Nome do Administrador:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1" value=" <?= $this->session->userdata('username') ?>">

                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CPF:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1" value=" <?= $this->session->userdata('cpf') ?>">

                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Identidade:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1" value=" <?= $this->session->userdata('identidade') ?>">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data de Criação:</label>
                            <input type="date" class="form-control" disabled id="exampleFormControlInput1" value="<?= date('Y-m-d'); ?>">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Hora de Criação:</label>
                            <input type="time" class="form-control" disabled id="exampleFormControlInput1" placeholder="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-5 mr-md-auto">
        <?= form_open_multipart('tarifas/create') ?>
        <div class="card">
            <div class="card-header">
                Dados da Tarifa
            </div>
            <div class="card-body">

                <div class="col-auto my-2">
                    <label for="name">
                        Nome da tarifa:
                    </label>
                    <input placeholder="Ex: Tarifa Urbana Leste" type="text" class="form-control" name="name" id="name" />
                </div>
                <div class="col-auto my-2">
                    <label for="valor">Valor: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input name="valor" id=valor type="number" step="0.01" class="form-control" aria-label="Quantia" placeholder="2.75" />
                        <div class="input-group-append">
                        </div>
                    </div>
                </div>

                <form>
                    <div class="col-auto my-2">
                        <label for="customFile">Documento TAC:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="concessao" id="customFile">
                            <label class="custom-file-label" for="customFile">Documento TAC</label>
                        </div>
                    </div>
                </form>
                </form>
                <i>*TAC: </i><b>Termo de Ajustamento de Conduta.</b><br>
                <i>Prazo para qualquer alteração é de 76h após clicar em <b>Salvar.</b><br></i>
            </div>
            <div class="card-footer text-right pt-3 justify-content-end">
                <button type="submit" class="btn btn-success text-light">
                    Salvar
                </button>
                <a class="btn btn-danger ml-2 text-light" href="<?= site_url('dashboard/tarifas') ?>">
                    Cancelar
                </a>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
<!-- Body end -->
<?php
                                                                                                                    $this->load->view("footer2.php")
                                                                                                                    ?>