<?php
/* ====================
[BEGIN_COT_EXT]
Code=boxes
Hooks=footer.tags
Order=10
[END_COT_EXT]
==================== */
/**
 * fancyBoxes plugin
 *
 * @author roffun
 * @copyright (c) 2015 vseweb.com
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');
$f_miniput = $cfg['plugin']['fancyboxes'];

if ($f_miniput['f_choose'] == 'fgallery')
{
	$fclass = 'fancybox';
	$fgroup = 'gallery';
}

if ($f_miniput['f_choose'] == 'fbuttons')
{
	$fclass = 'fancybox-buttons';
	$fgroup = 'button';
}

if ($f_miniput['f_choose'] == 'fthumbs')
{
	$fclass = 'fancybox-thumbs';
	$fgroup = 'thumb';
}

$fa_conf = '$(document).ready(function() {$("a[href]").filter(function() {return /\.(jpg|jpeg|png|gif)$/i.test(this.href);}).attr({"class":"' . $fclass .
	'","data-fancybox-group":"' . $fgroup . '"})});';

if ($f_miniput['f_scale'])
{
	if (empty($f_miniput['f_scalelspx']))
	{
		$scale_param[] = (!empty($f_miniput['f_scalewpx'])) ? 'w:"' . $f_miniput['f_scalewpx'] . 'px"' : '';
		$scale_param[] = (!empty($f_miniput['f_scalehpx'])) ? 'h:"' . $f_miniput['f_scalehpx'] . 'px"' : '';
		$scale_param = implode(', ',$scale_param);
	}
	else
	{
		$scale_param = 'ls:"' . $f_miniput['f_scalelspx'] . 'px"';
	}
	$fa_conf .= '$(document).ready(function(){jQuery(document).ready(function($){$("a[data-fancybox-group] img").jScale({' . $scale_param . '})})});';
}

$fa_conf .= Resources::minify(file_get_contents($cfg['plugins_dir'] . '/fancyboxes/js/fancyboxes.cfg.js'),'js');

if ($f_miniput['f_nomainjs'])
{
	if ($env['ext'] != 'index' && $env['location'] != 'home')
	{
		Resources::linkFileFooter($cfg['plugins_dir'] . '/fancyboxes/js/jquery.fancybox.pack.js');

		if ($f_miniput['f_scale'])
		{
			Resources::linkFileFooter($cfg['plugins_dir'] . '/fancyboxes/js/jquery.jScale.js');
		}
		Resources::embedFooter($fa_conf);
	}
}
else
{
	Resources::linkFileFooter($cfg['plugins_dir'] . '/fancyboxes/js/jquery.fancybox.pack.js');

	if ($f_miniput['f_scale'])
	{
		Resources::linkFileFooter($cfg['plugins_dir'] . '/fancyboxes/js/jquery.jScale.js');
	}
	Resources::embedFooter($fa_conf);
}
