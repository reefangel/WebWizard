<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("relayexpansion", $('#relayexpansion').prop('checked'));
		localStorage.setItem("dimmingexpansion", $('#dimmingexpansion').prop('checked'));
		localStorage.setItem("rfexpansion", $('#rfexpansion').prop('checked'));
		localStorage.setItem("salinityexpansion", $('#salinityexpansion').prop('checked'));
		localStorage.setItem("ioexpansion", $('#ioexpansion').prop('checked'));
		localStorage.setItem("orpexpansion", $('#orpexpansion').prop('checked'));
		localStorage.setItem("phexpansion", $('#phexpansion').prop('checked'));
		localStorage.setItem("wlexpansion", $('#wlexpansion').prop('checked'));
		localStorage.setItem("multiwlexpansion", $('#multiwlexpansion').prop('checked'));
		localStorage.setItem("ropeexpansion", $('#ropeexpansion').prop('checked'));
		localStorage.setItem("parexpansion", $('#parexpansion').prop('checked'));
		window.location.href = "wizard_overheatprobe.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("relayexpansion", $('#relayexpansion').prop('checked'));
		localStorage.setItem("dimmingexpansion", $('#dimmingexpansion').prop('checked'));
		localStorage.setItem("rfexpansion", $('#rfexpansion').prop('checked'));
		localStorage.setItem("salinityexpansion", $('#salinityexpansion').prop('checked'));
		localStorage.setItem("ioexpansion", $('#ioexpansion').prop('checked'));
		localStorage.setItem("orpexpansion", $('#orpexpansion').prop('checked'));
		localStorage.setItem("phexpansion", $('#phexpansion').prop('checked'));
		localStorage.setItem("wlexpansion", $('#wlexpansion').prop('checked'));
		localStorage.setItem("multiwlexpansion", $('#multiwlexpansion').prop('checked'));
		localStorage.setItem("ropeexpansion", $('#ropeexpansion').prop('checked'));
		localStorage.setItem("parexpansion", $('#parexpansion').prop('checked'));
		window.location.href = "wizard_attachments.php";
	});
	$( "input" ).checkboxradio({
      icon: false
    });
	if(localStorage.getItem("relayexpansion")=="true")
		$('#relayexpansion').prop('checked',localStorage.getItem("relayexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("dimmingexpansion")=="true")
		$('#dimmingexpansion').prop('checked',localStorage.getItem("dimmingexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("rfexpansion")=="true")
		$('#rfexpansion').prop('checked',localStorage.getItem("rfexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("salinityexpansion")=="true")
		$('#salinityexpansion').prop('checked',localStorage.getItem("salinityexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("ioexpansion")=="true")
		$('#ioexpansion').prop('checked',localStorage.getItem("ioexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("orpexpansion")=="true")
		$('#orpexpansion').prop('checked',localStorage.getItem("orpexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("phexpansion")=="true")
		$('#phexpansion').prop('checked',localStorage.getItem("phexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("wlexpansion")=="true")
		$('#wlexpansion').prop('checked',localStorage.getItem("wlexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("multiwlexpansion")=="true")
		$('#multiwlexpansion').prop('checked',localStorage.getItem("multiwlexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("ropeexpansion")=="true")
		$('#ropeexpansion').prop('checked',localStorage.getItem("ropeexpansion")).checkboxradio( "refresh" );
	if(localStorage.getItem("parexpansion")=="true")
		$('#parexpansion').prop('checked',localStorage.getItem("parexpansion")).checkboxradio( "refresh" );
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
    <h2>Expansion Modules</h2>
	<p>Please select the expansion modules you have:</p>
    <label for="relayexpansion" class="expansion">Relay</label>
    <input type="checkbox" name="relayexpansion" id="relayexpansion"><br>
    <label for="dimmingexpansion" class="expansion">Dimming</label>
    <input type="checkbox" name="dimmingexpansion" id="dimmingexpansion"><br>
    <label for="rfexpansion" class="expansion">RF</label>
    <input type="checkbox" name="rfexpansion" id="rfexpansion"><br>
    <label for="salinityexpansion" class="expansion">Salinity</label>
    <input type="checkbox" name="salinityexpansion" id="salinityexpansion"><br>
    <label for="ioexpansion" class="expansion">I/O</label>
    <input type="checkbox" name="ioexpansion" id="ioexpansion"><br>
    <label for="orpexpansion" class="expansion">ORP</label>
    <input type="checkbox" name="orpexpansion" id="orpexpansion"><br>
    <label for="phexpansion" class="expansion">pH</label>
    <input type="checkbox" name="phexpansion" id="phexpansion"><br>
    <label for="wlexpansion" class="expansion">Water Level</label>
    <input type="checkbox" name="wlexpansion" id="wlexpansion"><br>
    <label for="multiwlexpansion" class="expansion">Multi Channel Water Level</label>
    <input type="checkbox" name="multiwlexpansion" id="multiwlexpansion"><br>
    <label for="ropeexpansion" class="expansion">Rope Leak Detector</label>
    <input type="checkbox" name="ropeexpansion" id="ropeexpansion"><br>
    <label for="parexpansion" class="expansion">PAR</label>
    <input type="checkbox" name="parexpansion" id="parexpansion"><br>

    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>