<?php
(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

function item_counter($type, $days = 1, $str = '')
{	global $db, $cfg, $L, $lang, $Ls, $theme, $usr, $sys, $R, $structure, $cot_modules;//$cot_plugins_active

	$time = $sys['now'] - $days * 86400;
	$db_table = $db_column = '';
	switch ($type)
	{		case 'contact':
			if (cot_plugin_active('contact'))
			{
				global $db_contact;
				require_once cot_incfile('contact', 'plug');
				$db_table = $db_contact;
				$db_column = 'contact_date';
			}
		break;
		case 'comments':
			if (cot_plugin_active('comments'))
			{
				global $db_com;
				require_once cot_incfile('comments', 'plug');
				$db_table = $db_com;
				$db_column = 'com_date';
			}		break;
		case 'polls':
			if (cot_module_active('polls'))
			{
				global $db_polls;
				require_once cot_incfile('polls', 'module');
				$db_table = $db_polls;
				$db_column = 'poll_creationdate';
			}
		break;
		case 'pm':
			if (cot_module_active('pm'))
			{
				global $db_pm;
				require_once cot_incfile('pm', 'module');
				$db_table = $db_pm;
				$db_column = 'pm_date';
			}
		break;
		case 'users_reg':
		case 'users':
			if (cot_module_active('users'))
			{
				global $db_users;
				//require_once cot_incfile('users', 'module');
				$db_table = $db_users;
				$db_column = $type == 'users_reg' ? 'user_regdate' : 'user_lastvisit';
			}
		break;
		case 'posts':
		case 'topics':
			if (cot_module_active('forums'))
			{				global $db_forum_posts, $db_forum_topics;
				require_once cot_incfile('forums', 'module');
				$db_table = $type == 'posts' ? $db_forum_posts : $db_forum_topics;
				$db_column = $type == 'posts' ? 'fp_creation' : 'ft_creationdate';//'fp_updated';
			}
		break;
		case 'page':
			if (cot_module_active('page'))
			{				global $db_pages;
				require_once cot_incfile('page', 'module');
				$db_table = $db_pages;
				$db_column = 'page_begin';//'page_date';
			}
		break;
		default:
			$L['adminstats_error_type_disabled'] = &$L['adminstats_error_type_wrong'];
		break;
	}
	if ($db_table && $db_column)
	{		$counter = $db->query("SELECT COUNT(*) FROM ".$db_table." WHERE ".$db_column." >= ".$time." AND ".$db_column." <= ".$sys['now'])->fetchColumn();
		if (!isset($L[$str]) && empty($L[$str])) return $counter;
		else return cot_declension($counter, $L[$str]/*, $onlyword = false, $canfrac = true*/);	}
	else return sprintf($L['adminstats_error_type_disabled'], $type);}
