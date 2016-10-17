<?PHP
/* ====================
[BEGIN_COT_EXT]
Code=lazyload
Name=LazyLoad
Description=LazyLoad delays loading of images in long web pages for faster page loading
Version=1.1
Date=2012-Nov-16
Author=Andrey Matsovkin
Copyright=Copyright (c) 2011-2012, Andrey Matsovkin
Notes=If your enjoy my plugin please consider donating to help support future developments. Thanks! mailto:macik.spb@gmail.com
Auth_guests=R1
Lock_guests=W2345A
Auth_members=RW1
Lock_members=2345
[END_COT_EXT]

[BEGIN_COT_EXT_CONFIG]
used_lib=05:select:lazyload,sonar:lazyload:Used «lazyload» lib
add_noscript=10:radio:0,1:1:Add «noscript» tag
lazy_class=11:string:::Process only images with class
def_width=15:string:::Default width if not specified
def_height=16:string:::Default height if not specified
[END_COT_EXT_CONFIG]
==================== */

/**
 * LazyLoad plugin for Cotonti CMF
 *
 * @package lazyload
 * @author Andrey Matsovkin
 * @copyright Copyright (c) 2011-2012
 * @license Distributed under BSD license.
*/

if (!defined('COT_CODE')) { die('Wrong URL ('.array_pop(explode("\\",__FILE__)).').'); }

?>