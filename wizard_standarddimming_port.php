<?php include 'header.php'; ?>
<?php
	switch ($_GET['port'])
	{
		case 1:
			$port="Daylight";
			$label="LABEL_DAYLIGHT";
			break;
		case 2:
			$port="Actinic";
			$label="LABEL_ACTINIC";
			break;
		case 3:
			$port="Daylight 2";
			$label="LABEL_DAYLIGHT2";
			break;
		case 4:
			$port="Actinic 2";
			$label="LABEL_ACTINIC2";
			break;
	}
?>

<script>
$( function() {
	$("#<?php echo $label; ?>").button();
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("dimming_<?php echo $port; ?>_waveform", $('input:checked').val());
		localStorage.setItem("<?php echo $label; ?>", $('#<?php echo $label; ?>').val());
		window.location.href = "<?php if ($_GET['port']==1) echo 'wizard_standarddimming.php'; else echo 'wizard_standarddimming_port.php?port='.($_GET['port']-1); ?>";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("dimming_<?php echo $port; ?>_waveform", $('input:checked').val());
		localStorage.setItem("<?php echo $label; ?>", $('#<?php echo $label; ?>').val());
		if ($('input:checked').val()=="slope" || $('input:checked').val()=="parabola")
		{
			window.location.href = "wizard_standarddimming_settings.php?waveform=" + $('input:checked').val() + "&port=<?php echo $_GET['port'] ?>";
		}
		else
		{
			var num_ports=2;
			if (localStorage.getItem("board")=="ra_star") num_ports=4;
			if (<?php echo $_GET['port'] ?> ==num_ports)
			{
				if (localStorage.getItem("dimmingexpansion")=="true")
				{
					window.location.href = "wizard_dimmingexpansion_port.php?port=0";
				}
				else
				{
					if(localStorage.getItem("rfexpansion")=="true")
					{
						window.location.href = "wizard_rfexpansion.php";
					}
					else
					{
						if(localStorage.getItem("jebaoattachment")=="true")
						{
							window.location.href = "wizard_dcpumpattachment.php";
						}
						else
						{		
							if (localStorage.getItem("buzzer")=="true")
							{
								window.location.href = "wizard_buzzer.php";
							}
							else
							{
								window.location.href = "wizard_ifthen.php";
							}
						}
					}
				}
			}
			else
			{
				window.location.href = "wizard_standarddimming_port.php?port=<?php echo ($_GET['port']+1) ?>";
			}
		}
	});
	if(localStorage.getItem("dimming_<?php echo $port; ?>_waveform")!=null)
		$("input[name=dimming_<?php echo $port; ?>_waveform][value=" + localStorage.getItem("dimming_<?php echo $port; ?>_waveform") + "]").prop('checked', true);
	if(localStorage.getItem("board")=="ra_star")
		$("#star_buzzer").html("<p>Reef Angel Star has a built-in buzzer. You do not need to assign any dimming channel to buzzer.</p>");
	if(localStorage.getItem("<?php echo $label; ?>")!="" && localStorage.getItem("<?php echo $label; ?>")!=null) $("#<?php echo $label; ?>").val(localStorage.getItem("<?php echo $label; ?>"));
	
});
</script>

<div id="sidemenu" class="split split-horizontal">
<div id=logo></div>
<a href="/webwizard"><img src="image/left_arrow.png" align="absmiddle"> Back to Code View</a>
<button id=go_board class="ui-button ui-widget ui-corner-all go_buttons">Board</button>
<button id=go_memory class="ui-button ui-widget ui-corner-all go_buttons">Memory</button>
<button id=go_temperature class="ui-button ui-widget ui-corner-all go_buttons">Temperature</button>
<button id=go_expansion class="ui-button ui-widget ui-corner-all go_buttons">Expansion</button>
<button id=go_attachment class="ui-button ui-widget ui-corner-all go_buttons">Attachments</button>
<button id=go_mainrelay class="ui-button ui-widget ui-corner-all go_buttons">Main Relay</button>
<button id=go_relayexpansion class="ui-button ui-widget ui-corner-all go_buttons">Relay Expansion 1</button>
<button id=go_relayexpansion2 class="ui-button ui-widget ui-corner-all go_buttons">Relay Expansion 2</button>
<button id=go_standarddimming class="ui-button ui-widget ui-corner-all go_buttons">Standard Dimming</button>
<button id=go_dimmingexpansion class="ui-button ui-widget ui-corner-all go_buttons">Dimming Expansion</button>
<button id=go_rfexpansion class="ui-button ui-widget ui-corner-all go_buttons">RF Expansion</button>
<button id=go_dcpumpattachment class="ui-button ui-widget ui-corner-all go_buttons">DC Pump</button>
<button id=go_buzzer class="ui-button ui-widget ui-corner-all go_buttons">Buzzer</button>
<button id=go_ifthen class="ui-button ui-widget ui-corner-all go_buttons">If / Then</button>

<button id=go_ready class="ui-button ui-widget ui-corner-all go_buttons">Generate</button>

</div>
<div id="main" class="split split-horizontal">
    <h1>Reef Angel Web Wizard</h1>
    <h2>Standard Dimming</h2>
	<p>What type of waveform would you like to use on your <?php echo $port; ?> dimming channel?</p>
    <div id="star_buzzer"></div>
    <div class="cc-selector">
        <input checked="checked" id="slope" type="radio" name="dimming_<?php echo $port; ?>_waveform" value="slope" />
        <label class="drinkcard-cc slope" for="slope">Slope</label>
        <input id="parabola" type="radio" name="dimming_<?php echo $port; ?>_waveform" value="parabola" />
        <label class="drinkcard-cc parabola"for="parabola">Parabola</label>
        <input id="moonphase" type="radio" name="dimming_<?php echo $port; ?>_waveform" value="moonphase" />
        <label class="drinkcard-cc moonphase"for="moonphase">Moonphase</label>
        <input id="buzzer" type="radio" name="dimming_<?php echo $port; ?>_waveform" value="buzzer" />
        <label class="drinkcard-cc buzzer"for="buzzer">Buzzer</label>
        <input id="none" type="radio" name="dimming_<?php echo $port; ?>_waveform" value="none" />
        <label class="drinkcard-cc none"for="none">None</label>
    </div>
    <p>
        <label for="<?php echo $label; ?>"><?php echo $port; ?> Channel Label: </label>
        <input type="text" id="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $port; ?>">
	</p>    
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>