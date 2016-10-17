<?php
/**
 * Localization file for Bootstrap wrapper
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2014
 * @license Distributed under BSD license.
 * Made with «Extension Template» (https://github.com/macik/cot-extension_template)
*/

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'Загрузчик Bootstrap'; // Title for stand alone

$L['info_desc'] ='Загрузчик фреймворка Bootstrap';
if (version_compare($cfg['version'], '0.9.12') > 0) // still buggy in Siena 0.9.12
	$L['info_notes'] = 'Если вам полезен мой код можете поддержать меня добрым словом или нужным делом. <b>Спасибо.</b> <br /><a href="mailto:macik.spb@gmail.com">macik.spb@gmail.com</a>';

$L['bsw_testpage'] = 'Тестовая страница загрузчика Bootstrap';
$L['bsw_version'] = 'Версия Bootstrap';
$L['bsw_settings'] = 'Настройки плагина';
$L['bsw_usage'] = 'Использование в коде';
$L['bsw_cfg_autoload'] = 'Авозагрузка';
$L['bsw_cfg_mode'] = 'Источник файлов';
$L['bsw_cfg_min'] = 'Исп. сжатые версии';
$L['bsw_cfg_theme'] = 'Доп.тема оформления';
$L['bsw_values'] = 'Имя переменной плагина';
$L['bsw_cms_var'] = 'Системная переменная';
$L['bsw_tpl_tag'] = 'Тег шаблона';
$L['bsw_value'] = 'Значение <small>(зависит от настроек плагина)</small>';
$L['bsw_installerror'] = 'Загрузчик Bootstrap установлен некорректно. Значение переменной <code>$cfg[\'bootstrap\']</code> не определено. ';
$L['bsw_checkit'] = 'Проверьте значение или переустановите плагин.';
$L['bsw_rc_files'] = 'В файлах плагинов <code>plugin.rc.php</code> или тем оформления <code>theme.rc.php</code>';
$L['bsw_tpl_files'] = 'В шаблонах тем оформления <code>theme.header.php</code> (не рекомендуется использовать этот метод. Предпочтительней использовать theme.rc.php файл)';
$L['bsw_comment1'] = 'Проверяем установлен ли плагин Bootstrap и его версию';
$L['bsw_comment2'] = 'Код для обратной совместимости, на случай если Bootstrap плагин не установлен';
$L['bsw_comment3'] = 'Просто загружаем необходимые файлы с какого-либо CDN (для примера с Яндекса)';
$L['bsw_notdefined'] = 'Значение не определено. См. настройки плагина';


$L['cfg_autoload'] =array('Загружать на всех страницах автоматически','используйте этот пункт только в том случае, если темы оформления сайта и админ панели используют bootstrap, или совместимы с ним. В противном случае установите «нет» и позвольте системе самой решать когда грузить необходимые файлы.');
$L['cfg_load_mode'] =array('Тип загружаемых файлов','загружать файлы с вашего сайта или стороннего CDN');
$L['cfg_load_mode_params'] = array('локальные файлы','файлы с CDN');
$L['cfg_path_to_local'] =array('Путь к локальным копиям файлов','по умолчанию (если не заданно) используется путь: '.$cfg['plugins_dir'].'/bootstrap/lib/');
$L['cfg_path_to_cdn'] =array('Путь к файлам на CDN','по умолчанию (если не заданно) используется: '.$bootstrap_def_cdn.' (зависит от выбранного пользователем языка интерфейса)');
$L['cfg_use_minified'] =array('Использовать упакованные версии файлов','');

$L['cfg_load_theme'] =array('Загружать стандартную тему оформления','bootstrap-theme.css');

$L['bsw_debuginfo'] = '<b>Внимание!</b> Сейчас (не смотря на настройки плагина) для загрузки используется не сжатая (не упакованная) версия файлов Bootstrap, т.к. включен режим отладки — <code>DEBUG_MODE</code>.';
$L['bsw_file_loaded'] = 'Файл <b>{$file}</b> найден и загружен.';
$L['bsw_not_found'] = 'Файл <b>{$file}</b> не найден, проверьте указанный в настройках путь.';

$adminhelp1 = '';