<?php
/**
 * Admin tool: Addon File Editor
 *
 * This tool allows you to "edit", "delete", "create", "upload" or "backup" files of installed 
 * Add-ons such as modules, templates and languages via the Website Baker backend. This enables
 * you to perform small modifications on installed Add-ons without downloading the files first.
 *
 * This file defines the variables required for Website Baker.
 * 
 * @platform    CMS Websitebaker 2.8.x
 * @package     addon-file-editor
 * @author      cwsoft (http://cwsoft.de)
 * @version     2.0.0
 * @copyright   cwsoft
 * @license     http://www.gnu.org/licenses/gpl.html
  * ------------------------------------------------------------------------------------------------
*/

// OBLIGATORY WEBSITE BAKER VARIABLES
$module_directory			= 'addon_file_editor';
$module_name				= 'Addon File Editor (AFE)';
$module_function			= 'tool';
$module_version				= '2.0.0';
$module_status				= 'stable';
$module_platform			= '2.8.x';
$module_author				= 'cwsoft (http://cwsoft.de)';
$module_license				= '<a href="http://www.gnu.org/licenses/gpl.html">GNU General Public Licencse 3.0</a>';
$module_license_terms		= '-';
$module_requirements		= 'PHP 4.3.11 or higher, WB 2.8';
$module_description         = 'AFE allows you to edit text- and image files of installed Add-ons via the backend. View <a href="' . WB_URL . '/modules/addon_file_editor/help/help_en.html" target="_blank">README</a> file for details.';

?>