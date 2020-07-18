<?php include 'header.php'; ?>
<script>
$( function() {
	var spinner = $('#overheattemp').spinner({min: 0, max: 150, step:0.1});
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("overheattemp", $('#overheattemp').spinner( "value" ));
		window.location.href = "wizard_temperature.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("overheattemp", $('#overheattemp').spinner( "value" ));
		window.location.href = "wizard_overheatprobe.php";
	});
	if(localStorage.getItem("overheattemp")!="" && localStorage.getItem("overheattemp")!==null)
	{
		spinner.spinner( "value",localStorage.getItem("overheattemp"));
	}
	else
	{
		spinner.spinner( "value",75);
	}
	if(localStorage.getItem("temperatureunit")=="celsius")
	{
		$('#lbl_overheattemp').html("Overheat temperature (&deg;C):");
	}
	else
	{
		$('#lbl_overheattemp').html("Overheat temperature (&deg;F):");
	}
	
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
    <h2>Temperature Settings</h2>
	<p>Which temperature value would you like to set the controller to flag for an overhead condition?</p>
    <label id="lbl_overheattemp" for="overheattemp">Overheat temperature:</label>
    <input id="overheattemp" name="overheattemp">
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>