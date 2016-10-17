<!-- BEGIN: MAIN --> 
<img  src="plugins/karma/img/close.png" alt="[x]" class="closekarma" />
<div  id="karma_popup">

<!-- BEGIN: ERROR -->
    {TEXT_ERROR} 
    
    <!-- BEGIN: HEADER -->
    <script type="text/javascript" >
        $('#formbutton').attr("disabled","disabled");
        <!-- IF {PHP.cfg.plugin.karma.close_win} -->
        var karmatime = setTimeout(function(){$('#confirmBoxKarma').jqmHide();},2000);   
        <!-- ENDIF -->
    </script>
    <!-- END: HEADER -->
<!-- END: ERROR -->

<!-- BEGIN: CHANGE -->
    
    <div class='headkarmabox'>
        <!-- IF {KARMA_USER_PROFILE_AVATAR} -->
        <span class="karma_useravatar_top">{KARMA_USER_PROFILE_AVATAR}</span>
        <!-- ENDIF -->
        {PHP.L.do_1}&nbsp;<span <!-- IF {PHP.value} == "add" -->class="karma_done"<!-- ELSE -->class="karma_error"<!-- ENDIF-->>{KARMA_ACT}</span>
        &nbsp;{PHP.L.do_2}&nbsp;{KARMA_USER}<br/>{PHP.L.do_3}&nbsp;{KARMA_BAL}
    </div>
    <!-- IF {KARMA_LCT} --><strong>{KARMA_POST_LCT}</strong> {KARMA_POST}<!-- ENDIF -->

    <form name="karmaform" action="{KARMA_FORM_URL}" {KARMA_FORM_URL_AJAX}  method="POST">
        <!-- IF {PHP.cfg.plugin.karma.karma_com} -->
        <h4>{PHP.L.comm}</h4>
        <!-- ENDIF -->
        <input type="hidden" name="value" value="{KARMA_VAL}">
        <input type="hidden" name="recipient" value="{KARMA_U_ID}">
        <input type="hidden" name="lct_pg" value="{KARMA_LOCATION}">
        <input type="hidden" name="mod" value="{KARMA_MOD}">
        <!-- IF {PHP.cfg.plugin.karma.karma_com} -->
        <textarea  name="reason"  rows="4" cols="70"></textarea>
        <!-- ENDIF -->
        <button id="formbutton">{PHP.L.Submit}</button>
        <div id="karma_mess"></div>
    </form>
<!-- END: CHANGE -->

<!-- BEGIN: SHOW -->
  
        <div class='headkarmabox'>
            <!-- IF {KARMA_USER_PROFILE_AVATAR} -->
            <span class="karma_useravatar_top">{KARMA_USER_PROFILE_AVATAR}</span>
            <!-- ENDIF -->
           {PHP.L.f_karma}: {KARMA_NAME_USER}  <span class="karmavalue">{KARMA_USER_KARMA_FULL}</span>
            <!-- IF {PHP.cfg.plugin.karma.karma_auth} > 0 -->   
            <div class="karmadesc">
                {KARMA_USER_VALUE} {PHP.L.userball} + {KARMA_AUTH_VALUE} {PHP.L.authball} {KARMA_AUTH_COUNT}.
            </div>   
            <!-- ENDIF --> 
        </div>
        <!-- IF {KARMA_PAGINATION} -->
        <div class="karmapaging">
            {KARMA_PAGEPREV} {KARMA_PAGINATION}{KARMA_PAGENEXT}
        </div>
        <!-- ENDIF -->
    <!-- IF {PHP.total_p} > 0 -->

            <table width=100% class="karmacells">
                <tr >
                    <th  class="centerall" width="8%"></th>
                    <!-- IF {PHP.cfg.plugin.karma.karma_com} -->
                    <th  class="centerall" >{PHP.L.karma_com}</th>
                    <!-- ENDIF -->
                    <th  class="centerall" width="25%">{PHP.L.Name}</th>
                    <th  class="centerall" width="15%">{PHP.L.Reason}</th>
                    <!-- IF {KARMA_ADMIN} -->
                    <th  class="centerall" width="1%"></th>
                    <!-- ENDIF -->
                </tr>
    <!-- ENDIF --> 
    <!-- BEGIN: SHOW_ROW -->
                <tr>
                    <td class="centerall"><span class="karmavalue valueminus <!-- IF !{KARMA_CLASS} --> green <!-- ENDIF -->"><!-- IF {KARMA_CLASS} -->-&nbsp;&nbsp;<!-- ELSE -->+&nbsp;<!-- ENDIF -->{KARMA_VALUE}</span></td>
                    <!-- IF {PHP.cfg.plugin.karma.karma_com} -->
                    <td class="middle">{KARMA_TEXT}</td>
                    <!-- ENDIF -->
                    <td class="centerall">
                        <!-- IF {KARMA_USER_AVATAR} -->
                        <div class="karmauser"><span class="karma_useravatar">{KARMA_USER_AVATAR}</span>{KARMA_USER}</div>
                        <!-- ELSE -->
                        {KARMA_USER}
                        <!-- ENDIF -->    
                    </td>
                    <td class="centerall"><a href="{KARMA_VIEW_URL}" target="blank" >{KARMA_VIEW_TITLE}</a></td>
                    <!-- IF {KARMA_ADMIN} -->
                    <td  class="centerall"><a href="{KARMA_ADMIN_URL}" {KARMA_ADMIN_URL_AJAX} title="{PHP.L.Delete}"><img  src="plugins/karma/img/delete.gif" alt="[x]" /></a></td>
                    <!-- ENDIF -->
                </tr>
    <!-- END: SHOW_ROW -->
      </table>
             
      <div align="center">{KARMA_USERS}</div>
    
<!-- END: SHOW -->
</div>  
<!-- END: MAIN -->