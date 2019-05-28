<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->

<h2 class="text-center">Lista de Passagens Geradas Mensalmente</h2>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
<div class="row pb-1">
    <div class="col-md-9 row">
        <div class="col-md-3">
            <label for=""> </label>
            <select id="" class="form-control custom-select ">
            </select>
        </div>
        <div class="col-md-3 mt-auto">
            <button disabled id="filter_filter" type="button" class=" btn btn-secondary">Filtrar</button>
        </div>

    </div>
    <div class="col-md-3 mt-auto">
        <button type="button" class="btn btn-success float-right mr-2" data-toggle="modal"
            data-target="#id_modal_create_alocacao" title="Adicionar Alocação.">
            <i class="fa fa-plus-circle" data-toggle="tooltip" data-placement="bottom" id="id_button_add"> </i>
            Adicionar
        </button>
    </div>
   

</div>

<!-- Table init (Ao abrir a tela) -->
<div class="table-responsive w-100">

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Placa do Veículo</th>
                <th scope="col">Trajeto</th>
                <th scope="col">Total Vendidas</th>
                <th scope="col">Mês</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <!--Body Frota-->
        <tbody id="id_lista_alocacao">
            <tr>
                <th scope="row">1</th>
                <td>IQU1240</td>
                <td>Alegrete/Rosário do Sul</td>
                <td>50</td>
                <td>02/2019</td>
                

                <td>
                    <button type="button" class="btn btn-warning btn-sm" id="id_opcao_editar" data-toggle="modal"
                        data-placement="top" title="Editar Alocação" data-target="#id_modal_edit_alocacao">
                        <span class="hvr-icon fa fa-edit mr-1"></span> Editar
                    </button>
                    <button type="button" class="btn btn-primary btn-sm" title="Mais informações sobre a alocação."
                        data-toggle="modal" id="id_opcao_visualizar" data-placement="top"
                        data-target="#id_modal_info">
                        <span class="hvr-icon fa fa-info mr-1"></span>Info
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

</div>

<!-- Modal create alocação -->
<div class="modal fade" id="id_modal_create_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Passagens Geradas</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Selecione o ônibus:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                        data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum ônibus selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_create_trajeto fa ">Selecione o trajeto:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button"
                                        data-target="#id_modal_com_listas_trajeto" data-toggle="modal">Trajetos</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum trajeto selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class= "form-row">
                             <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Passagens Inteiras:</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" >
                        </div>

                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Meias Passagens:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Passagens Isentas:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Mês/Ano:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="mm/yyyy">
                            </div>
                            </div>

                            </div>
                           
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
    </div>
</div>



<!-- Modal Editar -->
<div class="modal fade" id="id_modal_edit_alocacao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Editar</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row mx-2">
                        <div class="form-group col-md-6">
                            <label for="modal_create_onibus">Selecione o ônibus:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal"
                                        data-target="#id_modal_com_listas_onibus">Ônibus</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum ônibus selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_create_trajeto fa ">Selecione o trajeto:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary" type="button"
                                        data-target="#id_modal_com_listas_trajeto" data-toggle="modal">Trajetos</button>
                                </div>
                                <input type="text" class="form-control" placeholder="Nenhum trajeto selecionado"
                                    aria-label="" aria-describedby="basic-addon1" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class= "form-row">
                             <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Passagens Inteiras:</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder ="25" >
                        </div>

                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Meias Passagens:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder ="20">
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Passagens Isentas:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder ="5" >
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Mês/Ano:</label>
                                 <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="02/2019">
                            </div>
                            </div>

                            </div>
                           
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
    </div>
</div>




<!-- Modal lista de Onibus-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_onibus">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Onibus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        OQD6328
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="id_onibus_placa"
                                name="onibus_placa">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"
                        name="onibus_placa">
                        ICU7845
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_onibus"
                    disabled>Selecionar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal lista de Trajetos-->
<div class="modal" tabindex="-1" role="dialog" id="id_modal_com_listas_trajeto">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lista de Trajetos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Vera Cruz - Santos Dumont
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="id_trajetourbano_nome"
                                name="trajetourbano_nome">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center"
                        name="trajetourbano_nome">
                        Favila - Terminal
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="id_botao_selecionar_trajeto"
                    disabled>Selecionar</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Info -->
<div class="modal fade" id="id_modal_info" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Informações</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="needs-validation" novalidate>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationCustom01">Inteiras:</label>
      <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="25" required disabled>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom02">Meias:</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="20" required disabled>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom02">Isentas:</label>
      <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="5" required disabled>
      <div class="valid-feedback">
        Looks good!
      </div>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">Mês:</label>
      <input type="text" class="form-control" id="validationCustom03" placeholder="Jan/2019" required disabled>
      <div class="invalid-feedback">
        Please provide a valid city.
      </div>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom04">Total Geradas:</label>
      <input type="text" class="form-control" id="validationCustom04" placeholder="50" required disabled>
      <div class="invalid-feedback">
        Please provide a valid state.
      </div>
    </div>
   
   
  </div>

 
</form>

      </div>
    </div>
  </div>
</div>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>
<script>
var lastInsert = 0;
$("input[type='checkbox']").change(function() {
    ++lastInsert
    $('#id_mais_motorista').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="teste_merda" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');

    var quantidadeDeCampos = $('input[name=teste_merda]').length;
    var funcionariosSelecionados = $('input[type=checkbox]:checked').length;
    console.log("Funcionarios Selecionados: " + funcionariosSelecionados);
    console.log("Quantidade de Campos: " + quantidadeDeCampos);
    console.log("Last Insert: " + lastInsert);
    if (lastInsert > funcionariosSelecionados) {
        deletarCampo('mot' + lastInsert);
    }

});

$('#id_add_cobrador').click(function() {
    ++lastInsert
    $('#id_mais_cobrador').append(
        '<div id="mot' + lastInsert +
        '"class="d-flex flex-row align-center my-1 justify-content-center">' +
        '<input required maxlength="255" type="text" name="" class="form-control" id="exampleFormControlInput1">' +
        '<button onclick="deletarCampo(\'mot' + lastInsert +
        '\')"type="button" id="id_excluir_input_button" class=" btn btn-hover text-dark">' +
        '<i class="fa fa-trash my-auto ml-2 fa-2x input-group-icon"></i>' +
        '</button>' +
        '</div>');
});

function deletarCampo(campo) {
    $('#' + campo + '').remove();
}
</script>
<script>
var quantidadeHorasTrajeto = 2;
$("input[type='checkbox']").change(function() {
    var checados = $('input[type=checkbox]:checked').length;
    console.log(checados);
    if (checados == quantidadeHorasTrajeto) {
        $("#id_botao_selecionar_funcionario").prop("disabled", false);
    } else {
        $("#id_botao_selecionar_funcionario").prop("disabled", true);
    }
});
</script>