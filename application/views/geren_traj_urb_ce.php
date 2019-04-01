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
    <div class="row">
        <div class="col-md-5">
            <div class="infoTrajUrb card">
                <div class="card-header">
                    <h4 class="mb-0">Informações do Trajeto</h4>
                </div>
                <div class="card-body">
                    <form>
                        <label for="TempoMédioPerc">Tempo médio de percurso:
                            <input type="time" class="form-control" id="usr"></label><br>
                        <label for="status">Status:
                            <select class="form-control" id="sel1">
                                <option>Ativo</option>
                                <option>Desativado</option>
                            </select></label>
                        <label for="tarifas"> Tarifa:
                            <select class="form-control" id="sel1">
                                <option>300</option>
                            </select></label>
                        <div class="custom-file my-3">
                            <input type="file" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Selecione a Concessão</label>
                        </div>
                    </form>
                </div>
                <div class="card-footer"></div>
            </div>
            <div class="card mt-2">
                <div class="card-header">
                    <h4 class="mb-0">Informações da Parada</h4>
                </div>
                <div class="card-body">
                    <label for="Parada">Parada:
                        <input disabled type="text" class="form-control" value="Av. Ibirapuitã, Avestruz"/></label>
                    <label for="ProxParada">Proxima parada:
                        <input disabled type="text" class="form-control" value="Av. Ibirapuitã, 124"/></label>
                    <label for="ProxParada">Tempo até a próxima:
                        <input type="text" class="form-control"/></label>
                    <label for="ProxParada">Hora de chegada na parada:
                        <input type="text" class="form-control"/></label>
                    <div class="row d-flex justify-content-end mx-1">
                        <div>
                            <button type="button" class="btn btn-success ">Finalizar</button>
                            <button type="button" class="btn btn-info ">Adicionar</button>

                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>

        <div class="possParadas col-md-7">
            <div class="card">
                <div class="card-header"><h4 class="mb-0">Possiveis Paradas</h4></div>
                <div class="card-body">
                    <input type="text" class="form-control" placeholder="Filtrar"/>
                    <div class="overflow-auto mt-2" style="max-height: 75vh">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Primeira Parada</th>
                                <th scope="col">Próxima Parada</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Av. Ibirapuitã, 124</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>

                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 1312312</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, 12412314</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, q341124</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Av. Ibirapuitã, Avestruz</td>
                                <td>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                        Selecionar Parada
                                    </label>
                                </td>
                                <td>
                                    <button class="btn btn-info">Selecionar como proxima parada</button>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12 my-lg-3" style="padding-left: 0">
        <div class="card">
            <div class="card-header"><h4 class="mb-0">Possiveis Paradas</h4></div>
            <div class="card-body">
                <input type="text" class="form-control" placeholder="Filtrar"/>
                <div class="overflow-auto" style="height: 30vh">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Bairro</th>
                            <th>Próxima Parada</th>
                            <th>Tempo até a Próxima</th>
                            <th>Hora de Chegada</th>
                            <th>Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Maxímiliano Marinho</td>
                            <td>493</td>
                            <td>Vera Cruz</td>
                            <td>Bairro Macedo</td>
                            <td>30min</td>
                            <td>00:30</td>
                                <td class="text-right">
                                <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-arrow">
                                    <a class="dropdown-item" href="#">Excluir</a>
                                </div></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end">
                </div>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>


    <div class="row col-md-12 d-flex justify-content-end mt-3 mb-4">
        <div>
            <button type="button" class="btn btn-success ">Salvar</button>
            <button type="button" class="btn btn-danger ">Cancelar</button>

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
