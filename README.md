# Addon File Editor Admin Tool for CMS WebsiteBaker (2.8.x)

The Addon File Editor (consecutively abbreviated `AFE`) enables you to *view*, *edit*, *delete*, *create*, *upload* or *backup* files of installed Add-ons such as modules, templates and languages directly from the [WebsiteBaker CMS](http://www.websitebaker2.org) backend. `AFE` can create installation packages of installed Add-on, ready for installation in WebsiteBaker - a handy feature for distribution or backup purposes.

The optional FTP layer implemented in `AFE`, allows you to modify Add-on files normally owned by the *ftp-user*. This option is very usefull if your website is hosted on a shared hosting provider, which has different pemissions for PHP and FTP groups. Another handy feature of `AFE` is the optional support for the 3rd party online photo editing service [Pixlr](http://pixlr.com), which allows you to modifiy Add-on images in a Photoshop&trade; like environment via the WebsiteBaker backend.

## Download
The latest stable `AFE` [installation package](https://github.com/cwsoft/wb-addon-file-editor/raw/master/wb-addon-file-editor-installer.zip) for the WebsiteBaker CMS is included in the GitHub master branch. Older versions are available as [archives](https://github.com/cwsoft/wb-addon-file-editor/tags), but are ***NOT*** directly installable in the WebsiteBaker CMS. The development history of the `AFE` module can be tracked via [GitHub](https://github.com/cwsoft/wb-addon-file-editor).

## License
`AFE` is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements

The minimum requirements to get `AFE` running on your website are as follows:

- WebsiteBaker ***v2.8.1*** or higher (recommeded last stable 2.8.x version)
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)
- Optional: browser with [Flash&trade; plugin](http://get.adobe.com/de/flashplayer/) to use the [Pixlr](http://pixlr.com) image online service

## Installation

1. download latest stable [WebsiteBaker installation package](https://github.com/cwsoft/wb-addon-file-editor/raw/master/wb-addon-file-editor-installer.zip)
2. log into your WebsiteBaker backend and go to the `Add-ons/Modules` section
3. install the downloaded zip archive via the WebsiteBaker installer
4. go to the `Admin-Tools` section and click the `AFE` tool link

## Usage

### Overview Panel
Once `AFE` is installed, visit the ***Admin-Tools*** section of your WebsiteBaker backend and hit the `AFE` admin tool link. This redirects you to the `AFE` overview panel.

The `AFE` overview panel lists all installed Add-ons of your WebsiteBaker installation. The Add-ons are grouped into the sections: ***Modules***, ***Templates*** and ***Languages***. If JavaScript is enabled in your browser, you can expand/collaps the groups to show only the Add-ons you are interested in. The groups toggle status is stored in a Cookie and will be remembered during the lifetime of the Cookie.

When a group is expanded, all installed Add-ons of this group are shown in a table. On the right side of each Add-on entry, you can find a small *download icon*. Click this icon to create and download an installation package of this Add-on on the fly. This feature is handy to create a ***backup*** of the Add-on ***BEFORE*** you modify it, so you can revert back to the original version in case you mess up something.

To browse the files and folders of a specific Add-on in the `AFE` file manager, click on the Add-on name you are interested in and you will be redirected to the `AFE` file manager.

### File Manager
The file manager shows the files and folders of the selected Add-on. Per default, only files with ***recognized*** file extensions are displayed (text, images, archives). You can add/remove file extension via `AFE` configuration file ***code/config.php***. Details about `AFEs` configuration settings are shown in section *Configuration Settings*.

To *edit* a text file, or to *view* an image in the browser, just click on the file name. To *rename* or *delete* files, click one the ***action icons*** on the right site of the file manager. You can *create* new files/folders or *upload* a file via the **action links** at the top of the file manager. The *Reload* option forces to read in all files and folders again. Use this option if you have installed a new Addon via the WebsiteBaker backend and it doesn´t show up in `AFE`.

#### Online Image Editing
If you have Pixlr support enabled via ***code/config.php***, an *edit* icon will show up in the action list for images too. Clicking the *edit* icon transfers the image from your webspace to the online image editor [Pixlr](http://pixlr.com) for editing in a Photoshop&trade; like environment. Using the Pixlr *save* dialogue transfers the modified image on your webserver and stores it as ***image_name.pixlr.jpg***. Hence the original image remains untouched on your server. If you are happy with the changes made, you can delete the original image and rename the modified image.

Your browser requires a [Flash&trade; plugin](http://get.adobe.com/de/flashplayer/) in order to use the online image service from [Pixlr](http://pixlr.com). Keep in mind that your image is uploaded to pixlr.com. So please make sure you read, understood and agree to the Pixlr [FAQ](http://pixlr.com/faq/) and [Terms & Conditions](http://pixlr.com/terms_of_service/) ***before*** using this service.

## AFE Configuration Settings
`AFE` can be adapted to your needs via the configuration file ***code/config.php*** located in the `AFE` module folder.

You can add/remove file exentison to the recognized file types for *text*, *image*, and *archives*. The default settings are as follows:
	
	$text_extensions = array('txt', 'htm', 'html', 'htt', 'tmpl', 'tpl', 
		'xml', 'css', 'js', 'php', 'php3', 'php4', 'php5', 'jquery', 'preset'
	);
	$image_extensions = array('bmp', 'gif', 'jpg', 'jpeg', 'png');
	$archive_extensions = array('zip', 'rar', 'tar', 'gz');

Files with extensions not listed above are *hidden* in the `AFE` file manager by default. To change this behaviour, set ***$show_all_files = true;***. 

You can remove Add-ons from the `AFE` file manager if you want. To remove `AFE` and the English language file from the `AFE` file manager, set ***$hidden_addons = array('addon_file_editor', 'en');*** (all lower case).

Per default, the allowed file size for uploads is limited to 2 MB (***$max_upload_size = 2***), Pixlr support is disabled (***$pixlr_support = false***).

### FTP Configuration Settings
`AFE` implements an optional FTP layer, wich is deactivated per default. You can activate this feature if required. The `AFE` file manager detects and highlights files in red color, which can't be modified by PHP. If you identify Add-ons or Add-on files highlighted in red, you may want to enable the FTP layer to be able to modify this files. The FTP layer can be configured by visiting the URL: *http://yourdomain.com/modules/addon_file_editor/code/ftp_assistant.php*.

Remember to replace *yourdomain.com* with your domain. Access to this file is limited to users/groups with access to Admin tools. Once you entered your FTP details, you can test the FTP connection to your server via `AFEs` FTP assistant. The FTP details will be stored in the `AFE` database.

## Known Issues
You can track the status of known issues or report new issues found in `AFE` via GitHubs [issue tracking service](https://github.com/cwsoft/wb-addon-file-editor/issues). If you run into any issues with `AFE`, please visit this page first and check if this issue is already known.

***Note:*** 
The 3rd party package [editarea](http://www.cdolivet.com/editarea/) distributed with WebsiteBaker (/include/editarea) and used by `AFE` and the WebsiteBaker `code` module to highlight code statements has rendering bugs in Internet Explorer 8/9. If you run into code rendering issues in `AFE`, please visit the editarea [browser compatibility list](http://www.cdolivet.com/editarea/editarea/docs/compatibility.html) side and check if your browser is supported by editarea at all. If your browser is not supported, you may need to use another browser if you want to use syntax highlighting in WebsiteBaker - sorry for that.

## Still questions ??
If you run into problems with the Addon File Editor module, please visit the [English](http://www.websitebaker2.org/forum/index.php/topic,12122.0.html) or [German](http://www.websitebaker2.org/forum/index.php/topic,12404.0.html) WebsiteBaker forum support threads and ask for feedback. 

***Always provide the following information with your support request:***

 - detailed error description (what happens, what have you tried ...)
 - the Addon File Editor version (see /modules/addon_file_editor/index.php on your server)
 - your PHP version (use phpinfo(); or ask your provider if in doubt)
 - WebsiteBaker version, Service Pack number and build number of your version
 - name of the WebsiteBaker backend theme used (e.g. wb_theme, argos_theme ...)
 - information about changes you made to WebsiteBaker (if any)

## Credits
Credits goes to the following WebsiteBaker forum users for translating the `AFE` language files into the following languages.

- **Dutch (NL.php):** forum member [Luckyluck](http://www.websitebaker2.org/forum/index.php?action=profile;u=6090)
- **Norwegian (NO.php):** forum member [oeh](http://www.websitebaker2.org/forum/index.php?action=profile;u=752)
- **French (FR.php):** forum member [quinto](http://www.websitebaker2.org/forum/index.php?action=profile;u=526)
