<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		save_settings();
		window.location.href = "wizard_cloudwifi.php?b=ra_cloud_hub";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		save_settings();
		window.location.href = "wizard_ready.php?b=ra_cloud_hub";
	});
	$( "input" ).checkboxradio({
      icon: false
    });
	load_settings();
});

function save_settings(){
	for (a=1;a<=8;a++)
	{
		localStorage.setItem("fallback_expansion_"+a,$("#fallback_expansion_"+a).prop('checked'));
	}
}

function load_settings(){
	for (a=1;a<=8;a++)
	{
		if (localStorage.getItem("fallback_expansion_"+a)=="true")
			$("#fallback_expansion_"+a).prop('checked',"true").checkboxradio( "refresh" );
	}
}

</script>

<div id="sidemenu" class="split split-horizontal">
<div id=logo></div>
<a href="/webwizard"><img src="image/left_arrow.png" align="absmiddle"> Back to Code View</a>
<button id=go_board class="ui-button ui-widget ui-corner-all go_buttons">Board</button>
<button id=go_ready class="ui-button ui-widget ui-corner-all go_buttons">Generate</button>

</div>
<div id="main" class="split split-horizontal">
    <h1>Reef Angel Web Wizard</h1>
    <h2>Cloud Wifi Hub</h2>
    <p>Fallback ports are ports that will be turned on when cloud connection is lost.</p>
	<p>Please select the fallback ports:</p>
    <?php
		$expansion="";
		for($a=1;$a<=8;$a++)
		{
			$expansion=$expansion."    <label for='fallback_expansion_".$a."' class='expansion'>Expansion Box Port ".$a."</label>\n";
			$expansion=$expansion."    <input type='checkbox' name='fallback_expansion_".$a."' id='fallback_expansion_".$a."'><br>\n";
		}
		echo $expansion;
	?>

    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>