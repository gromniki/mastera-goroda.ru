<?PHP
/**
 * Localization file for LazyLoad
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');

$L['plu_title'] = 'LazyLoad'; // Title for stand alone

$L['info_desc'] ='LazyLoad delays loading of images in long web pages for faster page loading'; // plugin description

$L['cfg_used_lib'] = array('Used lib for «lazyload»','type of library for lazyload effect');
$L['cfg_add_noscript'] = array('Add «noscript» tag','for users with JavaScript switched off');
$L['cfg_lazy_class'] = array('Process only images with class','leave blank to process all images on page');
$L['cfg_def_width'] = array('Default width','for images with no width specified');
$L['cfg_def_height'] = array('Default height','for images with no height specified');

$L['ll_samplepage'] = 'Lazy Load sample page';
$L['ll_nojquery'] = 'Sorry, this Extension works only with jQuery enabled. Check settings of your CMS <a href="admin/config#get;n=edit&o=core&p=main">here</a>';
$L['ll_sampledesc'] = 'On this page you can test image «Lazy Loading». Scroll down the page to see images will be loaded
as reveals on page.';
$L['ll_orig_link'] = 'Original images taken from <a href="http://www.fuelyourcreativity.com/showcase-60-logos-inspired-by-simple-shapes/">http://www.fuelyourcreativity.com/</a> article. Click on link to switch to it.';

?>