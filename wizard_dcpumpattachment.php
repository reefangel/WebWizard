<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		save_settings();
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		var num_ports=2;
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		if(localStorage.getItem("rfexpansion")=="true")
		{
			window.location.href = "wizard_rfexpansion.php";
		}
		else
		{
			if(localStorage.getItem("dimmingexpansion")=="true")
				window.location.href = "wizard_dimmingexpansion_port.php?port=5";
			else
				window.location.href = "wizard_standarddimming_port.php?port="+num_ports;
		}
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		save_settings();
		if (localStorage.getItem("buzzer")=="true")
		{
			window.location.href = "wizard_buzzer.php";
		}
		else
		{
			window.location.href = "wizard_ifthen.php";
		}
	});
	$('#dcpumpmode').selectmenu({
		change: function( event, ui ) {
			 if (ui.item.value=="ShortPulse" || ui.item.value=="LongPulse" || ui.item.value=="NutrientTransport")
				 $('#dcpumpduration_enable').show();
			 else 
				 $('#dcpumpduration_enable').hide();
		}
	});
	$('#dcpumpspeed').spinner({min: 0, max: 100});	
	$('#dcpumpduration').spinner({min: 0, max: 32000});	
	$('#dcpumpdaylight, #dcpumpactinic, #dcpumpdaylight2, #dcpumpactinic2').selectmenu();
	if (localStorage.getItem("dimmingexpansion")=="true")
		$('#dcpumpchannel0, #dcpumpchannel1, #dcpumpchannel2, #dcpumpchannel3, #dcpumpchannel4, #dcpumpchannel5').selectmenu();
	load_settings();
});

function save_settings()
{
	localStorage.setItem("dcpumpmode", $('#dcpumpmode').val());
	localStorage.setItem("dcpumpspeed", $('#dcpumpspeed').val());
	localStorage.setItem("dcpumpduration", $('#dcpumpduration').val());
	localStorage.setItem("dcpumpdaylight", $('#dcpumpdaylight').val());
	localStorage.setItem("dcpumpactinic", $('#dcpumpactinic').val());
	localStorage.setItem("dcpumpdaylight2", $('#dcpumpdaylight2').val());
	localStorage.setItem("dcpumpactinic2", $('#dcpumpactinic2').val());
	localStorage.setItem("dcpumpchannel0", $('#dcpumpchannel0').val());
	localStorage.setItem("dcpumpchannel1", $('#dcpumpchannel1').val());
	localStorage.setItem("dcpumpchannel2", $('#dcpumpchannel2').val());
	localStorage.setItem("dcpumpchannel3", $('#dcpumpchannel3').val());
	localStorage.setItem("dcpumpchannel4", $('#dcpumpchannel4').val());
	localStorage.setItem("dcpumpchannel5", $('#dcpumpchannel5').val());
}

function load_settings()
{
	if(localStorage.getItem("dcpumpmode")!="" && localStorage.getItem("dcpumpmode")!==null && localStorage.getItem("dcpumpmode")!="null")
	{
		$('#dcpumpmode').val(localStorage.getItem("dcpumpmode"));
		$('#dcpumpmode').selectmenu("refresh");
		if (localStorage.getItem("dcpumpmode")=="ShortPulse" || localStorage.getItem("dcpumpmode")=="LongPulse" || localStorage.getItem("dcpumpmode")=="NutrientTransport")
			$('#dcpumpduration_enable').show();
		else 
			$('#dcpumpduration_enable').hide();
		
	}
	if (localStorage.getItem("dcpumpspeed")!==null)
		$('#dcpumpspeed').val(localStorage.getItem("dcpumpspeed"));
	if (localStorage.getItem("dcpumpduration")!==null)
		$('#dcpumpduration').val(localStorage.getItem("dcpumpduration"));
	if (localStorage.getItem("board")=="ra_star")
		$('#dcpumpstar_enable').show()
	else
		$('#dcpumpstar_enable').hide()
	if (localStorage.getItem("dimmingexpansion")=="true")
		$('#dcpumpdimmingexpansion_enable').show()
	else
		$('#dcpumpdimmingexpansion_enable').hide()
	if(localStorage.getItem("dimming_Daylight_waveform")=="slope" || localStorage.getItem("dimming_Daylight_waveform")=="parabola" || localStorage.getItem("dimming_Daylight_waveform")=="buzzer")
	{
		$('#dcpumpdaylight').selectmenu("disable");
	}
	else
	{
		if(localStorage.getItem("dcpumpdaylight")!="" && localStorage.getItem("dcpumpdaylight")!==null && localStorage.getItem("dcpumpdaylight")!="null")
		{
			$('#dcpumpdaylight').val(localStorage.getItem("dcpumpdaylight"));
			$('#dcpumpdaylight').selectmenu("refresh");
		}
	}
	if(localStorage.getItem("dimming_Actinic_waveform")=="slope" || localStorage.getItem("dimming_Actinic_waveform")=="parabola" || localStorage.getItem("dimming_Actinic_waveform")=="buzzer")
	{
		$('#dcpumpactinic').selectmenu("disable");
	}
	else
	{
		if(localStorage.getItem("dcpumpactinic")!="" && localStorage.getItem("dcpumpactinic")!==null && localStorage.getItem("dcpumpactinic")!="null")
		{
			$('#dcpumpactinic').val(localStorage.getItem("dcpumpactinic"));
			$('#dcpumpactinic').selectmenu("refresh");
		}
	}
	if(localStorage.getItem("dimming_Daylight 2_waveform")=="slope" || localStorage.getItem("dimming_Daylight 2_waveform")=="parabola" || localStorage.getItem("dimming_Daylight 2_waveform")=="buzzer")
	{
		$('#dcpumpdaylight2').selectmenu("disable");
	}
	else
	{
		if(localStorage.getItem("dcpumpdaylight2")!="" && localStorage.getItem("dcpumpdaylight2")!==null && localStorage.getItem("dcpumpdaylight2")!="null")
		{
			$('#dcpumpdaylight2').val(localStorage.getItem("dcpumpdaylight2"));
			$('#dcpumpdaylight2').selectmenu("refresh");
		}
	}
	if(localStorage.getItem("dimming_Actinic 2_waveform")=="slope" || localStorage.getItem("dimming_Actinic 2_waveform")=="parabola" || localStorage.getItem("dimming_Actinic 2_waveform")=="buzzer")
	{
		$('#dcpumpactinic2').selectmenu("disable");
	}
	else
	{
		if(localStorage.getItem("dcpumpactinic2")!="" && localStorage.getItem("dcpumpactinic2")!==null && localStorage.getItem("dcpumpactinic2")!="null")
		{
			$('#dcpumpactinic2').val(localStorage.getItem("dcpumpactinic2"));
			$('#dcpumpactinic2').selectmenu("refresh");
		}
	}
	
<?php
	for ($a=0;$a<6;$a++)
	{
?>
	
	if(localStorage.getItem("dimming_<?php echo $a; ?>_waveform")=="slope" || localStorage.getItem("dimming_<?php echo $a; ?>_waveform")=="parabola" || localStorage.getItem("dimming_<?php echo $a; ?>_waveform")=="buzzer")
	{
		$('#dcpumpchannel<?php echo $a; ?>').selectmenu("disable");
	}
	else
	{
		if(localStorage.getItem("dcpumpchannel<?php echo $a; ?>")!="" && localStorage.getItem("dcpumpchannel<?php echo $a; ?>")!==null && localStorage.getItem("dcpumpchannel<?php echo $a; ?>")!="null")
		{
			if(localStorage.getItem("dimmingexpansion")==true)
			{
				$('#dcpumpchannel<?php echo $a; ?>').val(localStorage.getItem("dcpumpchannel<?php echo $a; ?>"));
				$('#dcpumpchannel<?php echo $a; ?>').selectmenu("refresh");
			}
		}
	}
<?php
	}
?>
	
}

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
    <h2>DC Pump Mode</h2>
	<p>Please choose the default DC Pump mode</p>
    <label for="dcpumpmode">DC Pump Mode:</label>
    <select name="dcpumpmode" id="dcpumpmode">
      <option selected="selected" value ="Constant">Constant</option>
      <option value ="Lagoon">Lagoon</option>
      <option value ="ReefCrest">Reefcrest</option>
      <option value ="ShortPulse">Short Pulse</option>
      <option value ="LongPulse">Long Pulse</option>
      <option value ="NutrientTransport">Nutrient Transport</option>
      <option value ="TidalSwell">Tidal Swell</option>
    </select>
    <br>
    <label for="dcpumpspeed">DC Pump Speed (%):</label>
    <input id="dcpumpspeed" name="dcpumpspeed" value="70"><br>
    <div id="dcpumpduration_enable">
        <label for="dcpumpduration">DC Pump Duration (msec):</label>
        <input id="dcpumpduration" name="dcpumpduration" value="10"><br>
    </div>
	<br>
    <label for="dcpumpdaylight">Daylight Channel:</label>
    <select name="dcpumpdaylight" id="dcpumpdaylight">
      <option selected="selected" value ="None">Not Used</option>
      <option value ="Sync">Sync</option>
      <option value ="AntiSync">Anti-Sync</option>
    </select>
    <br>
    <label for="dcpumpactinic">Actinic Channel:</label>
    <select name="dcpumpactinic" id="dcpumpactinic">
      <option selected="selected" value ="None">Not Used</option>
      <option value ="Sync">Sync</option>
      <option value ="AntiSync">Anti-Sync</option>
    </select>
    <br>
    <div id="dcpumpstar_enable">
        <label for="dcpumpdaylight2">Daylight 2 Channel:</label>
        <select name="dcpumpdaylight2" id="dcpumpdaylight2">
          <option selected="selected" value ="None">Not Used</option>
          <option value ="Sync">Sync</option>
          <option value ="AntiSync">Anti-Sync</option>
        </select>
        <br>
        <label for="dcpumpactinic2">Actinic 2 Channel:</label>
        <select name="dcpumpactinic2" id="dcpumpactinic2">
          <option selected="selected" value ="None">Not Used</option>
          <option value ="Sync">Sync</option>
          <option value ="AntiSync">Anti-Sync</option>
        </select>
    </div>
	<br>
    <div id="dcpumpdimmingexpansion_enable">
<?php
	for ($a=0;$a<6;$a++)
	{
?>
        <label for="dcpumpchannel<?php echo $a; ?>">Dimming Channel <?php echo $a; ?>:</label>
        <select name="dcpumpchannel<?php echo $a; ?>" id="dcpumpchannel<?php echo $a; ?>">
          <option selected="selected" value ="None">Not Used</option>
          <option value ="Sync">Sync</option>
          <option value ="AntiSync">Anti-Sync</option>
        </select>
        <br>
<?php
	}
?>
    
	</div>    
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>