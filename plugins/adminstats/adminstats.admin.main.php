<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=admin.main
[END_COT_EXT]
==================== */
(defined('COT_CODE') && defined('COT_ADMIN')) or die('Wrong URL.');

require_once cot_langfile('adminstats', 'plug');
require_once cot_incfile('adminstats', 'plug');

if ($cache && (int) $cfg['plugin']['adminstats']['cache_ttl'] > 0)
{
	$adminstats = $cache->disk->get('adminstats_info', 'adminstats', (int)$cfg['plugin']['adminstats']['cache_ttl']);
}
if (empty($adminstats))
{
	$default_theme_titles = $cfg['defaulttheme'];
	$default_scheme_titles = $L['Default'];
	$themeinfo = "{$cfg['themes_dir']}/{$cfg['defaulttheme']}/{$cfg['defaulttheme']}.php";
	if (file_exists($themeinfo))
	{
		$info = cot_infoget($themeinfo, 'COT_THEME');
		if ($info)
		{
			$default_theme_titles = $info['Name'];
			if (!empty($info['Schemes']))
			{
				$schemes = explode(',', $info['Schemes']);
				sort($schemes);
				foreach ($schemes as $sc)
				{
					$sc = explode(':', $sc);
					if ($sc[0] == $cfg['defaultscheme']) $default_scheme_titles = ($sc[1] == 'default' || $sc[1] == 'Default') ? $L['Default'] : $sc[1];
				}
			}
		}
	}
	$db_tables = $cot_db_tables = array();
	$db_total_length = $db_total_rows = $db_total_index_length = $db_total_data_length = $cot_db_total_length = $cot_db_total_rows = $cot_db_total_index_length = $cot_db_total_data_length = 0;
	$sql = $db->query("SHOW TABLES");
	foreach ($sql->fetchAll(PDO::FETCH_NUM) as $row)
	{
		$sql_status = $db->query("SHOW TABLE STATUS LIKE '".$row[0]."'");
		$db_tables[$row[0]] = $sql_status->fetch();
		$sql_status->closeCursor();
		$db_table_length = $db_tables[$row[0]]['Index_length'] + $db_tables[$row[0]]['Data_length'];
		$db_total_length += $db_table_length;
		$db_total_rows += $db_tables[$row[0]]['Rows'];
		$db_total_index_length += $db_tables[$row[0]]['Index_length'];
		$db_total_data_length += $db_tables[$row[0]]['Data_length'];
		if (strpos($row[0], $db_x) !== false)
		{			$cot_db_tables[$row[0]] = $db_tables[$row[0]];
			$cot_db_table_length = $cot_db_tables[$row[0]]['Index_length'] + $cot_db_tables[$row[0]]['Data_length'];
			$cot_db_total_length += $cot_db_table_length;
			$cot_db_total_rows += $cot_db_tables[$row[0]]['Rows'];
			$cot_db_total_index_length += $cot_db_tables[$row[0]]['Index_length'];
			$cot_db_total_data_length += $cot_db_tables[$row[0]]['Data_length'];		}
	}
	if (!$cot_countries) include_once cot_langfile('countries', 'core');
	$extensions = cot_extension_list_info($cfg['modules_dir']);
	$adminstats = array(
		'version' => array(
			'title' => $L['adminstats_cot_version'],
			'value' => $cfg['version']
		),
		'defaulttheme' => array(
			'title' => $L['adminstats_cot_defaulttheme'],
			'value' => $default_theme_titles
		),
		'defaultscheme' => array(
			'title' => $L['adminstats_cot_defaultscheme'],
			'value' => $default_scheme_titles
		),
		'defaulticons' => array(
			'title' => $L['adminstats_cot_defaulticons'],
			'value' => $cfg['defaulticons'] == 'default' ? $L['Default'] : $cfg['defaulticons']
		),
		'defaultlang' => array(
			'title' => $L['adminstats_cot_defaultlang'],
			'value' => $cot_languages[$cfg['defaultlang']]." (".$cfg['defaultlang'].")"//$cot_countries[]
		),
		'admintheme' => array(
			'title' => $L['adminstats_cot_admintheme'],
			'value' => empty($cfg['admintheme']) ? $L['Default'] : $cfg['admintheme']
		),
		'cache' => array(
			'title' => $L['adminstats_cot_cache'],
			'value' => $cfg['cache'] ? $L['Enabled'] : $L['Disabled']
		),
		'cache_drv' => array(
			'title' => $L['adminstats_cot_cache_drv'],
			'value' => $cfg['cache_drv'] == '_driver' ? $L['adminstats_cot_cache_drv_Empty'] : $cfg['cache_drv']
		),
		'xtpl_cache' => array(
			'title' => $L['adminstats_cot_xtpl_cache'],
			'value' => $cfg['xtpl_cache'] ? $L['Enabled'] : $L['Disabled']
		),
		'html_cleanup' => array(
			'title' => $L['adminstats_cot_html_cleanup'],
			'value' => $cfg['html_cleanup'] ? $L['Enabled'] : $L['Disabled']
		),
		'cache_index' => array(
			'title' => $L['adminstats_cot_cache_index'],
			'value' => $cfg['cache_index'] ? $L['Enabled'] : $L['Disabled']
		),
		'cache_page' => array(
			'title' => $L['adminstats_cot_cache_page'],
			'value' => $cfg['cache_page'] ? $L['Enabled'] : $L['Disabled']
		),
		'cache_forums' => array(
			'title' => $L['adminstats_cot_cache_forums'],
			'value' => $cfg['cache_forums'] ? $L['Enabled'] : $L['Disabled']
		),
		'check_updates' => array(
			'title' => $L['adminstats_cot_check_updates'],
			'value' => $cfg['check_updates'] ? $L['Enabled'] : $L['Disabled']
		),
		'display_errors' => array(
			'title' => $L['adminstats_cot_display_errors'],
			'value' => $cfg['display_errors'] ? $L['Enabled'] : $L['Disabled']
		),
		'ipcheck' => array(
			'title' => $L['adminstats_cot_ipcheck'],
			'value' => $cfg['ipcheck'] ? $L['Enabled'] : $L['Disabled']
		),
		'authcache' => array(
			'title' => $L['adminstats_cot_authcache'],
			'value' => $cfg['authcache'] ? $L['Enabled'] : $L['Disabled']
		),
		'useremailduplicate' => array(
			'title' => $L['adminstats_cot_useremailduplicate'],
			'value' => $cfg['useremailduplicate'] ? $L['Enabled'] : $L['Disabled']
		),
		'debug_mode' => array(
			'title' => $L['adminstats_cot_debug_mode'],
			'value' => $cfg['debug_mode'] ? $L['Enabled'] : $L['Disabled']
		),

		'modules' => array(
			'title' => $L['adminstats_modules'],
			'value' => count($extensions)//$db->query("SELECT DISTINCT(pl_code) FROM $db_plugins WHERE pl_module = 1 GROUP BY pl_code")->rowCount()
		),
		'active_modules' => array(
			'title' => $L['adminstats_active_modules'],
			'value' => $db->query("SELECT DISTINCT(pl_code) FROM $db_plugins WHERE pl_active = 1 AND pl_module = 1 GROUP BY pl_code")->rowCount()
		),
		'plugins' => array(
			'title' => $L['adminstats_plugins'],
			'value' => $db->query("SELECT DISTINCT(pl_code) FROM $db_plugins WHERE 1 GROUP BY pl_code")->rowCount()
		),
		'active_plugins' => array(
			'title' => $L['adminstats_active_plugins'],
			'value' => $db->query("SELECT DISTINCT(pl_code) FROM $db_plugins WHERE pl_active = 1 AND pl_module = 0 GROUP BY pl_code")->rowCount()
		),
		'hooks' => array(
			'title' => $L['adminstats_hooks'],
			'value' => $db->query("SELECT COUNT(*) FROM $db_plugins")->fetchColumn()
		),
		'active_hooks' => array(
			'title' => $L['adminstats_active_hooks'],
			'value' => $db->query("SELECT COUNT(*) FROM $db_plugins WHERE pl_active = 1")->fetchColumn()
		),

		'database' => array(
			'title' => $L['adminstats_cot_database'],
			'value' => htmlspecialchars($db->query("SELECT upd_value FROM $db_updates WHERE upd_param = 'revision'")->fetchColumn())
		),
		'mysqlcharset' => array(
			'title' => $L['adminstats_mysqlcharset'],
			'value' => $cfg['mysqlcharset']
		),

		'db_counts' => array(
			'title' => $L['adminstats_db_counts'],
			'value' => count($db_tables)
		),
		'db_rows' => array(
			'title' => $L['adminstats_db_rows'],
			'value' => $db_total_rows
		),
		'db_indexsize' => array(
			'title' => $L['adminstats_db_indexsize'],
			'value' => number_format(($db_total_index_length / 1024), 1, '.', ' ')
		),
		'db_datassize' => array(
			'title' => $L['adminstats_db_datassize'],
			'value' => number_format(($db_total_data_length / 1024), 1, '.', ' ')
		),
		'db_totalsize' => array(
			'title' => $L['adminstats_db_totalsize'],
			'value' => number_format(($db_total_length / 1024), 1, '.', ' ')
		),

		'cot_db_counts' => array(
			'title' => $L['adminstats_cot_db_counts'],
			'value' => count($cot_db_tables)
		),
		'cot_db_rows' => array(
			'title' => $L['adminstats_cot_db_rows'],
			'value' => $cot_db_total_rows
		),
		'cot_db_indexsize' => array(
			'title' => $L['adminstats_cot_db_indexsize'],
			'value' => number_format(($cot_db_total_index_length / 1024), 1, '.', ' ')
		),
		'cot_db_datassize' => array(
			'title' => $L['adminstats_cot_db_datassize'],
			'value' => number_format(($cot_db_total_data_length / 1024), 1, '.', ' ')
		),
		'cot_db_totalsize' => array(
			'title' => $L['adminstats_cot_db_totalsize'],
			'value' => number_format(($cot_db_total_length / 1024), 1, '.', ' ')
		),
	);
	if ($cfg['check_updates'] && $cache)
	{
		$update_info = $cache->db->get('update_info');
		if (!$update_info)
		{
			if (ini_get('allow_url_fopen'))
			{
				$update_info = @file_get_contents('http://www.cotonti.com/update-check');
				if ($update_info)
				{
					$update_info = json_decode($update_info, TRUE);
					$cache->db->store('update_info', $update_info, COT_DEFAULT_REALM, 86400);
				}
			}
			elseif (function_exists('curl_init'))
			{
				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, 'http://www.cotonti.com/update-check');
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
				$update_info = curl_exec($curl);
				if ($update_info)
				{
					$update_info = json_decode($update_info, TRUE);
					$cache->db->store('update_info', $update_info, COT_DEFAULT_REALM, 86400);
				}
				curl_close($curl);
			}
		}
		$adminstats['new_ver'] = array(
			'title' => $L['adminstats_new_ver'],
			'value' => ($update_info['update_ver'] > $cfg['version']) ? sprintf($L['adminstats_update_revision'], $cfg['version'], htmlspecialchars($update_info['update_ver'])) : $L['adminstats_no_new_ver']
		);
		$adminstats['new_ver_msg'] = array(
			'title' => $L['adminstats_new_ver_msg'],
			'value' => ($update_info['update_ver'] > $cfg['version']) ? cot_parse($update_info['update_message']) : ''
		);
	}
	if ($cache && (int) $cfg['plugin']['adminstats']['cache_ttl'] > 0)
	{
		$cache->disk->store('adminstats_info', $adminstats, 'adminstats');
	}
}