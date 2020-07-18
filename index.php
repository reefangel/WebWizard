<?php
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './../';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
$user->session_begin();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <title>Reef Angel Web Wizard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="css/webwizard.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.5/socket.io.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/split.js"></script>
  <script src="js/shortcut.js"></script>
  <script>
  
	jQuery["postJSON"] = function( url, data, callback ) {
		// shift arguments if data argument was omitted
		if ( jQuery.isFunction( data ) ) {
			callback = data;
			data = undefined;
		}
	
		return jQuery.ajax({
			url: url,
			type: "POST",
			contentType:"application/json; charset=utf-8",
			dataType: "json",
			data: data,
			success: callback
		});
	};
  
	function check_buttons()
	{
		if ($('#boards').val()!="")
		{
			$('#compile').button("enable");
			if ($('#boards').val()=="RA_STAR")
			{
				 $("#remote_port").attr("disabled", false);
				 $("#ports").selectmenu("refresh");
			}
			else
			{
				 if ($('#ports').val()=="remote") $('#ports').val("");
				 $("#remote_port").attr("disabled", true);
				 $('#ports').selectmenu("refresh");
			}
		}
		else
		{
			$('#compile').button("disable");
			if ($('#ports').val()=="remote") $('#ports').val("");
			$("#remote_port").attr("disabled", true);
			$("#ports").selectmenu("refresh");
		}
		if ($('#ports').val()!="" && $('#boards').val()!="")
			$('#upload').button("enable");
		else
			$('#upload').button("disable");			
	}
	function end_requests()
	{
		check_buttons();
		$("#editor").fadeTo( "slow", 1 );
		$("#loading").hide();
		$('#cancelupload').hide();
	}
	
	function new_sketch()
	{
		$("#sketch_name").html("unsaved");
		$("#sketch_save_name").val("");
		editor.setValue("void setup(){\n  // put your setup code here, to run once:\n\n}\n\nvoid loop() {\n  // put your main code here, to run repeatedly:\n\n}");
		editor.gotoLine(1);
		closeNav();
	}
	
	function open_sketch()
	{
		$.post("getfiles.php",
		{
			u:$('#username').html(),
		},
		function(response,status){
			$("#select_file").empty();
			var obj=JSON.parse(response, function(k, v) {
				if (typeof v !== 'object')
					$("#select_file").append("<li class='ui-widget-content'>" + v + "</li>");
			});
			open_dialog.dialog("open");
		});
		closeNav();
	}
	
	function new_wizard()
	{
		closeNav();
		window.location.href = "wizard_board.php";
	}
	
	function check_save()
	{
		if ($("#sketch_name").html()=="unsaved")
			dialog.dialog( "open" );
		else
			save_sketch();
		closeNav();
	}
	
	function save_sketch()
	{
		if ($("#sketch_save_name").val()=="")
		{
			dialog.dialog( "close" );
			return;
		}
		if ($("#sketch_save_name").val().indexOf(".ino")>0)
		{
			$("#sketch_name").html($("#sketch_save_name").val());
		}
		else
		{
			$("#sketch_name").html($("#sketch_save_name").val() + ".ino");
		}
		dialog.dialog( "close" );
		$.post("savesketch.php",
		{
			c:editor.getValue(),
			u:$('#username').html(),
			n:$("#sketch_name").html()
		},
		function(response,status){
			$('#statuspane').html($('#statuspane').html() + response + "<br>");
			$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
			end_requests();
		});
	}
	
	function openNav() {
		document.getElementById("myNav").style.width = "250px";
	}
	
	function closeNav() {
		document.getElementById("myNav").style.width = "0%";
	}	
	
	function download_plugin()
	{
		if (navigator.userAgent.indexOf('Mac OS X') != -1)
			window.location.href = 'download/plugininstaller.pkg';
		else
			window.location.href = 'download/plugininstaller.exe';
		
	}
	
	function check_size()
	{
		if($( window ).width() < 1024)
		{
			$('#compile').html($('#compile').html().replace("Compile",""));
			$('#upload').html($('#upload').html().replace("Upload",""));
			$('#cancelupload').html($('#cancelupload').html().replace("Cancel Upload",""));
			$('#plugin').css("width","70px");
			$('#plugin').css("font-size",".3em");
			$('#boards-menu').css("font-size",".3em");
			$('#boards-button').css("font-size",".3em");
			$('#ports-menu').css("font-size",".3em");
			$('#ports-button').css("font-size",".3em");
		}
		else
		{
			$('#compile').html($('#compile').html().replace("<span></span>","<span>Compile</span>"));
			$('#upload').html($('#upload').html().replace("<span></span>","<span>Upload</span>"));
			$('#cancelupload').html($('#cancelupload').html().replace("<span></span>","<span>Cancel Upload</span>"));
			$('#plugin').css("width","250px");
			$('#plugin').css("font-size","1em");
			$('#boards-menu').css("font-size","1em");
			$('#boards-button').css("font-size","1em");
			$('#ports-menu').css("font-size","1em");
			$('#ports-button').css("font-size","1em");
		}
	}
	
	$( function() {
		$( window ).resize(function() {
			check_size();
		});
		$("#select_file").selectable({
			selecting: function(event, ui){
				if( $(".ui-selected, .ui-selecting").length > 1){
					  $(ui.selecting).removeClass("ui-selecting");
				}
			}
		});

		shortcut.add("Ctrl+S",function() {
			if ($("#sketch_name").html()=="unsaved")
				dialog.dialog( "open" );
			else
				save_sketch();
		});
		shortcut.add("Meta+S",function() {
			if ($("#sketch_name").html()=="unsaved")
				dialog.dialog( "open" );
			else
				save_sketch();
		});
		shortcut.add("Ctrl+O",function() {
			open_sketch();
		});
		shortcut.add("Meta+O",function() {
			open_sketch();
		});
		shortcut.add("Ctrl+N",function() {
			new_sketch();
		});
		shortcut.add("Meta+N",function() {
			new_sketch();
		});
		
		$("#sketch_save_name").on("keypress", function(e) {
			 if (e.which == 13) {
				save_sketch();
			 }
		});
		dialog = $( "#save-sketch" ).dialog({
		  autoOpen: false,
		  height: 200,
		  width: 350,
		  modal: true,
		  buttons: {
			"Save": function() {
				save_sketch();
			},
			Cancel: function() {
			  dialog.dialog( "close" );
			}
		  },
		  close: function() {
		  }
		});
		open_dialog = $( "#open-sketch" ).dialog({
		  autoOpen: false,
		  height: "auto",
		  width: 350,
		  modal: true,
		  buttons: {
			"Open": function() {
				if ($( ".ui-selected").html()!=undefined)
				{
					console.log($( ".ui-selected").html());
					$.post("getcodeino.php",
					{
						u:$('#username').html(),
						f:$( ".ui-selected").html()
					},
					function(response,status){
						editor.setValue(response);
						editor.gotoLine(1);
						$("#sketch_name").html($( ".ui-selected").html());
						$("#sketch_save_name").val($( ".ui-selected").html());
					});
				}
				open_dialog.dialog( "close" );
			},
			"Delete": function() {
				open_dialog.dialog( "close" );
				confirm_dialog.dialog("open");
			},
			Cancel: function() {
			  open_dialog.dialog( "close" );
			}
		  },
		  close: function() {
		  }
		});
		
		confirm_dialog = $( "#delete-confirm" ).dialog({
		  autoOpen: false,
		  height: "auto",
		  width: 350,
		  modal: true,
		  buttons: {
			"Delete": function() {
				$.post("deleteino.php",
				{
					u:$('#username').html(),
					f:$( ".ui-selected").html()
				},
				function(response,status){
					$('#statuspane').html($('#statuspane').html() + response + "<br>");
					$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);					
				});
			  $( this ).dialog( "close" );
			},
			Cancel: function() {
			  $( this ).dialog( "close" );
			}
		  }
		});				
		anonymous_dialog = $( "#anonymous" ).dialog({
		  autoOpen: false,
		  modal: true,
		  buttons: {
			Ok: function() {
			  $( this ).dialog( "close" );
			}
		  }
		});
		if ($('#username').html()=="Anonymous")
		{
			anonymous_dialog.dialog ("open");
		}
		
		var uploading=false;
		Split(['#editorpane', '#statuspane'], {
			direction: 'vertical',
			sizes: [75, 25],
			gutterSize: 8,
			cursor: 'row-resize'
		});
		$("#loading").hide();
		$("#loading").css({
			position: "absolute",
			width: "100%",
			height: "100%",
			left: 0,
			top: 0,
			zIndex: 1000000,  // to be on the safe side
			background: "url(image/loading.gif) no-repeat 50% 50%"
		}).appendTo($("#editor").css("position", "relative"));
		
		$('#ports,#boards').selectmenu();
		$('#boards').on( "selectmenuchange", function( event, ui ) {
			check_buttons();
		});
		$('#ports').on( "selectmenuchange", function( event, ui ) {
			check_buttons();
		});
		$('#compile').button({icon: "ui-icon-check"}).click(function() {
			$('#statuspane').html("");
			$('#compile').button("disable");
			$('#upload').button("disable");
			$("#editor").fadeTo( "slow", 0.7 );
			$("#loading").show();
			var code = editor.getValue() + "\n\n";
			var username = $('#username').html();
			var board = $('#boards').val();
			$.post("https://webwizard.reefangel.com/compile.php",
			{
				c:code,
				u:username,
				b:board
			},
			function(response,status){
				$('#statuspane').html(response);
				$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
				end_requests();
				//alert("*----Received Data----*\n\nResponse : " + response+"\n\nStatus : " + status);
			}).fail(function(response) {
				$('#statuspane').html($('#statuspane').html() + "<br>Error compiling: " + response);
				$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
				end_requests();
			});
		});
		$('#upload').button({icon: "ui-icon-circle-arrow-e"}).click(function() {
			uploading=true;
			$('#statuspane').html("");
			$('#compile').button("disable");
			$('#upload').button("disable");
			$("#editor").fadeTo( "slow", 0.7 );
			$("#loading").show();
			$('#cancelupload').show();
			var code = editor.getValue() + "\n\n";
			var username = $('#username').html();
			var board = $('#boards').val();
			
			$.post("https://webwizard.reefangel.com/compile.php",
			{
				c:code,
				u:username,
				b:board
			},
			function(response,status){
				if (uploading)
				{
					$('#statuspane').html(response);
					$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
					if (response.indexOf("Your code was compiled sucessfully")>=0)
					{
						if ($('#ports').val()=="remote")
						{
							$.post("https://webwizard.reefangel.com/remoteupload.php",
							{
								u:username,
								b:board
							},
							function(response,status){
								$('#statuspane').html($('#statuspane').html() + "<br>" + response);
							}).fail(function(response) {
								$('#statuspane').html($('#statuspane').html() + "<br>Error compiling bin file: " + response);
								$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
							});
							end_requests();
							uploading=false;								
						}
						else
						{
							$.post("https://webwizard.reefangel.com/getcodehex.php",
							{
								u:username,
								b:board
							},
							function(response,status){
								//$('#statuspane').html($('#statuspane').html() + "<br>" + response);
								
								var command_line="";
								if ($('#boards').val()=="RA_PLUS" || $('#boards').val()=="RA_STAR")
								{
									command_line='{"board":"arduino:avr:mega:cpu=atmega2560","port":"' + $('#ports').val() + '","filename":"firmware.hex","extra":{"auth":{"password":null},"wait_for_upload_port":false,"use_1200bps_touch":false,"network":false,"params_verbose":"-v","params_quiet":"-q -q"}, "signature":"166bca46be919c282177fb01d80699f41a66f19200385fae9451ae144b9cdc875782d664c5c5cf5f091906745d01db3783093141abe35b8f9f1c9215fb05bb02ff56f471f484db2cb256148a02bac063418dd2ce21204557ce30ced38fa1a344094b8932ead5f555d7ce003fade8fbc74404df484f7f59ab14a4296ff460dce59486da168374ec2059c4cb59728e078bdfbd281cd0dc1ea2170c06d2959fa2fc0fb29c897b5fd5725648a94297eed0e503a5febc7351cbb67b7b8d1dd919c7c7222f2ae1336b69ed89cb21aa477df9d2aaea87b342cb84eb6c16d69ecbe5dfe7a7034adf883f38e62043e6b71a8f0123eb1ca70a1e33021f564c98e547e72749", "hex":"' + response + '", "commandline":"\\\"{runtime.tools.avrdude.path}/bin/avrdude\\\" \\\"-C{runtime.tools.avrdude.path}/etc/avrdude.conf\\\" {upload.verbose} {upload.verify} -patmega2560 -cwiring -P{serial.port} -b115200 -D \\\"-Uflash:w:{build.path}/{build.project_name}.hex:i\\\""}';
								}
								if ($('#boards').val()=="RA_CLOUD")
								{
									command_line='{"board":"arduino:samd:mkr1000","port":"' + $('#ports').val() + '","filename":"firmware.bin","extra":{"auth":{"password":null},"wait_for_upload_port":true,"use_1200bps_touch":true,"network":false,"params_verbose":"-i -d","params_quiet":""}, "signature":"66695789d14908f52cb1964da58ec9fa816d6ddb321900c60ad6ec2d84a7c713abb2b71404030c043e32cf548736eb706180da8256f2533bd132430896437c72b396abe19e632446f16e43b80b73f5cf40aec946d00e7543721cc72d77482a84d2d510e46ea6ee0aaf063ec267b5046a1ace36b7eb04c64b4140302586f1e10eda8452078498ab5c9985e8f5d521786064601daa5ba2978cf91cfeb64e83057b3475ec029a1b835460f4e203c1635eaba812b076248a3589cd5d84c52398f09d255f8aae25d66a40d5ab2b1700247defbdfd044c77d44078197d1f543800e11f79d6ef1c6eb46df65fe2fffd81716b11d798ba21a3ca2cb20f6d955d8e1f8aef", "hex":"' + response + '", "commandline":"\\\"{runtime.tools.bossac-1.7.0.path}/bossac\\\" {upload.verbose} --port={serial.port.file} -U true -i -e -w -v \\\"{build.path}/{build.project_name}.bin\\\" -R"}';
								}
								
								
								$.postJSON("http://localhost:8991/upload",command_line,
								function(response,status){
									//end_requests();						
									//$('#statuspane').html($('#statuspane').html() + "<br>" + response);
								}).fail(function(xhr,response) {
									if (xhr.status==202)
									{
										$('#statuspane').html($('#statuspane').html() + "<br>" + "Attempting to upload your code to " + $('#boards').val() + " on local port " + $('#ports').val() + " ...<br><br>");
										$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
									}
									else
									{
										$('#statuspane').html($('#statuspane').html() + "<br>Error uploading: " + xhr.status);
										$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
										end_requests();
										uploading=false;
									}
								});
							}).fail(function(response) {
								$('#statuspane').html($('#statuspane').html() + "<br>Error opening HEX file: " + response);
								$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
								end_requests();
								uploading=false;
							});
						}
					}
					if (response.indexOf("Please fix the errors above and try again")>=0)
					{
						end_requests();
					}
				}
				else
				{
					end_requests();
				}
			}).fail(function(response) {
				$('#statuspane').html($('#statuspane').html() + "<br>Error compiling: " + response);
				$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
				end_requests();
				uploading=false;
			});;
		});
		$('#cancelupload').button({icon: "ui-icon-closethick"}).click(function() {
			socket.emit('command', 'killprogrammer');
			end_requests();
			uploading=false;
			$('#statuspane').html($('#statuspane').html() + "Upload cancelled<br>");
			$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
		});
		$('#compile').button("disable");
		$('#upload').button("disable");
		$('#cancelupload').hide();
		check_size();
		<?php if ($_POST["b"]) echo "check_buttons();"; ?>
	});

	var socket = io('http://localhost:8991');
	
	socket.on('connect_error', function(err) {
		$('#plugin').html("Plugin was not found");
		if($("#ports").val()!="remote")
		{
			if ($("#ports option").length>2)
			{
				$('#ports').find('option').remove().end();
				$('#ports').selectmenu('destroy').append('<option value="" selected>No port selected</option>').selectmenu();
				$('#ports').selectmenu('destroy').append('<option value="remote">Remote Upload</option>').selectmenu();
				$('#upload').button("disable");	
			}
		}
		check_size();
	});

	socket.on('message', function (data) {
		try
		{
			console.log(data);
			var obj=JSON.parse(data);
			if (obj['OS'])
			{
				console.log(obj.OS);
			}
			if (obj['Ports'])
			{
				if (obj.Ports.length>0)
				{
					obj.Ports.forEach(function(item)
					{
						if ($("#ports option[value='" + item.Name + "']").length==0)
						{
							console.log("Port: "+item.Name);
							$('#ports').append('<option val="' + item.Name + '">' + item.Name + '</option>');
						}
					});
				}
			}
			if (obj['Msg'])
			{
				if (obj.Msg.indexOf("Map Updated")<0)
				{
					$('#statuspane').html($('#statuspane').html() + obj.Msg + "<br>");
					$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
				}
				if (obj.Msg.indexOf("Could not program the board")>=0)
				{
					end_requests();
				}
			}
			if (obj['Flash'])
			{
				if (obj.Flash=="Ok" && obj.ProgrammerStatus=="Done")
				{
					$('#statuspane').html($('#statuspane').html() + "Your code was uploaded sucessfully.<br>");
					$("#statuspane").animate({ scrollTop: $('#statuspane').prop("scrollHeight")}, 200);
					end_requests();
				}
			}
		}
		catch (e)
		{
			
		}
	})

	socket.on('connect', function () {
		$('#plugin').html("Plugin found and connected");
		socket.emit('command', 'list');
		socket.emit('command', 'downloadtool windows-drivers');
		socket.emit('command', 'downloadtool avrdude');
		socket.emit('command', 'downloadtool bossac');
		check_size();
	})
  </script>
  
  </head>
  <body>

<div id="editorpane" class="split split-horizontal">
<div id="topbar">
	<img src="image/menu-icon.png" class="menuimage"><span id="menu_button" onclick="openNav()">Menu</span>
	<div id="sketch_name">unsaved</div>
    <div id="plugin">Connecting to plug in...</div>
    <select id="boards">
        <option value="">No boards selected</option>
        <option value="RA_PLUS" <?php if ($_POST["b"]=="ra_plus") echo "selected"; ?> >Reef Angel Plus</option>
        <option value="RA_STAR" <?php if ($_POST["b"]=="ra_star") echo "selected"; ?> >Reef Angel Star</option>
        <option value="RA_CLOUD"<?php if ($_POST["b"]=="ra_cloud_hub" || $_POST["b"]=="ra_cloud_wifi") echo "selected"; ?> >Cloud Wifi Attachment/Hub</option>
	</select>
    <select id="ports">
	    <option value="" id="no_port" selected>No port selected</option>
        <option value="remote" id="remote_port" disabled>Remote Upload</option>
	</select>
    <button id=compile><span>Compile</span></button>
    <button id=upload><span>Upload</span></button>
    <button id=cancelupload><span>Cancel Upload</span></button>
    <div id="loading"></div>
</div>
<pre id="editor">
<?php
	if ($_POST["c"])
	{
		echo $_POST["c"];
	}
	else
	{
		echo "void setup() {\n";
		echo "  // put your setup code here, to run once:\n";
		echo "\n";
		echo "}\n";
		echo "\n";
		echo "void loop() {\n";
		echo "  // put your main code here, to run repeatedly:\n";
		echo "\n";
		echo "}\n";
	}
?>
</pre>
</div>
<div id="statuspane" class="split split-horizontal">
</div>

<div id="save-sketch" title="Save Sketch as">
<p>&nbsp;</p>
    <fieldset>
      <label for="name">Sketch Name</label>
      <input type="text" name="sketch_save_name" id="sketch_save_name" class="text ui-widget-content ui-corner-all">
      <input type="button" tabindex="-1" style="position:absolute; top:-1000px">
    </fieldset>
</div>  

<div id="open-sketch" title="Manage Sketches">
    <ol id="select_file">
    </ol>
</div>  

<div id="delete-confirm" title="Delete Sketch?">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>This sketch will be permanently deleted and cannot be recovered. Are you sure?</p>
</div>

<div id="anonymous" title="Not logged in">
  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>You are currently not logged in. Saved sketches will not be kept in your account.<br><br>Please login to keep your sketches saved in your account.<br><br><a href="https://forum.reefangel.com/ucp.php?mode=login" style="border:0;outline:none;color:#00CCFF">Log In</a></p>
</div>

<div id="myNav" class="overlay">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <div id="username"><?php echo $user->data['username'];?></div>

    <div class="overlay-content">
    <a href="#" onclick="new_sketch()">New</a>
    <a href="#" onclick="open_sketch()">Open</a>
    <a href="#" onclick="new_wizard()">Wizard</a>
    <a href="#" onclick="check_save()">Save</a>
    <a href="#" onclick="download_plugin()">Download&nbsp;Plugin</a>
    </div>
</div>

<!-- load ace --> 
<script src="src-noconflict/ace.js"></script> 
<!-- load ace language tools --> 
<script src="src-noconflict/ext-language_tools.js"></script> 
<script src="src-noconflict/mode-c_cpp.js"></script> 
<script>
    // trigger extension
    var langTools = ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/c_cpp");
    editor.setTheme("ace/theme/ambiance");

    // enable autocompletion and snippets
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true
    });
	

	
</script>
</body>
</html>
