<?php
/**
 * Localization file for Bootstrap wrapper
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2014
 * @license Distributed under BSD license.
 * Made with «Extension Template» (https://github.com/macik/cot-extension_template)
*/

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'Bootstrap wrapper'; // Title for stand alone

$L['info_desc'] ='Bootstrap framework wrapper plugin'; // plugin description
if (version_compare($cfg['version'], '0.9.12') > 0) // still buggy in Siena 0.9.12
	$L['info_notes'] = 'If your enjoy my plugin please consider donating to help support future developments. <b>Thanks!</b> <br /><a href="mailto:macik.spb@gmail.com">macik.spb@gmail.com</a>';

$L['bsw_testpage'] = 'Bootstrap wrapper test page';
$L['bsw_version'] = 'Bootstrap version';
$L['bsw_settings'] = 'Plugin settings';
$L['bsw_usage'] = 'Use it yourself as';
$L['bsw_cfg_autoload'] = 'Autoload mode';
$L['bsw_cfg_mode'] = 'Load Bootstrap from';
$L['bsw_cfg_min'] = 'Use minified versions';
$L['bsw_cfg_theme'] = 'Load «theme» file';
$L['bsw_values'] = 'Plugin values';
$L['bsw_cms_var'] = 'CMS variable';
$L['bsw_tpl_tag'] = 'Template tag';
$L['bsw_value'] = 'Value <small>(based on plugin settings)</small>';
$L['bsw_installerror'] = 'Bootstrap wrapper installed incorrectly. Version variable <code>'.$cfg['bootstrap'].'</code> can not be located. ';
$L['bsw_checkit'] = 'Check it manually or reinstall the plugin.';
$L['bsw_rc_files'] = 'In plugin code <code>plugin.rc.php</code> or theme resource file <code>theme.rc.php</code>';
$L['bsw_tpl_files'] = 'Direct in theme header file <code>theme.header.php</code> (not recommened. use theme.rc.php instead)';
$L['bsw_comment1'] = 'check Bootstrap wrapper is installed and had appropriate version';
$L['bsw_comment2'] = 'Fallback for Bootstrap wrapper not installed or had old version';
$L['bsw_comment3'] = 'Just loads files from some CDN (Yandex for example)';
$L['bsw_notdefined'] = 'Not defined. Check plugin settings';

$L['cfg_autoload'] =array('Automatically loads on all pages','Use this mode only if all of your site pages uses Bootstrap (including common site and admin pages). In other case let system decide whenever it needed.');
$L['cfg_load_mode'] =array('Bootstrap load source','loads it locally from your site of from CDN');
$L['cfg_load_mode_params'] = array('Local files','Files on CDN');
$L['cfg_path_to_local'] =array('Path to local files','by default (or if not specified) system uses this path: '.$cfg['plugins_dir'].'/bootstrap/lib/');
$L['cfg_path_to_cdn'] =array('Path to CDN files','by default (or if not specified) system uses this path: '.$bootstrap_def_cdn.' (depends on user language selection)');
$L['cfg_use_minified'] =array('Use minified versions of files','');

$L['cfg_load_theme'] =array('Load default «theme» file','bootstrap-theme.css');

$L['bsw_debuginfo'] = '<b>Note!</b> We use uncompressed (unminified) version of Bootstrap files while <code>DEBUG_MODE</code> is <code>ON</code> inspite of config settings.';
$L['bsw_file_loaded'] = 'File <b>{$file}</b> exists and loaded.';
$L['bsw_not_found'] = 'File <b>{$file}</b> not found, check file paths in plugin settings.';


$adminhelp1 = '';