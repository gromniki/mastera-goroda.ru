<?php
/**
 * JavaScript and CSS loader for bootlance theme
 *
 * @package Cotonti
 * @version 0.9.0
 * @author CMSWorks Team
 * @copyright Copyright (c) CMSWorks.ru, littledev.ru
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

global $cot_bootstrap;
// Проверяем установлен ли плагин Bootstrap и его версию
if ($cfg['bootstrap'] && version_compare($cfg['bootstrap'], '3.0.0', '>=')) {
    // если файлы установлены и версия нас устраивает — загружаем их
    cot_rc_add_file($cot_bootstrap['css_file']);
    cot_rc_add_file($cot_bootstrap['theme_file']);
    cot_rc_link_footer($cot_bootstrap['js_file']);
} else {
    // Код для обратной совместимости, на случай если Bootstrap плагин не установлен
    // Просто загружаем необходимые файлы с какого-либо CDN (для примера с Яндекса)
    cot_rc_add_file('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
    cot_rc_add_file('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
    cot_rc_link_footer('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
}

//Подключаю свои скрипты
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/classie.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/html5element.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/html5shiv.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/jquery-scrolltofixed.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/jquery.isotope.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/respond-1.1.0.min.js');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/gr-js/wow.js');
//Подключаю свои стили
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/gr-animate.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/gr-style.css');
//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap3.css');

if(empty($_GET['e'])) // для того чтобы скрипты подключались только для главной страницы.
{
    cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/jquery.jcarousel.min.js');
    cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/jcarousel.responsive.js');
    cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/jcarousel.responsive.css');
}

//cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap.min.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/bootstrap/css/bootstrap-responsive.css');

cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/modalbox.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/style.css');
cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/css/font-awesome.css');

cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme'].'/js/js.js');

require_once cot_rc($cfg['themes_dir'].'/'.$usr['theme'].'/'.$usr['theme'].'.resources.php');

?>