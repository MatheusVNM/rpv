
$("#modal_create_form").submit(function () {

    // if (this.checkValidity() === false) {
    //     console.log('invalid');
    //     return false;
    // }
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('ajax/onibus/create') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result)
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#id_modal_create_veiculo").modal('hide');
                $("#modal_create_form").trigger("reset");
                atualizarTabela()
                showSuccessModal("Sucesso", result['message']);
            } else {
                showErrorModal("Erro ao registrar onibus", result['message']);
                $('#modal_create_warning').html(result['message']);
                $("#modal_create_form").find("input").removeClass("is-valid");
                $("#modal_create_form").find("select").removeClass("is-valid");
                $("#modal_create_form").find("input").removeClass("is-invalid");
                $("#modal_create_form").find("select").removeClass("is-invalid");
                $("#modal_create_form").find("input").addClass("is-valid");
                $("#modal_create_form").find("select").addClass("is-valid");
                $.each(result['error_fields'], function (key, value) {
                    $("#modal_create_form [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
                })
                console.log(result['error_messages'])
                // $(this).find("input").find()
            }
        },
        error: function (error) {
            showWarningModal(error['responseText']);
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });

    return false;
});

$("#modal_edit_form").submit(function () {

    // if (this.checkValidity() === false) {
    //     console.log('invalid');
    //     return false;
    // }
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('ajax/onibus/edit') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result)
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_edit_veiculo").modal('hide');
                $("#modal_edit_form").trigger("reset");
                atualizarTabela()
                showSuccessModal("Sucesso", result['message']);
            } else {
                showErrorModal("Erro ao registrar onibus", result['message']);
                $('#modal_edit_warning').html(result['message']);
                $("#modal_edit_form").find("input").removeClass("is-valid");
                $("#modal_edit_form").find("select").removeClass("is-valid");
                $("#modal_edit_form").find("input").removeClass("is-invalid");
                $("#modal_edit_form").find("select").removeClass("is-invalid");
                $("#modal_edit_form").find("input").addClass("is-valid");
                $("#modal_edit_form").find("select").addClass("is-valid");
                $.each(result['error_fields'], function (key, value) {
                    $("#modal_edit_form [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
                })
                console.log(result['error_messages'])
                // $(this).find("input").find()
            }
        },
        error: function (error) {
            showWarningModal(error['responseText']);
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });

    return false;
});


function atualizarTabela() {
    $.ajax({
        dataType: "json",
        url: "<?= base_url('ajax/onibus/get') ?>",
        beforeSend: function () {
            showLoadingModal('Atualizando a Lista de Oniubs');
        },
        success: function (data) {
            if (data == null) {
                showErrorModal("Erro", "Nenhum onibus encontrado. Tente novamente mais tarde. Se o erro persistir, contate o criador do sistema.")
                return;
            }
            console.log(data);
            $("#id_lista_frota").empty();
            $.each(data, function (key, value) {
                console.log(value);
                $('#id_lista_frota').append(createOnibusTR(
                    value
                ))
            })
        },
        error: function (error) {
            showErrorModal("Erro22", "Algum erro aconteceu. Tente novamente mais tarde. Se o erro persistir, contate o criador do sistema.")
            showWarningModal(error['responseText']);
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}

function createOnibusTR(onibus) {
    var retorno = "<tr>" +
        "<th>" + onibus['onibus_numero'] + "</th>" +
        "<td>" + onibus['onibus_placa'] + "</td>" +
        "<td>" + onibus['onibus_ano_fab'] + "</td>" +
        "<td>"
    if (!onibus['onibus_is_ativo']) {
        retorno += "Inativo";
    } else {
        if (onibus['onibus_em_manutencao'] != false) {
            retorno += "Em manutenção";
        } else {
            retorno += "Ativo";
        }
    }
    retorno += "</td >" +
        "<td>"

    if (onibus['onibus_cidade']) {
        retorno += onibus['cidade_nome'];
    } else {
        retorno += "Intermunicipal";
    }

    retorno += "</td>" +
        "<td>"
    if (onibus['onibus_categoria_intermunicipal']) {
        retorno += onibus['categoriaonibus_nome'];
    } else {
        retorno += "---";
    }

    retorno += '</td >' +
        '<td>' +
        '<button onclick="editar(' + onibus["onibus_id"] + ')" type="button" class="btn btn-warning btn-sm mr-1" id="id_opcao_editar" data-placement="top" title="Editar veículo" >' +
        '<span class="hvr-icon fa fa-edit mr-1"></span> Editar' +
        '</button>' +
        '<!-- <button onclick="inativar(' + onibus["onibus_id"] + ')" type="button" class="btn btn-danger btn-sm mr-1" title="Inativar da lista" id="id_opcao_inativar"  data-placement="top">' +
        '<span class="hvr-icon fa fa-trash mr-1"></span>Inativar' +
        '</button> -->' +
        '<button onclick="info(' + onibus["onibus_id"] + ')" type="button" class="btn btn-primary btn-sm mr-1" title="Mais informações sobre o veíuclo." id="id_opcao_visualizar" data-placement="top">' +
        '<span class="hvr-icon fa fa-info mr-1"></span>Info' +
        '</button>' +
        '</td>' +
        '</tr >'

    return retorno;
}

function editar(id) {
    $.ajax({
        data: "onibus_id=" + id,
        method: "POST",
        dataType: "json",
        url: "<?= base_url('ajax/onibus/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Rodoviarias');
        },
        success: function (result) {
            console.log('R:', result);
            if (result['success']) {
                var onibus = result['data']
                $("#modal_edit_id").val(onibus['onibus_id'])
                $("#modal_edit_placa").val(onibus['onibus_placa'])
                $("#modal_edit_nro_onibus").val(onibus['onibus_numero'])
                $("#modal_edit_nro_antt").val(onibus['onibus_numero_antt'])
                $("#modal_edit_nro_chassi").val(onibus['onibus_num_chassis'])
                $("#modal_edit_nro_lugares").val(onibus['onibus_num_lugares'])
                $("#modal_edit_marca_carroceira").val(onibus['onibus_marca'])
                $("#modal_edit_potencia_motor").val(onibus['onibus_potencial_motor'])
                $("#modal_edit_propriedade_veiculo").val(onibus['onibus_propriedade_veiculo'])
                $("#modal_edit_ano_fabricacao").val(onibus['onibus_ano_fab'])
                $("#modal_edit_quilometragem").val(onibus['onibus_quilometragem'])

                var ar = onibus['onibus_ar_condicionado'] == 1 ? "true" : "false"
                var adap = onibus['onibus_adaptado_deficiente'] == 1 ? "true" : "false"
                $('#modal_edit_form').find(':radio[name=onibus_ar_condicionado][value="' + ar + '"]').prop('checked', true);
                $('#modal_edit_form').find(':radio[name=onibus_adaptado_deficiente][value="' + adap + '"]').prop('checked', true);
                // [value='+onibus['onibus_ar_condicionado']==1?"\"true\"":"\"false\"" +']
                // [value='+onibus['onibus_adaptado_deficiente']==1?"\"true\"":"\"false\"" +']
                $("#modal_edit_municipal").val(onibus['onibus_is_municipal'] == 1 ? "true" : "false")
                $("#modal_edit_municipal").change();
                if (onibus['onibus_is_municipal'] == 0) {
                    $("#modal_edit_tipo").val(onibus['onibus_categoria_intermunicipal'])
                } else {
                    $("#modal_edit_estados").val(onibus['estado_id']).trigger('change');
                    setTimeout(function () {
                        $("#modal_edit_cidades").val(onibus['onibus_cidade'])
                    }, 600);
                }
            } else {
                alert('Rodoviaria não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(function () {
                closeLoadingModal()
                $("#modal_edit_veiculo").modal('show');
            }, 500)

        }
    });
}


function info(id) {
    $.ajax({
        data: "onibus_id=" + id,
        method: "POST",
        dataType: "json",
        url: "<?= base_url('ajax/onibus/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Rodoviarias');
        },
        success: function (result) {
            console.log('R:', result);
            if (result['success']) {
                var onibus = result['data']
                $("#modal_info_id").val(onibus['onibus_id'])
                $("#modal_info_placa").val(onibus['onibus_placa'])
                $("#modal_info_nro_onibus").val(onibus['onibus_numero'])
                $("#modal_info_nro_antt").val(onibus['onibus_numero_antt'])
                $("#modal_info_nro_chassi").val(onibus['onibus_num_chassis'])
                $("#modal_info_nro_lugares").val(onibus['onibus_num_lugares'])
                $("#modal_info_marca_carroceira").val(onibus['onibus_marca'])
                $("#modal_info_potencia_motor").val(onibus['onibus_potencial_motor'])
                $("#modal_info_propriedade_veiculo").val(onibus['onibus_propriedade_veiculo'])
                $("#modal_info_ano_fabricacao").val(onibus['onibus_ano_fab'])
                $("#modal_info_quilometragem").val(onibus['onibus_quilometragem'])

                var ar = onibus['onibus_ar_condicionado'] == 1 ? "Sim" : "Não"
                var adap = onibus['onibus_adaptado_deficiente'] == 1 ? "Sim" : "Não"
                $("#modal_info_ar").val(ar)
                $("#modal_info_adaptado").val(adap)
                // $('#modal_info_form').find(':radio[name=onibus_ar_condicionado][value="' + ar + '"]').prop('checked', true);
                // $('#modal_info_form').find(':radio[name=onibus_adaptado_deficiente][value="' + adap + '"]').prop('checked', true);
                // [value='+onibus['onibus_ar_condicionado']==1?"\"true\"":"\"false\"" +']
                // [value='+onibus['onibus_adaptado_deficiente']==1?"\"true\"":"\"false\"" +']
                $("#modal_info_municipal").val(onibus['onibus_is_municipal'] == 1 ? "Municipal" : "Intermunicipal")
                if (onibus['onibus_is_municipal'] == 0) {
                    $("#container_modal_info_tipo").show();
                    $("#container_modal_info_estados").hide();
                    $("#container_modal_info_cidades").hide();
                    $("#modal_info_tipo").val(onibus['categoriaonibus_nome'])
                } else {

                    $("#container_modal_info_tipo").hide();
                    $("#container_modal_info_estados").show();
                    $("#container_modal_info_cidades").show();
                    $("#modal_info_estados").val(onibus['estado_uf'])
                    $("#modal_info_cidades").val(onibus['cidade_nome'])
                }
            } else {
                alert('Rodoviaria não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(function () {
                closeLoadingModal()
                $("#modal_info_veiculo").modal('show');
            }, 500)

        }
    });
}




$("#id_create_input_file").on("change", function () {
    var fullPath = $(this).val();
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath
            .lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
    }
    $("#id_create_label_file").html(filename);
});

//filters
$("#filter_municipal").change(function (e) {
    if ($(this).val() === "Municipal") {
        $("#container_filter_cidades").show()
        $("#container_filter_estados").show()
        $("#container_filter_tipo").hide()
    } else {
        $("#container_filter_cidades").hide()
        $("#container_filter_estados").hide()
        $("#container_filter_tipo").show()
    }
    $("#filter_filter").prop('disabled', false);
})

$("#filter_filter").click(function (e) {
    $("#id_lista_frota > tr").show();
    if ($("#filter_municipal").children("option:selected").val() === "Municipal") {
        var busca = $("#filter_cidades").children("option:selected").val().toLowerCase();
        if ((busca === '')) {
            $("#id_lista_frota tr").filter(function () {
                $(this).toggle(!($(this).text().toLowerCase().indexOf("intermunicipal") > -1))
            });
        } else {
            $("#id_lista_frota tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(busca) > -1)
            });
        }
    } else if ($("#filter_municipal").children("option:selected").val() === "Intermunicipal") {

        var busca = $("#filter_tipo").children("option:selected").val().toLowerCase();
        if ((busca === '')) {
            $("#id_lista_frota tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf("intermunicipal") > -1)
            });
        } else {
            $("#id_lista_frota tr").filter(function () {
                $(this).toggle($(this).text().toLowerCase().indexOf(busca) > -1)
            });
        }
    } else {
        $("#id_lista_frota tr").show();
    }

});

//dando toggle nos campos de tipo e tals

$("#modal_edit_municipal").change(function () {
    var ismunicipal = $(this).children("option:selected").val();
    if (ismunicipal === "true") {
        $("#container_modal_edit_tipo").hide()
        $("#container_modal_edit_tipo").prop('required', false);
        $("#container_modal_edit_estados").show();
        $("#container_modal_edit_estados").prop('required', true);
        $("#container_modal_edit_cidades").show();
        $("#container_modal_edit_cidades").prop('required', true);

    } else {
        $("#container_modal_edit_tipo").show();
        $("#container_modal_edit_tipo").prop('required', true);
        $("#container_modal_edit_estados").hide();
        $("#container_modal_edit_estados").prop('required', false);
        $("#container_modal_edit_cidades").hide();
        $("#container_modal_edit_cidades").prop('required', false);

    }
})


$("#modal_create_municipal").change(function () {
    var ismunicipal = $(this).children("option:selected").val();
    if (ismunicipal === "true") {
        $("#container_modal_create_tipo").hide()
        $("#container_modal_create_tipo").prop('required', false);
        $("#container_modal_create_estados").show();
        $("#container_modal_create_estados").prop('required', true);
        $("#container_modal_create_cidades").show();
        $("#container_modal_create_cidades").prop('required', true);

    } else {
        $("#container_modal_create_tipo").show();
        $("#container_modal_create_tipo").prop('required', true);
        $("#container_modal_create_estados").hide();
        $("#container_modal_create_estados").prop('required', false);
        $("#container_modal_create_cidades").hide();
        $("#container_modal_create_cidades").prop('required', false);

    }
})


//pegando as cidades pelos estados
$("#filter_estados, #modal_create_estados, #modal_edit_estados").change(function () {
    var campo = "";
    var array_field = "";
    switch ($(this).attr('id')) {
        case "filter_estados":
            campo = "filter_cidades"
            array_field = "cidade_nome"
            break;
        case "modal_create_estados":
            campo = "modal_create_cidades"
            array_field = "cidade_id"
            break;
        case "modal_edit_estados":
            campo = "modal_edit_cidades"
            array_field = "cidade_id"
            break;
    }
    var str = $(this).children("option:selected").val();
    $.ajax({
        url: '<?= base_url("ajax/cidades/por_estado") ?>',
        type: 'POST',

        data: 'estado_id=' + str,
        dataType: 'json',
        beforeSend: function () {
            showLoadingModal("Carregando Cidades")
        },
        success: function (result) {
            if (result['success']) {
                $('#' + campo).empty()
                $.each(result["data"], function (key, value) {
                    $('#' + campo).append($(' <option> ').text(value['cidade_nome']).attr('value', value[array_field]));
                });
            } else { }
        },
        error: function (error) {
            showWarningModal(error['responseText']);
            console.log(error)
        },
        complete: function () {
            $('#' + campo).trigger("change");
            setTimeout(closeLoadingModal, 500)
        }
    });

});
