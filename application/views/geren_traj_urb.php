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
<div class="container" style="background-color: #00CC00">
    <div class="container"><h5>Gerenciar Trajetos Urbanos</h5></div>

    <div class="containerFormularioRota form-group col-md-4">
        <form>
            <label for="TempoMédioPerc">Tempo médio de percurso:</label>
            <input type="text" class="form-control" id="usr">
            <label for="hrInicial">Hora Inicial:</label>
            <input type="time" class="form-control" id="usr">
            <label for="hrFinal">Hora Final:</label>
            <input type="time" class="form-control" id="usr">
            <label for="status">Status:</label>
            <select class="form-control" id="sel1">
                <option>Ativo</option>
                <option>Desativado</option>
            </select>
            <div class="custom-file my-4">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Selecione a Concessão</label>
            </div>
        </form>

    </div>


    <table class="tableGerenTrajUrb table table-striped col-md-4">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>
        <tr>
            <td>Mary</td>
            <td>Moe</td>
            <td>mary@example.com</td>
        </tr>
        <tr>
            <td>July</td>
            <td>Dooley</td>
            <td>july@example.com</td>
        </tr>
        </tbody>
    </table>
</div>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
