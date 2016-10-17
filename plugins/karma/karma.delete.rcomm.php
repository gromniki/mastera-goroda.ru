<?php
/*
====================
[BEGIN_COT_EXT]
Hooks=rcomm.delete
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
    
                require_once cot_incfile('karma', 'plug');
                karma_delete_posts($arrcomdate['com_authorid']);	
}

?>