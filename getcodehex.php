<?php
header("Access-Control-Allow-Origin: http://forum.reefangel.com");
if($_POST["u"])
{
	$folder = $_POST["u"];
	if ($_POST["b"]=="RA_PLUS" || $_POST["b"]=="RA_STAR")
	{
		echo base64_encode(file_get_contents("D:\\webwizard\\openwrt\\output\\".$folder."\\firmware.hex"));
	}
	if ($_POST["b"]=="RA_CLOUD")
	{
		echo base64_encode(file_get_contents("D:\\webwizard\\openwrt\\output\\".$folder."\\firmware.bin"));
	}
}
?>