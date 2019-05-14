<?php

class MY_Loader extends CI_Loader
{
    public function script($script)
    {
        $this->load->helper('file');
        echo APPPATH."scripts/".$script.".js";
        echo "<script>";
        $file = read_file(APPPATH."scripts/".$script.".js");
        $find = array( "<?= base_url('", '<?= base_url("' );
        $find2 = array('") ?>', "') ?>");
        $file=str_replace($find, base_url(), $file);
        $file=str_replace($find2, "" , $file);
        echo $file;
        echo "</script>";
    }
}
