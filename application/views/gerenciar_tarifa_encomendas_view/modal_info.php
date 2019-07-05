<div class="modal fade reset_form_on_modal_close" id="modal_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Informações da Tarifa</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input type="text" maxlength="7" class="form-control numbers-only" id="modal_info_id" disabled />
                        </div>
                        <div class="form-group col-md-12">
                            <label for="modal_info_placa">Nome</label>
                            <input name="tarifaencomenda_nome" type="text" class="form-control alphanumeric-only" id="modal_info_nome" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_info_placa">Preço por KG</label>
                            <input name="tarifaencomenda_preco_peso" type="text" maxlength="7" class="form-control numbers-only" id="modal_info_preco_peso" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_info_placa">Preço por M³</label>
                            <input name="tarifaencomenda_preco_volume" type="text" maxlength="7" class="form-control numbers-only" id="modal_info_preco_volume" disabled />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modal_info_placa">Tipo de calculo</label>
                            <select class="form-control" disabled name="tarifaencomenda_tipocalculo" id="modal_info_tipocalculo">
                                <option value="multiplicacao">Multiplicação</option>
                                <option value="soma">Soma</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
        </div>
    </div>
</div>