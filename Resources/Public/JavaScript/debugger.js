/**
 * Code logic for the debug control page
 *
 * $Id: $
 */
$(document).ready(
	function () {
			// Place the control panel at the start of the body
		$('body').prepend($('#tx_displaycontrollerdebug_panel').detach());
			// Make it draggable
		$('#tx_displaycontrollerdebug_panel').draggable();
			// Enable the main switch
			// Toggle the display of the debug output and the levels selection
		$('#tx_displaycontrollerdebug_onoff').click(function() {
			$('.tx_displaycontrollerdebug_output').toggleClass('tx_displaycontrollerdebug_hidden');
			$('#tx_displaycontrollerdebug_levels').toggleClass('tx_displaycontrollerdebug_hidden');
		});
			// Enable the switches of debug levels
		$('.message_level').click(function() {
				// Get the message level of the clicked on checkbox
			var level = $(this).attr('value');
			$('.tx_displaycontrollerdebug_message-' + level).toggleClass('tx_displaycontrollerdebug_hidden');
		});
	}
);
