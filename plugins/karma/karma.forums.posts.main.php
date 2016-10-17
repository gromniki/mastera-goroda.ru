<?php

/*
====================
[BEGIN_COT_EXT]
Hooks=forums.posts.main
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

if($cfg['plugin']['karma']['karma_frm_on']){
   
        $f_categ = str_replace(",", "|", $cfg['plugin']['karma']['k_forums']); 
        $forum_karma = (preg_match("/".$f_categ."/i", $structure['forums'][$s]['path'])) ? false : true;
  
}
?>