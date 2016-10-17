<?php

/**
 * boxes plugin
 *
 * @author  roffun
 * @copyright Copyright(c) 2015 vseweb.com
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');
require_once cot_langfile('boxes', 'plug');

$bXs = $cfg['plugin']['boxes'];

$box1 = $bXs['box1'];
$box2 = $bXs['box2'];
$box3 = $bXs['box3'];
$box4 = $bXs['box4'];
$box5 = $bXs['box5'];
$box6 = $bXs['box6'];
$box7 = $bXs['box7'];
$box8 = $bXs['box8'];

if (!empty($cfg['plugin']['boxes']['boxdesc']))
{
        $boxdesc = array();
        foreach (preg_split('#\r?\n#', $cfg['plugin']['boxes']['boxdesc']) as $bdesc)
        {
                $boxdesc = array_merge($boxdesc, explode("\n", $bdesc));
        }
} else
{
        $boxdesc = false;
}
