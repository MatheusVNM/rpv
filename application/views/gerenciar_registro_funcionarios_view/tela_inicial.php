<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

    <div class="d-block">
        <h2 class="text-center ">Gerenciar registro de funcionários</h2>
    </div>
<?= $this->session->flashdata('error'); ?>
<?= $this->session->flashdata('success'); ?>
    <div class="container-fluid">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Função</th>
                <th scope="col">Data de Contratação</th>
                <th scope="col">CPF</th>
                <th scope="col">Status</th>
                <th scope="col">Opções</th>
            </tr>
            </thead>
            <!--Body Frota-->
            <tbody id="id_lista_alocacao">
            <?php foreach ($funcionarios as $row) : ?>
                <tr>
                    <td><?= $row["funcionarios_nome"] ?></td>
                    <td><?= $row["tipofuncionario_nome"] ?></td>
                    <td><?= $row["funcionarios_dataDeAdmissao"] ?></td>
                    <td><?= $row["funcionarios_cpf"] ?></td>
                    <td><?php if ($row['funcionarios_status'] == 1): echo "Ativa" ?><?php else:
                        echo "Inativa" ?></td> <?php endif; ?>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" id="id_opcao_visualizar"
                                data-placement="top" data-target="#id_modal_info">
                            Desativar/Ativar
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <div class=" col-md-1   ml-auto">
            <button id="procurarPassagemBtn" data-toggle="modal" data-target="#criarFuncionario"
                    class="btn btn-warning mr-0 mt-2 ">
                Cadastrar funcionário
            </button>
        </div>


        <div class="modal fade" id="criarFuncionario" tabindex="-3" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>Cadastrar funcionários
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="modal_edit_form" class="needs-validation container" novalidate>
                        <input type="hidden" name="rodoviaria_id" id="modal_edit_id" value=""/>

                        <div class="modal-body">
                            <div id="modal_edit_warning">

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nome_funcionario_id">Nome</label>
                                    <!-- here -->
                                    <input name="nome_funcionario" type="text" maxlength="100" min="0"
                                           class="form-control alphanumeric-only" id="nome_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <dv class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="funcao_funcionario_id">Selecione uma função</label>
                                    <select class="form-control" name="funcao_funcionario" id="funcao_funcionario_id"
                                            required>
                                        <option disabled selected value></option>
                                        <?php foreach ($tipofuncionario as $row) : ?>
                                            <option value=<?= $row['tipofuncionario_id'] ?>><?= $row['tipofuncionario_nome'] ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <div class="invalid-feedback"></div>
                                </div>

                                <div class="form-group col-md-5">
                                    <label for="cpf_funcionario_id">CPF</label>
                                    <!-- here -->
                                    <input name="cpf_funcionario" type="text" maxlength="11" min="0" max="99999999"
                                           class="form-control numbers-only" id="cpf_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>

                            </dv>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="telefone_funcionario_id" type="">Telefone</label>
                                    <!-- here -->
                                    <input name="telefone_funcionario" type="text" maxlength="12" min="0"
                                           max="999999999"
                                           class="form-control numbers-only" id="telefone_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email_funcionario_id" type="email">Email</label>
                                    <!-- here -->
                                    <input name="email_funcionario" type="text" maxlength="50"
                                           class="form-control email-only" id="email_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="form-row">

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nome_mae_funcionario_id">Nome da Mãe</label>
                                    <!-- here -->
                                    <input name="nome_mae_funcionario" maxlength="110" type="text"
                                           class="form-control alphanumeric-only" id="nome_mae_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="cnh_funcionario_id">CNH</label>
                                    <!-- here -->
                                    <input name="cnh_funcionario" maxlength="110" type="text"
                                           class="form-control alphanumeric-only" id="cnh_funcionario_id" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="alert alert-warning d-none" role="alert" id="rodoviaria_existente">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success" id="modal_edit_salvar" data-toggle="modal"
                                        data-target="#modal_confirmacao">Cadastrar
                                </button>
                            </div>
                    </form>

                </div>
            </div>
        </div>


    </div>


<?php
$this->load->view("footer2.php")
?>