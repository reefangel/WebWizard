<?php include 'header.php'; ?>
<script>
$( function() {
	$('#prev').button({
	  icon: "ui-icon-triangle-1-w"
	}).click(function() {
		window.location.href = "wizard_board.php";
	});
	$('#next').button({
	  icon: "ui-icon-triangle-1-e",
	  iconPosition: "end"
	}).click(function() {
		window.location.href = "wizard_temperature.php";
	});

    // There's the gallery and the trash
    var $gallery = $( "#gallery" ),
      $trash = $( "#trash" ),
      $comparison = $( "#comparison" ) ;
	  $ifvalue = $( "#ifvalue" ) ;
	  $ifvalueparent = $( "#ifvalueparent" ) ;
	  $operator = $( "#operator" ) ;
 
    // Let the gallery items be draggable
//    $( "li", $gallery ).draggable({
//      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
//      revert: "invalid", // when not dropped, the item will revert back to its initial position
//      containment: "document",
//      helper: "clone",
//      cursor: "move"
//    });
//    $( "li", $comparison ).draggable({
//      cancel: "a.ui-icon", // clicking an icon won't initiate dragging
//      revert: "invalid", // when not dropped, the item will revert back to its initial position
//      containment: "document",
//      helper: "clone",
//      cursor: "move"
//    });
//    $( "li", $ifvalueparent ).draggable({
//      cancel: "a.ui-icon, #ifvalue", // clicking an icon won't initiate dragging
//      revert: "invalid", // when not dropped, the item will revert back to its initial position
//      containment: "document",
//      helper: "clone",
//      cursor: "move"
//    });
 
    // Let the trash be droppable, accepting the gallery items
//    $trash.droppable({
//      accept: "#gallery > li, #comparison > li, #ifvalueparent > li",
//      classes: {
//        "ui-droppable-active": "custom-state-active"
//      },
//      drop: function( event, ui ) {
//        deleteImage( ui.draggable );
//      }
//    });
	$gallery.sortable({
		connectWith: '#trash',
		receive: function (event, ui) {
			if (!$(ui.item).hasClass('galleryli')) {
			    ui.sender.sortable('cancel');
			}
		}
	});
	$comparison.sortable({
		connectWith: '#trash',
		receive: function (event, ui) {
			if (!$(ui.item).hasClass('comparisonli')) {
			    ui.sender.sortable('cancel');
			}
		}
	});
	$ifvalueparent.sortable({
		connectWith: '#trash',
		receive: function (event, ui) {
			if (!$(ui.item).hasClass('ifvalueli')) {
			    ui.sender.sortable('cancel');
			}
		}
	});
	$operator.sortable({
		connectWith: '#trash',
		receive: function (event, ui) {
			if (!$(ui.item).hasClass('operatorli')) {
			    ui.sender.sortable('cancel');
			}
		}
	});
	
	$trash.sortable({
		connectWith: '#gallery,#comparison,#ifvalueparent,#operator',
		receive: function (event, ui) {
			if ($(ui.item).hasClass('comparisonli')) {
				ui.item.clone().appendTo('#comparison');
			}
			if ($(ui.item).hasClass('operatorli')) {
				ui.item.clone().appendTo('#operator');
			}
		}
	});
	
    // Let the gallery be droppable as well, accepting items from the trash
    $gallery.droppable({
      accept: "#trash li.galleryli",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        //recycleImage( ui.draggable );
      }
    });
    $comparison.droppable({
      accept: "#trash li.comparisonli",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        //recycleImage( ui.draggable );
      }
    });
    $ifvalueparent.droppable({
      accept: "#trash li.ifvalueli",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        //recycleImage( ui.draggable );
      }
    });
    $operator.droppable({
      accept: "#trash li.operatorli",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        //recycleImage( ui.draggable );
      }
    });
    $trash.droppable({
      accept: "#gallery li.galleryli,#comparison li.comparisonli,#ifvalueparent li.ifvalueli,#operator li.operatorli",
      classes: {
        "ui-droppable-active": "custom-state-active"
      },
      drop: function( event, ui ) {
        //recycleImage( ui.draggable );
      }
    });

    // Image deletion function
//    function deleteImage( $item ) {
//		console.log($item);
//      $item.fadeOut(function() {
//        var $list = $( "ul", $trash ).length ?
//          $( "ul", $trash ) :
//          $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );
//        $item.appendTo( $list ).fadeIn(function() {
//        });
//      });
//    }
 
    // Image recycle function
//    function recycleImage( $item ) {
//      $item.fadeOut(function() {
//        $item
//          .fadeIn();
//      });
//    }
 
    // Resolve the icons behavior with event delegation
//    $( "ul.gallery > li" ).on( "click", function( event ) {
//      var $item = $( this ),
//        $target = $( event.target );
//      return false;
//    });	

});
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
    <div id="iftop">
        <h1>Reef Angel Web Wizard</h1>
        <h2>If/Then Statements</h2>
        <p>Drag and drop any condition and output that you would like your controller to do</p>
        <h4>If</h4>
        <ul id="trash" class="trash gallery ui-helper-reset ui-helper-clearfix"></ul>
    </div>
    <div class="ui-widget ui-helper-clearfix">
        <div id="ifbox">
            <ul id="gallery" class="gallery ui-helper-reset ui-helper-clearfix">
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Temp 1</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Temp 2</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Temp 3</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>pH</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Salinity</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>ORP</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>pH Expansion</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>PAR</p>
              </li>
              <li class="ui-widget-content ui-corner-t gallerylir">
                <p>Humidity</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Water Level</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Water Level 1</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Water Level 2</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Water Level 3</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Year</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Month</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Day</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Hour</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Minute</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Second</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Low ATO Input</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>High ATO Input</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Alarm Input</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>ATO Timeout</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Overheat</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Leak</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Bus Lock</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Feeding Mode</p>
              </li>
              <li class="ui-widget-content ui-corner-tr galleryli">
                <p>Water Change Mode Mode</p>
              </li>
            </ul>
            
            <ul id="comparison" class="gallery ui-helper-reset ui-helper-clearfix">
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p><</p>
              </li>
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p><=</p>
              </li>
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p>=</p>
              </li>
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p>>=</p>
              </li>
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p>></p>
              </li> 
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p>(</p>
              </li> 
              <li class="ui-widget-content ui-corner-tr comparisonli">
                <p>)</p>
              </li> 
            </ul>
            
            <ul id="ifvalueparent" class="gallery ui-helper-reset ui-helper-clearfix">
              <li class="ui-widget-content ui-corner-tr ifvalueli">
                <label for"ifvalue1">Value:</label>
                <input type="number" id="ifvalue1" class="ifvalue" step="0.01">
              </li>
              <li class="ui-widget-content ui-corner-tr ifvalueli">
                <label for"ifvalue2">Value:</label>
                <input type="number" id="ifvalue2" class="ifvalue" step="0.01">
              </li>
              <li class="ui-widget-content ui-corner-tr ifvalueli">
                <label for"ifvalue3">Value:</label>
                <input type="number" id="ifvalue3" class="ifvalue" step="0.01">
              </li>
              <li class="ui-widget-content ui-corner-tr ifvalueli">
                <label for"ifvalue4">Value:</label>
                <input type="number" id="ifvalue4" class="ifvalue" step="0.01">
              </li>
            </ul>
             
            <ul id="operator" class="gallery ui-helper-reset ui-helper-clearfix">
              <li class="ui-widget-content ui-corner-tr operatorli">
                <p>AND</p>
              </li>
              <li class="ui-widget-content ui-corner-tr operatorli">
                <p>OR</p>
              </li>
            </ul>
        </div>
    </div>
     
    <div id=footer>
    <button id=prev class="ui-button ui-widget ui-corner-all">Prev</button>
    <button id=next class="ui-button ui-widget ui-corner-all">Next</button>
    </div>
</div>




<?php include 'footer.php'; ?>