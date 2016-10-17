<?php
/* ====================
[BEGIN_COT_EXT]
Code=boxes
Hooks=index.tags
Tags=index.tpl:{INDEX_TEXT_BOXES}
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

$t->assign(
'INDEX_TEXT_BOXES',
$cfg['plugin']['boxes']['indextextboxes']);
