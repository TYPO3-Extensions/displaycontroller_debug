$(document).ready(
	function () {
			// Place the control panel at the start of the body
		$('body').prepend($('#tx_displaycontrollerdebug_panel').detach());
			// Make it draggable
		$('#tx_displaycontrollerdebug_panel').draggable();
			// Enable the main switch
		$('#tx_displaycontrollerdebug_onoff').click(function() {
			$('.tx_displaycontrollerdebug_output').toggleClass('tx_displaycontrollerdebug_hidden');
		});
	}
);
