<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->helper('url');
$this->load->view("header2");
?>

<!-- Body init -->
<?= primaryAlert('<h4>Dashboard</h4><hr>Aqui é pagina inicial do Dashboard, por enquanto, não tem anda de importante para ser exibido aqui')?>

<!-- Body end -->
<?php
$this->load->view("footer2.php")
?> 