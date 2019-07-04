
$("#modal_create_form").submit(function () {
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('ajax/tarifa/encomenda/create') ?>",
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
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        enctype: 'multipart/form-data',
        url: "<?= base_url('ajax/tarifa/encomenda/update') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result)
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_edit").modal('hide');
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
        url: "<?= base_url('ajax/tarifa/encomenda/get') ?>",
        beforeSend: function () {
            showLoadingModal('Atualizando a Lista de Tarifas');
        },
        success: function (data) {
            if (data == null) {
                showErrorModal("Erro", "Nenhuma tarifa encontrada. Tente novamente mais tarde. Se o erro persistir, contate o criador do sistema.")
                return;
            }
            console.log(data);
            $("#id_lista_tarifa").empty();
            $.each(data, function (key, value) {
                console.log(value);
                $('#id_lista_tarifa').append(createTarifaTR(
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

function createTarifaTR(tarifaencomenda) {
    var retorno = "<tr>" +
        "<th>" + tarifaencomenda['tarifaencomenda_id'] + "</th>" +
        "<td>" + tarifaencomenda['tarifaencomenda_nome'] + "</td>" +
        "<td>" + tarifaencomenda['tarifaencomenda_preco_peso'] + "</td>" +
        "<td>" + tarifaencomenda['tarifaencomenda_preco_volume'] + "</td>" +
        "<td>"
        switch (tarifaencomenda['tarifaencomenda_tipocalculo']) {
            case "multiplicacao":
                retorno += "Multiplicação";
                break;
            case "soma":
                retorno += "Soma";
                break;
            default:
                retorno += "error";
        }

    retorno += '</td >' +
        '<td>' +
        '<button onclick="editar(' + tarifaencomenda["tarifaencomenda_id"] + ')" type="button" class="btn btn-warning btn-sm mr-1" id="id_opcao_editar" data-placement="top" title="Editar veículo" >' +
        '<span class="hvr-icon fa fa-edit mr-1"></span> Editar' +
        '</button>' +
        '<!-- <button onclick="inativar(' + tarifaencomenda["tarifaencomenda_id"] + ')" type="button" class="btn btn-danger btn-sm mr-1" title="Inativar da lista" id="id_opcao_inativar"  data-placement="top">' +
        '<span class="hvr-icon fa fa-trash mr-1"></span>Inativar' +
        '</button> -->' +
        '<button onclick="info(' + tarifaencomenda["tarifaencomenda_id"] + ')" type="button" class="btn btn-primary btn-sm mr-1" title="Mais informações sobre o veíuclo." id="id_opcao_visualizar" data-placement="top">' +
        '<span class="hvr-icon fa fa-info mr-1"></span>Info' +
        '</button>' +
        '</td>' +
        '</tr >'

    return retorno;
}

function editar(id) {
    $.ajax({
        data: "tarifaencomenda_id=" + id,
        method: "POST",
        dataType: "json",
        url: "<?= base_url('ajax/tarifa/encomenda/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Rodoviarias');
        },
        success: function (result) {
            console.log('R:', result);
            if (result['success']) {
                var onibus = result['data']
                $("#modal_edit_id_hidden").val(onibus['tarifaencomenda_id'])
                $("#modal_edit_id").val(onibus['tarifaencomenda_id'])
                $("#modal_edit_nome").val(onibus['tarifaencomenda_nome'])
                $("#modal_edit_preco_peso").val(onibus['tarifaencomenda_preco_peso'])
                $("#modal_edit_preco_volume").val(onibus['tarifaencomenda_preco_volume'])
                $("#modal_edit_tipocalculo").val(onibus['tarifaencomenda_tipocalculo'])
            } else {
                alert('Tarifa não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(function () {
                closeLoadingModal()
                $("#modal_edit").modal('show');
            }, 500)

        }
    });
}


function info(id) {
    $.ajax({
        data: "tarifaencomenda_id=" + id,
        method: "POST",
        dataType: "json",
        url: "<?= base_url('ajax/tarifa/encomenda/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Tarifa');
        },
        success: function (result) {
            console.log('R:', result);
            if (result['success']) {
                var onibus = result['data']
                $("#modal_info_id").val(onibus['tarifaencomenda_id'])
                $("#modal_info_nome").val(onibus['tarifaencomenda_nome'])
                $("#modal_info_preco_peso").val(onibus['tarifaencomenda_preco_peso'])
                $("#modal_info_preco_volume").val(onibus['tarifaencomenda_preco_volume'])
                $("#modal_info_tipocalculo").val(onibus['tarifaencomenda_tipocalculo'])
            } else {
                alert('Tarifa não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(function () {
                closeLoadingModal()
                $("#modal_info").modal('show');
            }, 500)

        }
    });
}
