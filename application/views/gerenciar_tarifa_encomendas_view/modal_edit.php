<div class="modal fade reset_form_on_modal_close" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Cadastrar Novo Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" id="modal_edit_form" novalidate>
                <input name="tarifaencomenda_id" type="hidden"  class="form-control numbers-only" id="modal_edit_id_hidden" required />
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" maxlength="7" class="form-control numbers-only" id="modal_edit_id" disabled />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="modal_edit_placa">Nome</label>
                            <input name="tarifaencomenda_nome" type="text" class="form-control alphanumeric-only" id="modal_edit_nome" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_edit_placa">Preço por KG</label>
                            <input name="tarifaencomenda_preco_peso" type="number" maxlength="7" step="0.01" class="form-control" id="modal_edit_preco_peso" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_edit_placa">Preço por M³</label>
                            <input name="tarifaencomenda_preco_volume" type="number" maxlength="7" step="0.01" class="form-control" id="modal_edit_preco_volume" required />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_edit_placa">Tipo de calculo</label>
                            <select class="form-control" required name="tarifaencomenda_tipocalculo" id="modal_edit_tipocalculo">
                                <option value="multiplicacao">Multiplicação</option>
                                <option value="soma">Soma</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>