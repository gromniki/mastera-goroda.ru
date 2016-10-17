<?php
/* ====================
[BEGIN_COT_THEME]
Name=name ver. 1.0
Schemes=default:Default
[END_COT_THEME]
==================== */

/**
 * Cotonti Model Theme
 * @Site 
 * @package Cotonti
 * @version 0.9.18 FL 2.6.9
 * @author Roman Golubev
 * @copyright Copyright (c) Cotonti Team 2016
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

if (!function_exists(get_user_count))   {
    function get_user_count()
    {
        global $db, $db_users; 
        return $db->countRows($db_users);
    }
}

$R['input_text'] = '<input class="uk-width-1-1 uk-form-large" type="text" name="{$name}" value="{$value}" {$attrs} />{$error}';
$R['userimg_img'] = '<img src="{$src}" alt="{$alt}" class="gr-thumbnail {$class}" />';

?>
