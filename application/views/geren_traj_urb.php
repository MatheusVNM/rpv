<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>
<!-- Body init -->
<div class="trajetos_exist col-md-12">
    <div class="card">
        <div class="card-header border-0 d-flex justify-content-between">
            <h3 class="mb-0 justify-content-center">Rotas Urbanas</h3>
            <div>
                <a class="btn text-dark btn-icon-only text-dark d-flex align-center" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-plus-circle fa-2x"> </i>
                    <h3>Criar Rota</h3>
                </a>
            </div>
        </div>
        <div class="card-body">
            <input type="text" class="form-control" placeholder="Filtrar"/>
            <div class="overflow-auto mt-2" style="max-height: 75vh" >
                <table class="table table-striped table-bordered table-hover align-items-center table-flush">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ponto de Partida</th>
                        <th>Tempo Médio</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>00001</td>
                        <td>Terminal 1</td>
                        <td>1h</td>
                        <td>Ativo</td>
                        <td>
                            <a class="btn btn-sm btn-icon-only text-dark d-flex justify-content-center" href="#"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Editar</a>
                                <a class="dropdown-item" href="#">Excluir</a>
                                <a class="dropdown-item" href="#">Desativar</a>
                                <a class="dropdown-item" href="#">Ativar</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

    <div class="row col-md-12 d-flex justify-content-end mt-3 mb-4">
        <div>
            <button type="button" class="btn btn-success ">Salvar</button>
            <button type="button" class="btn btn-danger ">Cancelar</button>

        </div>
    </div>







<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>

