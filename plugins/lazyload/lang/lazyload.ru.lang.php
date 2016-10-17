<?PHP
/**
 * Localization file for LazyLoad
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'LazyLoad'; // Title for stand alone

$L['info_desc'] ='Осуществляет «отложенную» загрузку изображений, повышая тем самым скорость загрузки страницы.';

$L['cfg_used_lib'] = array('Библиотека «отложенной» загрузки','тип библиотеки используемой для «отложенной» загрузки');
$L['cfg_add_noscript'] = array('Добавлять тег «noscript»','для пользователей у которых отключен яваскрипт в браузере');
$L['cfg_lazy_class'] = array('Обрабатывать только изображения с классом','оставьте поле пустым для обработки всех изображений на странице');
$L['cfg_def_width'] = array('Ширина по умолчанию','для изображений у которых не указана ширина');
$L['cfg_def_height'] = array('Высота по умолчанию','для изображений у которых не указана высота');

$L['ll_samplepage'] = 'Демонстрационная страница Lazy Load';
$L['ll_nojquery'] = 'Извините, данное расширение работает только если в системе включен jQuery. Проверьте настройки вашей CMS <a href="admin/config#get;n=edit&o=core&p=main">по этой ссылке</a>.';
$L['ll_sampledesc'] = 'На этой странице вы можете протестировать эффект «отложенной» загрузки. Пролистайте страницу вниз, и вы увидите
как изображения подгружаются по мере прокрутки страницы.';
$L['ll_orig_link'] = 'Оригинальные изображения взяты из статьи с сайта <a href="http://www.fuelyourcreativity.com/showcase-60-logos-inspired-by-simple-shapes/">http://www.fuelyourcreativity.com/</a>. Нажмите на ссылку для перехода к оригинальной статье.';

?>