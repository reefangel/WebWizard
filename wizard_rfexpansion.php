<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("rfmode", $('#rfmode').val());
		localStorage.setItem("rfspeed", $('#rfspeed').val());
		localStorage.setItem("rfduration", $('#rfduration').val());
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		var num_ports=2;
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		if(localStorage.getItem("dimmingexpansion")=="true")
			window.location.href = "wizard_dimmingexpansion_port.php?port=5";
		else
			window.location.href = "wizard_standarddimming_port.php?port="+num_ports;
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("rfmode", $('#rfmode').val());
		localStorage.setItem("rfspeed", $('#rfspeed').val());
		localStorage.setItem("rfduration", $('#rfduration').val());
		if(localStorage.getItem("jebaoattachment")=="true")
			window.location.href = "wizard_dcpumpattachment.php";
		else
			window.location.href = "wizard_ifthen.php";
	});
	$('#rfmode').selectmenu({
		change: function( event, ui ) {
			 if (ui.item.value=="ShortPulse" || ui.item.value=="LongPulse" || ui.item.value=="NutrientTransport")
				 $('#rfduration_enable').show();
			 else 
				 $('#rfduration_enable').hide();
		}
	});
	$('#rfspeed').spinner({min: 0, max: 100});	
	$('#rfduration').spinner({min: 0, max: 32000});	
	if(localStorage.getItem("rfmode")!="" && localStorage.getItem("rfmode")!="null")
	{
		$('#rfmode').val(localStorage.getItem("rfmode"));
		$('#rfmode').selectmenu("refresh");
		if (localStorage.getItem("rfmode")=="ShortPulse" || localStorage.getItem("rfmode")=="LongPulse" || localStorage.getItem("rfmode")=="NutrientTransport")
			$('#rfduration_enable').show();
		else 
			$('#rfduration_enable').hide();
		
	}
	if (localStorage.getItem("rfspeed")!==null)
		$('#rfspeed').val(localStorage.getItem("rfspeed"));
	if (localStorage.getItem("rfduration")!==null)
		$('#rfduration').val(localStorage.getItem("rfduration"));
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
    <h2>Vortech Mode</h2>
	<p>Please choose the default vortech mode</p>
    <label for="rfmode">Vortech Mode:</label>
    <select name="rfmode" id="rfmode">
      <option selected="selected" value ="Constant">Constant</option>
      <option value ="Lagoon">Lagoon</option>
      <option value ="ReefCrest">Reefcrest</option>
      <option value ="ShortPulse">Short Pulse</option>
      <option value ="LongPulse">Long Pulse</option>
      <option value ="NutrientTransport">Nutrient Transport</option>
      <option value ="TidalSwell">Tidal Swell</option>
    </select>
    <br>
    <label for="rfspeed">Vortech Speed (%):</label>
    <input id="rfspeed" name="rfspeed" value="70"><br>
    <div id="rfduration_enable">
        <label for="rfduration">Vortech Duration (msec):</label>
        <input id="rfduration" name="rfduration" value="10"><br>
    </div>

    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>