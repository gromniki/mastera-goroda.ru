<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=input
[END_COT_EXT]
==================== */

/**
 * Bootstrap wrapper
 *
 * @package bootstrap
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2014
 * @license Distributed under BSD license.
 * Made with «Extension Template» (https://github.com/macik/cot-extension_template)
 */

defined('COT_CODE') or die('Wrong URL.');
$plug_name = 'bootstrap';
$pl_cfg = $cfg['plugin'][$plug_name];

global $cot_bootstrap,$bootstrap_def_cdn;
switch ($usr['lang']) {
	case 'ru': $bootstrap_def_cdn = "//yandex.st/bootstrap/{$cfg['bootstrap']}/";
		break;
	default:
		$bootstrap_def_cdn = "//netdna.bootstrapcdn.com/bootstrap/{$cfg['bootstrap']}/";
}
$base_CDN 	= trim($pl_cfg['path_to_cdn']) 		? trim($pl_cfg['path_to_cdn']) : $bootstrap_def_cdn;
$base_local = trim($pl_cfg['path_to_local']) 	? trim($pl_cfg['path_to_local']) 	: $cfg['plugins_dir'].'/bootstrap/lib/';

$min 			= ($pl_cfg['use_minified'] && !$cfg['debug_mode']) ? '.min'	: '';
$lib_path = $pl_cfg['load_mode']		 ? $base_CDN 	: $base_local;
$lib_path = mb_substr($lib_path, -1) == '/' ? $lib_path : $lib_path.'/';
$filename = 'bootstrap';


$cot_bootstrap['base_path'] 	= $lib_path;
$cot_bootstrap['css_path'] 		= $lib_path . 'css/';
$cot_bootstrap['js_path'] 		= $lib_path . 'js/';
$cot_bootstrap['fonts_path'] 	= $lib_path . 'fonts/';

$cot_bootstrap['css_file'] 		= $cot_bootstrap['css_path'].$filename.$min.'.css';
$cot_bootstrap['theme_file'] 	= ($pl_cfg['load_theme']) ? $cot_bootstrap['css_path'].$filename.'-theme'.$min.'.css' : '';
$cot_bootstrap['js_file'] 		= $cot_bootstrap['js_path'].$filename.$min.'.js';

$cot_bootstrap['cdn']					= $pl_cfg['load_mode'];
$cot_bootstrap['filename']		= $filename.$min;