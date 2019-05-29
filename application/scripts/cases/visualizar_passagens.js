//cadastra passagens geradas mensalmente de um trajeto
$("#modal_criar_passagens_geradas").submit(function () {
    console.log($(this).serialize())
    $.ajax({
        data: $(this).serialize(),
        type: "POST",
        url: "<?= base_url() ?>",
        dataType: "json",
        beforeSend: function () {
            showLoadingModal()
        },
        success: function (result) {
            console.log(result['error_fields'])
            console.log(result);
            if (result['success']) {
                $("#page_message").html(result['message']);
                $("#modal_criar_passagens_geradas").modal('hide');
                $(".modal-backdrop").removeClass('show');
                $(".modal-backdrop").addClass('d-none');
                $("#modal_criar_passagens_geradas").trigger("reset");
                atualizarTabela()
            } else {
                $('#modal_create_warning').html(result['message']);

                $("#modal_criar_passagens_geradas").find("input").removeClass("is-valid");
                $("#modal_criar_passagens_geradas").find("select").removeClass("is-valid");

                $("#modal_criar_passagens_geradas").find("input").removeClass("is-invalid");
                $("#modal_criar_passagens_geradas").find("select").removeClass("is-invalid");

                $("#modal_criar_passagens_geradas").find("input").addClass("is-valid");
                $("#modal_criar_passagens_geradas").find("select").addClass("is-valid");

                $("#modal_criar_passagens_geradas").find("textarea").addClass("is-valid");
                $("#modal_criar_passagens_geradas").find("select").addClass("is-valid");
                $.each(result['error_fields'], function (key, value) {
                    $("#modal_criar_passagens_geradas [name='" + value + "']").addClass('is-invalid').removeClass('is-valid');
                })
            }
        },
        error: function (error) {
            // showWarningModal(JSON.stringify(error));
            showErrorModal('Erro inesperado', "Um erro inesperado aconteceu. Aguarde um momento e tente novamente. Se o erro persistir, contacte o administrador")
            console.log(error)
        },
        complete: function () {
            setTimeout(closeLoadingModal, 500)
        }
    });
    return false;
});