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

    $('.dual-collapse').on('shown.bs.collapse', function (e) {
       $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-down").addClass("fa-arrow-circle-up");
    });

    $('.dual-collapse').on('hidden.bs.collapse', function () {
       $(this).parent().find("#navbar-collapse-icon").removeClass("fa-arrow-circle-up").addClass("fa-arrow-circle-down");
    });

</script>


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