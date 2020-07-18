<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("password", $('#password').val());
		window.location.href = "wizard_board.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("password", $('#password').val());
		if (localStorage.getItem("board")=="ra_cloud_hub" || localStorage.getItem("board")=="ra_cloud_wifi")
		{
			window.location.href = "wizard_cloudwifi.php";
		}
		else
		{
			window.location.href = "wizard_memory.php";
		}
	});
	$( "input[name=memsettings]" ).checkboxradio();
	$('#encrypt').button().click(function() {
		$.post("encryptpwd.php",
		{
			p:$('#password').val(),
		},
		function(response,status){
			if (status=="success")
			{
				$("#password").val(response);
				$('#next').button("enable");
			}
		});
	});
	$("#password").button();
	$('#next').button("disable");
});
</script>

<div id="sidemenu" class="split split-horizontal">
<div id=logo></div>
<a href="/webwizard"><img src="image/left_arrow.png" align="absmiddle"> Back to Code View</a>
<button id=go_board class="ui-button ui-widget ui-corner-all go_buttons">Board</button>
<?php
if ($_GET[b]!="ra_cloud_wifi" && $_GET[b]!="ra_cloud_hub")
{
?>
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
<?php
}
?>

<button id=go_ready class="ui-button ui-widget ui-corner-all go_buttons">Generate</button>

</div>
<div id="main" class="split split-horizontal">
    <h1>Reef Angel Web Wizard</h1>
    <h2>Cloud Server Settings</h2>
	<p>Please enter your forum server credentials to log in to the cloud server:</p>
    <label for="username">Forum username: <?php echo $user->data['username'];?></label>
    <br>
    <label for="password">Forum password: </label>
    <input type="text" id="password" name="password" value=""><button id=encrypt class="ui-button ui-widget ui-corner-all">Encrypt</button>
    <p>In order to protect your password, we need to encrypt it. Please click the encrypt button before proceeding.</p>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>