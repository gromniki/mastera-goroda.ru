<?php
/* ====================
[BEGIN_COT_EXT]
Code=boxes
Hooks=header.tags
Tags=header.tpl:{HEADER_BOXES_HEADMETA},{HEADER_BOXES_CSS},{HEADER_BOXES_CSSLINK},{HEADER_BOXES_EXTERNAL_JSCSS}
Order=10
[END_COT_EXT]
==================== */
/**
 * boxes plugin
 *
 * @author  roffun
 * @copyright Copyright(c) 2015 vseweb.com
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$boxes_theme_css_path = $cfg['mainurl'] . '/' . $cfg['themes_dir'] . '/' . $theme . '/css/';

if (!empty($cfg['plugin']['boxes']['box_speedup']))
{
	foreach (preg_split('#\n#',$cfg['plugin']['boxes']['box_speedup']) as $bspdup)
	{
		$box_speedup .= @file_get_contents($boxes_theme_css_path . $bspdup);
		$box_speedupmin = '<style>' . cot_rc_minify($box_speedup,'css') . '</style>';
	}
}
else
{
	$box_speedupmin = false;
}

if (!empty($cfg['plugin']['boxes']['box_headcss']))
{
	$box_headcss = '<style>' . cot_rc_minify($cfg['plugin']['boxes']['box_headcss'],'css') . '</style>';
}

$t->assign(array(
	'HEADER_BOXES_HEADMETA' => $cfg['plugin']['boxes']['box_headmeta'],
	'HEADER_BOXES_CSS' => $box_headcss,
	'HEADER_BOXES_CSSLINK' => $box_speedupmin,
	'HEADER_BOXES_EXTERNAL_JSCSS' => $cfg['plugin']['boxes']['box_head_externaljscss']));
