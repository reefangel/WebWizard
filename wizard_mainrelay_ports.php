<?php include 'header.php'; ?>
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
		window.location.href = "<?php if ($_GET['port']>1) echo 'wizard_mainrelay_ports.php?port='.($_GET['port']-1); else echo 'wizard_mainrelay.php'; ?>";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		save_settings();
		<?php
			if ($_GET['port']==8)
			{
		?>
				if(localStorage.getItem("relayexpansion")=="true")
					window.location.href = "wizard_relayexpansion.php";
				else
					window.location.href = "wizard_standarddimming.php";
		<?php
			}
			else
			{
				echo "window.location.href = \"wizard_mainrelay_ports.php?port=".($_GET['port']+1)."\"";
			}
		?>
	});
	$( "input[name=function]" ).checkboxradio({
      icon: false
    });
	$( "input[name=topoff_settings]" ).checkboxradio();
	$( "input[name=wavemaker_settings]" ).checkboxradio();
	$('#timeschedule').click(function() {
		$('#timeschedule_options').show();
	});
	$('#timeschedule').click(function() {
		hide_all();
		$('#timeschedule_options').show();
	});
	$('#heater').click(function() {
		hide_all();
		$('#heater_options').show();
	});
	$('#chiller').click(function() {
		hide_all();
		$('#chiller_options').show();
	});
	$('#topoff').click(function() {
		hide_all();
		$('#topoff_options').show();
	});
	$('#wavemaker').click(function() {
		hide_all();
		$('#wavemaker_options').show();
	});
	$('#topoff_standardato,#topoff_singleatolow,#topoff_singleatohigh').click(function() {
		$('#atolevel').hide();	
	});
	$('#topoff_wlato').click(function() {
		$('#atolevel').show();	
	});
	$('#wavemaker_constant').click(function() {
		$('#wavemaker_timer2_enable').hide();	
		$('#wavemaker_timer1_label').html("Cycle every (sec):");
	});
	$('#wavemaker_random').click(function() {
		$('#wavemaker_timer2_enable').show();	
		$('#wavemaker_timer1_label').html("Cycle between (sec):");
	});
	$('#co2').click(function() {
		hide_all();
		$('#co2_options').show();
	});
	$('#ph').click(function() {
		hide_all();
		$('#ph_options').show();
	});
	$('#dosing').click(function() {
		hide_all();
		$('#dosing_options').show();
	});
	$('#delayed').click(function() {
		hide_all();
		$('#delayed_options').show();
	});
	$('#opposite').click(function() {
		hide_all();
		$('#opposite_options').show();
	});
	$('#alwayson').click(function() {
		hide_all();
		$('#alwayson_options').show();
	});
	$('#notused').click(function() {
		hide_all();
		$('#notused_options').show();
		$('#override_options').hide();
	});
	
	hide_all();
	$('#timeschedule_turnon').timespinner();	
	$('#timeschedule_turnoff').timespinner();	
	$('#timeschedule_delayed').spinner({min: 0, max: 255});	
	$('#heater_turnon').spinner({min: 0, max: 150, step:0.1});
	$('#heater_turnoff').spinner({min: 0, max: 150, step:0.1});
	$('#chiller_turnon').spinner({min: 0, max: 150, step:0.1});
	$('#chiller_turnoff').spinner({min: 0, max: 150, step:0.1});
	$('#topoff_timeoput').spinner({min: 0, max: 32000});	
	$('#topoff_lowlevel').spinner({min: 0, max: 100});	
	$('#topoff_highlevel').spinner({min: 0, max: 100});	
	$('#atolevel').hide();
	$('#wavemaker_timer1').spinner({min: 0, max: 255});	
	$('#wavemaker_timer2').spinner({min: 0, max: 255});	
	$('#wavemaker_timer2_enable').hide();
	$('#co2_turnon').spinner({min: 0, max: 14, step:0.01});
	$('#co2_turnoff').spinner({min: 0, max: 14, step:0.01});
	$('#ph_turnon').spinner({min: 0, max: 14, step:0.01});
	$('#ph_turnoff').spinner({min: 0, max: 14, step:0.01});
	$('#dosing_every').spinner({min: 0, max: 255});
	$('#dosing_for').spinner({min: 0, max: 255});
	$('#dosing_offset').spinner({min: 0, max: 255});
	$('#delayed_start').spinner({min: 0, max: 255});
	$('#opposite_port').selectmenu();
	$('#feeding_override, #waterchange_override, #lightson_override, #overheat_override, #leak_override').checkboxradio({
      icon: false
    });
	if (localStorage.getItem("wlexpansion")!="true") $("#topoff_wlato").checkboxradio( "option", "disabled", true );

	if(localStorage.getItem("relayexpansion")=="true")
	{
		for (a=1;a<=8;a++)
			$('#opposite_port').append("<option>Expansion Box Port " + a + "</option>");  
	}
	load_settings();
});
function hide_all(){
	$('#timeschedule_options').hide();
	$('#heater_options').hide();
	$('#chiller_options').hide();
	$('#topoff_options').hide();
	$('#wavemaker_options').hide();
	$('#co2_options').hide();
	$('#ph_options').hide();
	$('#dosing_options').hide();
	$('#delayed_options').hide();
	$('#opposite_options').hide();
	$('#alwayson_options').hide();
	$('#notused_options').hide();
	$('#override_options').show();
}
function save_settings(){
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_function",$("input[name=function]:radio:checked").attr('id'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnon",$('#timeschedule_turnon').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnoff",$('#timeschedule_turnoff').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_delayed",$('#timeschedule_delayed').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_heater_turnon",$('#heater_turnon').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_heater_turnoff",$('#heater_turnoff').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnon",$('#chiller_turnon').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnoff",$('#chiller_turnoff').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_topoff_settings",$('input[name=topoff_settings]:radio:checked').attr('id'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_topoff_timeoput",$('#topoff_timeoput').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_topoff_lowlevel",$('#topoff_lowlevel').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_topoff_highlevel",$('#topoff_highlevel').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_settings",$('input[name=wavemaker_settings]:radio:checked').attr('id'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer1",$('#wavemaker_timer1').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer2",$('#wavemaker_timer2').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_co2_turnon",$('#co2_turnon').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_co2_turnoff",$('#co2_turnoff').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_ph_turnon",$('#ph_turnon').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_ph_turnoff",$('#ph_turnoff').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_dosing_every",$('#dosing_every').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_dosing_for",$('#dosing_for').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_dosing_offset",$('#dosing_offset').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_delayed_start",$('#delayed_start').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_opposite_port",$('#opposite_port').val());
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_feeding_override", $('#feeding_override').prop('checked'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_waterchange_override", $('#waterchange_override').prop('checked'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_overheat_override", $('#overheat_override').prop('checked'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_leak_override", $('#leak_override').prop('checked'));
	localStorage.setItem("main_port_<?php echo $_GET['port']; ?>_lightson_override", $('#lightson_override').prop('checked'));
}

function load_settings(){
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_function")!==null)
	{
		$("input[name=function]").prop("checked",false).checkboxradio("refresh")
		$("#"+localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_function")).prop("checked",true).checkboxradio("refresh");
		$("#"+localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_function")+"_options").show();
	}
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnon")!==null)
		$('#timeschedule_turnon').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnon"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnoff")!==null)
		$('#timeschedule_turnoff').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_turnoff"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_delayed")!==null)
		$('#timeschedule_delayed').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_timeschedule_delayed"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_heater_turnon")!==null)
		$('#heater_turnon').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_heater_turnon"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_heater_turnoff")!==null)
		$('#heater_turnoff').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_heater_turnoff"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnon")!==null)
		$('#chiller_turnon').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnon"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnoff")!==null)
		$('#chiller_turnoff').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_chiller_turnoff"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_settings")!==null)
	{
		$("input[name=topoff_settings]").prop("checked",false).checkboxradio("refresh")
		$("#"+localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_settings")).prop("checked",true).checkboxradio("refresh");
	}
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_timeoput")!==null)
		$('#topoff_timeoput').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_timeoput"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_lowlevel")!==null)
		$('#topoff_lowlevel').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_lowlevel"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_highlevel")!==null)
		$('#topoff_highlevel').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_topoff_highlevel"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_settings")!==null)
	{
		$("input[name=wavemaker_settings]").prop("checked",false).checkboxradio("refresh")
		$("#"+localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_settings")).prop("checked",true).checkboxradio("refresh").click();
	}
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer1")!==null)
		$('#wavemaker_timer1').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer1"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer2")!==null)
		$('#wavemaker_timer2').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_wavemaker_timer2"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_co2_turnon")!==null)
		$('#co2_turnon').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_co2_turnon"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_co2_turnoff")!==null)
		$('#co2_turnoff').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_co2_turnoff"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_ph_turnon")!==null)
		$('#ph_turnon').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_ph_turnon"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_ph_turnoff")!==null)
		$('#ph_turnoff').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_ph_turnoff"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_every")!==null)
		$('#dosing_every').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_every"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_for")!==null)
		$('#dosing_for').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_for"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_offset")!==null)
		$('#dosing_offset').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_dosing_offset"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_delayed_start")!==null)
		$('#delayed_start').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_delayed_start"));
	if (localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_opposite_port")!==null)
		$('#opposite_port').val(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_opposite_port"));
	if(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_feeding_override")=="true")
		$('#feeding_override').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_waterchange_override")=="true")
		$('#waterchange_override').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_overheat_override")=="true")
		$('#overheat_override').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_leak_override")=="true")
		$('#leak_override').prop('checked',true).checkboxradio( "refresh" );
	if(localStorage.getItem("main_port_<?php echo $_GET['port']; ?>_lightson_override")=="true")
		$('#lightson_override').prop('checked',true).checkboxradio( "refresh" );
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
    <h2>Main Relay Box - Port <?php echo $_GET['port']?></h2>
    <p>Choose which function you would like to assign for Port <?php echo $_GET['port']?> of your main relay box:</p>
    <div>
        <div class="function_buttons">
            <label for="timeschedule" class="expansion">Time Schedule</label>
            <input type="radio" name="function" id="timeschedule"><br>
            <label for="heater" class="expansion">Heater</label>
            <input type="radio" name="function" id="heater"><br>
            <label for="chiller" class="expansion">Chiller/Fan</label>
            <input type="radio" name="function" id="chiller"><br>
            <label for="topoff" class="expansion">Auto Top Off</label>
            <input type="radio" name="function" id="topoff"><br>	
            <label for="wavemaker" class="expansion">Wavemaker</label>
            <input type="radio" name="function" id="wavemaker" <?php if ($_GET['port']==5 || $_GET['port']==6) echo ""; else echo"disabled"; ?>><br>
            <label for="co2" class="expansion">CO2 Control</label>
            <input type="radio" name="function" id="co2"><br>
            <label for="ph" class="expansion">pH Control</label>
            <input type="radio" name="function" id="ph"><br>
            <label for="dosing" class="expansion">Dosing Pump</label>
            <input type="radio" name="function" id="dosing"><br>
            <label for="delayed" class="expansion">Delayed Start</label>
            <input type="radio" name="function" id="delayed"><br>
            <label for="opposite" class="expansion">Opposite</label>
            <input type="radio" name="function" id="opposite"><br>
            <label for="alwayson" class="expansion">Always On</label>
            <input type="radio" name="function" id="alwayson"><br>
            <label for="notused" class="expansion">Not Used</label>
            <input type="radio" name="function" id="notused" checked><br>
        </div>
        <div id="timeschedule_options" class="function_options">
            <h3>Time Schedule</h3>
            <p>This function turns on/off at specific times of the day. Example of devices that may use this function are light fixtures, refugium light, moonlight, powerheads and fans. Delayed On is useful for MH ballasts.</p>
            <label for="timeschedule_turnon">Turn on at:</label>
            <input id="timeschedule_turnon" name="timeschedule_turnon" value="09:00 AM"><br>
            <label for="timeschedule_turnoff">Turn off at:</label>
            <input id="timeschedule_turnoff" name="timeschedule_turnoff" value="07:00 PM"><br>
            <label for="timeschedule_delayed">Delayed On (min):</label>
            <input id="timeschedule_delayed" name="timeschedule_delayed" value="0"><br>
        </div>
        <div id="heater_options" class="function_options">
            <h3>Heater</h3>
            <p>This function turns on/off at specific temperatures. Example of device that may use this function is an electric heater.</p>
            <label for="heater_turnon">Turn on at:</label>
            <input id="heater_turnon" name="heater_turnon" value="75"><br>
            <label for="heater_turnoff">Turn off at:</label>
            <input id="heater_turnoff" name="heater_turnoff" value="77"><br>
        </div>
        <div id="chiller_options" class="function_options">
            <h3>Chiller/Fan</h3>
            <p>This function turns on/off at specific temperatures. Example of devices that may use this function are fans, blowers, chillers and coolers.</p>
            <label for="chiller_turnon">Turn on at:</label>
            <input id="chiller_turnon" name="chiller_turnon" value="80"><br>
            <label for="chiller_turnoff">Turn off at:</label>
            <input id="chiller_turnoff" name="chiller_turnoff" value="78"><br>
        </div>
        <div id="topoff_options" class="function_options">
 	       <h3>Auto Top Off</h3>
           <p>This function turns on/off according to the state of one or more float switches.<br>For more information on each ATO type, please check out the online guide at <a href='http://forum.reefangel.com/viewtopic.php?f=7&t=240' target="_blank" class="outlink">ATO Float Switch Guide</a>.</p>
            <label for="topoff_standardato">Standard ATO</label>
            <input type="radio" id="topoff_standardato" name="topoff_settings" value="topoff_standardato" checked>
            <br>
            <label for="topoff_singleatolow">Single ATO (Low Port)</label>
            <input type="radio" id="topoff_singleatolow" name="topoff_settings" value="topoff_singleatolow">
            <br>
            <label for="topoff_singleatohigh">Single ATO (High Port)</label>
            <input type="radio" id="topoff_singleatohigh" name="topoff_settings" value="topoff_singleatohigh">
            <br>
            <label for="topoff_wlato">Water Level ATO</label>
            <input type="radio" id="topoff_wlato" name="topoff_settings" value="topoff_wlato">
            <br>
            <label for="topoff_timeoput">Timeout (sec):</label>
            <input id="topoff_timeoput" name="topoff_timeoput" value="60">
            <div id=atolevel>
            <br>
            <label for="topoff_lowlevel">Low Level (%):</label>
            <input id="topoff_lowlevel" name="topoff_lowlevel" value="10">
            <br>
            <label for="topoff_highlevel">High Level (%):</label>
            <input id="topoff_highlevel" name="topoff_highlevel" value="15">
            </div>
        </div>
        <div id="wavemaker_options" class="function_options">
 	       <h3>Wavemaker</h3>
           <p>This function turns on/off on a cycle at every specific or random number of seconds. Example of devices that may use this function are powerheads and circulation pumps.</p>
            <label for="wavemaker_constant">Constant</label>
            <input type="radio" id="wavemaker_constant" name="wavemaker_settings" value="wavemaker_constant" checked>
            <br>
            <label for="wavemaker_random">Random</label>
            <input type="radio" id="wavemaker_random" name="wavemaker_settings" value="wavemaker_random">
            <br>
            <label for="wavemaker_timer1" id="wavemaker_timer1_label">Cycle every (sec):</label>
            <input id="wavemaker_timer1" name="wavemaker_timer1" value="60">
            <div id="wavemaker_timer2_enable">
                <label for="wavemaker_timer2">and </label>
                <input id="wavemaker_timer2" name="wavemaker_timer2" value="120"><br>
            </div>
        </div>
        <div id="co2_options" class="function_options">
            <h3>CO2 Control</h3>
            <p>This function turns on/off at specific pH readings. The device that uses this function must lower pH. Example of device that may use this function is a calcium reactor.</p>
            <label for="co2_turnon">Turn on at pH:</label>
            <input id="co2_turnon" name="co2_turnon" value="7.20"><br>
            <label for="co2_turnoff">Turn off at pH:</label>
            <input id="co2_turnoff" name="co2_turnoff" value="7.10"><br>
        </div>
        <div id="ph_options" class="function_options">
            <h3>pH Control</h3>
            <p>This function turns on/off at specific pH readings. The device that uses this function must increase pH. Example of device that may use this function is a Kalk based Doser.</p>
            <label for="ph_turnon">Turn on at pH:</label>
            <input id="ph_turnon" name="ph_turnon" value="8.20"><br>
            <label for="ph_turnoff">Turn off at pH:</label>
            <input id="ph_turnoff" name="ph_turnoff" value="8.30"><br>
        </div>
        <div id="dosing_options" class="function_options">
            <h3>Dosing pump</h3>
            <p>This function turns on every specific minutes for a specific number of seconds. Use the offset when dosing different chemicals on same schedule, but with offset minutes apart. Example of device that may use this function is a dosing pump, kalk stirrers and feeders.</p>
            <label for="dosing_every">Turn on every (min):</label>
            <input id="dosing_every" name="dosing_every" value="60"><br>
            <label for="dosing_for">for (sec):</label>
            <input id="dosing_for" name="dosing_for" value="10"><br>
            <label for="dosing_offset">offset (min):</label>
            <input id="dosing_offset" name="dosing_offset" value="0"><br>
        </div>
        <div id="delayed_options" class="function_options">
            <h3>Delayed Start</h3>
            <p>This function turns on with a specific delay. The delayed start is triggered by controller reboot, Feeding and Water Change mode. Example of device that may use this function is a skimmer.</p>
            <label for="delayed_start">Delayed start (min):</label>
            <input id="delayed_start" name="delayed_start" value="10"><br>
        </div>
        <div id="opposite_options" class="function_options">
            <h3>Opposite</h3>
            <p>This function turns on/off in the opposite status of a specific Port. Example of device that may use this function are moonlights, powerheads and circulation pumps.</p>
            <label for="opposite_port">Opposite of port:</label>
            <select name="opposite_port" id="opposite_port">
              <option selected="selected">Main Box Port 1</option>
              <option>Main Box Port 2</option>
              <option>Main Box Port 3</option>
              <option>Main Box Port 4</option>
              <option>Main Box Port 5</option>
              <option>Main Box Port 6</option>
              <option>Main Box Port 7</option>
              <option>Main Box Port 8</option>
            </select>
        </div>
        <div id="alwayson_options" class="function_options">
            <h3>Always on</h3>
            <p>This function turns on at start-up. It does not turn off unless selected to turn off during Feeding or Water Change modes. Example of device that may use this function are return pumps, skimmers, powerheads and circulation pumps.</p>
        </div>
        <div id="notused_options" class="function_options">
            <h3>Not Used</h3>
            <p>This Port is not being used.</p>
        </div>
        <div id="override_options" class="function_options">
        <fieldset>
	        <legend>Port Mode</legend>
            <label for="feeding_override" class="override_buttons">Turn off this port on Feeding Mode</label>
            <input type="checkbox" name="feeding_override" id="feeding_override"><br>
            <label for="waterchange_override" class="override_buttons">Turn off this port on Water Change Mode</label>
            <input type="checkbox" name="waterchange_override" id="waterchange_override"><br>
            <label for="overheat_override" class="override_buttons">Turn off this port on Overheat</label>
            <input type="checkbox" name="overheat_override" id="overheat_override"><br>
            <label for="leak_override" class="override_buttons">Turn off this port on Leak</label>
            <input type="checkbox" name="leak_override" id="leak_override"><br>
            <label for="lightson_override" class="override_buttons">Turn on this port on Lights On Mode</label>
            <input type="checkbox" name="lightson_override" id="lightson_override"><br>
        </fieldset>
            
        </div>
        
        <div class="spacer" style="clear: both;"></div>
    </div>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>