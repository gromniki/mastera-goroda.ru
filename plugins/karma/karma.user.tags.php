<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=usertags.main
Tags=page.tpl:{PAGE_OWNER_KARMA};page.list.tpl:{LIST_ROW_OWNER_KARMA}
[END_COT_EXT]
==================== */
/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

    global $env;
    
    // pages
    if(($env['ext'] == 'page'  && $user_data['page_id'] > 0 && $cfg['plugin']['karma']['karma_page_on']) || ($user_data['page_id'] > 0 && $user_data['page_state'] == 0)){
        
        $motive['loc'] = 'pg';
        $motive['id'] =  $user_data['page_id'];
        
    }
    // forums
    if($env['ext'] == 'forums'  &&  $cfg['plugin']['karma']['karma_frm_on']){
        
        global $forum_karma;
        var_dump($forum_karma);
        $motive['loc'] = ($forum_karma) ? 'frm'  : false ;
        $motive['id'] =  $user_data['fp_id'];
     
    }

    // user
    if($env['ext'] == 'users'  && $user_data['user_id'] > 0 ){
        
        $motive['loc'] = 'ud';
        $motive['id'] =  $user_data['user_id'];
        
    }

    // comments 
    if($user_data['com_area'] && $user_data['com_id'] > 0 && $cfg['plugin']['karma']['karma_com_on']){

        $motive['loc'] = ($user_data['com_code'] > 0) ? 'com': false;
        $motive['id'] =  $user_data['com_id'];
        $motive['module'] = $user_data['com_area'].':id='.$user_data['com_code'];
        
    }
    
    if(!empty($motive['loc']) && !empty($motive['id'])){
        require_once cot_incfile('karma', 'plug');
        $temp_array['KARMA'] = karma_gadget($user_data['user_id'], $user_data['user_karma'], $motive['loc'], $motive['id'], $motive['module']);
    }
    


?>