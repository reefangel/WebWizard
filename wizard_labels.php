<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		save_labels();
		window.location.href = "wizard_ifthen.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		save_labels();
		window.location.href = "wizard_ready.php";
	});
	$("input").button();
	$(".RA_STAR_FEATURE, .SALINITY_EXPANSION, .ORP_EXPANSION, .PHEXP_EXPANSION, .PAR_EXPANSION, .WL_EXPANSION, .MULTIWL_EXPANSION, .IO_EXPANSION, .CUSTOM_VAR").hide();
	if(localStorage.getItem("LABEL_TEMP1")!="" && localStorage.getItem("LABEL_TEMP1")!=null) $("#LABEL_TEMP1").val(localStorage.getItem("LABEL_TEMP1"));
	if(localStorage.getItem("LABEL_TEMP2")!="" && localStorage.getItem("LABEL_TEMP2")!=null) $("#LABEL_TEMP2").val(localStorage.getItem("LABEL_TEMP2"));
	if(localStorage.getItem("LABEL_TEMP3")!="" && localStorage.getItem("LABEL_TEMP3")!=null) $("#LABEL_TEMP3").val(localStorage.getItem("LABEL_TEMP3"));
	if(localStorage.getItem("LABEL_PH")!="" && localStorage.getItem("LABEL_PH")!=null) $("#LABEL_PH").val(localStorage.getItem("LABEL_PH"));
	if(localStorage.getItem("LABEL_ATOLOW")!="" && localStorage.getItem("LABEL_ATOLOW")!=null) $("#LABEL_ATOLOW").val(localStorage.getItem("LABEL_ATOLOW"));
	if(localStorage.getItem("LABEL_ATOHIGH")!="" && localStorage.getItem("LABEL_ATOHIGH")!=null) $("#LABEL_ATOHIGH").val(localStorage.getItem("LABEL_ATOHIGH"));
	if(localStorage.getItem("LABEL_ALARM")!="" && localStorage.getItem("LABEL_ALARM")!=null) $("#LABEL_ALARM").val(localStorage.getItem("LABEL_ALARM"));
	if(localStorage.getItem("LABEL_LEAK")!="" && localStorage.getItem("LABEL_LEAK")!=null) $("#LABEL_LEAK").val(localStorage.getItem("LABEL_LEAK"));
	if(localStorage.getItem("LABEL_SALINITY")!="" && localStorage.getItem("LABEL_SALINITY")!=null) $("#LABEL_SALINITY").val(localStorage.getItem("LABEL_SALINITY"));
	if(localStorage.getItem("LABEL_ORP")!="" && localStorage.getItem("LABEL_ORP")!=null) $("#LABEL_ORP").val(localStorage.getItem("LABEL_ORP"));
	if(localStorage.getItem("LABEL_PHEXP")!="" && localStorage.getItem("LABEL_PHEXP")!=null) $("#LABEL_PHEXP").val(localStorage.getItem("LABEL_PHEXP"));
	if(localStorage.getItem("LABEL_PAR")!="" && localStorage.getItem("LABEL_PAR")!=null) $("#LABEL_PAR").val(localStorage.getItem("LABEL_PAR"));
	if(localStorage.getItem("LABEL_WL0")!="" && localStorage.getItem("LABEL_WL0")!=null) $("#LABEL_WL0").val(localStorage.getItem("LABEL_WL0"));
	if(localStorage.getItem("LABEL_WL1")!="" && localStorage.getItem("LABEL_WL1")!=null) $("#LABEL_WL1").val(localStorage.getItem("LABEL_WL1"));
	if(localStorage.getItem("LABEL_WL2")!="" && localStorage.getItem("LABEL_WL2")!=null) $("#LABEL_WL2").val(localStorage.getItem("LABEL_WL2"));
	if(localStorage.getItem("LABEL_WL3")!="" && localStorage.getItem("LABEL_WL3")!=null) $("#LABEL_WL3").val(localStorage.getItem("LABEL_WL3"));
	if(localStorage.getItem("LABEL_WL4")!="" && localStorage.getItem("LABEL_WL4")!=null) $("#LABEL_WL4").val(localStorage.getItem("LABEL_WL4"));
	if(localStorage.getItem("LABEL_IO0")!="" && localStorage.getItem("LABEL_IO0")!=null) $("#LABEL_IO0").val(localStorage.getItem("LABEL_IO0"));
	if(localStorage.getItem("LABEL_IO1")!="" && localStorage.getItem("LABEL_IO1")!=null) $("#LABEL_IO1").val(localStorage.getItem("LABEL_IO1"));
	if(localStorage.getItem("LABEL_IO2")!="" && localStorage.getItem("LABEL_IO2")!=null) $("#LABEL_IO2").val(localStorage.getItem("LABEL_IO2"));
	if(localStorage.getItem("LABEL_IO3")!="" && localStorage.getItem("LABEL_IO3")!=null) $("#LABEL_IO3").val(localStorage.getItem("LABEL_IO3"));
	if(localStorage.getItem("LABEL_IO4")!="" && localStorage.getItem("LABEL_IO4")!=null) $("#LABEL_IO4").val(localStorage.getItem("LABEL_IO4"));
	if(localStorage.getItem("LABEL_IO5")!="" && localStorage.getItem("LABEL_IO5")!=null) $("#LABEL_IO5").val(localStorage.getItem("LABEL_IO5"));
	if(localStorage.getItem("LABEL_C0")!="" && localStorage.getItem("LABEL_C0")!=null) $("#LABEL_C0").val(localStorage.getItem("LABEL_C0"));
	if(localStorage.getItem("LABEL_C1")!="" && localStorage.getItem("LABEL_C1")!=null) $("#LABEL_C1").val(localStorage.getItem("LABEL_C1"));
	if(localStorage.getItem("LABEL_C2")!="" && localStorage.getItem("LABEL_C2")!=null) $("#LABEL_C2").val(localStorage.getItem("LABEL_C2"));
	if(localStorage.getItem("LABEL_C3")!="" && localStorage.getItem("LABEL_C3")!=null) $("#LABEL_C3").val(localStorage.getItem("LABEL_C3"));
	if(localStorage.getItem("LABEL_C4")!="" && localStorage.getItem("LABEL_C4")!=null) $("#LABEL_C4").val(localStorage.getItem("LABEL_C4"));
	if(localStorage.getItem("LABEL_C5")!="" && localStorage.getItem("LABEL_C5")!=null) $("#LABEL_C5").val(localStorage.getItem("LABEL_C5"));
	if(localStorage.getItem("LABEL_C6")!="" && localStorage.getItem("LABEL_C6")!=null) $("#LABEL_C6").val(localStorage.getItem("LABEL_C6"));
	if(localStorage.getItem("LABEL_C7")!="" && localStorage.getItem("LABEL_C7")!=null) $("#LABEL_C7").val(localStorage.getItem("LABEL_C7"));

});

function save_labels()
{
	localStorage.setItem("LABEL_TEMP1", $('#LABEL_TEMP1').val());
	localStorage.setItem("LABEL_TEMP2", $('#LABEL_TEMP2').val());
	localStorage.setItem("LABEL_TEMP3", $('#LABEL_TEMP3').val());
	localStorage.setItem("LABEL_PH", $('#LABEL_PH').val());
	localStorage.setItem("LABEL_ATOLOW", $('#LABEL_ATOLOW').val());
	localStorage.setItem("LABEL_ATOHIGH", $('#LABEL_ATOHIGH').val());
	localStorage.setItem("LABEL_ALARM", $('#LABEL_ALARM').val());
	localStorage.setItem("LABEL_LEAK", $('#LABEL_LEAK').val());
	localStorage.setItem("LABEL_SALINITY", $('#LABEL_SALINITY').val());
	localStorage.setItem("LABEL_ORP", $('#LABEL_ORP').val());
	localStorage.setItem("LABEL_PHEXP", $('#LABEL_PHEXP').val());
	localStorage.setItem("LABEL_PAR", $('#LABEL_PAR').val());
	localStorage.setItem("LABEL_WL0", $('#LABEL_WL0').val());
	localStorage.setItem("LABEL_WL1", $('#LABEL_WL1').val());
	localStorage.setItem("LABEL_WL2", $('#LABEL_WL2').val());
	localStorage.setItem("LABEL_WL3", $('#LABEL_WL3').val());
	localStorage.setItem("LABEL_WL4", $('#LABEL_WL4').val());
	localStorage.setItem("LABEL_IO0", $('#LABEL_IO0').val());
	localStorage.setItem("LABEL_IO1", $('#LABEL_IO1').val());
	localStorage.setItem("LABEL_IO2", $('#LABEL_IO2').val());
	localStorage.setItem("LABEL_IO3", $('#LABEL_IO3').val());
	localStorage.setItem("LABEL_IO4", $('#LABEL_IO4').val());
	localStorage.setItem("LABEL_IO5", $('#LABEL_IO5').val());
	localStorage.setItem("LABEL_C0", $('#LABEL_C0').val());
	localStorage.setItem("LABEL_C1", $('#LABEL_C1').val());
	localStorage.setItem("LABEL_C2", $('#LABEL_C2').val());
	localStorage.setItem("LABEL_C3", $('#LABEL_C3').val());
	localStorage.setItem("LABEL_C4", $('#LABEL_C4').val());
	localStorage.setItem("LABEL_C5", $('#LABEL_C5').val());
	localStorage.setItem("LABEL_C6", $('#LABEL_C6').val());
	localStorage.setItem("LABEL_C7", $('#LABEL_C7').val());
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
    <h2>Labels</h2>
    <table>
    <tr>
    <td><label for="LABEL_TEMP1">Temperature Probe 1 Label: </label></td>
    <td><input type="text" id="LABEL_TEMP1" name="LABEL_TEMP1" value="Temp 1"></td>
    </tr>
    <tr>
    <td><label for="LABEL_TEMP2">Temperature Probe 2 Label: </label></td>
    <td><input type="text" id="LABEL_TEMP2" name="LABEL_TEMP2" value="Temp 2"></td>
    </tr>
    <tr>
    <td><label for="LABEL_TEMP3">Temperature Probe 3 Label: </label></td>
    <td><input type="text" id="LABEL_TEMP3" name="LABEL_TEMP3" value="Temp 3"></td>
    </tr>
    <tr>
    <td><label for="LABEL_PH">pH Label: </label></td>
    <td><input type="text" id="LABEL_PH" name="LABEL_PH" value="pH"></td>
    </tr>
    <tr>
    <td><label for="LABEL_ATOLOW">Low ATO Label: </label></td>
    <td><input type="text" id="LABEL_ATOLOW" name="LABEL_ATOLOW" value="Low ATO"></td>
    </tr>
    <tr>
    <td><label for="LABEL_ATOHIGH">High ATO Label: </label></td>
    <td><input type="text" id="LABEL_ATOHIGH" name="LABEL_ATOHIGH" value="High ATO"></td>
    </tr>
    <tr class="RA_STAR_FEATURE">
    <td><label for="LABEL_ALARM">Alarm Label: </label></td>
    <td><input type="text" id="LABEL_ALARM" name="LABEL_ALARM" value="Alarm"></td>
    </tr>
    <tr class="RA_STAR_FEATURE LEAK_EXPANSION">
    <td><label for="LABEL_LEAK">Leak Label: </label></td>
    <td><input type="text" id="LABEL_LEAK" name="LABEL_LEAK" value="Leak"></td>
    </tr>
    <tr class="SALINITY_EXPANSION">
    <td><label for="LABEL_SALINITY">Salinity Expansion Label: </label></td>
    <td><input type="text" id="LABEL_SALINITY" name="LABEL_SALINITY" value="Salinity"></td>
    </tr>
    <tr class="ORP_EXPANSION">
    <td><label for="LABEL_ORP">ORP Expansion Label: </label></td>
    <td><input type="text" id="LABEL_ORP" name="LABEL_ORP" value="ORP"></td>
    </tr>
    <tr class="PHEXP_EXPANSION">
    <td><label for="LABEL_PHEXP">pH Expansion Label: </label></td>
    <td><input type="text" id="LABEL_PHEXP" name="LABEL_PHEXP" value="pH Exp"></td>
    </tr>
    <tr class="PAR_EXPANSION">
    <td><label for="LABEL_PAR">PAR Expansion Label: </label></td>
    <td><input type="text" id="LABEL_PAR" name="LABEL_PAR" value="PAR"></td>
    </tr>
    <tr class="WL_EXPANSION">
    <td><label for="LABEL_WL0">Water Level Expansion Label: </label></td>
    <td><input type="text" id="LABEL_WL0" name="LABEL_WL0" value="WL"></td>
    </tr>
    <tr class="MULTIWL_EXPANSION">
    <td><label for="LABEL_WL1">Water Level Expansion Channel 1 Label: </label></td>
    <td><input type="text" id="LABEL_WL1" name="LABEL_WL1" value="WL 1"></td>
    </tr>
    <tr class="MULTIWL_EXPANSION">
    <td><label for="LABEL_WL2">Water Level Expansion Channel 2 Label: </label></td>
    <td><input type="text" id="LABEL_WL2" name="LABEL_WL2" value="WL 2"></td>
    </tr>
    <tr class="MULTIWL_EXPANSION">
    <td><label for="LABEL_WL3">Water Level Expansion Channel 3 Label: </label></td>
    <td><input type="text" id="LABEL_WL3" name="LABEL_WL3" value="WL 3"></td>
    </tr>
    <tr class="MULTIWL_EXPANSION">
    <td><label for="LABEL_WL4">Water Level Expansion Channel 4 Label: </label></td>
    <td><input type="text" id="LABEL_WL4" name="LABEL_WL4" value="WL 4"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO0">I/O Expansion Channel 0 Label: </label></td>
    <td><input type="text" id="LABEL_IO0" name="LABEL_IO0" value="I/O Channel 0"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO1">I/O Expansion Channel 1 Label: </label></td>
    <td><input type="text" id="LABEL_IO1" name="LABEL_IO1" value="I/O Channel 1"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO2">I/O Expansion Channel 2 Label: </label></td>
    <td><input type="text" id="LABEL_IO2" name="LABEL_IO2" value="I/O Channel 2"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO3">I/O Expansion Channel 3 Label: </label></td>
    <td><input type="text" id="LABEL_IO3" name="LABEL_IO3" value="I/O Channel 3"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO4">I/O Expansion Channel 4 Label: </label></td>
    <td><input type="text" id="LABEL_IO4" name="LABEL_IO4" value="I/O Channel 4"></td>
    </tr>
    <tr class="IO_EXPANSION">
    <td><label for="LABEL_IO5">I/O Expansion Channel 5 Label: </label></td>
    <td><input type="text" id="LABEL_IO5" name="LABEL_IO5" value="I/O Channel 5"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C0">Custom Var 0 Label: </label></td>
    <td><input type="text" id="LABEL_C0" name="LABEL_C0" value="Custom Var 0"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C1">Custom Var 1 Label: </label></td>
    <td><input type="text" id="LABEL_C1" name="LABEL_C1" value="Custom Var 1"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C2">Custom Var 2 Label: </label></td>
    <td><input type="text" id="LABEL_C2" name="LABEL_C2" value="Custom Var 2"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C3">Custom Var 3 Label: </label></td>
    <td><input type="text" id="LABEL_C3" name="LABEL_C3" value="Custom Var 3"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C4">Custom Var 4 Label: </label></td>
    <td><input type="text" id="LABEL_C4" name="LABEL_C4" value="Custom Var 4"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C5">Custom Var 5 Label: </label></td>
    <td><input type="text" id="LABEL_C5" name="LABEL_C5" value="Custom Var 5"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C6">Custom Var 6 Label: </label></td>
    <td><input type="text" id="LABEL_C6" name="LABEL_C6" value="Custom Var 6"></td>
    </tr>
    <tr class="CUSTOM_VAR">
    <td><label for="LABEL_C7">Custom Var 7 Label: </label></td>
    <td><input type="text" id="LABEL_C7" name="LABEL_C7" value="Custom Var 7"></td>
    </tr>
    </table>
    </p>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>