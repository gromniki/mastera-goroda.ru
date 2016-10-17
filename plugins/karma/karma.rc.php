<?php 
/* 
====================
[BEGIN_COT_EXT]
Hooks=rc
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
if($cfg['plugin']['karma']['karma_css'])cot_rc_add_file($cfg['plugins_dir'] . '/karma/js/karma.css');
cot_rc_add_file($cfg['plugins_dir'] . '/karma/js/karma.js');

