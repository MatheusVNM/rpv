<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<div class="container-fluid flex-shrink-1 d-flex justify-content-left">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="col-auto">
                            <label for="exampleFormControlInput1">Nome do Administrador:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="Paulo Soares">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">CPF:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="201.514.880-63">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Identidade:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="19.999.933-8">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data de Criação:</label>
                            <input type="date" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Hora de Criação:</label>
                            <input type="time" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Buscar Trajeto:<i
                                    class="fa fa-search ml-2"></i></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="Consultar...">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Distância da rota (Em km):</label>
                            <input type="email" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="300">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Horário de Início:</label>
                            <input type="time" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Horário de Final:</label>
                            <input type="time" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Documento de Concessão:</label>
                            <input type="text" class="form-control" disabled id="exampleFormControlInput1"
                                placeholder="19.999.933-8">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <form>
                    <div class="col-auto">
                        <div class="form-group ">
                            <label for="exampleFormControlInput1">Nro do Contrato com a prefeitura:</label>
                            <input type="email" class="form-control " id="exampleFormControlInput1"
                                placeholder="51565245">
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" aria-label="Quantia">
                            <div class="input-group-append">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Data vigencia do contrato:</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="10/05/2006 - 10/05/2007">
                        </div>
                    </div>
                    <form>
                        <div class="col-auto">
                            <div class="custom-file my-3">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Documento TAC</label>
                            </div>
                        </div>
                    </form>
                </form>
                <i>*TAC: </i><b>Termo de Ajustamento de Conduta.</b><br>
                <i>Prazo para qualquer alteração é de 76h após clicar em <b>Salvar.</b><br></i>
            </div>
        </div>
        <div class="row pt-3 justify-content-end">
            <button class="btn btn-success">
                Salvar
            </button>
            <button class="btn btn-danger mx-2">
                Cancelar
            </button>
        </div>
    </div>
</div>
<!-- Body end -->
<?php
$this->load->view("footer2.php")
?>