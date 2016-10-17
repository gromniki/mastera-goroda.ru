<?PHP
/* ====================
[BEGIN_COT_EXT]
Hooks=standalone
Tags=example.tpl:
[END_COT_EXT]
==================== */

/**
 * LazyLoad
 *
 * @package lazyload
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
 */

if (!defined('COT_CODE') && !defined('COT_PLUG')) { die('Wrong URL ('.array_pop(explode("\\",__FILE__)).').'); }
$plug_name = 'lazyload';
//cot_block($usr['isadmin']);

$ll = new XTemplate(cot_tplfile('lazyload.sample', 'plug'));

if ($cfg['jquery']) {
	$ll->parse('MAIN.JQUERY');
} else {
	$ll->parse('MAIN.NO_JQUERY');
}

$ll->parse();
$plugin_body = lazyload_parse($ll->text());

?>