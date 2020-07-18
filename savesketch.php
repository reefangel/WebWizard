<?php
if($_POST["c"] && $_POST["u"] && $_POST["n"])
{
	$folder = $_POST["u"];
	
	if ($_POST["u"]!="Anonymous")
	{
		$path=realpath("./")."\\sketch\\".$folder."\\";
		if (!is_dir($path)) mkdir($path,0777);
		$myfile = fopen($path.$_POST["n"], "w") or die("Unable to open file!");
		fwrite($myfile, $_POST["c"]);
		fclose($myfile);
		echo $_POST["n"]." file saved to \\sketch\\".$folder."\\";
	}
}
?>