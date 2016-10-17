<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]
==================== */

/**
 * Bootstrap wrapper test page
 *
 * @package bootstrap
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2014
 * @license Distributed under BSD license.
 * Made with «Extension Template» (https://github.com/macik/cot-extension_template)
 */

defined('COT_CODE') or die('Wrong URL.');

list ($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('bootstrap', 'any');
cot_block($usr['isadmin']);

$t = new XTemplate(cot_tplfile('bootstrap', 'plug'));

$bs_var = array(
	'base_path',
	'css_path',
	'js_path',
	'fonts_path',
	'css_file',
	'theme_file',
	'js_file',
	'cdn',
	'filename'
);
$pl_cfg = $cfg['plugin']['bootstrap'];

foreach ($bs_var as $key => $var)
{
	$t->assign('var', $var);
	$t->assign('value', $cot_bootstrap[$var]);
	$t->parse('MAIN.VAR');
}

$min = ($pl_cfg['use_minified'] && ! $cfg['debug_mode']) ? '.min' : '';

// checking is defined files exists.
if ($pl_cfg['load_mode'])
{ // checking CDN files
	if ($ch = curl_init())
	{
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
		curl_setopt($ch, CURLOPT_HEADER, true); // header will be at output
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);
		@curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // suppress warning on `open_basedir` or `safe_mode` set
		function appendDefProtocol($url)
		{
			return mb_substr($url, 0, 2) == '//' ? 'http:' . $url : $url;
		}

		curl_setopt($ch, CURLOPT_URL, appendDefProtocol($cot_bootstrap['css_file']));
		curl_exec($ch);
		$css_file_exists = (! curl_errno($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200);

		curl_setopt($ch, CURLOPT_URL, appendDefProtocol($cot_bootstrap['js_file']));
		curl_exec($ch);
		$js_file_exists = (! curl_errno($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200);

		curl_setopt($ch, CURLOPT_URL, appendDefProtocol($cot_bootstrap['theme_file']));
		curl_exec($ch);
		$theme_file_exists = (! curl_errno($ch) && curl_getinfo($ch, CURLINFO_HTTP_CODE) == 200);

		curl_close($ch);
	}
}
else
{ // checking local files
	$css_file_exists = file_exists($cot_bootstrap['css_file']);
	$js_file_exists = file_exists($cot_bootstrap['js_file']);
	$theme_file_exists = file_exists($cot_bootstrap['theme_file']);
}

if ($js_file_exists)
{
	cot_message(cot_rc('bsw_file_loaded', array(
		'file' => $cot_bootstrap['filename'] . $min . '.js'
	)));
}
else
{
	cot_error(cot_rc('bsw_not_found', array(
		'file' => $cot_bootstrap['js_file']
	)));
}

if ($css_file_exists)
{
	cot_message(cot_rc('bsw_file_loaded', array(
		'file' => $cot_bootstrap['filename'] . $min . '.css'
	)));
}
else
{
	cot_error(cot_rc('bsw_not_found', array(
		'file' => $cot_bootstrap['css_file']
	)));
}

if ($pl_cfg['load_theme'])
{
	if ($theme_file_exists)
	{
		cot_message(cot_rc('bsw_file_loaded', array(
			'file' => $cot_bootstrap['filename'] . '-theme' . $min . '.css'
		)));
	}
	else
	{
		cot_error(cot_rc('bsw_not_found', array(
			'file' => $cot_bootstrap['theme_file']
		)));
	}
}
cot_display_messages($t);
