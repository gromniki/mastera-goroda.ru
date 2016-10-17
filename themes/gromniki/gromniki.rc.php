<?php
/**
 * JavaScript and CSS loader for news theme
 * @Site
 * @package Cotonti
 * @version 0.9.18 FL 2.6.8
 * @author Roman Golubev
 * @copyright Copyright (c) Cotonti Team 2016
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

if(function_exists("uk_com")){
    uk_com("uikit");
    uk_com("modal");
    uk_com("sticky");
    uk_com("animation");
    uk_com("slideshow");
    uk_com("slidenav");
    uk_com("dotnav");
    uk_com("placeholder");
    uk_com("form");
    uk_com("parallax");
    uk_com("tab");
    //uk_com("");
}

cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/gromniki.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/for_test.css');
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/uikit.css');
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/uikit.almost-flat.min.css');
//Иконки. Отключил пока, так как в uikit есть данная библиотека
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/font-awesome.min.css');
//JavaScript
//cot_rc_link_footer($cfg['themes_dir'].'/'.$usr['theme'].'/js/grjs.js');
//cot_rc_link_footer($cfg['themes_dir'].'/'.$usr['theme'].'/js/roboto-opensans.js');
//cot_rc_link_footer($cfg['themes_dir'].'/'.$usr['theme'].'/js/uikit.js');

//Mega Menu MMSD
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/mmsd.css');
//cot_rc_link_footer($cfg['themes_dir'].'/'.$usr['theme'].'/js/mmsd.js');


//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/style.css');
//cot_rc_link_footer($cfg['themes_dir'].'/'.$usr['theme'].'/js/.js');