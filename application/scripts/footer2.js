

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('.alert').alert();
});

$(".reset_form_on_modal_close").on('hidden.bs.modal', function () {
    $(this).find("form").trigger("reset").find("input").removeClass("is-valid is-invalid");
})

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});

$('.dual-collapse').on('shown.bs.collapse', function (e) {
    $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-down").addClass("fa-arrow-circle-up");
});

$('.dual-collapse').on('hidden.bs.collapse', function () {
    $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-up").addClass("fa-arrow-circle-down");
});

// <!-- Funções para validar os campos de  -->
function escapeRegExp(str) {
    return str.replace(/([^a-zA-Z0-9\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-])/g, "");
}

$('.alphanumeric-only, .letters-only, .numbers-only').bind('keyup blur', function () {
    $(this).val(escapeRegExp($(this).val()))
})
$('.alphanumeric-only').bind('keypress blur', function (event) {
    var keyCode = event.keyCode;
    if (keyCode == 8 || (keyCode >= 35 && keyCode <= 40) || keyCode == 116 || keyCode == 9 || keyCode == 8) {
        return;
    }
    var regex = /[^a-zA-Z0-9\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-]/;
    $(this).attr("pattern", "[a-zA-Z0-9\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-]+")
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$('.letters-only').bind('keypress blur', function (event) {
    var keyCode = event.keyCode;
    if (keyCode == 8 || (keyCode >= 35 && keyCode <= 40) || keyCode == 116 || keyCode == 9 || keyCode == 8) {
        return;
    }
    var regex = /[^a-zA-Z\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-]/;
    $(this).attr("pattern", "[a-zA-Z\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-]+")
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

$('.email-only').bind('keypress blur', function (event) {
    var keyCode = event.keyCode;
    if (keyCode == 8 || (keyCode >= 35 && keyCode <= 40) || keyCode == 116 || keyCode == 9 || keyCode == 8) {
        return;
    }
    var regex = /[^a-zA-Z0-9_@.-]/;
    $(this).attr("pattern", "[a-zA-Z0-9_@.-]+")
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
        event.preventDefault();
        return false;
    }
});
$('.numbers-only').bind('keypress blur', function (event) {
    var keyCode = event.keyCode;
    if (keyCode == 8 || (keyCode >= 35 && keyCode <= 40) || keyCode == 116 || keyCode == 9 || keyCode == 8) {
        return;
    }
    var regex = /[^0-9]/;
    $(this).attr("pattern", "[0-9]+")
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (regex.test(key)) {
        event.preventDefault();
        return false;
    }
});

// // <!-- Função para deixar vermelho os campos que estiverem vazios -->
// (function () {
//     'use strict';
//     window.addEventListener('load', function () {
//         var forms = document.getElementsByClassName('needs-validation');
//         var validation = Array.prototype.filter.call(forms, function (form) {
//             form.addEventListener('submit', function (event) {
//                 if (form.checkValidity() === false) {
//                     event.preventDefault();
//                     event.stopPropagation();
//                 }
//                 form.classList.add('was-validated');
//             }, false);
//         });
//     }, false);
// })();


// <!-- Funções para abrir e fechar o modal de carregamento -->
function showLoadingModal(message) {
    $("#loading-modal-txt").html(message)
    $("#loading_modal").modal({
        backdrop: "static", //nao pode fechar
        keyboard: false, //nem pelo teclado
        show: true //e mostra
    });
}

// <!-- Funções para abrir e fechar o modal de warning -->
function showWarningModal(message) {
    $("#message-modal-txt").html(message)
    $("#message_modal").modal({
        keyboard: false, //nem pelo teclado
        show: true //e mostra
    });
}
$('#message_modal').on('hidden.bs.modal', function (e) {
    $("#message-modal-txt").html("");
})

function showErrorModal(title, message) {
    $("#error_modal_title").html(title)
    $("#error_modal_txt").html(message)
    $("#error_modal").modal({
        keyboard: false, //nem pelo teclado
        show: true //e mostra
    });
}
$('#error_modal').on('hidden.bs.modal', function (e) {
    $("#error_modal_title").html("")
    $("#error_modal_txt").html("")
})

function showSuccessModal(title, message) {
    $("#success_modal_title").html(title)
    $("#success_modal_txt").html(message)
    $("#success_modal").modal({
        keyboard: false, //nem pelo teclado
        show: true //e mostra
    });
}
$('#success_modal').on('hidden.bs.modal', function (e) {
    $("#success_modal_title").html("")
    $("#success_modal_txt").html("")
})


function closeLoadingModal() {
    $("#loading-modal-txt").html(" ")
    $("#loading_modal").modal("hide")
}

