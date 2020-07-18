<?php include 'header.php'; ?>
<script>
var statements=[];
var edit_id=null;
var edit=false;
$( function() {
	var s_index=0;
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		localStorage.setItem("statements", JSON.stringify(statements));
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			window.location.href = "wizard_cloud_fallback.php";
		}
		else
		{
			if(localStorage.getItem("buzzer")=="true")
			{
				window.location.href = "wizard_buzzer.php";
			}
			else
			{		
				if(localStorage.getItem("jebaoattachment")=="true")
				{
					window.location.href = "wizard_dcpumpattachment.php";
				}
				else
				{		
					if(localStorage.getItem("rfexpansion")=="true")
					{
						window.location.href = "wizard_rfexpansion.php";
					}
					else
					{
						var num_ports=2;
						if (localStorage.getItem("board")=="ra_star") num_ports=4;
						if(localStorage.getItem("dimmingexpansion")=="true")
							window.location.href = "wizard_dimmingexpansion_port.php?port=5";
						else
							window.location.href = "wizard_standarddimming_port.php?port="+num_ports;
					}
				}
			}
		}
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("statements", JSON.stringify(statements));
		window.location.href = "wizard_ready.php";
	});
	$('#addnew').button({
	  icon: "ui-icon-circle-plus",
	}).click(function() {
		$('#ifthensettings').show();
		$('#addnew').hide();
	});
	$('#save').button({
	  icon: "ui-icon-circle-check",
	}).click(function() {
		var settings_ok=false;
		if ($('#ifoperator').val().indexOf("is")>=0 && $('#thenoperator').val().indexOf("turn")>=0) settings_ok=true;
		if ($('#ifoperator').val().indexOf("is")==-1 && $('#thenoperator').val().indexOf("turn")==-1 && $('#ifvalue').val()!="" && $('#thenvalue').val()!="") settings_ok=true;
		if ($('#ifoperator').val().indexOf("is")==-1 && $('#thenoperator').val().indexOf("turn")>=0 && $('#ifvalue').val()!="") settings_ok=true;
		if ($('#ifoperator').val().indexOf("is")>=0 && $('#thenoperator').val().indexOf("turn")==-1 && $('#thenvalue').val()!="") settings_ok=true;
		if (settings_ok)
		{
			if (edit)
			{
				edit=false;
				console.log(edit_id);
				statements[edit_id][1]=$('#params').val();
				statements[edit_id][2]=$('#ifoperator').val();
				statements[edit_id][3]=$('#ifvalue').val();
				statements[edit_id][4]=$('#results').val();
				statements[edit_id][5]=$('#thenoperator').val();
				statements[edit_id][6]=$('#thenvalue').val();
				build_statements();
			}
			else
			{
				if ($('#statements').html().indexOf("configured")!=-1) $('#statements').html("");
				statements.push([s_index,$('#params').val(),$('#ifoperator').val(),$('#ifvalue').val(),$('#results').val(),$('#thenoperator').val(),$('#thenvalue').val()]);
				build_statements();
				s_index++;
			}
			$('#ifthensettings').hide();
			$('#addnew').show();
		}
		else
		{
			$( "#dialog-message" ).dialog("open");
		}
	});
	$('#params').selectmenu({
		change: function( event, ui ) {
			CheckIfValue(ui.item.value);
		}
	});
	$('#results').selectmenu({
		change: function( event, ui ) {
			CheckThenValue(ui.item.value);
		}
	});
	$('#ifvalue').change(function() {
		CheckIfValue($('#params').val());
	});
	$('#thenvalue').change(function() {
		CheckThenValue($('#results').val());
	});
	$('#ifoperator, #thenoperator').selectmenu();
    $( "#dialog-message" ).dialog({
		autoOpen: false,
    	modal: true,
    	buttons: {
        	Ok: function() {
          		$( this ).dialog( "close" );
        	}
      	}
    });
	$('#ifthensettings').hide();
	if (localStorage.getItem("statements")!=null)
	{
		statements=JSON.parse(localStorage.getItem("statements"));
		build_statements();
	}
	CheckIfValue($('#params').val());
	CheckThenValue($('#results').val());
});

function build_statements()
{
	if (statements.length>0)
	{
		$('#statements').html("");
		for (a=0;a<statements.length;a++)
		{
			$('#statements').html($('#statements').html() + "<p class='statement_code' id='statement" + a + "'><span class='ui-button-icon ui-icon ui-icon-circle-minus statement_button' id='statement_delete_b" + a + "'></span><span class='ui-button-icon-space'> </span><span class='ui-button-icon ui-icon ui-icon-pencil statement_button' id='statement_edit_b" + a + "'></span><span class='ui-button-icon-space'> </span>if (" + statements[a][1] + " " + statements[a][2] + " " + statements[a][3] + ") then " + statements[a][4] + " " + statements[a][5] + " " + statements[a][6] + " " + "</p>");
		}
		$('.statement_button').click(function(event) {
			if (event.target.id.indexOf("delete","")!=-1)
			{
				$('#' + event.target.id.replace("_delete_b","")).remove();
				statements.splice(event.target.id.replace("statement_delete_b",""),1);
				build_statements();
				$('#ifthensettings').hide();
				$('#addnew').show();
			}
			if (event.target.id.indexOf("edit","")!=-1)
			{
				var id=event.target.id.replace("statement_edit_b","");
				edit=true;
				edit_id=id;
				$('#params').val(statements[id][1]).selectmenu("refresh");
				$('#ifoperator').val(statements[id][2]).selectmenu("refresh");
				$('#ifvalue').val(parseInt(statements[id][3]));
				$('#results').val(statements[id][4]).selectmenu("refresh");
				$('#thenoperator').val(statements[id][5]).selectmenu("refresh");
				$('#thenvalue').val(parseInt(statements[id][6]));
				$('#ifthensettings').show();
				$('#addnew').hide();
			}
		});
	}
	else
	{
		$('#statements').html("<p>No if/then statements configured yet.</p>");
	}
}

function CheckIfValue(whichselect)
{
	if (whichselect.indexOf("Port")==-1)
	{
		$('#ifoperator option:not(:contains("is"))').prop("disabled",false);
		if($('#ifoperator').val().indexOf("is")>=0)
			$('#ifoperator option:contains("less than or equal to")').prop("selected",true);
		$('#ifoperator option:contains("is")').prop("disabled",true);
		$('#ifvalue').show();
	}
	else
	{
		$('#ifoperator option:contains("is")').prop("disabled",false);
		if($('#ifoperator').val().indexOf("is")==-1)
			$('#ifoperator option:contains("is On")').prop("selected",true);
		$('#ifoperator option:not(:contains("is"))').prop("disabled",true);
		$('#ifvalue').hide();
	}
	$('#ifoperator').selectmenu("refresh");

	switch (whichselect)
	{
		case "Temperature 1":
		case "Temperature 2":
		case "Temperature 3":
			$('#ifvalue').prop("step",0.1);
			break;
		case "pH":
		case "pH Expansion":
			$('#ifvalue').prop("step",0.01);
			break;
		case "Low ATO":
		case "High ATO":
		case "Alarm":
		case "I/O Channel 0":
		case "I/O Channel 1":
		case "I/O Channel 2":
		case "I/O Channel 3":
		case "I/O Channel 4":
		case "I/O Channel 5":
		case "ATO Timeout":
		case "Overheat":
		case "Leak":
		case "Bus Lock":
		case "Feeding Mode":
		case "Water Change Mode":
		case "Lights On Mode":
			$('#ifvalue').prop("max",1);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>1) $('#ifvalue').val(1);
			break;
		case "Month":
			$('#ifvalue').prop("max",12);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>12) $('#ifvalue').val(12);
			break;
		case "Day":
			$('#ifvalue').prop("max",31);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>31) $('#ifvalue').val(31);
			break;
		case "Hour (24hr)":
			$('#ifvalue').prop("max",23);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>23) $('#ifvalue').val(23);
			break;
		case "Minute":
		case "Second":
			$('#ifvalue').prop("max",59);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>59) $('#ifvalue').val(59);
			break;
		case "Day of the week":
			$('#ifvalue').prop("max",6);
			$('#ifvalue').prop("step",1);
			if ($('#ifvalue').val()>6) $('#ifvalue').val(6);
			break;
		case "Port 1":
			
			break;
		default:
			$('#ifvalue').prop("step",1);
			break;
	}	
}
function CheckThenValue(whichselect)
{
	if (whichselect.indexOf("Port")==-1)
	{
		$('#thenoperator option:not(:contains("turn"))').prop("disabled",false);
		if($('#thenoperator').val().indexOf("turn")>=0)
			$('#thenoperator option:contains("less than or equal to")').prop("selected",true);
		$('#thenoperator option:contains("turn")').prop("disabled",true);
		$('#thenvalue').show();
	}
	else
	{
		$('#thenoperator option:contains("turn")').prop("disabled",false);
		if($('#thenoperator').val().indexOf("turn")==-1)
			$('#thenoperator option:contains("turn On")').prop("selected",true);
		$('#thenoperator option:not(:contains("turn"))').prop("disabled",true);
		$('#thenvalue').hide();
	}
	$('#thenoperator').selectmenu("refresh");
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
    <h2>If/Then Statements</h2>
    <div id="statements">
    <p>No if/then statements configured yet.</p>
    </div>
	<div id=ifthensettings>
    	<p class="ifp"><span class="ifspan">If</span>
    	<select id="params">
	      <optgroup label="Parameters">
        	<option>Temperature 1</option>
        	<option>Temperature 2</option>
        	<option>Temperature 3</option>
        	<option>pH</option>
        	<option>Salinity</option>
        	<option>ORP</option>
        	<option>pH Expansion</option>
        	<option>PAR</option>
        	<option>Humidity</option>
        	<option>Water Level</option>
        	<option>Water Level 1</option>
        	<option>Water Level 2</option>
        	<option>Water Level 3</option>
        	<option>Water Level 4</option>
	      </optgroup>
	      <optgroup label="Input">
        	<option>Low ATO</option>
        	<option>High ATO</option>
        	<option>Alarm</option>
        	<option>I/O Channel 0</option>
        	<option>I/O Channel 1</option>
        	<option>I/O Channel 2</option>
        	<option>I/O Channel 3</option>
        	<option>I/O Channel 4</option>
        	<option>I/O Channel 5</option>
	      </optgroup>
	      <optgroup label="Output">
        	<option>Daylight Channel</option>
        	<option>Actinic Channel</option>
        	<option>Daylight 2 Channel</option>
        	<option>Actinic 2 Channel</option>
	      </optgroup>
	      <optgroup label="Flags">
        	<option>ATO Timeout</option>
        	<option>Overheat</option>
        	<option>Leak</option>
        	<option>Bus Lock</option>
        	<option>Feeding Mode</option>
        	<option>Water Change Mode</option>
        	<option>Lights On Mode</option>
	      </optgroup>
	      <optgroup label="Main Relay Box">
        	<option>Main Box Port 1</option>
        	<option>Main Box Port 2</option>
        	<option>Main Box Port 3</option>
        	<option>Main Box Port 4</option>
        	<option>Main Box Port 5</option>
        	<option>Main Box Port 6</option>
        	<option>Main Box Port 7</option>
        	<option>Main Box Port 8</option>
          </optgroup>
	      <optgroup label="Expansion Relay Box">
        	<option>Exp Box Port 1</option>
        	<option>Exp Box Port 2</option>
        	<option>Exp Box Port 3</option>
        	<option>Exp Box Port 4</option>
        	<option>Exp Box Port 5</option>
        	<option>Exp Box Port 6</option>
        	<option>Exp Box Port 7</option>
        	<option>Exp Box Port 8</option>
          </optgroup>
	      <optgroup label="Time">
        	<option>Year</option>
        	<option>Month</option>
        	<option>Day</option>
        	<option>Hour (24hr)</option>
        	<option>Minute</option>
        	<option>Second</option>
        	<option>Day of the week</option>
	      </optgroup>
        </select>
    	<select id="ifoperator">
        	<option>less than or equal to</option>
        	<option>less than</option>
        	<option>equal to</option>
        	<option>different than</option>
        	<option>greater than</option>
        	<option>greater than or equal to</option>
        	<option>is On</option>
        	<option>is Off</option>
        </select>
        <input type="number" id="ifvalue" min="0" step="0.1">
        </p>
    	<p class="ifp"><span class="ifspan">Then</span>
    	<select id="results">
	      <optgroup label="Main Relay Box">
        	<option>Main Box Port 1</option>
        	<option>Main Box Port 2</option>
        	<option>Main Box Port 3</option>
        	<option>Main Box Port 4</option>
        	<option>Main Box Port 5</option>
        	<option>Main Box Port 6</option>
        	<option>Main Box Port 7</option>
        	<option>Main Box Port 8</option>
          </optgroup>
	      <optgroup label="Expansion Relay Box">
        	<option>Exp Box Port 1</option>
        	<option>Exp Box Port 2</option>
        	<option>Exp Box Port 3</option>
        	<option>Exp Box Port 4</option>
        	<option>Exp Box Port 5</option>
        	<option>Exp Box Port 6</option>
        	<option>Exp Box Port 7</option>
        	<option>Exp Box Port 8</option>
          </optgroup>
	      <optgroup label="Dimming">
        	<option>Daylight Channel</option>
        	<option>Actinic Channel</option>
        	<option>Daylight 2 Channel</option>
        	<option>Actinic 2 Channel</option>
        	<option>Expansion Channel 0</option>
        	<option>Expansion Channel 1</option>
        	<option>Expansion Channel 2</option>
        	<option>Expansion Channel 3</option>
        	<option>Expansion Channel 4</option>
        	<option>Expansion Channel 5</option>
          </optgroup>
	      <optgroup label="DC Pump">
        	<option>DC Pump Mode</option>
        	<option>DC Pump Speed</option>
        	<option>DC Pump Duration</option>
          </optgroup>
        </select>
    	<select id="thenoperator">
        	<option>turn On</option>
        	<option>turn Off</option>
        	<option>less than or equal to</option>
        	<option>less than</option>
        	<option>equal to</option>
        	<option>different than</option>
        	<option>greater than</option>
        	<option>greater than or equal to</option>
        </select>
        <input type="number" id="thenvalue" min="0" step="0.1">
        </p>
        <button id=save class="ui-button ui-widget ui-corner-all">Save</button>
    </div>
	<div>
        <button id=addnew class="ui-button ui-widget ui-corner-all">Add New Statement</button>
	</div>
    <div id="dialog-message" title="Missing value">
        <p>All fields required.</p>
    </div>
    
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>