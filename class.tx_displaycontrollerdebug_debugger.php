<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2012 Francois Suter (Cobweb) <typo3@cobweb.ch>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/


/**
 * Improved debugging output for the 'displaycontroller' extension.
 *
 * @author		Francois Suter (Cobweb) <typo3@cobweb.ch>
 * @package		TYPO3
 * @subpackage	tx_displaycontrollerdebug
 *
 * $Id: class.tx_displaycontroller_debugger.php 56548 2012-01-22 10:33:09Z francois $
 */
class tx_displaycontrollerdebug_debugger extends tx_displaycontroller_debugger {
	/**
	 * @var array Extension configuration
	 */
	protected $extensionConfiguration;

	public function __construct(t3lib_PageRenderer $pageRenderer) {
			// Read the general configuration and initialize the debug flags
		$this->extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['displaycontroller_debug']);

		parent::__construct($pageRenderer);
		$this->cssCode .= t3lib_div::getUrl(t3lib_extMgm::extPath('displaycontroller_debug') . 'Resources/Public/Styles/debugger.css');
	}

	/**
	 * Renders all messages and dumps their related data
	 *
	 * @param array $messageQueue List of messages to display
	 * @return string Debug output
	 */
	public function render(array $messageQueue) {
		$debugOutput = '';
			// If this is the first debug call, write the necessary CSS code
		if ($this->firstCall) {
			$debugOutput .= '<style>' . $this->cssCode . '</style>';
				// Add jQuery, if necessary
			if (!empty($this->extensionConfiguration['load_jquery'])) {
				$debugOutput .= '<script type="text/javascript" src="' . t3lib_extMgm::extRelPath('displaycontroller_debug') . 'Resources/Public/JavaScript/jquery-1.7.1.min.js' . '"></script>';
			}
				// Add jQuery UI, if necessary
			if (!empty($this->extensionConfiguration['load_jqueryui'])) {
				$debugOutput .= '<script type="text/javascript" src="' . t3lib_extMgm::extRelPath('displaycontroller_debug') . 'Resources/Public/JavaScript/jquery-ui-1.8.17.custom.min.js' . '"></script>';
			}
			$debugOutput .= '<script type="text/javascript" src="' . t3lib_extMgm::extRelPath('displaycontroller_debug') . 'Resources/Public/JavaScript/debugger.js' . '"></script>';
			$debugOutput .= $this->renderControlPanel();
			$this->firstCall = FALSE;
		}
			// Prepare the output and return it
		$debugOutput .= '<div class="tx_displaycontrollerdebug_output">';
		foreach ($messageQueue as $messageData) {
				/** @var $messageObject t3lib_FlashMessage */
			$messageObject = $messageData['message'];
			$debugOutput .= '<div class="tx_displaycontrollerdebug_' . $messageObject->getClass($messageObject->getSeverity()) . '">';
			$debugOutput .= $messageObject->render();
			if ($messageData['data'] !== NULL) {
				if (is_array($messageData['data'])) {
					$debugData = $messageData['data'];
				} else {
					$debugData = array($messageData['data']);
				}
				$debugOutput .= @Kint::dump($debugData);
				$debugOutput .= '</div>';
			}
		}
		$debugOutput .= '</div>';

		return $debugOutput;
	}

	/**
	 * Renders the debugging output control panel
	 *
	 * @return string The HTML to display
	 */
	protected function renderControlPanel() {
		$controlPanel = '<div id="tx_displaycontrollerdebug_panel">';
		$controlPanel .= '<div class="main_check">
			<label for="tx_displaycontrollerdebug_onoff">' . $GLOBALS['TSFE']->sL('LLL:EXT:displaycontroller_debug/locallang.xml:debug_output') . '</label>
			<input type="checkbox" id="tx_displaycontrollerdebug_onoff" value="on" checked="checked" />
			</div><div stlye="clear: both"></div>';
		$controlPanel .= '<fieldset id="tx_displaycontrollerdebug_levels"><legend>' . $GLOBALS['TSFE']->sL('LLL:EXT:displaycontroller_debug/locallang.xml:message_levels') . '</legend>';
		$messageLevels = array('ok', 'information', 'notice', 'warning', 'error');
		foreach ($messageLevels as $level) {
			$controlPanel .= '<p>
				<input type="checkbox" id="tx_displaycontrollerdebug_level_' . $level . '" class="message_level" value="' . $level . '" checked="checked" />
				<label for="tx_displaycontrollerdebug_level_' . $level . '" class="message_' . $level . '">' . $GLOBALS['TSFE']->sL('LLL:EXT:displaycontroller_debug/locallang.xml:level_' . $level) . '</label>
				</p>';
		}
		$controlPanel .= '</fieldset>';
		$controlPanel .= '</div>';

		return $controlPanel;
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/displaycontroller_debug/class.tx_displaycontrollerdebug_debugger.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/displaycontroller_debug/class.tx_displaycontrollerdebug_debugger.php']);
}

?>