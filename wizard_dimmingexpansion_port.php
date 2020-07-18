<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		var num_ports=2;
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		<?php if ($_GET['port']==0) echo 'window.location.href = "wizard_standarddimming_port.php?port="+num_ports;' ; else echo 'window.location.href = "wizard_dimmingexpansion_port.php?port='.($_GET['port']-1).'";'; ?>
		
		localStorage.setItem("dimming_<?php echo $_GET['port']; ?>_waveform", $('input:checked').val());
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("dimming_<?php echo $_GET['port']; ?>_waveform", $('input:checked').val());
		if ($('input:checked').val()=="slope" || $('input:checked').val()=="parabola")
		{
			window.location.href = "wizard_dimmingexpansion_settings.php?waveform=" + $('input:checked').val() + "&port=<?php echo $_GET['port'] ?>";
		}
		else
		{
			if (<?php echo $_GET['port'] ?> ==5)
			{
				if (localStorage.getItem("buzzer")=="true")
				{
					window.location.href = "wizard_buzzer.php";
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
							window.location.href = "wizard_ifthen.php";
						}
					}
				}
			}
			else
			{
				window.location.href = "wizard_dimmingexpansion_port.php?port=<?php echo ($_GET['port']+1) ?>";
			}
		}
	});
	if(localStorage.getItem("dimming_<?php echo $_GET['port']; ?>_waveform")!=null)
		$("input[name=dimming_<?php echo $_GET['port']; ?>_waveform][value=" + localStorage.getItem("dimming_<?php echo $_GET['port']; ?>_waveform") + "]").prop('checked', true);

	
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
    <h2>Dimming Expansion</h2>
	<p>What type of waveform would you like to use on your dimming expansion channel <?php echo $_GET['port']; ?>?</p>
    <div class="cc-selector">
        <input checked="checked" id="slope" type="radio" name="dimming_<?php echo $_GET['port']; ?>_waveform" value="slope" />
        <label class="drinkcard-cc slope" for="slope">Slope</label>
        <input id="parabola" type="radio" name="dimming_<?php echo $_GET['port']; ?>_waveform" value="parabola" />
        <label class="drinkcard-cc parabola"for="parabola">Parabola</label>
        <input id="moonphase" type="radio" name="dimming_<?php echo $_GET['port']; ?>_waveform" value="moonphase" />
        <label class="drinkcard-cc moonphase"for="moonphase">Moonphase</label>
        <input id="buzzer" type="radio" name="dimming_<?php echo $_GET['port']; ?>_waveform" value="buzzer" />
        <label class="drinkcard-cc buzzer"for="buzzer">Buzzer</label>
        <input id="none" type="radio" name="dimming_<?php echo $_GET['port']; ?>_waveform" value="none" />
        <label class="drinkcard-cc none"for="none">None</label>
    </div>
    
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>