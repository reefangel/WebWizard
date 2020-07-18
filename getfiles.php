<?php
if($_POST["u"])
{
	define('ROOTPATH', __DIR__);
	$dir    = ROOTPATH."\\sketch\\".$_POST["u"];
	
	$files = array_diff(scandir($dir), array('.', '..'));
	$files = json_encode($files);
	echo $files;
}
?>