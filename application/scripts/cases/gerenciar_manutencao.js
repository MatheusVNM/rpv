//pesquisa placa dos onibus
$("#NULLEDmodal_create_manutencao").change(function () {
    var str = $(this).children("option:selected").val();
    $.ajax({
        url: '<?= base_url("ajax/onibus/get") ?>',
        type: 'POST',
        data: 'onibus_id=' + str,
        dataType: 'json',
        beforeSend: function () {
            showLoadingModal("Carregando placa dos ônibus")
        },
        success: function (result) {
            if (result['success']) {
                $('#NULLEDmodal_create_manutencao').empty()
                $.each(result["data"], function (key, value) {
                    $('#NULLEDmodal_create_manutencao').append($('<option>').text(value['onibus_placa']).attr('value', value['onibus_id']));
                });
            } else {

            }
        },
        error: function (error) {
            alert('deu erro: veja o console')
            console.log(error)
        },
        complete: function () {
            $("#modal_create_manutencao").trigger("change");
            setTimeout(closeLoadingModal, 500)
        }
    });
});
//cadastra manutenção no banco
$("#modal_create_manutencao_form").submit(function () {
    console.log($(this).serialize())
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        url: "<?= base_url('ajax/manutencao/create') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result['error_fields'])
            console.log(result);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_create_manutencao").modal('hide');
                $("#id_modal_create_manutencao_form").trigger("reset");
                atualizarTabela()
            } else {
                $('#modal_create_warning').html(result['message']);

                $("#modal_create_manutencao_form").find("input").removeClass("is-valid");
                $("#modal_create_manutencao_form").find("select").removeClass("is-valid");

                $("#modal_create_manutencao_form").find("input").removeClass("is-invalid");
                $("#modal_create_manutencao_form").find("select").removeClass("is-invalid");

                $("#modal_create_manutencao_form").find("input").addClass("is-valid");
                $("#modal_create_manutencao_form").find("select").addClass("is-valid");

                $("#modal_create_manutencao_form").find("textarea").addClass("is-valid");
                $("#modal_create_manutencao_form").find("select").addClass("is-valid");
                $.each(result['error_fields'], function (key, value) {
                    $("#modal_create_manutencao_form [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
                })
            }
        },
        error: function (error) {
            showWarningModal(JSON.stringify(error));
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
        url: "<?= base_url('ajax/manutencao/get') ?>",
        beforeSend: function () {
            showLoadingModal('Atualizando manutenções');
        },
        success: function (data) {
            console.log(data);
            $("#id_lista_manutencoes").empty();
            $.each(data, function (key, value) {
                console.log(value);
                $('#id_lista_manutencoes').append(createManutencaoTr(
                    value['manutencao_id'],
                    value['onibus_placa'],
                    value['manutencao_dataInicio'],
                    value['manutencao_dataFim'],
                    value['manutencao_is_finalizada']
                ))
            })
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}
function createManutencaoTr(id, onibus_placa, manutencao_dataInicio, manutencao_dataFim, manutencao_is_finalizada) {
   var ma = manutencao_is_finalizada==1?"Finalizada":"Em progresso"
   
    return '<tr>' +
        '                    <th scope="row">' + onibus_placa + '</th>' +
        '                    <td>' + manutencao_dataInicio + '</td>' +
        '                    <td>' + manutencao_dataFim + '</td>' +
        '                    <td>' + ma + '</td>' +
        '                    <td>' +
        '                        <button type="button" onclick="editar(' + id + ')" class="btn my-1 btn-default btn-sm" id="opcoesConcessaoEditar" data-toggle="tooltip" data-placement="top" title="Editar rodoviaria" data-target="#editRodoviariaModal">' +
        '                            <span class="hvr-icon fa fa-edit mr-1"></span> Editar' +
        '                        </button>' +
        '                        <button type="submit" onclick="info(' + id + ')" class="btn my-1 btn-primary btn-sm" title="Informacao Adicional." data-toggle="tooltip" data-placement="top" data-target="#infoRodoviariaModal">' +
        '                            <span class="hvr-icon fa fa-eye mr-1"></span>Info' +
        '                        </button>' +
        '                    </td>' +
        '                </tr>'


}
function editar(id) {
    $.ajax({
        data: "manutencao_id=" + id,
        method: "post",
        dataType: "json",
        url: "<?= base_url('ajax/manutencao/getUnica') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos da Manutenção');
        },
        success: function (result) {
            if (result['success']) {
                console.log('success', result)
                $("#form_edit_manutencao_id").val(result['data']['manutencao_id'])
                $("#modal_edit_placa").val(result['data']['onibus_id'])
                $("#modal_edit_valor").val(result['data']['manutencao_valor'])
                $("#modal_edit_dataInicio").val(result['data']['manutencao_dataInicio'])
                $("#modal_edit_dataFim").val(result['data']['manutencao_dataFim'])
                $("#modal_edit_descricao").val(result['data']['manutencao_descricao'])
                $("#modal_edit_estado").trigger('change');
                $("#modal_edit_manutencao").modal('show');
            } else {
                alert('Manutenção não encontrada');
                console.log('false success', result);
            }
        },
        error: function (error) {
            // showWarningModal(JSON.stringify(error))
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}

function info(id) {
    $.ajax({
        data: "manutencao_id=" + id,
        method: "post",
        dataType: "json",
        url: "<?= base_url('ajax/manutencao/getUnica') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos da Manutenção');
        },
        success: function (result) {
            if (result['success']) {
                console.log('success', result)
                $("#modal_info_placa").val(result['data']['onibus_id'])
                $("#modal_info_valor").val(result['data']['manutencao_valor'])
                $("#modal_info_dataInicio").val(result['data']['manutencao_dataInicio'])
                $("#modal_info_dataFim").val(result['data']['manutencao_dataFim'])
                $("#modal_info_descricao").val(result['data']['manutencao_descricao'])
                $("#modal_info_estado").trigger('change');
                $("#modal_info_manutencao").modal('show');
            } else {
                alert('Manutenção não encontrada');
                console.log('false success', result);
            }
        },
        error: function (error) {
            // showWarningModal(JSON.stringify(error))
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}


// <!-- Metodo em ajax para fazer o submit do modal edit (id="modal_edit_form") -->
$("#modal_edit_manutencao_form").submit(function () {
    console.log($(this).serialize())
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        url: "<?= base_url('ajax/manutencao/edit') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            // showWarningModal(JSON.stringify(result))

            console.log(result['message']);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_edit_manutencao").modal('hide');
                $(".modal-backdrop").removeClass('show');
                atualizarTabela()
                //closemodal
            } else {
                $('#modal_edit_warning').html(result['message']);
            }
        },
        error: function (error) {
            alert("Ocorreu algum erro, veja o console")
            // showWarningModal(JSON.stringify(error))
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
            setTimeout(function(){
                $(".modal-backdrop").removeClass('show');
            }, 1200)
        }
    });
    return false;
});