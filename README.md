# Addon File Editor admin tool for CMS WebsiteBaker (2.8.x)

The Addon File Editor `AFE` enables you to view, edit, delete, create, upload or backup files of installed Add-ons such as modules, templates and languages via the [WebsiteBaker CMS](http://www.websitebaker2.org) backend without downloading the files first. You can create installation packages of installed Add-ons, ready for installation in WebsiteBaker (handy for distribution or backup purposes).

`AFE` implements an optional FTP layer, which allows you to modify Add-ons normally owned by the `ftp-user`. This may become quite handy when your website is hosted on some shared hosting provider. `AFE` integrates the 3rd party online photo editing service [Pixlr](http://pixlr.com), which allows you to edit Add-on images in a Photoshop&trade; like environment.

## Download
The latest stable Addon File Editor [installation package](https://github.com/cwsoft/wb-addon-file-editor/raw/master/wb-addon-file-editor-installer.zip) for the WebsiteBaker CMS is included in the GitHub master branch. Older versions are available as [archives](https://github.com/cwsoft/wb-addon-file-editor/tags), but are ***NOT*** directly installable in the WebsiteBaker CMS. The history of the Addon File Editor module can be tracked via [GitHub](https://github.com/cwsoft/wb-addon-file-editor).

## License
The Addon File Editor module is licensed under the [GNU General Public License (GPL) v3.0](http://www.gnu.org/licenses/gpl-3.0.html).

## Requirements

The minimum requirements to get Addon File Editor running are as follows:

- WebsiteBaker ***v2.8.1*** or higher (recommeded last stable 2.8.x version)
- PHP ***5.2.2*** or higher (recommended last stable PHP 5.3.x version)
- Optional: browser with [Flash&trade; plugin](http://get.adobe.com/de/flashplayer/) to use the [Pixlr](http://pixlr.com) image online service

## Installation

1. download latest stable [WebsiteBaker installation package](https://github.com/cwsoft/wb-addon-file-editor/raw/master/wb-addon-file-editor-installer.zip)
2. log into your WebsiteBaker backend and go to the `Add-ons/Modules` section
3. install the downloaded zip archive via the WebsiteBaker installer
4. go to the `Admin-Tools` section and click on the Addon File Editor tool
5. check out the options AFE provides to you

## Usage
Once installed, visit the `Admin-Tools` section of your WebsiteBaker backend and click on the Addon File Editor Tool.

On the start screen, `AFE` provides a list with all installed Add-ons grouped into the sections: `Modules`, `Templates` and `Languages`. Groups can be expanded/collapsed by mouse click if JavaScript is enabled. The toggle status of the groups is stored in a Cookie and will be remembered during the lifetime of the Cookie. 

To open the files and folders of a specific Add-on in the file manager, click on the Addon name. To create a backup of an installed Add-on with all files and folders contained, click on the download symbol on the right hand site of the overview list.

### File manager:
The file manager shows the files and folders of the selected Add-on. Per default, only files with "recognized" file extensions are displayed (text, images, archives). You can add/remove file extension via file `code/config.php`. To display all files in the file manager, adjust the variable ***$show_all_files*** in `code/config.php`.

To edit a text file, or to view an image in a new browser window, just click on the files name. To rename or delete files, click one the `action icons` displayed at the right hand site of the file manager. You can create new files/folders or upload a file via the action links shown at the top of the file manager. The Reload option forces to read in all files and folders again. Use this option if you have installed a new Addon.

If Pixlr support is enabled in `code/config.php`, an edit icon is displayed for images. Click on the edit icon to transfer the image from your webspace to the online image editor Pixlr for further editing. When you save the file in Pixlr, the file will be donwloaded to your webserver and renamed into `image_name.pixlr.jpg`. The original image remains untouched (you can delete it if it is no longer required). Your browser requires a Flash Plugin to use the Pixlr service.

***NOTE:***
Your images are uploaded to pixlr.com and deleted automatically from their server after 5 minutes. Please read the [Pixlr FAQ](http://pixlr.com/faq/) before using this service.

## Configuration Settings

The settings can be modified via the configuration file `code/config.php` located in the Addon File Editor module folder. 

You can add or remove file types for text, image, and archives. By default the following file are known:

- ***$text_extensions:*** ('txt', 'htm', 'html', 'htt', 'tmpl', 'tpl', 'xml', 'css', 'js', 'php', 'php3', 'php4', 'php5')
- ***$image_extensions:*** ('bmp', 'gif', 'jpg', 'jpeg', 'png')
- ***$archive_extensions:*** ('zip', 'rar', 'tar', 'gz')

Files with other extensions than the ones listed above are hidden by default (***$show_all_files = false***). You can hide certain Add-ons by adding their directory name to the array ***$hidden_addons = array()***. If you add the string 'addon_file_editor' to this array, you can not change the `code/config.php` via the Addon File Editor anymore.

The maximum allowed file size for uploads is limited to 2 MB (***$max_upload_size = 2***), Pixlr support is disabled per default (***$pixlr_support = false***).

The tool integrates an optional FTP layer, which allows you to access Add-ons normally owned by the ftp-user (like WB core templates or core modules uploaded via FTP). 
Files, which can't be edited by PHP itself are displayed in red in the `AFE` file manager. In this case you may want to enable the FTP support in the `code/config.php` and add your FTP account settings via the URL:
`http://yourdomain.com/modules/addon_file_editor/code/ftp_assistant.php`.

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
