
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

            showWarningModal(result['success'] + "<br />" + result['message']+"<br />"+result['error_fields']);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_create_rodoviaria").modal('hide');
                $("#modal_create_form").trigger("reset");
                atualizarTabela()
            } else {
                $('#modal_create_warning').html(result['message']);
                $("#modal_create_form").find("input").addClass("is-valid");
                $("#modal_create_form").find("select").addClass("is-valid");
                $.each(result['error_fields'], function(key, value){
                    $("#modal_create_form [name='"+value+"']").addClass('is-invalid').removeClass('is-valid');
                })
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
    alert("a");

    return false;
});


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
    var array_field="";
    switch ($(this).attr('id')) {
        case "filter_estados":
            campo = "filter_cidades"
            array_field="cidade_nome"
            break;
        case "modal_create_estados":
            campo = "modal_create_cidades"
            array_field="cidade_id"
            break;
        case "modal_edit_estados":
            campo = "modal_edit_cidades"
            array_field="cidade_id"
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
