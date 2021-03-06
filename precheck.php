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
 * @since           2016/04/29
 * @see             http://forum.websitebaker.org/index.php/topic,24895.msg195678.html#msg195678
 */

// prevent this file from being accessed directly
if (defined('WB_PATH') == false) {
    exit("Cannot access this file directly");
}

/**
 * Check if minimum requirements for this module are fullfilled
 * Only checked in Website Baker 2.8 or higher
 */
$PRECHECK = array( 
// requires WebsiteBaker 2.8.x (from 2.8.3 onwards)
'WB_VERSION' => array('VERSION' => '2.8.3', 'OPERATOR' => '>='), 
// make sure PHP version is 5.2.2 or higher
'PHP_VERSION' => array('VERSION' => '5.3.6', 'OPERATOR' => '>=')
);
