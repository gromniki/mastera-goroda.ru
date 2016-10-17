<?php
/* ====================
[BEGIN_COT_EXT]
Code=bootstrap
Name=Bootstrap wrapper
Category=development-maintenance
Description=Bootstrap framework wrapper plugin
Version=3.1.1
Date=2014-Apr-10
Author=Andrey Matsovkin
Copyright=Copyright (c) 2011-2014, Andrey Matsovkin
Notes=If your enjoy my plugin please consider donating to help support future developments. <b>Thanks!</b> <br /><a href="mailto:macik.spb@gmail.com">macik.spb@gmail.com</a>
Auth_guests=R1
Lock_guests=W2345A
Auth_members=RW1
Lock_members=2345
Recommends_modules=
Recommends_plugins=
Requires_modules=
Requires_plugins=
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
autoload=01:radio:0,1:0:Autoload on all pages
load_mode=02:select:0,1:0:Bootstrap loading mode
path_to_local=03:string:::Path to local files
path_to_cdn=05:string:::Path to CDN files
use_minified=07:radio:0,1:1:Use minified files
load_theme=09:radio:0,1:0:Load default theme file
[END_COT_EXT_CONFIG]
==================== */

/**
 * Bootstrap wrapper plugin for Cotonti CMF
 *
 * @package bootstrap
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2014
 * @license Distributed under BSD license.
 * Made with «Extension Template» (https://github.com/macik/cot-extension_template)
 *
 */

defined('COT_CODE') or die('Wrong URL.');