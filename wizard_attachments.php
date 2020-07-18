<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("wifiattachment", $('#wifiattachment').prop('checked'));
		localStorage.setItem("cloudwifiattachment", $('#cloudwifiattachment').prop('checked'));
		localStorage.setItem("jebaoattachment", $('#jebaoattachment').prop('checked'));
		localStorage.setItem("ranetattachment", $('#ranetattachment').prop('checked'));
		window.location.href = "wizard_expansion.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("wifiattachment", $('#wifiattachment').prop('checked'));
		localStorage.setItem("cloudwifiattachment", $('#cloudwifiattachment').prop('checked'));
		localStorage.setItem("jebaoattachment", $('#jebaoattachment').prop('checked'));
		localStorage.setItem("ranetattachment", $('#ranetattachment').prop('checked'));
		if(localStorage.getItem("board")=="ra_star")
			window.location.href = "wizard_relayexpansion.php?box=1";
		else
			window.location.href = "wizard_mainrelay.php";
	});
	$( "input" ).checkboxradio({
      icon: false
    }).click(function(event, ui) {
		if($(this)[0].name=="wifiattachment" && $(this).prop('checked'))
			$('#cloudwifiattachment').prop( "checked", false ).checkboxradio( "refresh" );
		if($(this)[0].name=="cloudwifiattachment" && $(this).prop('checked'))
			$('#wifiattachment').prop( "checked", false ).checkboxradio( "refresh" );
		
	});
	if(localStorage.getItem("wifiattachment")=="true")
		$('#wifiattachment').prop('checked',localStorage.getItem("wifiattachment")).checkboxradio( "refresh" );
	if(localStorage.getItem("cloudwifiattachment")=="true")
		$('#cloudwifiattachment').prop('checked',localStorage.getItem("cloudwifiattachment")).checkboxradio( "refresh" );
	if(localStorage.getItem("jebaoattachment")=="true")
		$('#jebaoattachment').prop('checked',localStorage.getItem("jebaoattachment")).checkboxradio( "refresh" );
	if(localStorage.getItem("ranetattachment")=="true")
		$('#ranetattachment').prop('checked',localStorage.getItem("ranetattachment")).checkboxradio( "refresh" );
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
    <h2>Attachments</h2>
	<p>Please select the attachments you have:</p>
    <label for="wifiattachment" class="expansion">Wifi</label>
    <input type="checkbox" name="wifiattachment" id="wifiattachment"><br>
    <label for="cloudwifiattachment" class="expansion">Cloud Wifi</label>
    <input type="checkbox" name="cloudwifiattachment" id="cloudwifiattachment"><br>
    <label for="jebaoattachment" class="expansion">DC Pump (Jebao / Tunze / Speedwave)</label>
    <input type="checkbox" name="jebaoattachment" id="jebaoattachment"><br>
    <label for="ranetattachment" class="expansion">RANet Add-On</label>
    <input type="checkbox" name="ranetattachment" id="ranetattachment"><br>

    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>