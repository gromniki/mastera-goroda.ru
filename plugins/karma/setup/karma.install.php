<?php
defined('COT_CODE') or die('Wrong URL');

global $db_users;
require_once cot_langfile('karma', 'plug');

cot_extrafield_add($db_users, 'karma', 'input', $R['input_text'], '', '0', 0, 'HTML', $L['f_karma'], '', '1', false, 'float NOT NULL');
cot_extrafield_add($db_users, 'karma_auth', 'input', $R['input_text'], '', 'NULL', 0, 'HTML', 'karma auth', '', '1', false, 'varchar(255)  NULL');


?>