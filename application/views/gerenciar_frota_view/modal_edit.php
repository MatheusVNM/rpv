<div class="modal fade reset_form_on_modal_close" id="modal_edit_veiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Editar Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="container" id="modal_edit_form" novalidate>
            <input type="hidden" id="modal_edit_id" name="onibus_id" value="" />    
            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="modal_edit_placa">Placa</label>
                            <input  name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only" id="modal_edit_placa" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_nro_onibus">Nro Ônibus</label>
                            <input  name="onibus_numero" class="form-control numbers-only" id="modal_edit_nro_onibus" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_nro_antt">Nro ANTT</label>
                            <input  name="onibus_numero_antt" class="form-control numbers-only" id="modal_edit_nro_antt" maxlength="12" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_nro_chassi">Nro Chassi</label>
                            <input  name="onibus_num_chassis" type="text" class="form-control alphanumeric-only" id="modal_edit_nro_chassi" maxlength="17" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_nro_lugares">Nro Lugares</label>
                            <input  name="onibus_num_lugares" class="form-control numbers-only" id="modal_edit_nro_lugares" maxlength="3" max="99" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_marca_carroceira">Marca</label>
                            <input  name="onibus_marca" type="text" class="form-control letters-only" id="modal_edit_marca_carroceira" maxlength="50" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_potencia_motor">Potência do Motor</label>
                            <input  name="onibus_potencial_motor" class="form-control numbers-only" id="modal_edit_potencia_motor" maxlength="4" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_propriedade_veiculo">Propriedade do Veículo</label>
                            <input  name="onibus_propriedade_veiculo" type="text" class="form-control letters-only" id="modal_edit_propriedade_veiculo" maxlength="30" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_ano_fabricacao">Ano Fabricação</label>
                            <input  name="onibus_ano_fab" class="form-control numbers-only" id="modal_edit_ano_fabricacao" maxlength="4" required />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_edit_quilometragem">Quilometragem</label>
                            <input  name="onibus_quilometragem" class="form-control numbers-only" id="modal_edit_quilometragem" maxlength="10" required />
                        </div>

                        <div class="form-group col-md-4">
                            <label class="mx-1">Ar Condicionado:</label>
                            <div class="form-check column">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input  name="onibus_ar_condicionado" class="custom-control-input" type="radio" id="id_edit_ar_sim" value="true" checked required />
                                    <label class="custom-control-label" for="id_edit_ar_sim">
                                        Sim
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input  name="onibus_ar_condicionado" class="custom-control-input mx-2" type="radio" id="id_edit_ar_nao" value="false" required />
                                    <label class="custom-control-label" for="id_edit_ar_nao">
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="mx-1">Adaptado para Deficientes:</label>
                            <div class="form-check column">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_adaptado_deficiente" class="custom-control-input" type="radio" id="id_edit_defic_sim" value="true" checked required />
                                    <label class="custom-control-label" for="id_edit_defic_sim">
                                        Sim
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_adaptado_deficiente" class="custom-control-input mx-2" type="radio" id="id_edit_defic_nao" value="false" required />
                                    <label class="custom-control-label mx-4" for="id_edit_defic_nao">
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="form-row">
                        <div class="form-group column col-6">
                            <label for="modal_edit_municipal">Frota: </label>
                            <select id="modal_edit_municipal" name="onibus_is_municipal" class="form-control custom-select ">
                                <option value="true"> Municipal</option>
                                <option value="false"> Intermunicipal </option>
                            </select>
                        </div>
                        <div class="form-group column col-6" id="container_modal_edit_tipo" style="display:none">
                            <label for="modal_edit_tipo">Tipo:</label>
                            <select id="modal_edit_tipo" name="onibus_categoria_intermunicipal" class="form-control custom-select">
                                <?php foreach ($categoriaonibus as $row) : ?>
                                    <option value=<?= $row['categoriaonibus_id'] ?>><?= $row['categoriaonibus_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group column col-6" id="container_modal_edit_estados">
                            <label for="modal_edit_estados">Estado:</label>
                            <select id="modal_edit_estados" class="form-control custom-select">
                                <?php foreach ($estados as $row) : ?>
                                <option selected disabled hidden>Selecione um Estado</option>
                                    <option value=<?= $row['estado_id'] ?>><?= $row['estado_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group column col-6" id="container_modal_edit_cidades">
                            <label for="modal_edit_cidades">Cidade:</label>
                            <select id="modal_edit_cidades" name="onibus_cidade" class="form-control custom-select">

                            </select>
                        </div>
                    </div>
                    <div class="form-row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>