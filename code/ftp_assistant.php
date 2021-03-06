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

// include WB configuration file (restarts sessions) and WB admin class
$configFile = dirname(dirname(dirname(__DIR__))).'/config.php';
if (is_readable($configFile)){require $configFile;}
if(!class_exists('admin')){ include(WB_PATH.'/framework/class.admin.php'); }

// include module configuration and function file
require_once ( __DIR__.'/config.php');
require_once ( __DIR__.'/functions.php');

// load module language file
$lang = $module_path . '/languages/' . LANGUAGE . '.php';
require_once (! file_exists($lang) ? $module_path . '/languages/EN.php' : $lang);

/**
 * Ensure that only users with permissions to Admin-Tools section can access this file
 */
// check user permissions for admintools (redirect users with wrong permissions)
$admin = new admin('Admintools', 'admintools', false, false);
if ($admin->get_permission('admintools') == false) exit("Cannot access this file directly");

// create new instance this time showing the admin panel (no headers possible anymore)
$admin = myAdminHandler('AddonFileEditor', 'Admintools', 'admintools', true, false);

/**
 * Create Twig template object and configure it
 */
// register Twig shipped with AFE if not already done by the WB core (included since WB 2.8.3 #1688)
if (! class_exists('Twig_Autoloader')) {
    require_once ('../thirdparty/Twig/Twig/Autoloader.php');
    Twig_Autoloader::register();
}
$loader = new Twig_Loader_Filesystem(dirname(__FILE__) . '/../templates');
$twig = new Twig_Environment($loader, array(
'autoescape'       => false,
'cache'            => false,
'strict_variables' => true,
'debug'            => false,
));

// set template file
$tpl = $twig->loadTemplate('ftp_connection_check.htt');

/**
 * Set template data from language files {{ lang.KEY }}
 */
$data = array();
$data['lang'] = array(
'TXT_HEADING_ADMINTOOLS' => $HEADING['ADMINISTRATION_TOOLS'],
'TXT_BACK'               => $TEXT['BACK'],
'TXT_SAVE'               => $TEXT['SAVE'],
'TXT_HELP'               => $LANG['ADDON_FILE_EDITOR'][1]['TXT_HELP'],
);

foreach ($LANG['ADDON_FILE_EDITOR'][10] as $key => $value) {
$data['lang'][$key] = $value;
}

/**
 * Read or update FTP settings from or to databse
 */
// clean POST values and store settings in database if required
if (isset($_POST['ftp_save_settings'])) {
    updateFtpSettings($_POST);
}

// read FTP settings from database
$ftp_settings = readFtpSettings();

// fetch the name of the addon editor from the database
$editor_info = getAddonInfos($module_folder);
// fill some template variables
$data['afe'] = array(
'URL_ADMIN_TOOL'      => $url_admintools,
'CLASS_SHOW_FTP_INFO' => 'hidden',
'NAME_FILE_EDITOR'    => $editor_info['name'],
'URL_HELP_FILE'       => getReadmeUrl($afe_version),
'URL_FILEMANAGER'     => $url_admintools,
'URL_WB_ADMIN_TOOLS'  => ADMIN_URL . '/admintools/index.php',
'CLASS_HIDDEN'        => ($ftp_settings['ftp_enabled'] == 1) ? '' : 'hidden',
'URL_FORM_SUBMIT'     => $url_ftp_assistant,
'DISABLED_CHECKED'    => ($ftp_settings['ftp_enabled'] == 0) ? 'checked="checked"' : '',
'ENABLED_CHECKED'     => ($ftp_settings['ftp_enabled'] == 1) ? 'checked="checked"' : '',
'FTP_SERVER'          => htmlspecialchars($ftp_settings['ftp_server']),
'FTP_USER'            => htmlspecialchars($ftp_settings['ftp_user']),
'FTP_PASSWORD'        => htmlspecialchars($ftp_settings['ftp_password']),
'FTP_PORT'            => htmlspecialchars($ftp_settings['ftp_port']),
'FTP_START_DIR'       => htmlspecialchars($ftp_settings['ftp_start_dir']),
'STATUS_MESSAGE'      => '',
);

// check FTP connection status
if (isset($_POST['ftp_connection_check'])) {
$status = ftpLogin();
$data['afe']['STATUS_MESSAGE'] = writeStatusMessage(
    is_resource($status) ? $LANG['ADDON_FILE_EDITOR'][10]['TXT_FTP_LOGIN_OK'] : $LANG['ADDON_FILE_EDITOR'][10]['TXT_FTP_LOGIN_FAILED'],
$url_admintools,
    is_resource($status),
    false
);
}

// ouput the final template
$tpl->display($data);

// print admin template footer
$admin->print_footer();
