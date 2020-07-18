<?php
if($_POST["u"] && $_POST["f"])
{
	define('ROOTPATH', __DIR__);
	$file    = ROOTPATH."\\sketch\\".$_POST["u"]."\\".$_POST["f"];

		if (unlink ($file))
			echo "File ".$_POST["f"]." deleted.";
		else
			echo "File ".$_POST["f"]." could not be deleted.";}
?>