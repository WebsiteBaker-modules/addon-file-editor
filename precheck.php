<?php
/**
 * Admin tool: Addon File Editor
 *
 * This tool allows you to "edit", "delete", "create", "upload" or "backup" files of installed 
 * Add-ons such as modules, templates and languages via the Website Baker backend. This enables
 * you to perform small modifications on installed Add-ons without downloading the files first.
 *
 * This file contains the installation checks executed prior to the installation of the module
 * 
 * LICENSE: GNU General Public License 3.0
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     addon-file-editor
 * @author      cwsoft (http://cwsoft.de)
 * @version     2.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
*/

// prevent this file from being accessed directly
if (!defined('WB_PATH')) die(header('Location: ../../index.php'));

/**
 * Check if minimum requirements for this module are fullfilled
 * Only checked in Website Baker 2.8 or higher
 */
$PRECHECK = array(
	// make sure Website Baker version is 2.7 or higher
	'WB_VERSION'	=> array('VERSION' => '2.7', 'OPERATOR' => '>='),
	
	// make sure PHP version is 4.3.11 or higher
	'PHP_VERSION'	=> array('VERSION' => '4.3.11', 'OPERATOR' => '>=')
	);
?>