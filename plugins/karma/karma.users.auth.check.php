<?php
/* 
====================
[BEGIN_COT_EXT]
Hooks=users.auth.check.done
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
if($cfg['plugin']['karma']['karma_auth'] > 0){
   
    $lastlogtmp = $db->query("SELECT user_karma_auth FROM $db_users WHERE user_id= ".$row['user_id']."  LIMIT 1")->fetch();       
    $klast = explode(":", $lastlogtmp['user_karma_auth']);
    $lastlog = $klast[0];
    if (!$lastlog || ($lastlog && ($lastlog + 86400 < $sys['now'])))
    {
            $karmasave = $sys['now'].":".($klast[1] + $cfg['plugin']['karma']['karma_auth']).":".($klast[2]+1).":".$klast[3];//$klast[3] - сумма постов
            $db->query("UPDATE $db_users SET user_karma = user_karma + ".$cfg['plugin']['karma']['karma_auth'].", user_karma_auth = '".$karmasave."'   WHERE user_id=".$row['user_id']."");
            cot_setcookie("lastauth_karma", $sys['now'], time()+$cfg['cookielifetime'], $cfg['cookiepath'], $cfg['cookiedomain'], $sys['secure'], true);
    }
} 
?>