<?php

defined('COT_CODE') or die('Wrong URL');

function uk_com($com, $type = "com", $min = "", $head = false) {
    global $cfg, $usr;

    if ($type == "com") {
        $dir = "/components";
    } else {
        $dir = "";
    }
    if (empty($min)) {
        $_min = "min.";
    } else {
        $_min = "";
    }
    
    if (file_exists($cfg['themes_dir'].'/'.$usr['theme']."/css{$dir}/{$com}.css")) {
        cot_rc_add_file($cfg['themes_dir'].'/'.$usr['theme']."/css{$dir}/{$com}.css");
    } elseif(file_exists("{$cfg['plugins_dir']}/uikit/css{$dir}/{$com}.{$_min}css")) {
        cot_rc_add_file("{$cfg['plugins_dir']}/uikit/css{$dir}/{$com}.{$_min}css");
    }
    
    if ($head == true) {
        if (file_exists($cfg['themes_dir'] . '/' . $usr['theme'] . "/js{$dir}/{$com}.js")) {
            cot_rc_add_file($cfg['themes_dir'] . '/' . $usr['theme'] . "/js{$dir}/{$com}.js");
        } else {
            cot_rc_add_file("{$cfg['plugins_dir']}/uikit/js{$dir}/{$com}.{$_min}js");
        }
    } else {
        if (file_exists($cfg['themes_dir'] . '/' . $usr['theme'] . "/js{$dir}/{$com}.js")) {
            cot_rc_link_footer($cfg['themes_dir'] . '/' . $usr['theme'] . "/js{$dir}/{$com}.js");
        } elseif(file_exists("{$cfg['plugins_dir']}/uikit/js{$dir}/{$com}.{$_min}js")) {
            cot_rc_link_footer("{$cfg['plugins_dir']}/uikit/js{$dir}/{$com}.{$_min}js");
        }
    }
}
