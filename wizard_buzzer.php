<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("buzzer_ato", $('#buzzer_ato').prop('checked'));
		localStorage.setItem("buzzer_overheat", $('#buzzer_overheat').prop('checked'));
		localStorage.setItem("buzzer_buslock", $('#buzzer_buslock').prop('checked'));
		if (localStorage.getItem("jebaoattachment")=="true")
		{
			window.location.href = "wizard_dcpumpattachment.php";
		}
		else
		{
			if (localStorage.getItem("dimmingexpansion")=="true")
			{
				window.location.href = "wizard_dimmingexpansion_port.php?port=5";
			}
			else
			{
				if (localStorage.getItem("board")=="ra_star")
				{
					window.location.href = "wizard_standarddimming_port.php?port=4";
				}
				else
				{
					window.location.href = "wizard_standarddimming_port.php?port=2";
				}
			}
		}
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("buzzer_ato", $('#buzzer_ato').prop('checked'));
		localStorage.setItem("buzzer_overheat", $('#buzzer_overheat').prop('checked'));
		localStorage.setItem("buzzer_buslock", $('#buzzer_buslock').prop('checked'));
		window.location.href = "wizard_ifthen.php";
	});
	$( "input" ).checkboxradio({
      icon: false
    });
	if(localStorage.getItem("buzzer_ato")=="true")
		$('#buzzer_ato').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("buzzer_overheat")=="true")
		$('#buzzer_overheat').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("buzzer_buslock")=="true")
		$('#buzzer_buslock').prop('checked',true).checkboxradio( "refresh" );
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
    <h2>Buzzer</h2>
	<p>Please choose when to turn buzzer on:</p>
    <label for="buzzer_ato" class="expansion">ATO Timeout</label>
    <input type="checkbox" name="buzzer_ato" id="buzzer_ato"><br>
    <label for="buzzer_overheat" class="expansion">Overheat</label>
    <input type="checkbox" name="buzzer_overheat" id="buzzer_overheat"><br>
    <label for="buzzer_buslock" class="expansion">Bus Lock</label>
    <input type="checkbox" name="buzzer_buslock" id="buzzer_buslock"><br>

    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>