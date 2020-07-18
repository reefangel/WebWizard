<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		if(localStorage.getItem("board")=="ra_star")
			window.location.href = "<?php if ($_GET['box']==2) echo 'wizard_relayexpansion_ports.php?port=8&box=1'; else echo 'wizard_attachments.php';?>";
		else
			window.location.href = "<?php if ($_GET['box']==2) echo 'wizard_relayexpansion_ports.php?port=8&box=1'; else echo 'wizard_mainrelay_ports.php?port=8';?>";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		window.location.href = "wizard_relayexpansion_ports.php?port=<?php if ($_GET['box']==1) echo 1; else echo 11; ?>&box=<?php echo $_GET['box']; ?>";
	});
	$( "input" ).checkboxradio({
      icon: false
    });
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
    <h2>Expansion Relay Box <?php echo $_GET['box']; ?></h2>
	<p>On the following 8 steps, we are going to be assigning a function for each port on the expansion relay box <?php echo $_GET['box']; ?>.</p>
    <p>Each port number is identified on the picture below.</p>
	<p><img src="image/expansion_relay_small.png"></p>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>