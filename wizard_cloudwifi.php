<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("wifipassword", $('#wifipassword').val());
		localStorage.setItem("wifissid", $('#wifissid').val());
		window.location.href = "wizard_cloudpassword.php?b="+localStorage.getItem("board");
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("wifipassword", $('#wifipassword').val());
		localStorage.setItem("wifissid", $('#wifissid').val());
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			window.location.href = "wizard_cloud_fallback.php";
		}
		else if (localStorage.getItem("board")=="ra_cloud_wifi")
		{
			window.location.href = "wizard_ready.php?b=ra_cloud_wifi";
		}
	});
	$( "input[name=memsettings]" ).checkboxradio();
	$('#encrypt').button().click(function() {
		$.post("encryptpwd.php",
		{
			p:$('#wifipassword').val(),
		},
		function(response,status){
			if (status=="success")
			{
				$("#wifipassword").val(response);
				$('#next').button("enable");
			}
		});
	});
	$("#wifissid").button();
	$("#wifipassword").button();
	$('#next').button("disable");
});
</script>

<div id="sidemenu" class="split split-horizontal">
<div id=logo></div>
<a href="/webwizard"><img src="image/left_arrow.png" align="absmiddle"> Back to Code View</a>
<button id=go_board class="ui-button ui-widget ui-corner-all go_buttons">Board</button>
<button id=go_ready class="ui-button ui-widget ui-corner-all go_buttons">Generate</button>

</div>
<div id="main" class="split split-horizontal">
    <h1>Reef Angel Web Wizard</h1>
    <h2>Wifi Settings</h2>
	<p>Please enter the SSID and password of your wifi network:</p>
    <label for="wifissid">Wifi SSID:</label>
    <input type="text" id="wifissid" name="wifissid" value="">
    <br>
    <label for="wifipassword">Wifi password: </label>
    <input type="text" id="wifipassword" name="wifipassword" value=""><button id=encrypt class="ui-button ui-widget ui-corner-all">Encrypt</button>
    <p>In order to protect your password, we need to encrypt it. Please click the encrypt button before proceeding.</p>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>