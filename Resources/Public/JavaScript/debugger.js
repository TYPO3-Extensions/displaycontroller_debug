$(document).ready(
	function () {
		$('#tx_displaycontrollerdebug_panel').draggable();
		$('#tx_displaycontrollerdebug_onoff').click(function() {
			$('.tx_displaycontrollerdebug_output').toggleClass('tx_displaycontrollerdebug_hidden');
		});
	}
);
