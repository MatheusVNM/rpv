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



<!-- Modal deploy-->
<div class="modal fade" id="message_modal" tabindex="-1" role="dialog" aria-labelledby="message_label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="message_label">Modal warning</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="message-modal-txt">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal error-->
<div class="modal fade" id="error_modal" tabindex="-1" role="dialog" aria-labelledby="error_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="error_modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <i class="fa fa-plus-circle text-danger mx-auto my-2 fa-5x rotate-45"></i>
          <div id="error_modal_txt" class="font-weight-bold"></div>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal success-->
<div class="modal fade" id="success_modal" tabindex="-1" role="dialog" aria-labelledby="success_modal_title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="success_modal_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <center>
          <i class="fa fa-check-circle text-success mx-auto my-2 fa-5x"></i>
          <div id="success_modal_txt" class="font-weight-bold"></div>
        </center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
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
<?php $this->load->script("footer2") ?>

<?php  if(isset($js)) $this->load->script("cases/" . $js) ?>



</body>

</html>