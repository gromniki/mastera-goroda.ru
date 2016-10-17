<?php
defined('COT_CODE') or die('Wrong URL');

/**
 * Plugin Info
 */

//$L['adminstats'] = '';
$L['info_desc'] = 'Детализированная статистика, доступная из любого шаблона админ-панели';

/**
 * Plugin Config
 */

$L['cfg_cache_ttl'] = 'Время жизни кэша в секундах';
$L['cfg_cache_ttl_hint'] = '0 - кэш отключен';

/**
 * Plugin Admin
 */

$L['adminstats_cot_version'] = &$L['Version'];

$L['adminstats_cot_defaulttheme'] = 'Тема оформления';
$L['adminstats_cot_defaultscheme'] = 'Цветовая схема';
$L['adminstats_cot_defaulticons'] = 'Иконки';
$L['adminstats_cot_defaultlang'] = 'Язык';
$L['adminstats_cot_admintheme'] = 'Тема админ-панели';

$L['adminstats_cot_cache'] = 'Кэширование данных';
$L['adminstats_cot_cache_drv'] = 'Кэш драйвер';
$L['adminstats_cot_cache_drv_Empty']= &$L['Gender_U'];
$L['adminstats_cot_xtpl_cache'] = 'Кэширование шаблонов';
$L['adminstats_cot_html_cleanup'] = 'Компактная HTML-сигнатура';
$L['adminstats_cot_cache_index'] = 'Статический кэш для главной страницы';
$L['adminstats_cot_cache_page'] = 'Статический кэш для страниц и разделов';
$L['adminstats_cot_cache_forums'] = 'Статический кэш для форумов';

$L['adminstats_cot_check_updates'] = 'Проверка обновлений';
$L['adminstats_cot_display_errors'] = 'Отображения сообщений об ошибках';
$L['adminstats_cot_ipcheck'] = 'Проверка IP при авторизации';
$L['adminstats_cot_authcache'] = 'Кэширование прав в SQL таблицы БД';
$L['adminstats_cot_useremailduplicate'] = 'Разрешить учетные записи с дублирующимися Email';
$L['adminstats_cot_debug_mode'] = 'Режим отладки';

$L['adminstats_modules'] = &$L['Modules'];
$L['adminstats_active_modules'] = 'Активные модули';
$L['adminstats_plugins'] = &$L['Plugins'];
$L['adminstats_active_plugins'] = 'Активные плагины';
$L['adminstats_hooks'] = &$L['Hooks'];
$L['adminstats_active_hooks'] = 'Активные хуки';

$L['adminstats_cot_database'] = &$L['Database'];
$L['adminstats_mysqlcharset'] = 'Кодировка БД SQL';
$L['adminstats_db_counts'] = 'БД SQL, таблиц';
$L['adminstats_db_rows'] = &$L['home_db_rows'];
$L['adminstats_db_indexsize'] = &$L['home_db_indexsize'];
$L['adminstats_db_datassize'] = &$L['home_db_datassize'];
$L['adminstats_db_totalsize'] = &$L['home_db_totalsize'];

$L['adminstats_cot_db_counts'] = 'БД SQL, таблиц Cotonti';
$L['adminstats_cot_db_rows'] = 'БД SQL, строк Cotonti';
$L['adminstats_cot_db_indexsize'] = 'БД SQL, размер индекса Cotonti (KB)';
$L['adminstats_cot_db_datassize'] = 'БД SQL, размер данных Cotonti (KB)';
$L['adminstats_cot_db_totalsize'] = 'БД SQL, общий размер Cotonti (KB)';

$L['adminstats_no_new_ver'] = 'Ваша версия актуальна';
$L['adminstats_new_ver'] = 'Возможность обновления';
$L['adminstats_update_revision'] = &$L['home_update_revision'];
$L['adminstats_new_ver_msg'] = 'Анонс новой версии';

$L['adminstats_error_type_disabled'] = 'Расширение %1$s не активно';
$L['adminstats_error_type_wrong'] = 'Указанно но поддерживаемое расширение';