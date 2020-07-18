<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
$user->session_begin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>Reef Angel Web Wizard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.5/socket.io.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/split.js"></script>
  <script src="js/shortcut.js"></script>
  <script src="js/globalize.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script src="js/date.js"></script>
  <script>
$( function() {
   Split(['#sidemenu', '#main'], {
      gutterSize: 8,
	  sizes: [15, 85],
	  minSize: 250,
      cursor: 'col-resize'
    });
	$('#go_buzzer').hide();
	$('#go_board').button().click(function() {
		window.location.href = "wizard_board.php";
	});
	$('#go_memory').button().click(function() {
		window.location.href = "wizard_memory.php";
	});
	$('#go_temperature').button().click(function() {
		window.location.href = "wizard_temperature.php";
	});
	$('#go_expansion').button().click(function() {
		window.location.href = "wizard_expansion.php";
	});
	$('#go_attachment').button().click(function() {
		window.location.href = "wizard_attachments.php";
	});
	$('#go_mainrelay').button().click(function() {
		window.location.href = "wizard_mainrelay.php";
	});
	$('#go_relayexpansion').button().click(function() {
		window.location.href = "wizard_relayexpansion.php?box=1";
	});
	$('#go_relayexpansion2').button().click(function() {
		window.location.href = "wizard_relayexpansion.php?box=2";
	});
	$('#go_standarddimming').button().click(function() {
		window.location.href = "wizard_standarddimming.php";
	});
	$('#go_dimmingexpansion').button().click(function() {
		window.location.href = "wizard_dimmingexpansion_port.php?port=0";
	});
	$('#go_rfexpansion').button().click(function() {
		window.location.href = "wizard_rfexpansion.php";
	});
	$('#go_dcpumpattachment').button().click(function() {
		window.location.href = "wizard_dcpumpattachment.php";
	});
	$('#go_buzzer').button().click(function() {
		window.location.href = "wizard_buzzer.php";
	});
	if(localStorage.getItem("board")=="ra_star")
	{
		$('#go_mainrelay').hide();
		localStorage.setItem("relayexpansion","true");
	}
	if(localStorage.getItem("relayexpansion")!="true")
		$('#go_relayexpansion').hide();
	if(localStorage.getItem("dimmingexpansion")!="true")
		$('#go_dimmingexpansion').hide();
	if(localStorage.getItem("rfexpansion")!="true")
		$('#go_rfexpansion').hide();
	if(localStorage.getItem("jebaoattachment")!="true")
		$('#go_dcpumpattachment').hide();
	if(localStorage.getItem("board")=="ra_star" || localStorage.getItem("dimming_Daylight_waveform")=="buzzer" || localStorage.getItem("dimming_Daylight 2_waveform")=="buzzer" || localStorage.getItem("dimming_Actinic_waveform")=="buzzer" || localStorage.getItem("dimming_Actinic 2_waveform")=="buzzer" || localStorage.getItem("dimming_0_waveform")=="buzzer" || localStorage.getItem("dimming_1_waveform")=="buzzer" || localStorage.getItem("dimming_2_waveform")=="buzzer" || localStorage.getItem("dimming_3_waveform")=="buzzer" || localStorage.getItem("dimming_4_waveform")=="buzzer" || localStorage.getItem("dimming_5_waveform")=="buzzer")
	{
		localStorage.setItem("buzzer",true);
		$('#go_buzzer').show();
	}
	else
	{
		localStorage.setItem("buzzer",false);
	}
	$('#go_ifthen').button().click(function() {
		window.location.href = "wizard_ifthen.php";
	});
	$('#go_ready').button().click(function() {
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			window.location.href = "wizard_ready.php?b=ra_cloud_hub";
		}
		else
		{
			if (localStorage.getItem("board")=="ra_cloud_wifi")
				window.location.href = "wizard_ready.php?b=ra_cloud_wifi";
			else
				window.location.href = "wizard_ready.php";
		}
	});
});  
  </script>
  </head>
  <body>
  