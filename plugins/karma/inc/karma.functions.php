<?php
/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

/**
 * Создание гаджета для пользователя
 * @param num $user_id - ID пользователя.
 * @param num $user_karma - Значение кармы пользователя.
 * @param string $location - локация изменения кармы. (Значения: pg - page, frm - форум, com - комментарий, ud - страница пользователя).
 * @param num $location_id - ID локации. Для pg - id страницы, com - id комментария, frm - id поста, ud - id пользователя
 * @param string $module -  комментируемы модуль
 * @return string - возвращаем гаджет кармы.
 */
require_once cot_langfile('karma', 'plug');

if(cot_module_active('page'))cot::$db->registerTable('pages');
if(cot_module_active('forums'))cot::$db->registerTable('forum_posts');
if(cot_module_active('users'))cot::$db->registerTable('users');
if(cot_plugin_active('comments'))cot::$db->registerTable('com');

function karma_gadget($user_id, $user_karma, $location, $location_id,$module = false)
{
    global $usr, $cfg, $karma_cache, $color;
    
        $color = explode(",",$cfg['plugin']['karma']['karma_color']);
        if (!$karma_cache[$user_id]) { 
                $negative = (!$cfg['plugin']['karma']['neg_rec'] && $usr['profile']['user_karma'] < 0) ? false : true;  
                $k_add = (cot_auth('plug', 'karma', 'W') && $usr['id'] > 0 && $location != 'self') ? true : "";

                $karmat = new XTemplate(cot_tplfile(array('karma','gadget'), true));
                $module = urlencode($module);
                $karmat->assign(array(
                    "PAGE_KARMA_D" => number_format($user_karma, '1', '.', ' '),
                    "PAGE_KARMA_ADD" =>($user_id != $usr['id'] && $k_add )? cot_url('plug','r=karma&act=change&lct='.$location.'&value=add&fp='.$location_id.'&mod='.$module):false,
                    "PAGE_KARMA_DEL" =>($user_id != $usr['id'] && $negative && $k_add)? cot_url('plug','r=karma&act=change&lct='.$location.'&value=del&fp='.$location_id.'&mod='.$module):false,
                    "PAGE_KARMA_URL" => ($k_add || $location == 'self') ? cot_url('plug','r=karma&act=show&fp='.$user_id): false,
                    "PAGE_KARMA_MINI" => ($cfg['plugin']['karma']['karma_com']) ? '': 'karma_mini'
                ));
                $karmat->parse('MAIN');
                $karma_cache[$user_id] = $karmat->text('MAIN');
        }
    return $karma_cache[$user_id];
}

/**
 * Проверкаи запись постов пользователя
 * @param num $user_id - ID пользователя.
 * @return num - возвращаем посты.
 */
function karma_user_post($user_id)
{
    global  $db, $db_forum_posts, $db_com, $db_pages, $db_users, $usr;  
    if(cot_module_active('forums')){
        cot::$db->registerTable('forum_posts');
        $frmc = $db->query("SELECT COUNT(*) FROM $db_forum_posts  WHERE fp_posterid = $user_id ")->fetchColumn();
    }
    if(cot_plugin_active('comments')){
        cot::$db->registerTable('com');
        $comc = $db->query("SELECT COUNT(*) FROM $db_com WHERE com_authorid = $user_id ")->fetchColumn();
    }
    if(cot_module_active('page')){
        cot::$db->registerTable('pages');
        $pgc = $db->query("SELECT COUNT(*) FROM $db_pages  WHERE page_ownerid = $user_id  and page_state = 0 ")->fetchColumn();
    }
    if(cot_module_active('users')){
        cot::$db->registerTable('users');
        $klast = explode(":", $usr['profile']['user_karma_auth']);
        $karmasave = $klast[0].":".$klast[1].":".$klast[2].":".($frmc+$comc+$pgc);
        $db->query("UPDATE $db_users SET user_karma_auth = '".$karmasave."'   WHERE user_id= $user_id ");    
    }
return ($frmc+$comc+$pgc);    
}

/**
 * Вывод сообщений пользователю
 * @param string $rc - ресурс.
 * @param string $message - сообщение.
 * @param bool $header - подключение скрипта в тпл.
 * @return num - возвращаем обработанное сообщение.
 */
function karma_error($rc,$message,$header = false)
{
    global $kr;
        $kr->assign("TEXT_ERROR",cot_rc($rc, array('txt' => $message)));
        if($header)$kr->parse("MAIN.ERROR.HEADER");
        $kr->parse("MAIN.ERROR");
        return $kr->text("MAIN.ERROR");
}
/**
 * Удаляем количество постов в константе при удалении страниц и т.д.
 * @param num  $user_id - ID пользователя.
 */
function karma_delete_posts($user_id)
{
    global $db_users, $db;
    if(empty($user_id) || $user_id == 0) return;
    if(cot_module_active('users')){
        cot::$db->registerTable('users');
        $karma_auth = $db->query("SELECT user_karma_auth FROM $db_users  WHERE user_id= $user_id ")->fetch();
        $klast = explode(":", $karma_auth['user_karma_auth']);
        $karmasave = $klast[0].":".$klast[1].":".$klast[2].":".($klast[3]-1);
        $db->query("UPDATE $db_users SET user_karma_auth = '".$karmasave."'   WHERE user_id= $user_id ");    
    }
}
?>