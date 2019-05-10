<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('echo_r')) {
	function echo_r($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}



