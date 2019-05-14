<div class="modal fade reset_form_on_modal_close" id="id_modal_info_veiculo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Informações Veículo</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="needs-validation container" novalidate>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_info_placa">Placa</label>
                            <input name="onibus_placa" type="text" maxlength="7" class="form-control alphanumeric-only" id="modal_info_placa" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_info_nro_onibus">Nro Ônibus</label>
                            <input name="onibus_numero" type="number" class="form-control numbers-only" id="modal_info_nro_onibus" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_nro_antt">Nro ANTT</label>
                            <input name="onibus_numero_antt" type="number" class="form-control numbers-only" id="modal_info_nro_antt" maxlength="12" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_info_ano_fabricacao">Ano Fabricação</label>
                            <input name="onibus_ano_fab" type="number" class="form-control numbers-only" id="modal_info_ano_fabricacao" maxlength="4" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_info_nro_chassi">Nro Chassi</label>
                            <input name="onibus_num_chassis" type="text" class="form-control alphanumeric-only" id="modal_info_nro_chassi" maxlength="17" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_info_nro_lugares">Nro Lugares</label>
                            <input name="onibus_num_lugares" type="number" class="form-control numbers-only" id="modal_info_nro_lugares" maxlength="3" max="99" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_marca_carroceira">Marca da Carroceria</label>
                            <input name="onibus_marcacarroceria" type="text" class="form-control letters-only" id="modal_info_marca_carroceira" maxlength="50" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="modal_info_tacografo">Tacógrafo</label>
                            <input name="onibus_tacografo" type="number" class="form-control numbers-only" id="modal_info_tacografo" maxlength="15" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="modal_info_marca_chassi">Marca do Chassi</label>
                            <input name="onibus_marca_chassis" type="text" class="form-control letters-only" id="modal_info_marca_chassi" maxlength="15" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="modal_info_potencia_motor">Potência do Motor</label>
                            <input name="onibus_potencial_motor" type="number" class="form-control numbers-only" id="modal_info_potencia_motor" maxlength="4" disabled>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="modal_info_propriedade_veiculo">Propriedade do Veículo</label>
                            <input name="onibus_propriedade_veiculo" type="text" class="form-control letters-only" id="modal_info_propriedade_veiculo" maxlength="30" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="model_info_quilometragem">Quilometragem</label>
                            <input name="onibus_quilometragem" type="number" class="form-control numbers-only" id="model_info_quilometragem" maxlength="10" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group column col-6">
                            <label for="modal_info_municipal">Frota: </label>
                            <select id="modal_info_municipal" name="onibus_is_municipal" class="form-control custom-select " disabled>
                                <option id="testeop" value="true"> Municipal</option>
                                <option value="false"> Intermunicipal </option>
                            </select>
                        </div>
                        <div class="form-group column col-6" id="container_modal_info_tipo" style="display:none">
                            <label for="modal_info_tipo">Tipo:</label>
                            <select id="modal_info_tipo" name="onibus_categoria_intermunicipal" class="form-control custom-select" disabled>
                                <?php foreach ($categoriaonibus as $row) : ?>
                                    <option value=<?= $row['categoriaonibus_id'] ?>><?= $row['categoriaonibus_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group column col-6" id="container_modal_info_estados">
                            <label for="modal_info_estados">Estado:</label>
                            <select id="modal_info_estados" class="form-control custom-select" disabled>
                                <option disabled selected value>Seleciona um Estado</option>
                                <?php foreach ($estados as $row) : ?>
                                    <option value=<?= $row['estado_id'] ?>><?= $row['estado_nome'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group column col-6" id="container_modal_info_cidades">
                            <label for="modal_info_cidades">Cidade:</label>
                            <select id="modal_info_cidades" name="onibus_cidade" class="form-control custom-select" disabled>
                                <option disabled selected value>Seleciona um estado para listar as cidades</option>

                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group mr-4">
                            <label class="mx-1">Ar Condicionado:</label>
                            <div class="form-check column">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_ar_condicionado" class="custom-control-input" type="radio" id="id_info_ar_sim" value="sim" disabled>
                                    <label class="custom-control-label" for="id_info_ar_sim" disabled>
                                        Sim
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_ar_condicionado" class="custom-control-input mx-2" type="radio" id="id_info_ar_nao" value="nao" disabled>
                                    <label class="custom-control-label" for="id_info_ar_nao" disabled>
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="mx-1">Adaptado para Deficientes:</label>
                            <div class="form-check column">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_adaptado_deficiente" class="custom-control-input" type="radio" id="id_info_defic_sim" value="sim" disabled>
                                    <label class="custom-control-label" for="id_info_defic_sim" disabled>
                                        Sim
                                    </label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input name="onibus_adaptado_deficiente" class="custom-control-input mx-2" type="radio" id="id_info_defic_nao" value="nao" disabled>
                                    <label class="custom-control-label mx-4" for="id_info_defic_nao" disabled>
                                        Não
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="id_info_input_file" class="my-3 mr-2">Documento de Propriedade:</label>
                            <div class="custom-file">
                                <input name="onibus_documento_veiculo" type="file" class="custom-file-input" id="id_info_input_file" disabled>
                                <label id="id_info_label_file" class="custom-file-label" for="id_info_input_file">Selecione um Arquivo...</label>
                            </div>

                            <!-- <div class="form-group" id="id_form_input">
                                <label for="id_info_input_file" id="id_label_input" class="rounded">
                                    <i class="fa fa-upload" id="id_icon_input"></i>
                                    <span id="id_info_label_file">Upload file</span>
                                </label>
                                <input name="onibus_documento_veiculo" type="file" class="custom-file-input" id="id_info_input_file" required>
                            </div> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
