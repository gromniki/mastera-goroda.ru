<?php

/**
 * boxes plugin
 *
 * @author  roffun
 * @copyright Copyright(c) 2015 vseweb.com
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$L['Boxes'] = 'Boxes';

//Текст на главной странице
$L['cfg_indextextboxes'] = 'Текст для главной ( <em>index.tpl</em> )';

//ТЕГИ ВЫВОДЯЩИЕ СОДЕРЖИМОЕ В ВЕРХНЕЙ ЧАСТИ САЙТА
$L['cfg_boxsep_headline'] = '<br><div>ВЫВОД СОДЕРЖИМОГО В ВЕРХНЕЙ ЧАСТИ САЙТА ( <em>header.tpl</em> )</div>';
$L['cfg_box_headmeta'] = 'ПОДТВЕРЖДЕНИЕ С ПОМОЩЬЮ МЕТАТЕГОВ';
$L['cfg_box_speedup'] = 'ПОДКЛЮЧЕНИЕ CSS ФАЙЛОВ<br>укажите названия файлов и их расширение из папки css, расположенной <b>' . $cfg['mainurl'] . '/' . $cfg['themes_dir'] .
        '/' . $theme . '/css/' . '</b><br>каждый с новой строки';
$L['cfg_box_headcss'] = 'ДОПОЛНИТЕЛЬНЫЕ CSS СТИЛИ САЙТА<br>в это поле можно вставлять обычный css код';
$L['cfg_box_head_externaljscss'] = ' CSS, JS<br>в это поле можно подключить css или js файлы, в том числе внешние';

//ПОДКЛЮЧЕНИЕ ВНЕШНИХ СКРИПТОВ В НИЖНЮЮ ЧАСТЬ САЙТА
$L['cfg_boxsep_footerline'] = '<br><div>ВЫВОД СОДЕРЖИМОГО В НИЖНЕЙ ЧАСТИ САЙТА ( <em>footer.tpl</em> )</div>';
$L['cfg_box_footerjs'] = 'ПОЛЕ ДЛЯ ВСТАВКИ ПРОИЗВОЛЬНОГО JS КОДА<br>без открывающего и закрывающего &lt;script&gt';
$L['cfg_box_speedupjs'] = 'ПОЛЕ ДЛЯ ВСТАВКИ СОДЕРЖИМОГО JS ФАЙЛОВ<br>Укажите названия файлов и их расширение из папки js, расположенной <b>' . $cfg['mainurl'] . '/' . $cfg['themes_dir'] .
        '/' . $theme . '/js/' . '</b><br>каждый с новой строки';
$L['cfg_box_footerstat'] = 'ПОДКЛЮЧЕНИЕ СЧЕТЧИКОВ ПОСЕЩЕНИЙ<br>например метрика, liveinternet и тд<br>' . $cfg['plugin']['boxes']['box_footerstat'];
$L['cfg_box_footer_externaljs'] = 'ПОДКЛЮЧЕНИЕ JS ФАЙЛОВ<br>в это поле можно подключить js файлы, в том числе внешние<br>&lt;script src="адрес файла"&gt;&lt;/script&gt;';

//ДОПОЛНИТЕЛЬНЫЕ БЛОКИ
$L['cfg_boxsep_else'] = '<br><div>ДОПОЛНИТЕЛЬНЫЕ БЛОКИ МОЖНО ИСПОЛЬЗОВАТЬ ГЛОБАЛЬНО</div>';
$L['cfg_boxdesc'] = 'описание дополнительных блоков по порядку, каждый с новой строки';
$L['box_additional block'] = 'Дополнительный блок';
$L['boxes_style_my'] = ' style="color:blue"';
$L['boxes_input_onclick'] = '<input onclick="this.select();" readonly value="{PHP.box';
$L['cfg_box1'] = '<h3>' . $L['box_additional block'] . ' №1</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[0] . '</div>' . $L['boxes_input_onclick'] . '1}">';
$L['cfg_box2'] = '<h3>' . $L['box_additional block'] . ' №2</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[1] . '</div>' . $L['boxes_input_onclick'] . '2}">';
$L['cfg_box3'] = '<h3>' . $L['box_additional block'] . ' №3</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[2] . '</div>' . $L['boxes_input_onclick'] . '3}">';
$L['cfg_box4'] = '<h3>' . $L['box_additional block'] . ' №4</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[3] . '</div>' . $L['boxes_input_onclick'] . '4}">';
$L['cfg_box5'] = '<h3>' . $L['box_additional block'] . ' №5</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[4] . '</div>' . $L['boxes_input_onclick'] . '5}">';
$L['cfg_box6'] = '<h3>' . $L['box_additional block'] . ' №6</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[5] . '</div>' . $L['boxes_input_onclick'] . '6}">';
$L['cfg_box7'] = '<h3>' . $L['box_additional block'] . ' №7</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[6] . '</div>' . $L['boxes_input_onclick'] . '7}">';
$L['cfg_box8'] = '<h3>' . $L['box_additional block'] . ' №8</h3><div' . $L['boxes_style_my'] . '>' . $boxdesc[7] . '</div>' . $L['boxes_input_onclick'] . '8}">';
