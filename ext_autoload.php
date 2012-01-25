<?php
/*
 * Register necessary class names with autoloader
 *
 * $Id: ext_autoload.php 56532 2012-01-21 17:03:15Z francois $
 */
$extensionPath = t3lib_extMgm::extPath('displaycontroller_debug');
return array(
	'tx_displaycontrollerdebug_debugger' => $extensionPath . 'class.tx_displaycontrollerdebug_debugger.php',
);
?>
