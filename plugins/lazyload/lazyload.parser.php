<?PHP
/* ====================
[BEGIN_COT_EXT]
Hooks=parser.last
Order=50
[END_COT_EXT]
==================== */

/**
 * LazyLoad parser
 * searches img tags and parses it to conform lazyload
 *
 * @package lazyload
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

if (defined('LAZYLOAD')) $text = lazyload_parse($text,$ll_cfg['add_no_script']);

?>