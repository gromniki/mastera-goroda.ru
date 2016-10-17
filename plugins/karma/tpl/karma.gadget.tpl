<!-- BEGIN: MAIN -->
    <span class="karma_gafget">
        <!-- IF {PAGE_KARMA_ADD} -->
            <a href="{PAGE_KARMA_ADD}" OnClick="karma_jqm('{PAGE_KARMA_ADD}','{PAGE_KARMA_MINI}');return false;"><img  src="plugins/karma/img/rep_plus.gif" alt="[+]" title="{PHP.L.karma_add}"/></a>
        <!-- ENDIF -->

        <!-- IF {PAGE_KARMA_URL} -->
            <a href="{PAGE_KARMA_URL}" OnClick="karma_jqm('{PAGE_KARMA_URL}','{PAGE_KARMA_MINI}');return false;">
        <!-- ENDIF -->
            <span class="karmavalue 
                  <!-- IF {PAGE_KARMA_D} < {PHP.color.1} -->value0<!-- ENDIF -->
                  <!-- IF {PAGE_KARMA_D} < {PHP.color.0} -->valueminus<!-- ENDIF -->
                  <!-- IF {PAGE_KARMA_D} > {PHP.color.2} -->green<!-- ENDIF -->
                  ">{PAGE_KARMA_D}</span>
        <!-- IF {PAGE_KARMA_URL} --></a><!-- ENDIF -->

        <!-- IF {PAGE_KARMA_DEL} -->
            <a href="{PAGE_KARMA_DEL}"  OnClick="karma_jqm('{PAGE_KARMA_DEL}','{PAGE_KARMA_MINI}');return false;"><img  src="plugins/karma/img/rep_minus.gif" alt="[-]" title="{PHP.L.karma_del}"/></a>
        <!-- ENDIF -->
    </span>
<!-- END: MAIN -->