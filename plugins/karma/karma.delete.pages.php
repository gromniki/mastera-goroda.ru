<?php
/*
====================
[BEGIN_COT_EXT]
Hooks=page.edit.update.first
[END_COT_EXT]
====================
*/

/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

// уменьшение счетчика постов при удалении страницы
if(cot::$cfg['plugin']['karma']['minpost'] > 0){
    
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$rpagedelete = cot_import('rpagedelete', 'P', 'BOL');
	}
	else
	{
		$rpagedelete = cot_import('delete', 'G', 'BOL');
		cot_check_xg();
	}
	if ($rpagedelete)
	{
                require_once cot_incfile('karma', 'plug');
                karma_delete_posts($row_page['page_ownerid']);
	}
}

?>