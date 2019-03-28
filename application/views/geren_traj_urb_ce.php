<?php
/**
 * Created by PhpStorm.
 * User: sandr
 * Date: 3/26/2019
 * Time: 12:35 PM
 */
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<div class='container pb-5'>
    <div class="col-md-7">
        <div class="infoTrajUrb card">
            <div class="card-header border-0">
                <h4 class="mb-0">Informações do Trajeto</h4>
            </div>
            <div class="card-body">
                <form>
                    <label for="TempoMédioPerc">Tempo médio de percurso:</label>
                    <input type="time" class="form-control" id="usr">
                    <label for="hrInicial">Hora Inicial:</label>
                    <input type="time" class="form-control" id="usr">
                    <label for="hrFinal">Hora Final:</label>
                    <input type="time" class="form-control" id="usr">
                    <label for="status">Status:</label>
                    <select class="form-control" id="sel1">
                        <option>Ativo</option>
                        <option>Desativado</option>
                    </select>
                    <div class="custom-file my-3">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Selecione a Concessão</label>
                    </div>
                </form>
            </div>
        </div>

    </div>


    <div class="col-md-10 my-lg-5" >
        <div class="card">
            <div class="card-header border-0">
                <h4 class="mb-0">Possiveis Paradas</h4>
            </div>
            <div class="card-body ">
                <div class="tableParaExistentes col-md-12">
                    <table class="tableGerenTrajUrb table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Maxímiliano Marinho</td>
                            <td>493</td>
                            <td>Vera Cruz</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-dark">Adicionar Parada</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-md-10 my-lg-3">
        <div class="card" >
            <div class="card-header border-0" >
                <h4 class="mb-0">Paradas deste trajeto</h4>
            </div>
            <div class="card-body ">
                <div class="tableParaExistentes col-md-12">
                    <table class="tableGerenTrajUrb table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Maxímiliano Marinho</td>
                            <td>493</td>
                            <td>Vera Cruz</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-md-10 d-flex justify-content-end">
        <div>
            <button type="button" class="btn btn-success ">Salvar</button>
            <button type="button" class="btn btn-danger ">Cancelar</button>
        </div>
    </div>
</div>



<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
