<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
?>


</div>



</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade" id="loading_modal" tabindex="-1" role="dialog" aria-labelledby="loading_modal_Label">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="loader"></div>
                <div class="modal-txt" id="loading-modal-txt">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-select.min.js"); ?>"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

    $('.dual-collapse').on('shown.bs.collapse', function(e) {
        $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-down").addClass("fa-arrow-circle-up");
    });

    $('.dual-collapse').on('hidden.bs.collapse', function() {
        $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-up").addClass("fa-arrow-circle-down");
    });
</script>

<!-- Funções para validar os campos de  -->
<script>
    function escapeRegExp(str) {
        return str.replace(/([^a-zA-Z0-9\x20ÀÁÂÃÄÅàáâãÒÓÔÕòóôõÈÉÊèéêëÇçÌÍÎÏìíîïÙÚÛùúûÑñ-])/g, "");
    }

    $('.alphanumeric-only, .letters-only, .numbers-only').bind('keyup blur', function() {
        $(this).val(escapeRegExp($(this).val()))
    })
    $('.alphanumeric-only').bind('keypress blur', function(event) {
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

    $('.letters-only').bind('keypress blur', function(event) {
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

    $('.email-only').bind('keypress blur', function(event) {
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
    $('.numbers-only').bind('keypress blur', function(event) {
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
</script>

<!-- Função para deixar vermelho os campos que estiverem vazios -->
<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>


<!-- Funções para abrir e fechar o modal de carregamento -->
<script>
    function showLoadingModal(message) {
        $("#loading-modal-txt").html(message)
        $("#loading_modal").modal({
            backdrop: "static", //nao pode fechar
            keyboard: false, //nem pelo teclado
            show: true //e mostra
        });
    }

    function closeLoadingModal() {
        $("#loading-modal-txt").html(" ")
        $("#loading_modal").modal("hide")
    }
</script>
</body>

</html>