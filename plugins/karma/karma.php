<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=ajax
[END_COT_EXT]
==================== */
/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */
defined('COT_CODE') or die('Wrong URL');
cot_sendheaders();

if($cfg['plugin']['karma']['karma_com_on'])cot::$db->registerTable('com');

$aj = cot_import('aj','G','ALP');
$act = cot_import('act','G','ALP');
$lct = cot_import('lct','G','ALP');
$lct_pg = cot_import('lct_pg','P','ALP');
$value = (cot_import('value','G','ALP'))? cot_import('value','G','ALP'): cot_import('value','P','ALP') ;
$fp = cot_import('fp','G','INT') ? cot_import('fp','G','INT') : cot_diefatal($L['no_fp']);
$mod = cot_import('mod','G','TXT') ? cot_import('mod','G','TXT') : cot_import('mod','P','TXT');

require_once cot_langfile('karma', 'plug');
require_once cot_incfile('karma', 'plug');
require_once cot_incfile('karma', 'plug', 'resources');

$kr = new XTemplate(cot_tplfile(array('karma','popup'), true));    

$access = cot_auth('plug', 'karma', 'W');

   
 //----------- расчет множителя голоса
$ex_value = abs($usr['profile']['user_karma'] * $cfg['plugin']['karma']['karma_f']);
if($ex_value > $cfg['plugin']['karma']['karma_f_max'])$ex_value = $cfg['plugin']['karma']['karma_f_max'];
if($ex_value < $cfg['plugin']['karma']['karma_f_min'])$ex_value = $cfg['plugin']['karma']['karma_f_min'];

//--------------

switch ($act){
    case 'change':
        
        if($usr['id'] == 0){
        $popup_body .= karma_error('karma_ms_error',$L['no_user']);
        
    break;
                                            }
        if ($value == "add")
        {
            $do = $L['karma_addt']; 
        }
        elseif ($value == "del")
        {
            $do = $L['karma_delt'];  
        }
        else
        {
            cot_diefatal($L['no_karma']);
        }
        
        // проверка постов
        if($cfg['plugin']['karma']['minpost'] > 0)
        {   
            $klast = explode(":", $usr['profile']['user_karma_auth']);
            if(($klast[3] < $cfg['plugin']['karma']['minpost'])) 
            { 
                if(karma_user_post($usr['id']) < $cfg['plugin']['karma']['minpost']){
                    echo karma_error('karma_ms_error',$L['no_posts']);
                    return;
                }
            }  

        }
        
        if($lct == "ud"){
            
            $sql = $db->query("SELECT * FROM $db_users WHERE user_id = $fp LIMIT 1");
            
        }elseif($lct == "frm"){
            

            $sql = $db->query("SELECT f.fp_text, u.* FROM $db_forum_posts f LEFT JOIN $db_users u ON (f.fp_posterid=u.user_id) WHERE f.fp_id = $fp LIMIT 1");
        
            
        }elseif($lct == "pg")
            {
            

            
            $sql = $db->query("SELECT f.page_title,f.page_desc, u.* FROM $db_pages f LEFT JOIN $db_users u ON (f.page_ownerid=u.user_id) WHERE page_id = $fp ");
       
            }
            elseif($lct == "com" && $cfg['plugin']['karma']['karma_com_on'])
            {
                
            $sql = $db->query("SELECT f.com_text, u.* FROM $db_com f LEFT JOIN $db_users u ON (f.com_authorid=u.user_id) WHERE com_id = $fp ");
        
            }else break;
            
        $row = $sql->fetch();
          
        // Antiflood
        $antifl = $db->query("SELECT karma_ts,karma_fp,karma_locate FROM cot_karma WHERE karma_recipient={$row['user_id']} AND karma_rater={$usr['id']} ORDER BY karma_id DESC LIMIT 1")->fetch();

        if( !$cfg['plugin']['karma']['dbl_rec'] && $antifl['karma_fp'] == $fp && $antifl['karma_locate'] == $lct)
        {
            
            $popup_body .= karma_error('karma_ms_error',$L['dbl_rec']);
            
        break;
        }

        if($cfg['plugin']['karma']['karmatime'] > 0 && $antifl && (time() - (int) $antifl['karma_ts']) < $cfg['plugin']['karma']['karmatime'] * 3600)
        {
            $hrs_left = $cfg['plugin']['karma']['karmatime'] - floor((time() - (int) $antifl['karma_ts']) / 3600);
            $popup_body .= karma_error('karma_ms_error',$L['change_later']." &nbsp;".cot_declension($hrs_left,$L['hrs_left']));
            break;
        }

        if ($usr['id'] == $row['user_id']){
            
            $popup_body .= karma_error('karma_ms_error',$L['no_self']);
            break; 
        }
        
        if($lct=="frm") $post_text = cot_parse($row['fp_text']);
        if($lct=="pg")  $post_text = $row['page_title'];
        if($lct=="com") $post_text=cot_parse($row['com_text']);

        $kr->assign(array(
            "KARMA_BAL"=>cot_declension($ex_value,$L['bal_karma']),
            "KARMA_ACT" => $do,
            "KARMA_USER" => "<a href=\"".cot_url('users','m=details&amp;id='.$row['user_id'])."\" target=\"_blank\" >".$row['user_name']."</a>",
            "KARMA_LCT"=>($lct == "ud")? false:true,
            "KARMA_POST"=>  cot_cutstring($post_text, 200),
            "KARMA_POST_LCT" => $L['do_'.$lct], 
            "KARMA_FORM_URL"=>cot_url('plug','r=karma&act=dochange&fp='.$fp),
            "KARMA_FORM_URL_AJAX" => "id='karma_box_form' onSubmit=\"return  ajaxSend({ method: 'POST', formId: 'karma_box_form', url: '".cot_url('plug', 'r=karma&act=dochange&fp='.$fp)."', divId: 'karma_mess', errMsg: '".$L['ajaxSenderror']."' });\"",
            "KARMA_VAL"=>$value,
            "KARMA_U_ID"=>$row['user_id'],
            "KARMA_LOCATION"=>$lct,
            "KARMA_MOD"=>$mod,
        ));
        if($cfg['plugin']['karma']['karma_profile'])$kr->assign(cot_generate_usertags($row, "KARMA_USER_PROFILE_"));
        $kr->parse("MAIN.CHANGE");
        $kr->parse("MAIN");
        $popup_body .= $kr->text("MAIN");
        
    break;
    case 'dochange':
      
            $reason = cot_import('reason','P','TXT');
            $recipient = cot_import('recipient','P','INT') ? cot_import('recipient','P','INT') : cot_diefatal($L['no_recipient']);

            if ($value == "add"){
                
                $value = $ex_value;
                
            }
            elseif ($value == "del"){
                
                $value = $ex_value * -1;
                
            }
            else {
                
                cot_diefatal($L['no_karma']);
                
            }
            if ($usr['profile']['user_karma'] < 0 && !$cfg['plugin']['karma']['neg_rec'] && $value < 0) break;

             // Antiflood
            $antifl = $db->query("SELECT karma_ts,karma_fp,karma_locate FROM cot_karma WHERE karma_recipient=$recipient AND karma_rater={$usr['id']} ORDER BY karma_id DESC LIMIT 1")->fetch();
            
            if( !$cfg['plugin']['karma']['dbl_rec']  && $antifl['karma_fp'] == $fp && $antifl['karma_locate'] == $lct_pg)
            {
            
                $popup_body .= karma_error('karma_ms_error',$L['dbl_rec'],true);
                break;
            }
            if($antifl && (time() - (int) $antifl['karma_ts']) < $cfg['plugin']['karma']['karmatime'] * 3600)
            {
                $hrs_left = $cfg['plugin']['karma']['karmatime'] - floor((time() - (int) $antifl['karma_ts']) / 3600);
                $popup_body .= karma_error('karma_ms_error',$L['change_later']." &nbsp;".cot_declension($hrs_left,$L['hrs_left']),true);
                break;
            }
  
            if (empty($reason) && $cfg['plugin']['karma']['karma_com'])
            {
                $popup_body .= karma_error('karma_ms_error',$L['no_comm']);
                $value =cot_import('value','P','ALP');    
                break;
            }
            
            if($lct_pg == 'pg'){
                
                $alname = $db->query("SELECT page_alias,page_cat FROM $db_pages WHERE page_id = $fp LIMIT 1")->fetch();
                $alname = $alname['page_alias'].":".$alname['page_cat'];
                
            }
            
            if($lct_pg == 'com'){
                
                $alname = $db->query("SELECT k.page_alias,k.page_cat FROM $db_pages k LEFT JOIN $db_com c ON (c.com_id = $fp AND c.com_area = 'page') WHERE k.page_id = c.com_code   LIMIT 1")->fetch();
                $alname = $alname['page_alias'].":".$alname['page_cat'].":".urldecode($mod);
                
            }
            
            // SQL-injection protection
            $reason = $db->prep($reason);
            $ts = time();
            $sql = $db->query("INSERT cot_karma VALUES ('', '$recipient', '{$usr['id']}', '$value', '$reason', '$fp','$lct_pg','$ts','$alname')");
            
            //Update user_karma
            $sql_injection = $db->query("UPDATE $db_users SET user_karma=user_karma + ".$value." WHERE user_id={$recipient}");

            $popup_body .= karma_error('karma_ms_ok',$L['karma_changed_ok'],$cfg['plugin']['karma']['close_win']);
            
    break;
    case 'moderate':

            if (!cot_auth('plug', 'karma', 'A'))
            { 
                cot_diefatal($L['low_level']); 
            }    
            
            $karma_userid = $db->query("SELECT u.user_id,k.karma_value FROM cot_karma k LEFT JOIN $db_users u ON (u.user_id = k.karma_recipient)  WHERE k.karma_id = $fp   LIMIT 1 ")->fetch();
            $db->query("DELETE FROM cot_karma WHERE karma_id = $fp  LIMIT 1");
            $db->query("UPDATE $db_users SET user_karma = user_karma -{$karma_userid['karma_value']} WHERE user_id = {$karma_userid['user_id']}");
            $ku = cot_import('ku','G','INT');
            $popup_body .= karma_error('karma_ms_ok',$L['karma_del_ok'], true);
           
    break;
    case 'show' : default:   
        
        list($pg, $kn) = cot_import_pagenav('kn', $cfg['plugin']['karma']['karma_maxpage']);
        
        $tmp = $db->query("SELECT COUNT(*),SUM(karma_value) AS karma FROM cot_karma WHERE karma_recipient = $fp")->fetch();
        $total_p = $tmp['COUNT(*)'];
        if(cot_plugin_active('comments'))
        {
            $sql = $db->query("SELECT u.*, k.*,c.com_code,c.com_id FROM cot_karma k LEFT JOIN $db_users u ON (u.user_id=k.karma_rater) LEFT JOIN $db_com c ON (c.com_id=k.karma_fp) WHERE k.karma_recipient = $fp  ORDER BY k.karma_id DESC LIMIT $kn, ".$cfg['plugin']['karma']['karma_maxpage']."");
        }  else {
            
            $sql = $db->query("SELECT u.*, k.* FROM cot_karma k LEFT JOIN $db_users u ON (u.user_id=k.karma_rater)  WHERE k.karma_recipient = $fp  ORDER BY k.karma_id DESC LIMIT $kn, ".$cfg['plugin']['karma']['karma_maxpage']."");
        }
        $sql1 = $db->query("SELECT * FROM $db_users WHERE user_id = $fp LIMIT 1");
        $thiss = $sql1->fetch();
        
        $karmaarr = explode(":", $thiss['user_karma_auth']);
        
        $kr->assign(array(
            "KARMA_NAME_USER"=>$thiss['user_name'],
            "KARMA_USER_VALUE"=>number_format($tmp['karma'], '1', '.', ' '),
            "KARMA_USER_KARMA_FULL"=>number_format($thiss['user_karma'], '1', '.', ' '),
            "KARMA_USERS"=>cot_declension($total_p,$L['userkarma']),
            "KARMA_ADMIN"=>(cot_auth('plug', 'karma', 'A')) ? true : "",
            "KARMA_AUTH_VALUE" => number_format($karmaarr[1] , '1', '.', ' '),
            "KARMA_AUTH_COUNT" =>($karmaarr[2])? cot_declension($karmaarr[2],$L['user_auth_dec']):'',
        ));
        if($cfg['plugin']['karma']['karma_profile'])$kr->assign(cot_generate_usertags($thiss, "KARMA_USER_PROFILE_"));
        if($total_p == 0 && $thiss['user_karma_auth'] == 0)
        {
            $popup_body .= karma_error('karma_ms_error',$L['no_karma_user']);
            break;
        }
        
        if($total_p > 0)
        {  
                //=== NAV ====
                $knav = cot_pagenav('plug','r=karma&act=show&fp='.$fp ,$kn,$total_p,$cfg['plugin']['karma']['karma_maxpage'], 'kn', '', true,'karma_popup','plug','r=karma&act=show&fp='.$fp.'&aj=1');

                $kr->assign(array(
                    "KARMA_PAGEPREV"=>$knav['prev'],
                    "KARMA_PAGENEXT"=>$knav['next'],
                    "KARMA_PAGINATION"=>$knav['main'],
                    'KARMA_CURRENTPAGE' => $knav['current'],
                ));
                //=========

                while ($row = $sql->fetch())
                {
                    if($row['karma_locate'] == "frm")
                    {
                        $view_url=cot_url('forums','m=posts&id='.$row['karma_fp']);
                        $view_title = $L['karma_forums'];
                    }
                    elseif($row['karma_locate'] == "ud")
                    { 
                        $view_url = cot_url('users','m=details&id='.$row['karma_recipient']."&u=".$thiss['user_name']);
                        $view_title = $L['karma_det'];
                        
                    }
                    elseif($row['karma_locate'] == "pg")
                    { 
                        $karmaarr = explode(":", $row['karma_al_name']);
                        $c=$karmaarr[1];
                        $view_url=($karmaarr[0])? cot_url('page','al='.$karmaarr[0]):cot_url('page','id='.$row['karma_fp']);
                        $view_title = $L['karma_page'];
                        
                    }elseif($row['karma_locate'] == "com"){
                        
                        $karmaarr = explode(":", $row['karma_al_name']);
                        $view_title = $L['karma_com'];
                        
                        if($karmaarr[2] == 'page' || (empty($karmaarr[2]) && $karmaarr[0]))
                        {
                            // page
                            $c = $karmaarr[1];
                            $view_url=($karmaarr[0])? cot_url('page','al='.$karmaarr[0],'#c'.$row['com_id']):cot_url('page',$karmaarr[3],"#c".$row['com_id']);
                            
                        }
                        elseif($karmaarr[2] && $karmaarr[3])
                        {
                            // другой модуль/ плагин
                            $view_url = cot_url($karmaarr[2],$karmaarr[3],'#c'.$row['com_id']);
                            }
                    }
                    
                    $kr->assign(array(
                        
                        "KARMA_USER"            => "<a href=\"".cot_url('users','m=details&id='.$row['user_id'].'&u='.$row['user_name'])."\" target=_blank>".$row['user_name']."</a>",
                        "KARMA_VALUE"           => abs($row['karma_value']),
                        "KARMA_CLASS"           => ($row['karma_value'] < 0 )?"style=\"background:#aa0000\"":"",
                        "KARMA_TEXT"            => cot_parse($row['karma_text']),
                        "KARMA_VIEW_URL"        => $view_url,
                        "KARMA_VIEW_TITLE"      => $view_title,        
                        "KARMA_ADMIN_URL"       => cot_url('plug','r=karma&act=moderate&fp='.$row['karma_id'].'&ku='.$fp),
                        "KARMA_ADMIN_URL_AJAX"  => "OnClick = \"if(confirm('".$L['Delete']."?')){return  ajaxSend({  url: '".cot_url('plug','r=karma&act=moderate&fp='.$row['karma_id'].'&ku='.$fp)."', divId: 'karma_popup', errMsg: '".$L['ajaxSenderror']."' });}else{return false;} \""
                    ));
                    if($cfg['plugin']['karma']['karma_profile'])$kr->assign(cot_generate_usertags($row, "KARMA_USER_"));
                    $kr->parse("MAIN.SHOW.SHOW_ROW");
                }
        }
        $kr->parse("MAIN.SHOW");
        
        if($aj)
        {
            $popup_body .= $kr->text("MAIN.SHOW");  
        }
        else
        {  
            $kr->parse("MAIN");
            $popup_body .= $kr->text("MAIN");   
        }
    break;
}

echo $popup_body;
?>
