<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<?= form_open('tarifas/create') ?>
<div class="container-fluid flex-shrink-1 d-flex justify-content-left">


    <div class="col-md-8 mx-auto">
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
                    <input maxlength="254" placeholder="Ex: Tarifa Urbana Leste" type="text" class="form-control" name="name" id="name" />
                </div>
                <div class="col-auto my-2">
                    <label for="valor">Valor: </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">R$</span>
                        </div>
                        <input name="valor" id=valor type="number" step="0.01" class="form-control" aria-label="Quantia" placeholder="Ex: 2.75" maxlength="6" />
                        <div class="input-group-append">
                        </div>
                    </div>
                </div>

                <form>
                    <div class="col-auto my-2">
                        <label for="customFile">Documento TAC:</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="concessao" id="customFile">
                            <label class="custom-file-label" for="customFile" id="fileLabel">Documento TAC</label>
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
$this->load->view('footer2');
?>

<script>
    $("#customFile").change(function() {
        var fullPath = $(this).val();
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
        }
        $("#fileLabel").html(filename);
    });
</script>