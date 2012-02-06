<?php

########################################################################
# Extension Manager/Repository config file for ext "displaycontroller_debug".
#
# Auto generated 06-02-2012 09:17
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Display Controller advanced debugging',
	'description' => 'Provides a floating panel for controlling the output of the Display Controller\'s debugging.',
	'category' => 'fe',
	'author' => 'Francois Suter (Cobweb)',
	'author_email' => 'typo3@cobweb.ch',
	'shy' => '',
	'dependencies' => 'displaycontroller',
	'conflicts' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => 0,
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'author_company' => '',
	'version' => '1.0.0',
	'constraints' => array(
		'depends' => array(
			'displaycontroller' => '1.2.0-0.0.0',
			'typo3' => '4.5.0-4.6.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'_md5_values_when_last_written' => 'a:14:{s:9:"ChangeLog";s:4:"ee71";s:10:"README.txt";s:4:"ee2d";s:44:"class.tx_displaycontrollerdebug_debugger.php";s:4:"e01e";s:16:"ext_autoload.php";s:4:"8238";s:21:"ext_conf_template.txt";s:4:"5d0c";s:12:"ext_icon.gif";s:4:"c4a5";s:13:"locallang.xml";s:4:"91a9";s:39:"Resources/Public/JavaScript/debugger.js";s:4:"3612";s:47:"Resources/Public/JavaScript/jquery-1.7.1.min.js";s:4:"ddb8";s:58:"Resources/Public/JavaScript/jquery-ui-1.8.17.custom.min.js";s:4:"21a0";s:36:"Resources/Public/Styles/debugger.css";s:4:"cd20";s:14:"doc/manual.pdf";s:4:"14e1";s:14:"doc/manual.sxw";s:4:"aae5";s:14:"doc/manual.txt";s:4:"950c";}',
	'suggests' => array(
	),
);

?>