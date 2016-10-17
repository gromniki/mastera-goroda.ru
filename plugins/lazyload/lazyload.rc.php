<?PHP
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
[END_COT_EXT]
==================== */

/**
 * Header file for LazyLoad plugin
 *
 * @package lazyload
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
 */

if (!defined('COT_CODE') && !defined('COT_PLUG')) { die('Wrong URL ('.array_pop(explode("\\",__FILE__)).').'); }

if ($cfg['jquery'] && !defined('COT_ADMIN')
	&& ($_GET['e']=='lazyload' || $_GET['e'] == 'page' // on pages or plug samplepage
			|| (empty($_GET['e']) && empty($_GET['r']) && empty($_GET['o']))) // on index page
	) {
    define('LAZYLOAD',true);
    require_once cot_incfile('lazyload', 'plug');
    global $ll_cfg;
    $ll_cfg = $cfg['plugin']['lazyload'];

	$ll_cfg['lazy_class'] = preg_replace('`[^\w\-]`', '', trim($ll_cfg['lazy_class']));
	$class = $ll_cfg['lazy_class'] ? '.'.$ll_cfg['lazy_class'] : '';
	cot_rc_add_embed('lazyload','var lazy_class="'.$class.'";' ,'global','js');
	if ($ll_cfg['add_noscript']) cot_rc_add_embed('lazyload','.lazy { display: none; }' ,'global','css');
    cot_rc_link_footer($cfg['plugins_dir'] . '/lazyload/js/jquery.'.$ll_cfg['used_lib'].'.min.js');
    cot_rc_link_footer($cfg['plugins_dir'] . '/lazyload/js/onload.'.$ll_cfg['used_lib'].'.js');
}

?>