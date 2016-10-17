<?php

/* ====================
[BEGIN_COT_EXT]
Code=boxes
Hooks=footer.tags
Tags=footer.tpl:{FOOTER_BOXES_JS},{FOOTER_BOXES_STAT}
Order=10
[END_COT_EXT]
==================== */
/**
 * boxes plugin
 *
 * @author  roffun
 * @copyright Copyright(c) 2015 vseweb.com
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL.');

$boxes_theme_js_path = $cfg['mainurl'] . '/' . $cfg['themes_dir'] . '/' . $theme . '/js/';

if (!empty($cfg['plugin']['boxes']['box_speedupjs']))
{
        foreach (preg_split('#\r?\n#', $cfg['plugin']['boxes']['box_speedupjs']) as $bspdupjs)
        {
                $box_speedupjs .= @file_get_contents($boxes_theme_js_path . $bspdupjs);
        }
} else
{
        $box_speedupjs = false;
}

if (!empty($cfg['plugin']['boxes']['box_footerjs']))
{
        $box_footerjs = $cfg['plugin']['boxes']['box_footerjs'];
}

if (!empty($box_speedupjs) || !empty($box_footerjs))
{
        $box_speedup_footer_js = '<script type="text/javascript">' . cot_rc_minify($box_speedupjs . $box_footerjs, 'js') . '</script>';
}

if (!empty($cfg['plugin']['boxes']['box_footerstat']))
{
        $bx_footerstat = $cfg['plugin']['boxes']['box_footerstat'];
}

$t->assign(array(
'FOOTER_BOXES_JS' => $box_speedup_footer_js . $cfg['plugin']['boxes']['box_footer_externaljs'], 
'FOOTER_BOXES_STAT' => $bx_footerstat
));
