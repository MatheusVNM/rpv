
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.alert').alert();
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
        $("#container_modal_create_tipo").hide();
        $("#container_modal_create_estados").show();
        $("#container_modal_create_cidades").show();

    } else {
        $("#container_modal_create_tipo").show();
        $("#container_modal_create_estados").hide();
        $("#container_modal_create_cidades").hide();
    }
})


//pegando as cidades pelos estados
$("#filter_estados, #modal_create_estados, #modal_edit_estados").change(function () {
    var field = "";
    switch ($(this).attr('id')) {
        case "filter_estados":
            field = "filter_cidades"
            break;
        case "modal_create_estados":
            field = "modal_create_cidades"
            break;
        case "modal_edit_estados":
            field = "modal_edit_cidades"
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
                $('#' + field).empty()
                $.each(result["data"], function (key, value) {
                    $('#' + field).append($(' <option> ').text(value['cidade_nome']).attr('value', value['cidade_nome']));
                });
            } else { }
        },
        error: function (error) {
            alert('deu erro: veja o console')
            console.log(error)
        },
        complete: function () {
            $('#' + field).trigger("change");
            setTimeout(closeLoadingModal, 500)
        }
    });

});
