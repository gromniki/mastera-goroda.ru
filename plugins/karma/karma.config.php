<?php
/*
====================
[BEGIN_COT_EXT]
Hooks=admin.config.edit.loop
[END_COT_EXT]
====================
*/

/**
 * @package Karma
 * @author Dr2005alex
 * @copyright Copyright (c) 2014 Dr2005alex http://mycotonti.ru
 * @license Distributed under BSD license.
 */

defined('COT_CODE') or die('Wrong URL');
if ($p == 'karma' && $row['config_name'] == 'karma_color' && $cfg['jquery'])
{
    $f_categ = explode(",",$row['config_value']);
    $inputs = $L['f_karma']." < ".cot_rc('input_default', array('value' => $f_categ[0] ,  'type' => 'text', 'name' => 'color0', 'attrs' => 'style="width:20px;"' ))." - ".$L['karma_color0']."<br/>";
    $inputs .= $L['f_karma']." > ".cot_rc('input_default', array('value' => $f_categ[1] ,  'type' => 'text', 'name' => 'color1', 'attrs' => ' style="width:20px;"' ))." - ".$L['karma_color1']."<br/>";
    $inputs .= $L['f_karma']." > ".cot_rc('input_default', array('value' => $f_categ[2] ,  'type' => 'text', 'name' => 'color2', 'attrs' => 'style="width:20px;"' ))." - ".$L['karma_color2']."<br/>";

$script='
<script type="text/javascript">
    $(document).ready(function(){
    $("[name=karma_color]").hide();
    function valuesave(ipos,ival) 
    {
        var allval = $("[name=karma_color]").val().split(",");
        allval[ipos] = ival;
        allval.join(",");
        $("[name=karma_color]").val(allval);
    }
   
    $("[name=color0]").keyup( function() {valuesave(0,$(this).val());});
    $("[name=color1]").keyup( function() {valuesave(1,$(this).val());});
    $("[name=color2]").keyup( function() {valuesave(2,$(this).val());});

    });
</script>
';
    $confout = $inputs;
    $t->assign(
        "ADMIN_CONFIG_ROW_CONFIG_MORE" , $script.$confout.'<div class="adminconfigmore">'.$hint.'</div>'
    );  
}
if ($p == 'karma' && $row['config_name'] == 'k_forums' && $cfg['jquery'])
{
   if(cot_module_active('forums')) {
    require_once cot_incfile('forums', 'module');
    $f_categ = explode(",",$row['config_value']);

 	// Making the sections list
	$forum_sel_options = cot_rc('input_option', array('value' => 'no_all' , 'selected' => (( in_array('no_all', $f_categ) || empty($row['config_value'])) ? "selected='selected'":''), 'title' => $L['plu_allwork'] ));
        foreach ($structure['forums'] as $i => $row)        
	{
                if(cot_auth('forums', $i, 'R'))
		{
                    
                    $forum_sel_options .= cot_rc('input_option', array('value' => $row['path'] , 'selected' => (( (int) in_array($row['path'], $f_categ) && !in_array('no_all', $f_categ)) ? "selected='selected'":''), 'title' => $row['tpath'] ));

                }    
	}
        $plugin_forum_sec_list = cot_rc('input_select',array('name' => 'sea_frmsub[]', 'attrs' => "multiple id='forum_select'  size='10' style='width:100%;' ",'options' => $forum_sel_options));
   }
$script='
<script type="text/javascript">
    $(document).ready(function(){

        $("#forum_select").change(function () {
            
            $("#forum_select option:selected").each(function () {
              str = $("#forum_select").val();
             });
             $("[name=k_forums]").val(str);
        })
        .trigger("change");
        $("[name=k_forums]").hide();
    });
</script>
';
    
    $confout = (!cot_module_active('forums')) ? $script.$L['plu_noforums'] : $script.$plugin_forum_sec_list.'<div class="adminconfigmore">'.$hint.'</div>';
    $t->assign(
        "ADMIN_CONFIG_ROW_CONFIG_MORE" , $confout
    );
}

?>