<?php
defined('COT_CODE') or die('Wrong URL');

global $db_users;

// Remove column from table
cot_extrafield_remove($db_users, 'karma');
cot_extrafield_remove($db_users, 'karma_auth');


?>