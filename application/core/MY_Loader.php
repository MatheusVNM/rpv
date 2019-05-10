<?php

class MY_Loader extends CI_Loader
{
    public function script($script)
    {
        $this->load->helper('file');
        echo APPPATH."scripts/".$script.".js";
        echo "<script>";
        echo (read_file(APPPATH."scripts/".$script.".js"));
        echo "</script>";
    }
}
