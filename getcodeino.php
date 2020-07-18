<?php
if($_POST["u"] && $_POST["f"])
{
	define('ROOTPATH', __DIR__);
	$file    = ROOTPATH."\\sketch\\".$_POST["u"]."\\".$_POST["f"];

		echo file_get_contents($file);
}
?>