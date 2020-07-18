<?php include 'header.php'; ?>
<script type="text/javascript" src="js/moment.js"></script>
<script>
$( function() {
	$('[name=main_wizard]').click(function() {
	var test="";
	for(var i=0, len=localStorage.length; i<len; i++) {
		var key = localStorage.key(i);
		var value = localStorage[key];
		test+=key + ":" + value + "<br>";
	}
	$("#test").html(test);
	});
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			window.location.href = "wizard_cloud_fallback.php";
		}
		else
		{
			if (localStorage.getItem("board")=="ra_cloud_wifi")
			{
				window.location.href = "wizard_cloudwifi.php";
			}
			else
			{
				window.location.href = "wizard_ifthen.php";
			}
		}
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		if (localStorage.getItem("board")=="ra_plus" || localStorage.getItem("board")===null)
		{
			test="#include <ReefAngel_Features.h>"+"\n";
			test+="#include <Globals.h>"+"\n";
			test+="#include <RA_Wifi.h>"+"\n";
			test+="#include <Wire.h>"+"\n";
			test+="#include <OneWire.h>"+"\n";
			test+="#include <Time.h>"+"\n";
			test+="#include <DS1307RTC.h>"+"\n";
			test+="#include <InternalEEPROM.h>"+"\n";
			test+="#include <RA_NokiaLCD.h>"+"\n";
			test+="#include <RA_ATO.h>"+"\n";
			test+="#include <RA_Joystick.h>"+"\n";
			test+="#include <LED.h>"+"\n";
			test+="#include <RA_TempSensor.h>"+"\n";
			test+="#include <Relay.h>"+"\n";
			test+="#include <RA_PWM.h>"+"\n";
			test+="#include <Timer.h>"+"\n";
			test+="#include <Memory.h>"+"\n";
			test+="#include <InternalEEPROM.h>"+"\n";
			test+="#include <RA_Colors.h>"+"\n";
			test+="#include <RA_CustomColors.h>"+"\n";
			test+="#include <Salinity.h>"+"\n";
			test+="#include <RF.h>"+"\n";
			test+="#include <IO.h>"+"\n";
			test+="#include <ORP.h>"+"\n";
			test+="#include <AI.h>"+"\n";
			test+="#include <PH.h>"+"\n";
			test+="#include <WaterLevel.h>"+"\n";
			test+="#include <Humidity.h>"+"\n";
			test+="#include <DCPump.h>"+"\n";
			test+="#include <PAR.h>"+"\n";
			test+="#include <ReefAngel.h>"+"\n";
			test+=""+"\n";
			test+="////// Place global variable code below here"+"\n";
			test+=""+"\n";
			test+=""+"\n";
			test+="////// Place global variable code above here"+"\n";
			test+=""+"\n";
			test+=""+"\n";
			test+="void setup()"+"\n";
			test+="{"+"\n";
			test+="    // This must be the first line"+"\n";
			test+="    ReefAngel.Init();  //Initialize controller"+"\n";
			test+="    ReefAngel.AddStandardMenu();  // Add Standard Menu"+"\n";
			test+="    ReefAngel.Use2014Screen();  // Let's use 2014 Screen"+"\n";
		}

		if (localStorage.getItem("board")=="ra_star")
		{
			test="#include <Salinity.h>"+"\n";
			test+="#include <ReefAngel_Features.h>"+"\n";
			test+="#include <Globals.h>"+"\n";
			test+="#include <RA_TS.h>"+"\n";
			test+="#include <RA_TouchLCD.h>"+"\n";
			test+="#include <RA_TFT.h>"+"\n";
			test+="#include <RA_TS.h>"+"\n";
			test+="#include <Font.h>"+"\n";
			test+="#include <RA_Wifi.h>"+"\n";
			test+="#include <RA_Wiznet5100.h>"+"\n";
			test+="#include <SD.h>"+"\n";
			test+="#include <SPI.h>"+"\n";
			test+="#include <Ethernet.h>"+"\n";
			test+="#include <EthernetDHCP.h>"+"\n";
			test+="#include <PubSubClient.h>"+"\n";
			test+="#include <Wire.h>"+"\n";
			test+="#include <OneWire.h>"+"\n";
			test+="#include <Time.h>"+"\n";
			test+="#include <DS1307RTC.h>"+"\n";
			test+="#include <InternalEEPROM.h>"+"\n";
			test+="#include <RA_ATO.h>"+"\n";
			test+="#include <LED.h>"+"\n";
			test+="#include <RA_TempSensor.h>"+"\n";
			test+="#include <Relay.h>"+"\n";
			test+="#include <RA_PWM.h>"+"\n";
			test+="#include <Timer.h>"+"\n";
			test+="#include <Memory.h>"+"\n";
			test+="#include <InternalEEPROM.h>"+"\n";
			test+="#include <RA_Colors.h>"+"\n";
			test+="#include <RA_CustomColors.h>"+"\n";
			test+="#include <RA_CustomLabels.h>"+"\n";
			test+="#include <RF.h>"+"\n";
			test+="#include <IO.h>"+"\n";
			test+="#include <ORP.h>"+"\n";
			test+="#include <AI.h>"+"\n";
			test+="#include <PH.h>"+"\n";
			test+="#include <WaterLevel.h>"+"\n";
			test+="#include <Humidity.h>"+"\n";
			test+="#include <PAR.h>"+"\n";
			test+="#include <DCPump.h>"+"\n";
			test+="#include <ReefAngel.h>"+"\n";
			test+="#include <SoftwareSerial.h>"+"\n";
			test+=""+"\n";
			test+="////// Place global variable code below here"+"\n";
			test+=""+"\n";
			test+=""+"\n";
			test+="////// Place global variable code above here"+"\n";
			test+=""+"\n";
			test+=""+"\n";
			test+="void setup()"+"\n";
			test+="{"+"\n";
			test+="    // This must be the first line"+"\n";
			test+="    ReefAngel.Init();  //Initialize controller"+"\n";
			test+="    ReefAngel.Star();"+"\n";
		}
		
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			test="";
<?php
$firmware_file = fopen(realpath("firmware/CloudWifiHub.ino"), "r") or die("Unable to open file!");
while(!feof($firmware_file)) {
	echo "			test+=\"".str_replace('"','\"',str_replace("\n","",fgets($firmware_file)))."\"+\"\\n\";\n";
}
fclose($firmware_file);
?>
		}

		if (localStorage.getItem("board")=="ra_cloud_wifi")
		{
			test="";
<?php
$firmware_file = fopen(realpath("firmware/CloudWifiAttachment.ino"), "r") or die("Unable to open file!");
while(!feof($firmware_file)) {
	echo "			test+=\"".str_replace('"','\"',str_replace("\n","",fgets($firmware_file)))."\"+\"\\n\";\n";
}
fclose($firmware_file);
?>
		}
		
		if (localStorage.getItem("board")=="ra_star" || localStorage.getItem("board")=="ra_plus")
		{
			if (localStorage.getItem("salinityexpansion")=="true") test+="    ReefAngel.AddSalinityExpansion();  // Salinity Expansion Module"+"\n";
			if (localStorage.getItem("orpexpansion")=="true") test+="    ReefAngel.AddORPExpansion();  // ORP Expansion Module"+"\n";
			if (localStorage.getItem("phexpansion")=="true") test+="    ReefAngel.AddPHExpansion();  // pH Expansion Module"+"\n";
			if (localStorage.getItem("parexpansion")=="true") test+="    ReefAngel.AddPARExpansion();  // PAR Expanion Module"+"\n";
			if (localStorage.getItem("wlexpansion")=="true") test+="    ReefAngel.AddWaterLevelExpansion();  // Water Level Expansion Module"+"\n";
			if (localStorage.getItem("multiwlexpansion")=="true") test+="    ReefAngel.AddMultiChannelWaterLevelExpansion();  // Multi-Channel Water Level Expanion Module"+"\n";
			if (localStorage.getItem("ranetattachment")=="true") test+="    ReefAngel.AddRANet();  // RANet Add-On Module"+"\n";
	
			if (localStorage.getItem("temperatureunit")=="celsius")
				test+="    ReefAngel.SetTemperatureUnit( Celsius );  // set to Celsius Temperature"+"\n";
			var feeding = "";
			var waterchange = "";
			var overheat = "";
			var leak = "";
			var lightson = "";
			var feeding_e = "";
			var waterchange_e = "";
			var overheat_e = "";
			var leak_e = "";
			var lightson_e = "";
			var feeding_e2 = "";
			var waterchange_e2 = "";
			var overheat_e2 = "";
			var leak_e2 = "";
			var lightson_e2 = "";
			
			for (a=1;a<=8;a++)
			{
				if (localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("main_port_"+a+"_feeding_override")=="true")
						feeding+="Port"+a+"Bit | ";
					if (localStorage.getItem("main_port_"+a+"_waterchange_override")=="true")
						waterchange+="Port"+a+"Bit | ";
					if (localStorage.getItem("main_port_"+a+"_overheat_override")=="true")
						overheat+="Port"+a+"Bit | ";
					if (localStorage.getItem("main_port_"+a+"_leak_override")=="true")
						leak+="Port"+a+"Bit | ";
					if (localStorage.getItem("main_port_"+a+"_lightson_override")=="true")
						lightson+="Port"+a+"Bit | ";
				}
				if (localStorage.getItem("expansion_port_"+a+"_feeding_override")=="true")
					feeding_e+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_"+a+"_waterchange_override")=="true")
					waterchange_e+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_"+a+"_overheat_override")=="true")
					overheat_e+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_"+a+"_leak_override")=="true")
					leak_e+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_"+a+"_lightson_override")=="true")
					lightson_e+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_1"+a+"_feeding_override")=="true")
					feeding_e2+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_1"+a+"_waterchange_override")=="true")
					waterchange_e2+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_1"+a+"_overheat_override")=="true")
					overheat_e2+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_1"+a+"_leak_override")=="true")
					leak_e2+="Port"+a+"Bit | ";
				if (localStorage.getItem("expansion_port_1"+a+"_lightson_override")=="true")
					lightson_e2+="Port"+a+"Bit | ";
			}
			if (feeding.length>0)
				feeding=feeding.substring(0,feeding.length-3);
			else
				feeding="0";
			test+="    // Ports toggled in Feeding Mode"+"\n";
			test+="    ReefAngel.FeedingModePorts = " + feeding + ";"+"\n";
			if (feeding_e.length>0)
				feeding_e=feeding_e.substring(0,feeding_e.length-3);
			else
				feeding_e="0";
			if (feeding_e2.length>0)
				feeding_e2=feeding_e2.substring(0,feeding_e2.length-3);
			else
				feeding_e2="0";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.FeedingModePortsE[0] = " + feeding_e + ";"+"\n";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.FeedingModePortsE[1] = " + feeding_e2 + ";"+"\n";
			if (waterchange.length>0)
				waterchange=waterchange.substring(0,waterchange.length-3);
			else
				waterchange="0";
			test+="    // Ports toggled in Water Change Mode"+"\n";
			test+="    ReefAngel.WaterChangePorts = " + waterchange + ";"+"\n";
			if (waterchange_e.length>0)
				waterchange_e=waterchange_e.substring(0,waterchange_e.length-3);
			else
				waterchange_e="0";
			if (waterchange_e2.length>0)
				waterchange_e2=waterchange_e2.substring(0,waterchange_e2.length-3);
			else
				waterchange_e2="0";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.WaterChangePortsE[0] = " + waterchange_e + ";"+"\n";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.WaterChangePortsE[1] = " + waterchange_e2 + ";"+"\n";
			if (overheat.length>0)
				overheat=overheat.substring(0,overheat.length-3);
			else
				overheat="0";
			test+="    // Ports turned off when Overheat temperature exceeded"+"\n";
			test+="    ReefAngel.OverheatShutoffPorts = " + overheat + ";"+"\n";
			if (overheat_e.length>0)
				overheat_e=overheat_e.substring(0,overheat_e.length-3);
			else
				overheat_e="0";
			if (overheat_e2.length>0)
				overheat_e2=overheat_e2.substring(0,overheat_e2.length-3);
			else
				overheat_e2="0";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.OverheatShutoffPortsE[0] = " + overheat_e + ";"+"\n";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.OverheatShutoffPortsE[1] = " + overheat_e2 + ";"+"\n";
			if (localStorage.getItem("ropeexpansion")=="true")
			{
				if (leak.length>0)
					leak=leak.substring(0,leak.length-3);
				else
					leak="0";
				test+="    // Ports turned off when Leak is detected"+"\n";
				test+="    ReefAngel.LeakShutoffPorts = " + leak + ";"+"\n";
				if (leak_e.length>0)
					leak_e=leak_e.substring(0,leak_e.length-3);
				else
					leak_e="0";
				if (leak_e2.length>0)
					leak_e2=leak_e2.substring(0,leak_e2.length-3);
				else
					leak_e2="0";
				if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.LeakShutoffPortsE[0] = " + leak_e + ";"+"\n";
				if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.LeakShutoffPortsE[1] = " + leak_e2 + ";"+"\n";
			}
			if (lightson.length>0)
				lightson=lightson.substring(0,lightson.length-3);
			else
				lightson="0";
			test+="    // Ports toggled when Lights On / Off menu entry selected"+"\n";
			test+="    ReefAngel.LightsOnPorts = " + lightson + ";"+"\n";
			if (lightson_e.length>0)
				lightson_e=lightson_e.substring(0,lightson_e.length-3);
			else
				lightson_e="0";
			if (lightson_e2.length>0)
				lightson_e2=lightson_e2.substring(0,lightson_e2.length-3);
			else
				lightson_e2="0";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.LightsOnPortsE[0] = " + lightson_e + ";"+"\n";
			if (localStorage.getItem("relayexpansion")=="true") test+="    ReefAngel.LightsOnPortsE[1] = " + lightson_e2 + ";"+"\n";
			
			var probe="";
			
			switch (localStorage.getItem("overheatprobe"))
			{
				case "Temp 1":
					probe="1";
					break;
				case "Temp 2":
					probe="2";
					break;
				case "Temp 3":
					probe="3";
					break;
				default:
					probe="1";
					break;
			};
			test+="    // Use T" + probe + " probe as temperature and overheat functions"+"\n";
			test+="    ReefAngel.TempProbe = T" + probe + "_PROBE;"+"\n";
			test+="    ReefAngel.OverheatProbe = T" + probe + "_PROBE;"+"\n";
			if (localStorage.getItem("overheattemp")!==null)
			{
				test+="    // Set the Overheat temperature setting"+"\n";
				test+="    InternalMemory.OverheatTemp_write( " + localStorage.getItem("overheattemp")*10 + " );"+"\n";
			}
			
			if (localStorage.getItem("jebaoattachment")=="true")
			{
				test+="    // Feeeding and Water Change mode speed"+"\n";
				test+="    ReefAngel.DCPump.FeedingSpeed=0;"+"\n";
				test+="    ReefAngel.DCPump.WaterChangeSpeed=0;"+"\n";
			}
			
			var alwayson = "";
			var alwayson2 = "";
			for (a=1;a<=8;a++)
			{
				if (localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("main_port_"+a+"_function")=="alwayson")
						alwayson+="    ReefAngel.Relay.On( Port"+a+" );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="alwayson" && localStorage.getItem("relayexpansion")=="true")
					alwayson+="    ReefAngel.Relay.On( Box1_Port"+a+" );"+"\n";
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="alwayson" && localStorage.getItem("relayexpansion")=="true")
					alwayson2+="    ReefAngel.Relay.On( Box2_Port"+a+" );"+"\n";
			}
			alwayson+=alwayson2;
			if (alwayson.length>0)
			{
				test+="\n";
				test+="    // Ports that are always on"+"\n";
				test+=alwayson;
				test+="\n";
			}
			test+="    ////// Place additional initialization code below here"+"\n";
			test+="\n";
			test+="\n";
			test+="    ////// Place additional initialization code above here"+"\n";
			test+="}"+"\n";
			test+="\n";
			test+="void loop()"+"\n";
			test+="{"+"\n";
	
			var dosing_count=0;
	
			for (a=1;a<=8;a++)
			{
				if (localStorage.getItem("main_port_"+a+"_function")=="timeschedule" && localStorage.getItem("board")!="ra_star")
				{
					var locale = window.navigator.userLanguage || window.navigator.language;
					moment.locale(locale);
					var t_on = moment("01/01/2017 " + localStorage.getItem("main_port_"+a+"_timeschedule_turnon"));
					var t_off = moment("01/01/2017 " + localStorage.getItem("main_port_"+a+"_timeschedule_turnoff"));
					
					//var t_on =Date.parse(localStorage.getItem("main_port_"+a+"_timeschedule_turnon"));
					//var t_off =Date.parse(localStorage.getItem("main_port_"+a+"_timeschedule_turnoff"));
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardLights( Port" + a + "," + t_on.hour() + "," + t_on.minute() + "," + t_off.hour() + "," + t_off.minute() + " );"+"\n";
					else
						test+="    ReefAngel.StandardLights( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="timeschedule")
				{
					var t_on =Date.parse(localStorage.getItem("expansion_port_"+a+"_timeschedule_turnon"));
					var t_off =Date.parse(localStorage.getItem("expansion_port_"+a+"_timeschedule_turnoff"));
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardLights( Box1_Port" + a + "," + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + " );"+"\n";
					else
						test+="    ReefAngel.StandardLights( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="timeschedule")
				{
					var t_on =Date.parse(localStorage.getItem("expansion_port_1"+a+"_timeschedule_turnon"));
					var t_off =Date.parse(localStorage.getItem("expansion_port_1"+a+"_timeschedule_turnoff"));
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardLights( Box2_Port" + a + "," + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + " );"+"\n";
					else
						test+="    ReefAngel.StandardLights( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="heater" && localStorage.getItem("board")!="ra_star")
				{
					
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardHeater( T" + probe + "_PROBE,Port" + a + "," + localStorage.getItem("main_port_"+a+"_heater_turnon")*10 + "," + localStorage.getItem("main_port_"+a+"_heater_turnoff")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardHeater" + probe + "( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="heater")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardHeater( T" + probe + "_PROBE,Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_heater_turnon")*10 + "," + localStorage.getItem("expansion_port_"+a+"_heater_turnoff")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardHeater" + probe + "( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="heater")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardHeater( T" + probe + "_PROBE,Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_heater_turnon")*10 + "," + localStorage.getItem("expansion_port1_"+a+"_heater_turnoff")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardHeater" + probe + "( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="chiller" && localStorage.getItem("board")!="ra_star")
				{
					
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardFan( T" + probe + "_PROBE,Port" + a + "," + localStorage.getItem("main_port_"+a+"_chiller_turnoff")*10 + "," + localStorage.getItem("main_port_"+a+"_chiller_turnon")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardFan" + probe + "( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="chiller")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardFan( T" + probe + "_PROBE,Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_chiller_turnoff")*10 + "," + localStorage.getItem("expansion_port_"+a+"_chiller_turnon")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardFan" + probe + "( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="chiller")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.StandardFan( T" + probe + "_PROBE,Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_chiller_turnoff")*10 + "," + localStorage.getItem("expansion_port1_"+a+"_chiller_turnon")*10 + " );"+"\n";
					else
						test+="    ReefAngel.StandardFan" + probe + "( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="topoff" && localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Port" + a + "," + localStorage.getItem("main_port_"+a+"_topoff_timeoput") + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATO( true,Port" + a + "," + localStorage.getItem("main_port_"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATO( false,Port" + a + "," + localStorage.getItem("main_port_"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Port" + a + "," + localStorage.getItem("main_port_"+a+"_topoff_timeoput") + "," + localStorage.getItem("main_port_"+a+"_topoff_lowlevel") + "," + localStorage.getItem("main_port_"+a+"_topoff_highlevel") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Port" + a + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATOLow( Port" + a + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATOHigh( Port" + a + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Port" + a + " );"+"\n";
					}
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="topoff")
				{
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_topoff_timeoput") + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATO( true,Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATO( false,Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_topoff_lowlevel") + "," + localStorage.getItem("expansion_port_"+a+"_topoff_highlevel") + "," + localStorage.getItem("expansion_port_"+a+"_topoff_timeoput") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Box1_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATOLow( Box1_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATOHigh( Box1_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Box1_Port" + a + " );"+"\n";
					}
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="topoff")
				{
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_timeoput") + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATO( true,Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATO( false,Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_timeoput") + ",0 );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_lowlevel") + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_highlevel") + "," + localStorage.getItem("expansion_port_1"+a+"_topoff_timeoput") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_standardato")
							test+="    ReefAngel.StandardATO( Box2_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_singleatolow")
							test+="    ReefAngel.SingleATOLow( Box2_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_singleatohigh")
							test+="    ReefAngel.SingleATOHigh( Box2_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_topoff_settings")=="topoff_wlato")
							test+="    ReefAngel.WaterLevelATO( Box2_Port" + a + " );"+"\n";
					}
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="wavemaker" && localStorage.getItem("board")!="ra_star")
				{
					var f=(a==5?"1":"2");
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("main_port_"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker( Port" + a + "," + localStorage.getItem("main_port_"+a+"_wavemaker_timer1") + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.WavemakerRandom( Port" + a + "," + localStorage.getItem("main_port_"+a+"_wavemaker_timer1") + "," + localStorage.getItem("main_port_"+a+"_wavemaker_timer2") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("main_port_"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker" + f + "( Port" + a + " );"+"\n";
						if (localStorage.getItem("main_port_"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.Wavemaker" + f + "( Port" + a + " );"+"\n";
					}
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="wavemaker")
				{
					var f=(a==5?"1":"2");
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("expansion_port_"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker" + f + "( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_wavemaker_timer1") + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.WavemakerRandom" + f + "( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_wavemaker_timer1") + "," + localStorage.getItem("expansion_port_"+a+"_wavemaker_timer2") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("expansion_port_"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker" + f + "( Box1_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.Wavemaker" + f + "( Box1_Port" + a + " );"+"\n";
					}
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="wavemaker")
				{
					var f=(a==5?"1":"2");
					if (localStorage.getItem("memory")=="code")
					{
						if (localStorage.getItem("expansion_port_1"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker" + f + "( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_wavemaker_timer1") + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.WavemakerRandom" + f + "( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_wavemaker_timer1") + "," + localStorage.getItem("expansion_port_1"+a+"_wavemaker_timer2") + " );"+"\n";
					}
					else
					{
						if (localStorage.getItem("expansion_port_1"+a+"_wavemaker_settings")=="wavemaker_constant")
							test+="    ReefAngel.Wavemaker" + f + "( Box2_Port" + a + " );"+"\n";
						if (localStorage.getItem("expansion_port_1"+a+"_wavemaker_settings")=="wavemaker_random")
							test+="    ReefAngel.Wavemaker" + f + "( Box2_Port" + a + " );"+"\n";
					}
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="co2" && localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.CO2Control( Port" + a + "," + Math.round(localStorage.getItem("main_port_"+a+"_co2_turnoff")*100) + "," + Math.round(localStorage.getItem("main_port_"+a+"_co2_turnon")*100) + " );"+"\n";
					else
						test+="    ReefAngel.CO2Control( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="co2")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.CO2Control( Box1_Port" + a + "," + Math.round(localStorage.getItem("expansion_port_"+a+"_co2_turnoff")*100) + "," + Math.round(localStorage.getItem("expansion_port_"+a+"_co2_turnon")*100) + " );"+"\n";
					else
						test+="    ReefAngel.CO2Control( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="co2")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.CO2Control( Box2_Port" + a + "," + Math.round(localStorage.getItem("expansion_port_1"+a+"_co2_turnoff")*100) + "," + Math.round(localStorage.getItem("expansion_port_1"+a+"_co2_turnon")*100) + " );"+"\n";
					else
						test+="    ReefAngel.CO2Control( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="ph" && localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.PHControl( Port" + a + "," + Math.round(localStorage.getItem("main_port_"+a+"_ph_turnon")*100) + "," + Math.round(localStorage.getItem("main_port_"+a+"_ph_turnoff")*100) + " );"+"\n";
					else
						test+="    ReefAngel.PHControl( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="ph")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.PHControl( Box1_Port" + a + "," + Math.round(localStorage.getItem("expansion_port_"+a+"_ph_turnon")*100) + "," + Math.round(localStorage.getItem("expansion_port_"+a+"_ph_turnoff")*100) + " );"+"\n";
					else
						test+="    ReefAngel.PHControl( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="ph")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.PHControl( Box2_Port" + a + "," + Math.round(localStorage.getItem("expansion_port_1"+a+"_ph_turnon")*100) + "," + Math.round(localStorage.getItem("expansion_port_1"+a+"_ph_turnoff")*100) + " );"+"\n";
					else
						test+="    ReefAngel.PHControl( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="dosing" && localStorage.getItem("board")!="ra_star")
				{
					dosing_count++;
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.DosingPumpRepeat( Port" + a + "," + localStorage.getItem("main_port_"+a+"_dosing_offset") + "," + localStorage.getItem("main_port_"+a+"_dosing_every") + "," + localStorage.getItem("main_port_"+a+"_dosing_for") + " );"+"\n";
					else
						test+="    ReefAngel.DosingPumpRepeat" + dosing_count + "( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="dosing")
				{
					dosing_count++;
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.DosingPumpRepeat( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_dosing_offset") + "," + localStorage.getItem("expansion_port_"+a+"_dosing_every") + "," + localStorage.getItem("expansion_port_"+a+"_dosing_for") + " );"+"\n";
					else
						test+="    ReefAngel.DosingPumpRepeat" + dosing_count + "( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="dosing")
				{
					dosing_count++;
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.DosingPumpRepeat( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_dosing_offset") + "," + localStorage.getItem("expansion_port_1"+a+"_dosing_every") + "," + localStorage.getItem("expansion_port_1"+a+"_dosing_for") + " );"+"\n";
					else
						test+="    ReefAngel.DosingPumpRepeat" + dosing_count + "( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="delayed" && localStorage.getItem("board")!="ra_star")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.Relay.DelayedOn( Port" + a + "," + localStorage.getItem("main_port_"+a+"_delayed_start") + " );"+"\n";
					else
						test+="    ReefAngel.Relay.DelayedOn( Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="delayed")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.Relay.DelayedOn( Box1_Port" + a + "," + localStorage.getItem("expansion_port_"+a+"_delayed_start") + " );"+"\n";
					else
						test+="    ReefAngel.Relay.DelayedOn( Box1_Port" + a + " );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="delayed")
				{
					if (localStorage.getItem("memory")=="code")
						test+="    ReefAngel.Relay.DelayedOn( Box2_Port" + a + "," + localStorage.getItem("expansion_port_1"+a+"_delayed_start") + " );"+"\n";
					else
						test+="    ReefAngel.Relay.DelayedOn( Box2_Port" + a + " );"+"\n";
				}
	
				if (localStorage.getItem("main_port_"+a+"_function")=="opposite" && localStorage.getItem("board")!="ra_star")
				{
					test+="    ReefAngel.Relay.Set( Port" + a + ", !ReefAngel.Relay.Status( " + localStorage.getItem("main_port_"+a+"_opposite_port").replace("Main Box Port ","Port").replace("Expansion Box Port ","Box1_Port") + " ) );"+"\n";
				}
				if (localStorage.getItem("expansion_port_"+a+"_function")=="opposite")
				{
					test+="    ReefAngel.Relay.Set( Box1_Port" + a + ", !ReefAngel.Relay.Status( " + localStorage.getItem("expansion_port_"+a+"_opposite_port").replace("Main Box Port ","Port").replace("Expansion Box Port ","Box1_Port") + " ) );"+"\n";
				}
				if (localStorage.getItem("expansion_port_1"+a+"_function")=="opposite")
				{
					test+="    ReefAngel.Relay.Set( Box2_Port" + a + ", !ReefAngel.Relay.Status( " + localStorage.getItem("expansion_port_1"+a+"_opposite_port").replace("Main Box Port ","Port").replace("Expansion Box Port ","Box1_Port") + " ) );"+"\n";
				}
			}
			
			if (localStorage.getItem("rfexpansion")=="true")
			{
				test+="    ReefAngel.RF.UseMemory = false;"+"\n";
				test+="    ReefAngel.RF.SetMode( " + localStorage.getItem("rfmode") + "," + localStorage.getItem("rfspeed") + "," + localStorage.getItem("rfduration") + " );"+"\n";
			}
			var dim_function=""

			if (localStorage.getItem("dimming_Daylight_waveform")=="slope")
			{
				if (localStorage.getItem("memory")=="code")
				{
					var t_on =Date.parse(localStorage.getItem("dimming_Daylight_start_time"));
					var t_off =Date.parse(localStorage.getItem("dimming_Daylight_end_time"));
					dim_function="SetDaylight( PWMSlope( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Daylight_start_percent") +"," + localStorage.getItem("dimming_Daylight_end_percent") + "," + localStorage.getItem("dimming_Daylight_duration") +",0 ) );"+"\n";
				}
				else
				{
					dim_function="DaylightPWMSlope();"+"\n";
				}
			}
			if (localStorage.getItem("dimming_Daylight_waveform")=="parabola")
			{
				if (localStorage.getItem("memory")=="code")
				{
					var t_on =Date.parse(localStorage.getItem("dimming_Daylight_start_time"));
					var t_off =Date.parse(localStorage.getItem("dimming_Daylight_end_time"));
					dim_function="SetDaylight( PWMParabola( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Daylight_start_percent") +"," + localStorage.getItem("dimming_Daylight_end_percent") +",0 ) );"+"\n";
				}
				else
				{
					dim_function="DaylightPWMParabola();"+"\n";
				}
			}
			if (localStorage.getItem("dimming_Daylight_waveform")=="moonphase")
				dim_function="SetDaylight( MoonPhase() );"+"\n";
			if (dim_function.length>0)
			{
				test+="    ReefAngel.PWM." + dim_function;
			}
			
			dim_function=""

			if (localStorage.getItem("dimming_Actinic_waveform")=="slope")
			{
				if (localStorage.getItem("memory")=="code")
				{
					var t_on =Date.parse(localStorage.getItem("dimming_Actinic_start_time"));
					var t_off =Date.parse(localStorage.getItem("dimming_Actinic_end_time"));
					dim_function="SetActinic( PWMSlope( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Actinic_start_percent") +"," + localStorage.getItem("dimming_Actinic_end_percent") + "," + localStorage.getItem("dimming_Actinic_duration") +",0 ) );"+"\n";
				}
				else
				{
					dim_function="ActinicPWMSlope();"+"\n";
				}
			}
			if (localStorage.getItem("dimming_Actinic_waveform")=="parabola")
			{
				if (localStorage.getItem("memory")=="code")
				{
					var t_on =Date.parse(localStorage.getItem("dimming_Actinic_start_time"));
					var t_off =Date.parse(localStorage.getItem("dimming_Actinic_end_time"));
					dim_function="SetActinic( PWMParabola( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Actinic_start_percent") +"," + localStorage.getItem("dimming_Actinic_end_percent") +",0 ) );"+"\n";
				}
				else
				{
					dim_function="ActinicPWMParabola();"+"\n";
				}
			}
			if (localStorage.getItem("dimming_Actinic_waveform")=="moonphase")
				dim_function="SetActinic( MoonPhase() );"+"\n";
			if (dim_function.length>0)
			{
				test+="    ReefAngel.PWM." + dim_function;
			}
			
			
			
			if (localStorage.getItem("board")=="ra_star")
			{
				dim_function=""
	
				if (localStorage.getItem("dimming_Daylight 2_waveform")=="slope")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_Daylight 2_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_Daylight 2_end_time"));
						dim_function="SetDaylight2( PWMSlope( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Daylight 2_start_percent") +"," + localStorage.getItem("dimming_Daylight 2_end_percent") + "," + localStorage.getItem("dimming_Daylight 2_duration") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Daylight2PWMSlope();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_Daylight 2_waveform")=="parabola")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_Daylight 2_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_Daylight 2_end_time"));
						dim_function="SetDaylight2( PWMParabola( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Daylight 2_start_percent") +"," + localStorage.getItem("dimming_Daylight 2_end_percent") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Daylight2PWMParabola();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_Daylight 2_waveform")=="moonphase")
					dim_function="SetDaylight2( MoonPhase() );"+"\n";
				if (dim_function.length>0)
				{
					test+="    ReefAngel.PWM." + dim_function;
				}
				
				dim_function=""
	
				if (localStorage.getItem("dimming_Actinic 2_waveform")=="slope")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_Actinic 2_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_Actinic 2_end_time"));
						dim_function="SetActinic2( PWMSlope( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Actinic 2_start_percent") +"," + localStorage.getItem("dimming_Actinic 2_end_percent") + "," + localStorage.getItem("dimming_Actinic 2_duration") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Actinic2PWMSlope();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_Actinic 2_waveform")=="parabola")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_Actinic 2_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_Actinic 2_end_time"));
						dim_function="SetActinic2( PWMParabola( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_Actinic 2_start_percent") +"," + localStorage.getItem("dimming_Actinic 2_end_percent") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Actinic2PWMParabola();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_Actinic 2_waveform")=="moonphase")
					dim_function="SetActinic2( MoonPhase() );"+"\n";
				if (dim_function.length>0)
				{
					test+="    ReefAngel.PWM." + dim_function;
				}			
			}
			
			for (a=0;a<5;a++)
			{
				dim_function=""
	
				if (localStorage.getItem("dimming_"+a+"_waveform")=="slope")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_"+a+"_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_"+a+"_end_time"));
						dim_function="SetChannel( "+a+",PWMSlope( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_"+a+"_start_percent") +"," + localStorage.getItem("dimming_"+a+"_end_percent") + "," + localStorage.getItem("dimming_"+a+"_duration") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Channel"+a+"PWMSlope();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_"+a+"_waveform")=="parabola")
				{
					if (localStorage.getItem("memory")=="code")
					{
						var t_on =Date.parse(localStorage.getItem("dimming_"+a+"_start_time"));
						var t_off =Date.parse(localStorage.getItem("dimming_"+a+"_end_time"));
						dim_function="SetChannel( "+a+",PWMParabola( " + t_on.getHours() + "," + t_on.getMinutes() + "," + t_off.getHours() + "," + t_off.getMinutes() + "," + localStorage.getItem("dimming_"+a+"_start_percent") +"," + localStorage.getItem("dimming_"+a+"_end_percent") +",0 ) );"+"\n";
					}
					else
					{
						dim_function="Channel"+a+"PWMParabola();"+"\n";
					}
				}
				if (localStorage.getItem("dimming_"+a+"_waveform")=="moonphase")
					dim_function="SetChannel( "+a+",MoonPhase() );"+"\n";
				if (dim_function.length>0)
				{
					test+="    ReefAngel.PWM." + dim_function;
				}				
			}
			
			if (localStorage.getItem("jebaoattachment")=="true")
			{
				test+="    ReefAngel.DCPump.UseMemory = false;"+"\n";
				test+="    ReefAngel.DCPump.SetMode( "+localStorage.getItem("dcpumpmode")+","+localStorage.getItem("dcpumpspeed")+","+localStorage.getItem("dcpumpduration")+" );" +"\n";
				test+="    ReefAngel.DCPump.DaylightChannel = "+localStorage.getItem("dcpumpdaylight")+";" +"\n";
				test+="    ReefAngel.DCPump.ActinicChannel = "+localStorage.getItem("dcpumpactinic")+";" +"\n";
				if (localStorage.getItem("board")=="ra_star")
				{
					test+="    ReefAngel.DCPump.Daylight2Channel = "+localStorage.getItem("dcpumpdaylight2")+";" +"\n";
					test+="    ReefAngel.DCPump.Actinic2Channel = "+localStorage.getItem("dcpumpactinic2")+";" +"\n";
				}
				if (localStorage.getItem("dimmingexpansion")=="true")
				{
					for (a=0;a<6;a++)
						test+="    ReefAngel.DCPump.ExpansionChannel["+a+"] = "+localStorage.getItem("dcpumpchannel"+a+"")+";" +"\n";
				}
					
			}
			
			if (localStorage.getItem("buzzer")=="true")
			{
				test+="\n";
				test+="    boolean buzzer=false;" +"\n";
				if (localStorage.getItem("buzzer_ato")=="true")
					test+="    if ( ReefAngel.isATOTimeOut() ) buzzer=true;" +"\n";
				if (localStorage.getItem("buzzer_overheat")=="true")
					test+="    if ( ReefAngel.isOverheat() ) buzzer=true;" +"\n";
				if (localStorage.getItem("buzzer_buslock")=="true")
					test+="    if ( ReefAngel.isBusLock() ) buzzer=true;" +"\n";
				if (localStorage.getItem("board")=="ra_star")
				{
					test+="    if ( buzzer ) ReefAngel.BuzzerOn(2); else ReefAngel.BuzzerOff();" +"\n";
				}
				else
				{
					if (localStorage.getItem("dimming_Daylight_waveform")=="buzzer")
						test+="    ReefAngel.PWM.SetDaylight( buzzer?0:100 );" +"\n";
					if (localStorage.getItem("dimming_Actinic_waveform")=="buzzer")
						test+="    ReefAngel.PWM.SetActinic( buzzer?0:100 );" +"\n";
					if (localStorage.getItem("dimming_Dayligh 2t_waveform")=="buzzer")
						test+="    ReefAngel.PWM.SetDaylight2( buzzer?0:100 );" +"\n";
					if (localStorage.getItem("dimming_Actinic 2_waveform")=="buzzer")
						test+="    ReefAngel.PWM.SetActinic2( buzzer?0:100 );" +"\n";
				}
			}
			
			if (localStorage.getItem("statements")!=null)
			{
				var statements=[];
				statements=JSON.parse(localStorage.getItem("statements"));
				for (a=0;a<statements.length;a++)
				{
					test+="    if ( ";
					switch (statements[a][1])
					{
						case "Temperature 1":
							test+="ReefAngel.Params.Temp[ T1_PROBE ]";
							break;
						case "Temperature 2":
							test+="ReefAngel.Params.Temp [T2_PROBE ]";
							break;
						case "Temperature 3":
							test+="ReefAngel.Params.Temp[ T3_PROBE ]";
							break;
						case "pH":
							test+="ReefAngel.Params.PH";
							break;
						case "Salinity":
							test+="ReefAngel.Params.Salinity";
							break;
						case "ORP":
							test+="ReefAngel.Params.ORP";
							break;
						case "pH Expansion":
							test+="ReefAngel.Params.PHExp";
							break;
						case "PAR":
							test+="ReefAngel.PAR.GetLevel()";
							break;
						case "Humidity":
							test+="ReefAngel.Humidity.GetLevel()";
							break;
						case "Water Level":
							test+="ReefAngel.WaterLevel.GetLevel()";
							break;
						case "Water Level 1":
							test+="ReefAngel.WaterLevel.GetLevel(1)";
							break;
						case "Water Level 2":
							test+="ReefAngel.WaterLevel.GetLevel(2)";
							break;
						case "Water Level 3":
							test+="ReefAngel.WaterLevel.GetLevel(3)";
							break;
						case "Water Level 4":
							test+="ReefAngel.WaterLevel.GetLevel(4)";
							break;
						case "Low ATO":
							test+="ReefAngel.LowATO.IsActive()";
							break;
						case "High ATO":
							test+="ReefAngel.HighATO.IsActive()";
							break;
						case "Alarm":
							test+="ReefAngel.Alarm.IsActive()";
							break;
						case "I/O Channel 0":
							test+="ReefAngel.IO.GetChannel(0)";
							break;
						case "I/O Channel 1":
							test+="ReefAngel.IO.GetChannel(1)";
							break;
						case "I/O Channel 2":
							test+="ReefAngel.IO.GetChannel(2)";
							break;
						case "I/O Channel 3":
							test+="ReefAngel.IO.GetChannel(3)";
							break;
						case "I/O Channel 4":
							test+="ReefAngel.IO.GetChannel(4)";
							break;
						case "I/O Channel 5":
							test+="ReefAngel.IO.GetChannel(5)";
							break;
						case "Daylight Channel":
							test+="ReefAngel.PWM.GetDaylightValue()";
							break;
						case "Actinic Channel":
							test+="ReefAngel.PWM.GetActinicValue()";
							break;
						case "Daylight 2 Channel":
							test+="ReefAngel.PWM.GetDaylight2Value()";
							break;
						case "Actinic 2 Channel":
							test+="ReefAngel.PWM.GetActinic2Value()";
							break;
						case "ATO Timeout":
							test+="ReefAngel.isATOTimeOut()";
							break;
						case "Overheat":
							test+="ReefAngel.isOverheat()";
							break;
						case "Leak":
							test+="ReefAngel.isLeak()";
							break;
						case "Bus Lock":
							test+="ReefAngel.isBusLock()";
							break;
						case "Feeding Mode":
							test+="ReefAngel.isFeedingMode()";
							break;
						case "Water Change Mode":
							test+="ReefAngel.isWaterChangeMode()";
							break;
						case "Lights On Mode":
							test+="ReefAngel.isLightsOnMode()";
							break;
						case "Main Box Port 1":
						case "Main Box Port 2":
						case "Main Box Port 3":
						case "Main Box Port 4":
						case "Main Box Port 5":
						case "Main Box Port 6":
						case "Main Box Port 7":
						case "Main Box Port 8":
							test+="ReefAngel.Relay.Status( Port" + statements[a][1].replace("Main Box Port ","") + " )";
							break;
						case "Exp Box Port 1":
						case "Exp Box Port 2":
						case "Exp Box Port 3":
						case "Exp Box Port 4":
						case "Exp Box Port 5":
						case "Exp Box Port 6":
						case "Exp Box Port 7":
						case "Exp Box Port 8":
							test+="ReefAngel.Relay.Status( Box1_Port" + statements[a][1].replace("Exp Box Port ","") + " )";
							break;
						case "Year":
							test+="year(now())";
							break;
						case "Month":
							test+="month(now())";
							break;
						case "Day":
							test+="day(now())";
							break;
						case "Hour (24hr)":
							test+="hour(now())";
							break;
						case "Minute":
							test+="minute(now())";
							break;
						case "Second":
							test+="second(now())";
							break;
						case "Day of the week":
							test+="weekday(now())";
							break;
					}
					switch (statements[a][2])
					{
						case "less than or equal to":
							test+=" <= ";
							break;
						case "less than":
							test+=" < ";
							break;
						case "equal to":
							test+=" == ";
							break;
						case "different than":
							test+=" != ";
							break;
						case "greater than":
							test+=" > ";
							break;
						case "greater than or equal to":
							test+=" >= ";
							break;
					}
					switch (statements[a][1])
					{
						case "Temperature 1":
						case "Temperature 2":
						case "Temperature 3":
						case "Salinity":
							test+=statements[a][3]*10;
							break;
						case "pH":
						case "pH Expansion":
							test+=statements[a][3]*100;
							break;
						default:
							test+=statements[a][3];
							break;
					}
					test+=" ) ";
					switch (statements[a][4])
					{
						case "Main Box Port 1":
						case "Main Box Port 2":
						case "Main Box Port 3":
						case "Main Box Port 4":
						case "Main Box Port 5":
						case "Main Box Port 6":
						case "Main Box Port 7":
						case "Main Box Port 8":
						{
							if (statements[a][5]=="turn On")
								test+="ReefAngel.Relay.On( Port" + statements[a][4].replace("Main Box Port ","" ) + " )";
							else
								test+="ReefAngel.Relay.Off( Port" + statements[a][4].replace("Main Box Port ","" ) + " )";
							break;
						}
						case "Exp Box Port 1":
						case "Exp Box Port 2":
						case "Exp Box Port 3":
						case "Exp Box Port 4":
						case "Exp Box Port 5":
						case "Exp Box Port 6":
						case "Exp Box Port 7":
						case "Exp Box Port 8":
						{
							if (statements[a][5]=="turn On")
								test+="ReefAngel.Relay.On( Box1_Port" + statements[a][4].replace("Exp Box Port ","" ) + " )";
							else
								test+="ReefAngel.Relay.Off( Box1_Port" + statements[a][4].replace("Exp Box Port ","" ) + " )";
							break;
						}
						case "Daylight Channel":
							test+="ReefAngel.PWM.SetDaylight( " + statements[a][6] + " )";
							break;
						case "Actinic Channel":
							test+="ReefAngel.PWM.SetActinic( " + statements[a][6] + " )";
							break;
						case "Daylight 2 Channel":
							test+="ReefAngel.PWM.SetDaylight2( " + statements[a][6] + " )";
							break;
						case "Actinic 2 Channel":
							test+="ReefAngel.PWM.SetActinic2( " + statements[a][6] + " )";
							break;
						case "Expansion Channel 0":
						case "Expansion Channel 1":
						case "Expansion Channel 2":
						case "Expansion Channel 3":
						case "Expansion Channel 4":
						case "Expansion Channel 5":
							test+="ReefAngel.PWM.SetChannel( " + statements[a][4].replace("Expansion Channel ","") + ","  + statements[a][6] + " )";
							break;
						case "DC Pump Mode":
							test+="ReefAngel.DCPump.Mode = " + statements[a][6];
							break;
						case "DC Pump Speed":
							test+="ReefAngel.DCPump.Speed = " + statements[a][6];
							break;
						case "DC Pump Duration":
							test+="ReefAngel.DCPump.Duration = " + statements[a][6];
							break;
						
					}
					test+=";" +"\n";
				}
			}
			
			test+="\n";
			test+="    ////// Place your custom code below here"+"\n";
			test+="\n";
			test+="\n";
			test+="    ////// Place your custom code above here"+"\n";
			test+="\n";
	
			if (localStorage.getItem("wifiattachment")=="true" && localStorage.getItem("board")=="ra_plus") test+="    ReefAngel.Portal( \"<?php echo $user->data['username'];?>\" );"+"\n";
			if (localStorage.getItem("cloudwifiattachment")=="true" && localStorage.getItem("board")=="ra_plus") test+="    ReefAngel.CloudPortal();"+"\n";
			if (localStorage.getItem("board")=="ra_star") test+="    ReefAngel.Network.Cloud();"+"\n";
	
			test+="    // This should always be the last line"+"\n";
			if (localStorage.getItem("board")=="ra_star")
				test+="    ReefAngel.ShowTouchInterface();"+"\n";
			else
				test+="    ReefAngel.ShowInterface();"+"\n";
			test+="}"+"\n";
		}
		test+="\n";
		test+="\n";
		test+="\n";
		if (localStorage.getItem("password")!="" && localStorage.getItem("password")!=="null")
			test+="// RA_STRING1=" + localStorage.getItem("password") + "\n";
		if (localStorage.getItem("wifipassword")!="" && localStorage.getItem("wifipassword")!=="null")
			test+="// RA_STRING2=" + localStorage.getItem("wifipassword") + "\n";
		if (localStorage.getItem("wifissid")!="" && localStorage.getItem("wifissid")!=="null")
			test+="// RA_STRING3=" + localStorage.getItem("wifissid") + "\n";
		for (var i = 0; i < localStorage.length; i++){
			if (localStorage.key(i).substring(0,6)=="LABEL_")
				test+="// RA_LABEL " + localStorage.key(i) + "=" + localStorage.getItem(localStorage.key(i)) + "\n";
		}
		if (localStorage.getItem("board")=="ra_cloud_hub")
		{
			var fallback="";
			for (a=1;a<=8;a++)
			{
				if (localStorage.getItem("fallback_expansion_"+a)=="true")
					fallback+="Port"+a+"Bit | ";
			}
			if (fallback.length>3)
			{
				fallback=fallback.substring(0,fallback.length-3);
				test=test.replace("Relay1FallBack 0", "Relay1FallBack " + fallback.length);
			}
		}
		$("#postboard").val(localStorage.getItem("board"));
		$("#postcode").text(test.split("<").join("&lt;").split(">").join("&gt;"));
	});
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
    <h1 name="main_wizard">Reef Angel Web Wizard</h1>
    <h2>Ready to generate code</h2>
	<p>We have all the information to generate the code for your Reef Angel controller.</p>
    <pre id="editor"></pre>
    <div id="test"></div>
    <div id=footer>
    <form action="index.php" method="post" id="formpost" name="formpost">
        <input type="text" name="b" id="postboard">
        <textarea name="c" id="postcode" rows="10" cols="50"></textarea>
        <button id=prev class="ui-button ui-widget ui-corner-all" type="button">Prev</button>
        <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </form>
    </div>
</div>




<?php include 'footer.php'; ?>