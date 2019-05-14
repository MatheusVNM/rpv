function editar(id) {
    $.ajax({
        data: "rodoviaria_id=" + id,
        method: "post",
        dataType: "json",
        url: "<?= base_url('ajax/rodoviarias/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Rodoviarias');
        },
        success: function (result) {
            if (result['success']) {
                console.log(result['data']['rodoviaria_nome'])
                $("#modal_edit_id").val(result['data']['rodoviaria_id'])
                $("#modal_edit_nome").val(result['data']['rodoviaria_nome'])
                $("#modal_edit_end").val(result['data']['rodoviaria_rua'])
                $("#modal_edit_numero").val(result['data']['rodoviaria_numero'])
                $("#modal_edit_telefone").val(result['data']['rodoviaria_telefone'])
                $("#modal_edit_email").val(result['data']['rodoviaria_email'])
                $("#modal_edit_cep").val(result['data']['rodoviaria_cep'])
                $("#modal_edit_bairro").val(result['data']['rodoviaria_bairro'])
                $("#modal_edit_qntdBox").val(result['data']['rodoviaria_qntdbox'])
                $("#modal_edit_estado").val(result['data']['estado_id'])
                $("#modal_edit_estado").trigger('change');
                setTimeout(function () {

                    $("#modal_edit_cidade").val(result['data']['rodoviaria_cidade_id'])
                }, 600);

                $("#modal_edit_rodoviaria").modal('show');
            } else {
                alert('Rodoviaria não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}

function info(rodoviaria_id) {
    $.ajax({
        data: "rodoviaria_id=" + rodoviaria_id,
        method: "post",
        dataType: "json",
        url: "<?= base_url('ajax/rodoviarias/getSingle') ?>",
        beforeSend: function () {
            showLoadingModal('Buscando Dados Completos Rodoviarias');
        },
        success: function (result) {
            if (result['success']) {
                console.log(result['data']['rodoviaria_nome'])
                $("#modal_info_nome").val(result['data']['rodoviaria_nome'])
                $("#modal_info_end").val(result['data']['rodoviaria_rua'])
                $("#modal_info_numero").val(result['data']['rodoviaria_numero'])
                $("#modal_info_telefone").val(result['data']['rodoviaria_telefone'])
                $("#modal_info_email").val(result['data']['rodoviaria_email'])
                $("#modal_info_cep").val(result['data']['rodoviaria_cep'])
                $("#modal_info_bairro").val(result['data']['rodoviaria_bairro'])
                $("#modal_info_qntdBox").val(result['data']['rodoviaria_qntdbox'])
                $("#modal_info_estado").val(result['data']['rodoviaria_uf'])
                $("#modal_info_cidade").val(result['data']['rodoviaria_cidade'])
                $("#modal_info_rodoviaria").modal('show');
            } else {
                alert('Rodoviaria não encontrada');
                console.log(result);
            }
        },
        error: function (error) {
            console.log(error);
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
}

function atualizarTabela() {
    $.ajax({
        dataType: "json",
        url: "<?= base_url('ajax/rodoviarias/get') ?>",
        beforeSend: function () {
            showLoadingModal('Atualizando Rodoviarias');
        },
        success: function (data) {
            console.log(data);
            $("#rodoviaria_tabela").empty();
            $.each(data, function (key, value) {
                console.log(value);
                $('#rodoviaria_tabela').append(createRodoviariaTr(
                    value['rodoviaria_id'],
                    value['rodoviaria_codigo'],
                    value['rodoviaria_nome'],
                    value['rodoviaria_cidade'],
                    value['rodoviaria_uf'],
                    value['rodoviaria_email'],
                    value['rodoviaria_telefone'],
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
function createRodoviariaTr(id, codigo, nome, cidade, uf, email, telefone) {
    return '<tr>' +
        '                    <th scope="row">' + codigo + '</th>' +
        '                    <td>' + nome + '</td>' +
        '                    <td>' + cidade + '</td>' +
        '                    <td>' + uf + '</td>' +
        '                    <td>' + email + '</td>' +
        '                    <td>' + telefone + '</td>' +
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
$("#modal_create_close").click(function () {
    $("#modal_create_form").trigger("reset");
})
// <!-- Ajax form submit -->
// <!-- Metodo em ajax para fazer o submit do modal create (id="modal_create_form") -->
$("#modal_create_form").submit(function () {
    console.log($(this).serialize())
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        url: "<?= base_url('ajax/rodoviarias/create') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result['message']);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_create_rodoviaria").modal('hide');
                $("#modal_create_form").trigger("reset");
                atualizarTabela()
            } else {
                $('#modal_create_warning').html(result['message']);
            }
        },
        error: function (error) {
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
    return false;
});
// <!-- Metodo em ajax para fazer o submit do modal edit (id="modal_edit_form") -->
$("#modal_edit_form").submit(function () {
    console.log($(this).serialize())
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        url: "<?= base_url('ajax/rodoviarias/edit') ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal('Enviando Dados')
        },
        success: function (result) {
            console.log(result['message']);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_edit_rodoviaria").modal('hide');
                atualizarTabela()
            } else {
                $('#modal_edit_warning').html(result['message']);
            }
        },
        error: function (error) {
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)

        }
    });
    return false;
});


// <!-- verificar_rodoviaria_na_cidade -->
$("#modal_create_cidade").change(function () {
    var str = $(this).children("option:selected").val();
    $.ajax({
        url: '<?= base_url("ajax/rodoviarias/existe_na_cidade") ?>',
        type: 'POST',
        data: 'cidade_id=' + str,
        dataType: 'json',
        beforeSend: function () {
            showLoadingModal("Verificando existencia de rodoviarias na cidade selecionada")
        },
        success: function (result) {
            console.log(result);
            if (result['success']) {
                if (result['existe']) {
                    if ($("#rodoviaria_existente").hasClass("d-none")) {
                        $("#rodoviaria_existente").removeClass("d-none");
                    }
                    $("#rodoviaria_existente").html("Já existe uma rodoviaria nesta cidade");
                } else {
                    if (!$("#rodoviaria_existente").hasClass("d-none")) {
                        $("#rodoviaria_existente").addClass("d-none");
                    }
                    $("#rodoviaria_existente").html("");
                }
            } else { }
        },
        error: function (error) {
            console.log(error);
            alert('Houve algum erro. Se o erro persistir, contate o administrador dos sistema')

        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });

});
$("#modal_create_estado").change(function () {
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
                $('#modal_create_cidade').empty()
                $.each(result["data"], function (key, value) {
                    $('#modal_create_cidade').append($('<option>').text(value['cidade_nome']).attr('value', value['cidade_id']));
                });
            } else { }
        },
        error: function (error) {
            alert('deu erro: veja o console')
            console.log(error)
        },
        complete: function () {
            $("#modal_create_cidade").trigger("change");
            setTimeout(closeLoadingModal, 500)
        }
    });

});

$("#modal_edit_estado").change(function () {
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
                $('#modal_edit_cidade').empty()
                $.each(result["data"], function (key, value) {
                    $('#modal_edit_cidade').append($('<option>').text(value['cidade_nome']).attr('value', value['cidade_id']));
                });
            } else {
                
             }
        },
        error: function (error) {
            alert('deu erro: veja o console')
            console.log(error)
        },
        complete: function () {
            $("#modal_edit_cidade").trigger("change");
            setTimeout(closeLoadingModal, 500)
        }
    });

});
