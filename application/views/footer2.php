<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
?>


</div>



</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
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

    // $("#navbar-toggler-btn").click(function(e) {
    //     e.preventDefault();
    //     $("#navbar-toggler-btn").toggleClass("fa-arrow-circle-down")
    //     $("#navbar-toggler-btn").toggleClass("fa-arrow-circle-up")
    //     });
</script>

</body>

</html> 