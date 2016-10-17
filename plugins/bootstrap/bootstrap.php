<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=tools
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

list($usr['auth_read'], $usr['auth_write'], $usr['isadmin']) = cot_auth('bootstrap', 'any');
cot_block($usr['isadmin']);

$plugin_body .= '<iframe id="bs_test" marginheight="0" marginwidth="0" frameborder="0" src="'.cot_url('index','r=bootstrap').'"
style="overflow:hidden;width:100%" width="100%" height="100%"></iframe>';

cot_rc_link_footer($cfg['plugins_dir'].'/bootstrap/js/bootstrap.testframe.js');
