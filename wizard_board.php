<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  disabled: true,
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		localStorage.setItem("board", $('input:checked').val());
		if ($('input:checked').val()=="ra_plus")
		{
			window.location.href = "wizard_memory.php";
		}
		else if ($('input:checked').val()=="ra_star")
		{
			window.location.href = "wizard_cloudpassword.php";
		}
		else
		{
			window.location.href = "wizard_cloudpassword.php?b=" + $('input:checked').val();
		}
	});
	if(localStorage.getItem("board")!="")
		$("input[name=board][value=" + localStorage.getItem("board") + "]").prop('checked', true);
});
</script>

<div id="sidemenu" class="split split-horizontal">
<div id=logo></div>
<a href="/webwizard"><img src="image/left_arrow.png" align="absmiddle"> Back to Code View</a>
</div>
<div id="main" class="split split-horizontal">
    <h1>Reef Angel Web Wizard</h1>
    <p>Welcome to the Reef Angel Web Wizard</p>
    <p>I'm going to help you generate a code for your Reef Angel controller or Cloud Wifi Attachment/Hub.</p>
    <p>Please select which device you would like to generate the code for:</p>
    <div class="cc-selector">
        <input checked="checked" id="ra_plus" type="radio" name="board" value="ra_plus" />
        <label class="drinkcard-cc ra_plus" for="ra_plus">Reef Angel Plus</label>
        <input id="ra_star" type="radio" name="board" value="ra_star" />
        <label class="drinkcard-cc ra_star"for="ra_star">Reef Angel Star</label>
        <input id="ra_cloud_wifi" type="radio" name="board" value="ra_cloud_wifi" />
        <label class="drinkcard-cc ra_cloud_wifi"for="ra_cloud_wifi">Cloud Wifi Attachment</label>
        <input id="ra_cloud_hub" type="radio" name="board" value="ra_cloud_hub" />
        <label class="drinkcard-cc ra_cloud_hub"for="ra_cloud_hub">Cloud Wifi Hub</label>
    </div>
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>