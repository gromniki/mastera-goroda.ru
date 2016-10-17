<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
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

global $cot_bootstrap;
if ($cfg['bootstrap'] && $pl_cfg['autoload'])
{
	cot_rc_add_file($cot_bootstrap['css_file']);
	cot_rc_add_file($cot_bootstrap['theme_file']);
	cot_rc_link_footer($cot_bootstrap['js_file']);
}
