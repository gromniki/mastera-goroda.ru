<?php
/* 
====================
[BEGIN_COT_EXT]
Hooks=global
[END_COT_EXT]
====================
*/

/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL.');   

/**
 * Вывод собственной репутации
 * @return string- возвращаем гаджет.
 */
function karma_self()
{     global $usr;
        require_once cot_incfile('karma', 'plug');
        return  karma_gadget($usr['id'], $usr['profile']['user_karma'], 'self', $usr['id']);
}

if($usr['id'] > 0 && $cfg['plugin']['karma']['karma_auth'] > 0)
{
	$lastauth_karma = $_COOKIE["lastauth_karma"];
	if(empty($usr['profile']['user_karma_auth']) || !empty($lastauth_karma) && $lastauth_karma + 86400 < $sys['now'])
	{
            $klast = explode(":", $usr['profile']['user_karma_auth']);
            $karmasave = $sys['now'].":".($klast[1] + $cfg['plugin']['karma']['karma_auth']).":".($klast[2]+1).":".$klast[3];//$klast[3] - сумма постов
            $db->query("UPDATE $db_users SET user_karma = user_karma + ".$cfg['plugin']['karma']['karma_auth'].", user_karma_auth = '".$karmasave."'   WHERE user_id=".$usr['id']."");

            cot_setcookie("lastauth_karma", $sys['now'], time()+$cfg['cookielifetime'], $cfg['cookiepath'], $cfg['cookiedomain'], $sys['secure'], true);
	}
}

?>