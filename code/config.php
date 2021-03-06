<?php
/**
 * Admin tool: AddonFileEditor
 *
 * This tool allows you to "edit", "delete", "create", "upload" or "backup" files of installed
 * Add-ons such as modules, templates and languages via the WebsiteBaker backend. This enables
 * you to perform small modifications on installed Add-ons without downloading the files first.
 *
 * This file defines the variables required for WebsiteBaker.
 *
 * LICENSE: GNU General Public License 3.0
 *
 * @platform        CMS WebsiteBaker 2.8.3
 * @package         AddonFileEditor
 * @author          Christian Sommer
 * @author          Dietmar Wöllbrink
 * @copyright       Christian Sommer
 * @license         http://www.gnu.org/licenses/gpl-3.0.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.3.6 and higher
 * @version         $Id:  $
 * @filesource      $HeadURL:  $
 * @lastmodified    $Date:  $
 * @since           2015-03-02,2016-04-29
 * @see             http://forum.websitebaker.org/index.php/topic,24895.msg195678.html#msg195678
 */

// prevent this file from being accessed directly
if (defined('WB_PATH') == false) {
    exit("Cannot access this file directly");
}

/**
 * ADJUST THE FOLLOWING SETTINGS ACCORDING YOUR NEEDS
 */
// add extension of text files you want to be editable (will be displayed with a text icon)
$text_extensions = array('txt', 'htm', 'html', 'htt', 'twig', 'tmpl', 'tpl', 'xml', 'css', 'js', 'inc', 'php', 'php3', 'php4', 'php5', 'jquery', 'preset');

// add extension for image files (will be displayed with a image icon)
$image_extensions = array('bmp', 'gif', 'jpg', 'jpeg', 'png');

// add extension for zip archives (will be displayed with a zip icon)
$archive_extensions = array('zip', 'rar', 'tar', 'gz');

// module/template folders (e.g. 'AddonFileEditor') or languages (e.g. 'en') you want not to show (all lower case)
$hidden_addons = array();

// true:=show all files (false:= only show files registered in text, image or archive array)
$show_all_files = false;

// maximum allowed file upload size in MB
$max_upload_size = 2;

// enable/disable support for the online Flash image editor service http://pixlr.com/
$pixlr_support = true;

// enable/disable support to unzip archive files (*.zip)
$unzip_archive_support = true;

#########################################################################################################
# NOTE: DO NOT CHANGE ANYTHING BELOW THIS LINE UNLESS YOU NOW WHAT YOU ARE DOING
#########################################################################################################
// extract path seperator and detect this module name
$path_sep = strtoupper(substr(PHP_OS, 0, 3) == 'WIN') ? '\\' : '/';
$sAddonName = basename(dirname(__DIR__));
$sAddonRel  = '/modules/'.$sAddonName;
$module_path = WB_PATH.$sAddonRel.'/';
$module_folder = basename($module_path);

/**
 * PATH AND URL VARIABLES USED BY THE MODULE
 */
$table = TABLE_PREFIX . 'addons';
$url_icon_folder = WB_URL . '/modules/' . $module_folder . '/images';
$url_admintools = ADMIN_URL . '/admintools/tool.php?tool=' . $module_folder;
$url_action_handler = WB_URL . '/modules/' . $module_folder . '/code/action_handler.php';
$url_ftp_assistant = WB_URL . '/modules/' . $module_folder . '/code/ftp_assistant.php';
// create README link for the installed AFE version
require_once(__DIR__.'/functions.php');
$afe_version = getAFEVersion();

//$url_help    = getReadmeUrl($afe_version);//;''
$url_help    = 'Help file not found';

$temp_zip_path = WB_PATH . $path_sep . 'temp' . $path_sep . $module_folder . $path_sep;
$url_mod_path  = WB_URL . '/modules/' . $module_folder;
