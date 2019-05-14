<div class="modal fade reset_form_on_modal_close" id="modal_info_veiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Informações do Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" id="modal_info_form" novalidate>
            <input type="hidden" name="modal_info_id" value="" />    
            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="modal_info_placa">Placa</label>
                            <input  name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only" id="modal_info_placa" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_nro_onibus">Nro Ônibus</label>
                            <input  name="onibus_numero" class="form-control numbers-only" id="modal_info_nro_onibus" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_nro_antt">Nro ANTT</label>
                            <input  name="onibus_numero_antt" class="form-control numbers-only" id="modal_info_nro_antt" maxlength="12" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_nro_chassi">Nro Chassi</label>
                            <input  name="onibus_num_chassis" type="text" class="form-control alphanumeric-only" id="modal_info_nro_chassi" maxlength="17" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_nro_lugares">Nro Lugares</label>
                            <input  name="onibus_num_lugares" class="form-control numbers-only" id="modal_info_nro_lugares" maxlength="3" max="99" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_marca_carroceira">Marca</label>
                            <input  name="onibus_marca" type="text" class="form-control letters-only" id="modal_info_marca_carroceira" maxlength="50" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_potencia_motor">Potência do Motor</label>
                            <input  name="onibus_potencial_motor" class="form-control numbers-only" id="modal_info_potencia_motor" maxlength="4" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_propriedade_veiculo">Propriedade do Veículo</label>
                            <input  name="onibus_propriedade_veiculo" type="text" class="form-control letters-only" id="modal_info_propriedade_veiculo" maxlength="30" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_ano_fabricacao">Ano Fabricação</label>
                            <input  name="onibus_ano_fab" class="form-control numbers-only" id="modal_info_ano_fabricacao" maxlength="4" disabled />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_quilometragem">Quilometragem</label>
                            <input  name="onibus_quilometragem" class="form-control numbers-only" id="modal_info_quilometragem" maxlength="10" disabled />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="mx-1">Ar Condicionado:</label>
                            <input disabled id="modal_info_ar" name="onibus_categoria_intermunicipal" class="form-control letters-only" />
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mx-1">Adaptado para Deficientes:</label>
                            <input disabled id="modal_info_adaptado" name="onibus_categoria_intermunicipal" class="form-control letters-only" />
                        </div>
                        </div>



                    <div class="form-row">
                        <div class="form-group column col-6">
                            <label for="modal_info_municipal">Frota: </label>
                            <input disabled id="modal_info_municipal" name="onibus_is_municipal" class="form-control" />
                        </div>
                        <div class="form-group column col-6" id="container_modal_info_tipo" style="display:none">
                            <label for="modal_info_tipo">Tipo:</label>
                            <input disabled id="modal_info_tipo" name="onibus_categoria_intermunicipal" class="form-control" />
                                
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group column col-6" id="container_modal_info_estados">
                            <label for="modal_info_estados">Estado:</label>
                            <input disabled id="modal_info_estados" class="form-control" />
                                
                        </div>
                        <div class="form-group column col-6" id="container_modal_info_cidades">
                            <label for="modal_info_cidades">Cidade:</label>
                            <input disabled id="modal_info_cidades" name="onibus_cidade" class="form-control" />
                        </div>
                    </div>
                    <div class="form-row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>