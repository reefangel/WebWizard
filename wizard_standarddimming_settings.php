<?php include 'header.php'; ?>
<?php
	switch ($_GET['port'])
	{
		case 1:
			$port="Daylight";
			break;
		case 2:
			$port="Actinic";
			break;
		case 3:
			$port="Daylight 2";
			break;
		case 4:
			$port="Actinic 2";
			break;
	}
?>

<script>
$( function() {
    $.widget( "ui.timespinner", $.ui.spinner, {
      options: {
        // seconds
        step: 60 * 1000,
        // hours
        page: 60
      },
 
      _parse: function( value ) {
        if ( typeof value === "string" ) {
          // already a timestamp
          if ( Number( value ) == value ) {
            return Number( value );
          }
          return +Globalize.parseDate( value );
        }
        return value;
      },
 
      _format: function( value ) {
        return Globalize.format( new Date(value), "t" );
      }
    });		
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		save_settings();
		window.location.href = "wizard_standarddimming_port.php?port=<?php echo $_GET['port']; ?>";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		save_settings();
		var num_ports=2;
		if (localStorage.getItem("board")=="ra_star") num_ports=4;
		if (<?php echo $_GET['port'] ?> ==num_ports)
		{
			if (localStorage.getItem("dimmingexpansion")=="true")
			{
				window.location.href = "wizard_dimmingexpansion_port.php?port=0";
			}
			else
			{
				if (localStorage.getItem("rfexpansion")=="true")
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
						if (localStorage.getItem("buzzer")=="true")
						{
							window.location.href = "wizard_buzzer.php";
						}
						else
						{
							window.location.href = "wizard_ifthen.php";
						}
					}
				}
			}
		}
		else
		{
			window.location.href = "wizard_standarddimming_port.php?port=<?php echo ($_GET['port']+1) ?>";
		}
	});
	$('#start_time').timespinner();
	$('#end_time').timespinner();
	$('#start_percent').spinner({min: 0, max: 100});	
	$('#end_percent').spinner({min: 0, max: 100});	
	$('#duration').spinner({min: 0, max: 100});	
	if("<?php echo $_GET['waveform']; ?>"=="parabola") $("#duration_enabled").hide();
	load_settings();

});

function save_settings()
{
	localStorage.setItem("dimming_<?php echo $port; ?>_start_time", $('#start_time').val());
	localStorage.setItem("dimming_<?php echo $port; ?>_start_percent", $('#start_percent').val());
	localStorage.setItem("dimming_<?php echo $port; ?>_duration", $('#duration').val());
	localStorage.setItem("dimming_<?php echo $port; ?>_end_time", $('#end_time').val());
	localStorage.setItem("dimming_<?php echo $port; ?>_end_percent", $('#end_percent').val());
}

function load_settings()
{
	if (localStorage.getItem("dimming_<?php echo $port; ?>_start_time")!==null)
		$('#start_time').val(localStorage.getItem("dimming_<?php echo $port; ?>_start_time"));
	if (localStorage.getItem("dimming_<?php echo $port; ?>_start_percent")!==null)
		$('#start_percent').val(localStorage.getItem("dimming_<?php echo $port; ?>_start_percent"));
	if (localStorage.getItem("dimming_<?php echo $port; ?>_duration")!==null)
		$('#duration').val(localStorage.getItem("dimming_<?php echo $port; ?>_duration"));
	if (localStorage.getItem("dimming_<?php echo $port; ?>_end_time")!==null)
		$('#end_time').val(localStorage.getItem("dimming_<?php echo $port; ?>_end_time"));
	if (localStorage.getItem("dimming_<?php echo $port; ?>_end_percent")!==null)
		$('#end_percent').val(localStorage.getItem("dimming_<?php echo $port; ?>_end_percent"));
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
    <h2>Standard Dimming</h2>
	<p><?php echo $port; ?> dimming channel settings:</p>
    <img src="image/<?php echo $_GET['waveform']; ?>settings.png"><br>
    <label for="start_time">Start Time:</label>
    <input id="start_time" name="start_time" value="09:00 AM"><br>
    <label for="start_percent">Start %:</label>
    <input id="start_percent" name="start_percent" value="15"><br>
    <div id="duration_enabled">
    <label for="duration">Duration (min):</label>
    <input id="duration" name="duration" value="60"><br>
    </div>
    <label for="end_time">End Time:</label>
    <input id="end_time" name="end_time" value="05:00 PM"><br>
    <label for="end_percent">End %:</label>
    <input id="end_percent" name="end_percent" value="70"><br>
    
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>